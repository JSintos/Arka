<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;


class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $communities = Community::all();

        return view('proxy-community')->with(array('communities' => $communities));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $user = auth()->user();
       

        // Only keep unique values, by using array_unique with SORT_REGULAR as flag.
        // We're using array_values here, to only retrieve the values and not the keys.
        // This way json_encode will give us a nicely formatted JSON string later on.
        $array = array_values( array_unique( $request->all()['community'], SORT_REGULAR ) );

        // Make a JSON string from the array.
        $final = json_encode( $array );
        $user->communityList = $final;

        $user->save();

        return redirect(RouteServiceProvider::HOME);

         // $id = Auth::id();
        // $user = User::findOrFail($id);


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
