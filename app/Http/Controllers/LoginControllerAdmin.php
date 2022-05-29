<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use AuthenticatesUsers;

class LoginControllerAdmin extends Controller
{
    public function loginadmin(){
        return view('admin.login');
    }

    public function action(Request $request){
        if(Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect()->route('dashboard');
            
        }else{
            return redirect()->back()->with('error','Username atau Password anda salah');
        }

    }

    public function logoutAdmin()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('loginadmin');
    }
}
