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
use Illuminate\Support\Facades\Mail;
use App\Mail\DenySubscription;
use App\Mail\OrganizationalRegistrationEmail;
use Illuminate\Support\Facades\Hash;

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
    
    public function denySubscription(Request $request)
    {
        $id = $request['subscriptionId'];
        $subscription = Subscription::find($id);
        $userId = $subscription->userId;

        $users = User::all();

        foreach($users as $user){
            if($user->userId == $userId){
                $deniedUser = $user;
                break;
            }
        }
        $subscription->delete();

        return view('admin-panel-subscriptions-deny', compact('deniedUser'));
        
    }

    public function deniedEmailSubscription(Request $request){
        $comment = $request->comment;
        Mail::to($request->email)->send(new DenySubscription($comment));

        return redirect('admin/subscriptions')->with('success', 'Email sent and subscription denied successfully');
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

        $createdCommunity = Report::where('reportDescription', $communityName);
        $createdCommunity->delete();

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

    public function organizationalRegistration()
    {
        return view('admin-organizational-registration');
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function handleOrganizationalRegistration(Request $request){
        // echo $request['educationalInstitution'];

        if (($open = fopen($_FILES['csvFile']['tmp_name'], "r")) !== FALSE){

            while (($data = fgetcsv($open, 1000, ",")) !== FALSE)
            {
                $flag = false;
                $users = DB::table('users')->get();

                do {
                    $tentativeUsername = strtolower($data[0][0]) . strtolower($data[1]) . random_int(1111, 9999) . "";

                    foreach($users as $user){
                        if(strcasecmp($user->username, $tentativeUsername) == 0){
                            $flag = true;
                        }
                        else {
                            $flag = false;
                        }
                    }
                } while($flag);

                $userPassword = AdminController::generateRandomString();

                $user = User::create([
                    'username' => $tentativeUsername,
                    'email' => $data[2],
                    'password' => Hash::make($userPassword),
                    'userType' => 0,
                    'badgeList' => json_encode(array("badgeOne" => 0, "badgeTwo" => 0, "badgeThree" => 0)),
                    'isVerified' => 1,
                    'educationalInstitution' => $request['educationalInstitution']
                ]);

                Mail::to($data[2])->send(new OrganizationalRegistrationEmail($data[2], $tentativeUsername, $userPassword));
            }

            fclose($open);
        }

        $schoolAdmin = DB::table('users')->where('username', $request['schoolAdminUsername']);
        $schoolAdmin->update(["userType" => 3]);
        $schoolAdmin->update(["educationalInstitution" => $request['educationalInstitution']]);

        return back()->with('success','Registration success!');
    }

    public function getSchoolAdminPanel(){
        $user = Auth::user();

        $users = User::where('educationalInstitution', $user->educationalInstitution)->where('userType', '<>', 3)->get();

        return view('school-admin-panel')->with('users', $users);
    }

    public function deactivateStudent(){
        $deactivatedStudent = DB::table('users')->where('userId', $request['deactivateUserId']);
        $deactivatedStudent->update(["userType" => 4]);

        return back()->with('success','User deactivated!');
    }

}
