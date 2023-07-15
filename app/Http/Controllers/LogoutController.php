<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function logUserOut() {
        Session::flush();
        auth()->logout();
        return redirect()->route('login');
    }
}
