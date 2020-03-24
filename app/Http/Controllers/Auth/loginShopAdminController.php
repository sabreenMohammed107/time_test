<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

class loginShopAdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/shop-manager';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
     public function __construct()
    {
     $this->middleware('guest:shopadmin')->except('logout');
     // $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm()
    {
        return view('Admin.shopmanager.login');
    }
   

    public function login(Request $request)
    {
       
        $this->validateLogin($request);

        if (Auth::guard('shopadmin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
           
            return redirect()->intended(url('/shop-manager'));
        }
        return redirect()->back()->withInput($request->only(['email', 'remember']));
    }

    public function logout(Request $request)
    {
        $this->guard('shopadmin')->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/shop-login');
    }
}
