<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
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

        $valid = false;

        $date = Auth::user()->created_at;
        $now = Carbon::now();

        $testdate = $date->diffInDays($now);
 
        if($testdate >= 30  &&  $now->dayOfWeek === Carbon::FRIDAY)
        {
            $valid = true;
        }



        return view('practice')->with(array('valid' => $valid));
    }

    /**z
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'monthlyFeedback' => 'required',
        ]);

        $userId = Auth::id();
        $current = Carbon::now();

        Feedback::create([
            'userId' => $userId,
            'dateFeedbackAnswered' => $current,
            'type' => 1,
            'firstQuestionRating' => $request->monthlyFeedback,
        ]);
        return redirect('/practice')->with('success', 'Data saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }

    public function showMonthlyFeedback()
    {
        return view('monthly-feedback');
    }

    public function monthlyFeedback(Request $request)
    {
        $request->validate([
            'monthlyFeedback' => 'required',
        ]);

        $userId = Auth::id();
        $current = Carbon::now();

        Feedback::create([
            'userId' => $userId,
            'dateFeedbackAnswered' => $current,
            'type' => 1,
            'firstQuestionRating' => $request->monthlyFeedback,
        ]);

        return redirect('/dashboard');
    }

}
