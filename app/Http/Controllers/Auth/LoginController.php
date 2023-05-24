<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
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

    protected $redirectTo = RouteServiceProvider::HOME;

    public function username() {
        return 'username';
    }

    public function showLoginForm(Request $request)
    {
        if (Auth::user()) {
            return redirect('/');
        }
        return view('pages.admin.login');
    }

    public function login(Request $request)
    {
        $data = $request->input();
        $username = $data['username'];
        $password = $data['password'];

        if (Auth::attempt([
            'username' => $username,
            'password' => $password
        ])) {
            $request->session()->put('user', $username);
            return redirect('/');
        }

        return redirect()->back();
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
