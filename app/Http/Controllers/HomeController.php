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

        $subscription = DB::table('subscriptions')->where('userId', $user->userId)->first();

        return view('dashboard')->with(array('communities' => $resultingArray, 'isSubscribed' => isset($subscription)));
    }
}
