<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login(){

        return view('auths.login');

    }

    public function postlogin(Request $request){

        if(Auth::attempt($request->only('email', 'password'))){
            if (Auth::attempt(['email' =>$request->email, 'password' => $request->password, 'status' => 'Tidak Aktif'])) {
                // Authentication was successful...
            
            
                return redirect ('/login')->with('status', 'Akun ini belum diaktifkan ! ');
            
            }
            




            
            return redirect('/dashboard')->with('sukses', 'Anda Berhasil Login ! ');
        }



        return redirect ('/login')->with('hapus', 'Email Atau Password Salah ! ');


        }
    

    public function logout(){

        Auth::logout();

        return redirect('/login')->with('sukses', 'Anda Berhasil Logout !');
    }
}
