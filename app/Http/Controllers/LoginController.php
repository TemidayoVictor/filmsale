<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function index() {
        return view('login', [
            'upperNav' => 'login',
            'sideNav' => 'nil',
        ]);
    }

    public function login(Request $request) {
        $this-> validate ($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if(!auth()->attempt($request->only('email','password'), $request->remember)) {
            return back()->with('error', 'Invalid email or password');
        }

        elseif(auth()->attempt($request->only('email','password'), $request->remember)) {
            if(auth()->user()->type == 'client') {
                Session::put(['name' => auth()->user()->name]);
                Session::put(['id' => auth()->user()->id]);
                return redirect()->route('purchaseList', ['id' => auth()->user()->id]);
            }  

            elseif(auth()->user()->type == 'admin') {
                Session::put(['name' => auth()->user()->name]);
                Session::put(['id' => auth()->user()->id]);
                return redirect()->route('usersList');
            }
        }
    }
}
