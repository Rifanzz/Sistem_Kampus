<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller

{
    public function login()
    {
        // dd(Hash::make(123456));
        if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type == 2)
            {
                return redirect('dosen/dashboard');
            }
            else if(Auth::user()->user_type == 3)
            {
                return redirect('mahasiswa/dashboard');
            }
        }
        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        // dd($request->all());
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type == 2)
            {
                return redirect('dosen/dashboard');
            }
            else if(Auth::user()->user_type == 3)
            {
                return redirect('mahasiswa/dashboard');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Silahkan masukkan email dan password yang benar');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
