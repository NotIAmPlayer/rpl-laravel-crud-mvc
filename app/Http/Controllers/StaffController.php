<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index() {
        $staff = DB::table('users')->get(['id', 'name', 'email']);

        return view('staff', ['staff' => $staff]);
    }

    public function edit_staff($id) {
        dd($id);
    }

    public function delete_staff($id) {
        dd($id);
    }
}
