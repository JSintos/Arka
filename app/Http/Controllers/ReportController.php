<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }

    public function getRequestCommunity()
    {
        // $id = Auth::user()->userId;

        // if (Report::where('userId', '=', $id)->where('status', '=', '3')->exists()) {
        //     return redirect('dashboard')->with("error", "You have already petitioned a community");
        // }
        // else{
            return view('request-community');
        // }

    }

    public function postRequestCommunity(Request $request)
    {
        $request->validate([
            'requestCommunity' => ['required', 'string', 'max:255']
        ]);

        $id = Auth::user()->userId;


        $community = $request['requestCommunity'];

        if(Community::where('communityName', '=', $community)->exists())
        {
            return redirect('request-community')->with("error", "Community already exists");
        }
        else
        {
            if(Report::where('userId', '=', $id)->where('reportDescription', '=', $community)->exists()){

                return redirect('request-community')->with("error", "You have already requested for this community!");

            }
            else{

                $report = Report::create([
                    'userId' => $id,
                    'reportDescription' => $request->requestCommunity,
                    'status' => 3,
                    'resolutionStatus' => 0
                ]);

                return redirect('/request-community')->with("success","Community petition requested successfully!");

            }

        }
    }
}
