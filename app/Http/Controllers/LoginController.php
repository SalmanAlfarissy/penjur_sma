<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        $session = Auth::user();
        if($session){
            return redirect('/dashboard');
        }
        return view('login');
    }

    public function authLogin(Request $request){
        $validate = $request->validate([
            'nip'=>'required',
            'password'=>'required',
        ]);
        $user = Auth::attempt($validate);
        if ($user) {
            return redirect('/dashboard');
        }
        return back()->withErrors([
           'message' => 'The nip do not match our records!!'
        ]);
    }
}
