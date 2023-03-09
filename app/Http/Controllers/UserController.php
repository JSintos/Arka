<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;

class UserController extends Controller
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
        $user = Auth::user();
        $badgeList = json_decode($user->badgeList, true);

        return view('update-user')->with(array("badgeList" => $badgeList));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profileUpdate(Request $request){
        //validation rules

        $emails = User::all();
        $user = Auth::user();

        $decryptedEmail = Crypt::decryptString($user->email);

        if($request['name'] == $user->username){

            // $request->validate([
            //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //     // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // ]);
            
            foreach($emails as $email){
                    if(Crypt::decryptString($email->email) == $request['email']){
                        return back();
                        break;
                    }
                }
            

            $user->email = Crypt::encryptString($request['email']);
            $user->save();

            return redirect('/update-user')->with("error","Email successfully changed!");
        }

        else if($request['email'] == $decryptedEmail){
            $request->validate([
                'name' => ['required', 'string', 'max:255', 'unique:users,username']
                // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user->username = $request['name'];
            $user->save();

            return redirect('/update-user')->with("error","Username successfully changed!");
        }

        else {
            $request->validate([
                'name' => ['required', 'string', 'max:255', 'unique:users,username'],
                
            ]); 
            foreach($emails as $email){
                if(Crypt::decryptString($email->email) == $request['email']){
                    return back();
                    break;
                }
            }
            
            $user->email = Crypt::encryptString($request['email']);
            $user->username = $request['name'];
            $user->save();
            return redirect('/update-user')->with("error","Profile successfully changed!");
        }
    }

    public function showChangePassword() {
        return view('change-password');
    }

    public function changePassword(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not match with the password.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }
        if(strcmp($request->get('new-password'), $request->get('new-password-confirmation')) != 0){
            // New password and new password confirmation are not the same
            return redirect()->back()->with("error", "Inputted confirmation password is not the same as new password");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }
}
