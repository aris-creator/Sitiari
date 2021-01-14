<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PekerjaLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:pekerja');
    }

    public function showLoginForm()
    {
        return view('auth.pekerja-login');
    }

    public function login(Request $req)
    {
        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::guard('pekerja')->attempt(['email' => $req->email, 'password' => $req->password], $req->remember)){
            return redirect()->intended(route('pekerja.dashboard'));
        }

        return redirect()->back()->withInput($req->only('email', 'remember'));
    }
}
