<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subscription');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }

    public function getPayment()
    {
        $id = Auth::user()->userId;
        
        if (Subscription::where('userId', '=', $id)->exists()) {
            return redirect('proxy-subscription')->with("error", "You already have a premium subscription");    
        }
        else{
            return view('gcash-payment');
        }
        
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPayment(Request $request)
    {
        // dd($request->all());
        
        $request->validate([
            'referenceNumber' => ['required', 'string', 'max:255', 'unique:subscriptions'],
            'phoneNumber' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:135'],

        ]);

        $id = Auth::user()->userId;

        $subscription = Subscription::create([
            'userId' => $id,
            'referenceNumber' => $request->referenceNumber,
            'phoneNumber' => $request->phoneNumber,
            'amount' => $request->amount
        ]);

        return redirect()->back()->with("success","Availed for premium subscription!");

        
    }
}
