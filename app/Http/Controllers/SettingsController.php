<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\User;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    //

    public function index($id) {
        $client = User::find($id);
        if($client) {
            return view('client.settings', [
                'upperNav' => 'nil',
                'sideNav' => 'profile',
                'client' => $client,
            ]);
        }

        else {
            return redirect()->route('home');
        }
    }

    public function editProfile(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'date' => 'required',
            'password' => 'confirmed',
        ]);

        $date = new Carbon($request->date);
        $newDate = $date->toFormattedDateString();

        $age = Carbon::parse($date)->age;

        if(!empty($request->password)) {
            $update = User::where('id', $id)
            -> update ([
                'name' => $request->name,
                'address' => $request->address,
                'date' => $request->date,
                'password' => Hash::make($request->password),
                'age' => $age,
            ]);
        }


        else {
            $update = User::where('id', $id)
            -> update ([
                'name' => $request->name,
                'address' => $request->address,
                'date' => $request->date,
                'age' => $age,   
            ]);
        }
        Session::put(['name' => $request->name]);
        return back()->with('message', 'Profile Update Successful');
    }
}
