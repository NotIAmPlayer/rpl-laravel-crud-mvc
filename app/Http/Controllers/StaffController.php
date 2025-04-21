<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index() {
        $staff = DB::table('users')->get(['id', 'name', 'email']);

        return view('staff', ['staff' => $staff]);
    }

    public function new_staff() {
        return view('new_edit_staff', ['staff' => null]);
    }

    public function save_new_staff() {
        //dd(request()->all());

        $name = request()->input('name');
        $email = request()->input('email');
        $password = request()->input('password');

        $staff = DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        return redirect()->route('staffs');
    }

    public function edit_staff($id) {
        $staff = DB::table('users')->get(['id', 'name', 'email', 'password'])->where('id', $id)->first();

        return view('new_edit_staff', ['staff' => $staff]);
    }

    public function update_staff($id) {
        $name = request()->input('name');
        $email = request()->input('email');
        $password = request()->input('password');

        $staff = DB::table('users')->where('id', $id)->update([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        return redirect()->route('staffs');
    }

    public function delete_staff($id) {
        $staff = DB::table('users')->where('id', $id)->delete();

        return redirect()->route('staffs');
    }
}
