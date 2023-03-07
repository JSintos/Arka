<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Community;
use App\Models\Feedback;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use App\Models\Chart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
    
    public function deleteSubscription(Request $request)
    {
        $id = $request['subscriptionId'];
        $subscription = Subscription::find($id);

        $subscription->delete();

        return back()->with('success', 'User subscription deleted successfully');
        
    }

    public function indexCommunity()
    {
        $communities = Community::get();
        $petitions = DB::table('reports')
                        ->select('reportDescription', DB::raw('count(*) as Count'))
                        ->where('status', '=', '3')
                        ->where('resolutionStatus', '=', '0')
                        ->groupBy('reportDescription')
                        ->get();

    
        return view('admin-panel-communities',compact('communities', 'petitions'));
    }

    public function createPetitionedCommunity(Request $request)
    {
        $request->validate([
            'reportDescription' => 'required', 'unique::communities,communityName'
        ]);
        $communityName = $request['reportDescription'];

        Community::create([
            'communityName' => $communityName
        ]);

        $update = Report::where('reportDescription', $communityName);
        $update -> update(['resolutionStatus' => '1']);

        return redirect('admin/community')->with('success', 'Petitioned Community created successfully!');
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
    
    // public function deleteCommunity(Request $request)
    // {
    //     $remove = Community::find($community);

    //     return view('projects.delete', compact('remove'));
    // }
    public function destroyCommunity(Request $request)
    {
        // $community->delete();

        // return redirect('/admin/community')->with('success', 'Community deleted successfully!');

        $community = Community::find($request->community_delete_id);

        if($community)
        {
            $community->delete();
            return redirect('/admin/community')->with('success', 'Community deleted successfully!');
        }
        else
        {
            return redirct('/admin/community')->with('error', 'Community not found.');
        }
        
    }

    public function getReports()
    {
        $unresolvedReports = Report::where('status', 0)->get();
        $resolvedReports = Report::where('status', 1)->get();
        $users = User::all();
        return view('admin-panel-reports', compact('unresolvedReports', 'resolvedReports','users'));
    }
    public function resolveReport(Request $request)
    {
        $id = $request['reportId'];
        $user = Auth::user();
       
        $unresolved = Report::find($id); 
        $unresolved->status = 1;
        $unresolved->resolutionStatus = 0;
        $unresolved->resolvedBy = $user->userId;
        $unresolved->save();

        return back()->with('success','Report acknowledged successfully!');
    }

    public function reportBanUser(Request $request)
    {
        $id = $request['reportId'];
        $user = Auth::user();

        $unresolved = Report::find($id);
        $unresolved->status = 1;
        $unresolved->resolutionStatus = 1;
        $unresolved->resolvedBy = $user->userId;
        $unresolved->save();

        $bannedId = $request['reportedUserId'];
        $ban = User::find($bannedId);
        $ban->userType = 2;
        $ban->save();

        return back()->with('success','User banned successfully!');
    }
    public function indexFeedback()
    {

        $feedbacks = Feedback::select(
                        DB::raw("MONTH(created_at) as month"),
                        DB::raw("AVG(firstQuestionRating) as average"))
                    ->where("type", "=", "1")
                    ->orderBy(DB::raw("MONTH(created_at)"))
                    ->groupBy(DB::raw("MONTH(created_at)"))
                    ->get();
        
        $res[] = ['month', 'average'];

       
        foreach($feedbacks as $key => $val){
            $res[++$key] = [$val->month, (double)$val->average];
        }
        return view('admin-panel-feedbacks')->with('feedbacks', json_encode($res));

    }

}
