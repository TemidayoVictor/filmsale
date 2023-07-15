<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class AddAdminController extends Controller
{
    public function index() {
        return view('admin.add-admin', [
            'upperNav' => 'nil',
            'sideNav' => 'add',
        ]);
    }

    public function addAdmin(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255|unique:users,name',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'address' => 'admin',
            'email' => $request->email,
            'date' => 'admin',
            'password' => Hash::make($request->password),
            'type' => 'admin',
        ]);

        return redirect() -> route('login')->with('success', 'Admin added successfully. Please login');
    }
}
