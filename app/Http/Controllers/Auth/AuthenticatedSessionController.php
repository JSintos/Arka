<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $emails = User::all();
        // $request->authenticate();
        $email = $request['email'];
        $password = $request['password'];

        foreach($emails as $email){
            if(Crypt::decryptString($email->email) == $request['email']){
                $registeredUser = User::where('email', '=', $email->email)->first();
                break;
            }
        }

        if(!Hash::check($password, $registeredUser->password)){
            return redirect('login')->with('success', 'Given credentials is incorrect');
        }
        else{
            Auth::login($registeredUser);
            
            $request->session()->regenerate();

            $user = auth()->user();
    
            if($user->userType == 2)
            {
                $request->session()->invalidate();
                return redirect('login')->with('success', 'Your account is banned!');
            }
            
            if($user->userType == 4)
            {
                $request->session()->invalidate();
                return redirect('login')->with('success', 'Your account has been deactivated!');
            }
    
            if($user->communityList == null)
            {
                return redirect('/community');
            }
            else
            {
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }
       
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
