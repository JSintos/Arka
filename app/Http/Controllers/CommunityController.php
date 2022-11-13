<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;


class CommunityController extends Controller
{
    public function getExistingCommunities()
    {
        $listOfCommunities = Community::all();

        $user = Auth::user();
        $userCommunityList = \json_decode($user->communityList, true);

        $communities = array();
        foreach($listOfCommunities as $community){
            if(!in_array($community->communityName, $userCommunityList)){
                array_push($communities, $community);
            }
        }

        return $communities;
    }

    public function getUserCommunityList()
    {
        $listOfCommunities = Community::all();

        $user = Auth::user();
        $userCommunityList = \json_decode($user->communityList, true);

        $communityList = array();
        foreach($userCommunityList as $userCommunity){
            foreach($listOfCommunities as $c){
                if(\strcmp($userCommunity, $c->communityName) == 0){
                    array_push($communityList, $c);
                }
            }
        }

        return $communityList;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communities = CommunityController::getExistingCommunities();
        $communityList = CommunityController::getUserCommunityList();

        return view('community-list', compact('communities', 'communityList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $communities = Community::all();

        return view('community')->with(array('communities' => $communities));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        // Only keep unique values, by using array_unique with SORT_REGULAR as flag.
        // We're using array_values here, to only retrieve the values and not the keys.
        // This way json_encode will give us a nicely formatted JSON string later on.
        $array = array_values(array_unique( $request->all()['community'], SORT_REGULAR));

        // Make a JSON string from the array.
        $final = json_encode( $array );
        $user->communityList = $final;

        $user->save();

        return redirect(RouteServiceProvider::HOME);
    }

    public function addCommunity($communityId)
    {
        $user = Auth::user();
        $communityList = \json_decode($user->communityList);

        $communityToAdd = DB::table('communities')->where('communityId', $communityId)->first();

        array_push($communityList, $communityToAdd->communityName);

        $user->communityList = json_encode($communityList);
        $user->save();

        $communities = CommunityController::getExistingCommunities();
        $communityList = CommunityController::getUserCommunityList();

        return redirect()->route('community-list')->with(array('communities' => $communities, 'communityList' => $communityList));
    }

    public function removeCommunity($communityId)
    {
        $user = Auth::user();
        $communityList = \json_decode($user->communityList);

        $communityToAdd = DB::table('communities')->where('communityId', $communityId)->first();

        unset($communityList[array_keys($communityList, $communityToAdd->communityName)[0]]);
        $communityList = array_values($communityList);

        $user->communityList = json_encode($communityList);
        $user->save();

        $communities = CommunityController::getExistingCommunities();
        $communityList = CommunityController::getUserCommunityList();

        return redirect()->route('community-list')->with(array('communities' => $communities, 'communityList' => $communityList));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Community $community)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        //
    }


}
