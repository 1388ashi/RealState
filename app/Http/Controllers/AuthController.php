<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (auth()->user())
        {
            return redirect('admin');
        }

        return view('login');
    }
    public function login(Request $request)  
{  
    $request->validate([  
        'password' => 'required', 
    ]);  

    if ($request->password == '123456') { 
        $request->session()->regenerate();  
        return redirect()->route('admin.dashboard');  
    }  

    return back()->withErrors([  
        'password' => 'اطلاعات وارد شده اشتباه است!',  
    ]);  
}  
}
