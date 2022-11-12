<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Community;
use App\Models\Feedback;
use Carbon\Carbon;

class AdminController extends Controller
{
 
    public function getAdminPanel()
    {
        $subscriptions = Subscription::where('isConfirmed', 0)->get();
        $verifiedSubs = Subscription::where('isConfirmed', 1)->get();
        return view('admin-panel-subscriptions', compact('subscriptions', 'verifiedSubs'));
    }

    public function verifySubscription(Request $request)
    {
        $now = Carbon::now();
        $month = Carbon::now()->addMonth();
        $id = $request['subscriptionId'];

        $subscription = Subscription::find($id);
        $subscription->subscriptionDate = $now; 
        $subscription->expirationDate = $month;
        $subscription->isConfirmed = 1;
        $subscription->save();

        return back()->with('success','User subscription verfied successfully!');
    }

    public function indexCommunity()
    {
        $communities = Community::get();
    
        return view('admin-panel-communities',compact('communities'));
    }


    public function createCommunity()
    {
        return view('admin-panel-communities-create');
    }

 
    public function storeCommunity(Request $request)
    {
        $request->validate([
            'communityName' => 'required', 'unique::communities,communityName'
        ]);

        Community::create($request->all());

        return redirect('/admin/community')->with('success', 'Community created successfully!');

    }

    public function editCommunity(Community $community)
    {
        return view('admin-panel-communities-edit', compact('community'));
    }


    public function updateCommunity(Request $request, Community $community)
    {
        $request->validate([
            'communityName' => 'required', 'unique::communities,communityName'
        ]);

        $community->update($request->all());

        return redirect('/admin/community')->with('success', 'Community updated successfully!');
    }

    public function destroyCommunity(Community $community)
    {
        $community->delete();

        return redirect('/admin/community')->with('success', 'Community deleted successfully!');
    }

    public function indexFeedback()
    {
        $roomFeedbacks = Feedback::where('type', 0)->get();
        $monthlyFeedbacks = Feedback::where('type', 1)->get();

        return view('admin-panel-feedbacks', compact('roomFeedbacks', 'monthlyFeedbacks'));

    }

}
