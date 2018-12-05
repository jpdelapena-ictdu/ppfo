<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class PersonnelLoginController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
       public function __construct()
       {
           $this->middleware('guest:personnel')->except('logout');
       }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('personnels.login');
    }
    public function loginpersonnel(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'username'   => 'required'
      ]);
      // Attempt to log the user in
      if (Auth::guard('personnel')->attempt(['username' => $request->username, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('personnel.dashboard'));
      }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('username'));
    }
    public function logout()
    {
        Auth::guard('personnel')->logout();
        return redirect()->route('personnel.auth.login');
    }
}

