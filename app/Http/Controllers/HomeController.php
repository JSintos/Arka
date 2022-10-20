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
        $communityList = \json_decode($user->communityList);

        $communities = DB::table('communities')->get();

        $existingCommunities = array();
        foreach($communities as $community){
            array_push($existingCommunities, $community->communityName);
        }

        unset($community);

        $resultingArray = array();
        foreach($communityList as $community){
            if(\in_array($community, $existingCommunities)){
                array_push($resultingArray, $community);
            }
        }

        return view('dashboard')->with(array('communities' => $resultingArray));
    }
}
