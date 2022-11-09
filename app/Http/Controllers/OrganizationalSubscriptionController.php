<?php

namespace App\Http\Controllers;

use App\Models\OrganizationalSubscription;
use Illuminate\Http\Request;

class OrganizationalSubscriptionController extends Controller
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
        return view('organizational-subscription');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullName' => ['required', 'string', 'max:255'],
            'emailAddress' => ['required', 'string', 'email', 'max:255'],
            'companyName' => ['required', 'string', 'max:255'],
            'companySize' => ['required', 'integer', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'details' => ['required', 'string'],
        ]);

        $organizationalSubscription = OrganizationalSubscription::create([
            'fullName' => $request->fullName,
            'emailAddress' => $request->emailAddress,
            'companyName' => $request->companyName,
            'companySize' => $request->companySize,
            'country' => $request->country,
            'details' => $request->details
        ]);

        return redirect('/subscription');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrganizationalSubscription  $organizationalSubscription
     * @return \Illuminate\Http\Response
     */
    public function show(OrganizationalSubscription $organizationalSubscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrganizationalSubscription  $organizationalSubscription
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationalSubscription $organizationalSubscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrganizationalSubscription  $organizationalSubscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrganizationalSubscription $organizationalSubscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrganizationalSubscription  $organizationalSubscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationalSubscription $organizationalSubscription)
    {
        //
    }
}
