<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{

    function index()
    {
        return view('sesi/index');
    }
    
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if (Auth::attempt($infologin)) {
            return redirect('dashboard')->with('success','Berhasil login');
        } else {
            return redirect('sesi')->withErrors(['login_failed' => 'Username dan password yang dimasukkan tidak sesuai'])->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('sesi')->with('success','Berhasil Logout');
    }

    function signup(){
        return view('sesi/signup');
    }

    function create(Request $request){
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'Name wajib diisi',
            'phone.required' => 'Phone wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Silahkan masukkan email yang valid',
            'email.unique' => 'Email sudah pernah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min'=>'Minimum password 6 karakter'
        ]);

        $data= [
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];

        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if (Auth::attempt($infologin)) {
            return redirect('dashboard')->with('success', Auth::User()->name .' Berhasil login');
        } else {
            return redirect('sesi')->withErrors(['login_failed' => 'Username dan password yang dimasukkan tidak sesuai'])->withInput();
        }       
    }
}
