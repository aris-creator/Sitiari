<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class MajikanLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:majikan');
    }

    public function showLoginForm()
    {
        return view('auth.majikan-login');
    }

    public function login(Request $req)
    {
        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::guard('majikan')->attempt(['email' => $req->email, 'password' => $req->password], $req->remember)){
            return redirect()->intended(route('majikan.dashboard'));
        }

        return redirect()->back()->withInput($req->only('email', 'remember'));
    }
}
