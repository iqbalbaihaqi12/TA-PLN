<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function postlogin(Request $request){
        // dd($request->all());
        if (Auth::attempt($request->only('username','password','level'))){
            if (auth()->user()->level=="admin")
            return redirect('/admin/jadwal');

            if (auth()->user()->level=="petugas")
            return redirect('/petugas');

            if (auth()->user()->level=="pimpinan")
            return redirect('/pimpinan');
        }
            return redirect('/');

    }//



    public function logout(Request $request){
        // dd($request->all());
        Auth::logout();
        return redirect('/');
        }
    //
}
