<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index() {
        $tasks = DB::table('tasks')->get(['id', 'title', 'description', 'deadline', 'status']);

        return view('task', ['tasks' => $tasks]);
    }
}