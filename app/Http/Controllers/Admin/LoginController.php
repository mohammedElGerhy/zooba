<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin (){
        return view('admin.auth.login');
    }

    public function login (Request $request){

        $remember_me = $request->has('remember_me')?true:false;
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $remember_me)){
            return redirect() -> route('admin.dashboard');
        }
        return redirect()->back()->with('errors', 'هناك  خطا بالبيانات ');
    }

    public function logout (){
        auth()->guard('admin')->logout();
        return redirect() -> route('admin.auth.login');
    }
}
