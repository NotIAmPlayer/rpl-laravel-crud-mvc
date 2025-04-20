<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function dashboard() {
        $staff = DB::table('users')->count();
        $tasks = DB::table('tasks')->where('status', '!=', 'completed')->count();
    
        return view('dashboard', ['staff' => $staff, 'tasks' => $tasks]);
    }
}
