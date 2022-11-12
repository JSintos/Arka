<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $user = auth()->user();
        // Gets the list of communities the user has
        $communityList = \json_decode($user->communityList);

        // Gets the list of existing communities
        $communities = DB::table('communities')->get();

        $resultingArray = array();
        foreach($communityList as $community){
            foreach($communities as $c){
                if(\strcmp($community, $c->communityName) == 0){
                    array_push($resultingArray, $c);
                }
            }
        }

        return view('dashboard')->with(array('communities' => $resultingArray));
    }

    public function commendUser($badgeNumber, $userId){
        error_log("badge number: " . $badgeNumber);
        error_log("userid: " . $userId);

        $user = DB::table('users')->where('userId', $userId)->first();

        $decodedArray = json_decode($user->badgeList, true);

        // dd($decodedArray);
        // dd($decodedArray["badgeOne"]);

        switch($badgeNumber){
            case 1: $decodedArray["badgeOne"] = $decodedArray["badgeOne"] + 1;
                    break;
            case 2: $decodedArray["badgeTwo"] = $decodedArray["badgeTwo"] + 1;
                    break;
            case 3: $decodedArray["badgeThree"] = $decodedArray["badgeThree"] + 1;
        }

        DB::table('users')->where('userId', $userId)->update(["badgeList" => json_encode($decodedArray)]);

        return ['status' => 'Message Sent!'];
    }

    public function reportUser(Request $request, $userId){

    }
}
