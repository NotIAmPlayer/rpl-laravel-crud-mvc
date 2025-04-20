<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index() {
        $staff = DB::table('users')->get();

        return view('staff', ['staff' => $staff]);
    }
}
