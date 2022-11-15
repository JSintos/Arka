<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Feedback;

class HomeController extends Controller
{
    public function home()
    {
        // Community list code
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

        $subscription = DB::table('subscriptions')->where('userId', $user->userId)->first();

        // Monthly feedback code
        $valid = false;

        $createdAt = Auth::user()->created_at;
        $now = Carbon::now('Asia/Manila');

        // Gets the difference between today and the user's creation date in days
        $diffDate = $createdAt->diffInDays($now);
        if($diffDate >= 30 && $now->isDayOfWeek(Carbon::TUESDAY))
        {
            $valid = true;
        }

        // Gets the latest feedback answered by the user
        $latestFeedback = DB::table('feedbacks')->where('userId', Auth::user()->userId)->orderBy('dateFeedbackAnswered', 'DESC')->first();
        // If there is one,
        if(isset($latestFeedback)){
            $latestFeedbackDate = new Carbon($latestFeedback->dateFeedbackAnswered);

            // Calculate the difference in days again and check if it has been a week of answering the last feedback
            $feedbackDiff = $latestFeedbackDate->diffInDays($now);
            if($feedbackDiff < 6){
                $valid = false;
            }
        }

        return view('dashboard')->with(array('communities' => $resultingArray, 'isSubscribed' => isset($subscription), 'valid' => $valid));
    }

    public function storeMonthlyFeedback(Request $request){
        $userId = Auth::id();
        $now = Carbon::now('Asia/Manila');

        Feedback::create([
            'userId' => $userId,
            'dateFeedbackAnswered' => $now,
            'type' => 1,
            'firstQuestionRating' => $request->rating,
        ]);

        return redirect()->back();
    }
}
