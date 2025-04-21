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

    public function edit_task($id) {
        dd($id);
    }

    public function delete_task($id) {
        dd($id);
    }
}