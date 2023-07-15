<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index() {
        return view('signup', [
            'upperNav' => 'signup',
            'sideNav' => 'nil',
        ]);
    }

    public function createAccount(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email|max:255|unique:users,email',
            'date' => 'required',
            'password' => 'required|confirmed',
        ]);

        $date = new Carbon($request->date);
        $newDate = $date->toFormattedDateString();

        $age = Carbon::parse($date)->age;

        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'date' => $request->date,
            'password' => Hash::make($request->password),
            'type' => 'client',
            'age' => $age
        ]);

        return redirect() -> route('login')->with('success', 'Registration successful, please login');

    }
}
