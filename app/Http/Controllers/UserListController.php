<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserListController extends Controller
{
    //

    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index() {
        $users = User::where('type', 'client')->get();
        return view('admin.users-list', [
            'upperNav' => 'nil',
            'sideNav' => 'userList',
            'users' => $users,
            'ageRange' => '',
        ]);
    }

    public function filter(Request $request) {
        $this->validate($request, [
            'age' => 'required',
        ]);

        if($request->age == 1) {
            $ageRange = "Below 50 Years";
            $users = User::where([
                ['type', '=', 'client'],
                ['age', '<', '50'],
            ])->get();
        }

        elseif($request->age == 2) {
            $ageRange = "Above 50 Years";
            $users = User::where([
                ['type', '=', 'client'],
                ['age', '>', '50'],
            ])->get();
        }

        return view('admin.users-list', [
            'upperNav' => 'nil',
            'sideNav' => 'userList',
            'users' => $users,
            'ageRange' => $ageRange,
        ]);
    }
}
