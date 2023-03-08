<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use Illuminate\Support\Facades\DB;

use App\Events\MessageSent;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($communityName)
    {
        return view('chat');
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }

    public function commendUser($badgeNumber, $userId){
        $user = DB::table('users')->where('userId', $userId)->first();

        $decodedArray = json_decode($user->badgeList, true);

        switch($badgeNumber){
            case 1: $decodedArray["badgeOne"] = $decodedArray["badgeOne"] + 1;
                    break;
            case 2: $decodedArray["badgeTwo"] = $decodedArray["badgeTwo"] + 1;
                    break;
            case 3: $decodedArray["badgeThree"] = $decodedArray["badgeThree"] + 1;
        }

        DB::table('users')->where('userId', $userId)->update(["badgeList" => json_encode($decodedArray)]);

        return ['status' => "You've successfully commended " . $user->username];
    }

    public function reportUser($reportedUserId, Request $request){
        $reportedUser = DB::table('users')->where('userId', $reportedUserId)->first();

        if(isset($reportedUser)){
            return view('report-form')->with(array("reportedUser" => $reportedUser));
        } else{
            return redirect('chat');
        }
    }

    public function sendReport($reportedUserId, Request $request){
        $reportedUser = DB::table('users')->where('userId', $reportedUserId)->first();
        // dd($request);
        $data = new Report();

        $userId = Auth::user()->userId;

        $data['userId'] = $userId;
        $data['reportDescription'] = $request->all()["reason"];
        $data['reportedUserId'] = $reportedUserId;
        $data['comment'] = $request->all()["comment"];
       
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/images'), $filename);
            $data['image'] = $filename;
        }
        // $newReport = Report::create([
        //     'userId' => $userId,
        //     'reportDescription' => $request->all()["reason"],
        //     'reportedUserId' => $reportedUserId,
        //     'image' => $request->image
        // ]);
        $data->save();
        return redirect()->back()->with('success', 'You have successfully reported ' . $reportedUser->username);
    }
}
