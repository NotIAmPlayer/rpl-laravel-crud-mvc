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

    public function new_task() {
        $staff = DB::table('users')->get(['id', 'name']);

        return view('new_edit_task', ['task' => null, 'task_to' => null, 'staff' => $staff]);
    }

    public function save_new_task() {
        $title = request()->input('title');
        $desc = request()->input('description');
        $deadline = request()->input('deadline');
        $status = request()->input('status');
        $task_to = request()->input('task_to');
        $made_at = now()->format("Y-m-d H:i:s");

        $task = DB::table('tasks')->insert([
            'title' => $title,
            'description' => $desc,
            'deadline' => $deadline,
            'status' => $status,
            'created_at' => $made_at,
            'updated_at' => $made_at,
        ]);

        $id = DB::table('tasks')->get()
            ->where('title', '=', $title)
            ->where('description', '=', $desc)
            ->where('created_at', '=', $made_at)->first();

        foreach ($task_to as $t) {
            DB::table('task_to')->insert([
                'task_id' => $id->id,
                'to_id' => $t,
            ]);
        }

        return redirect()->route('tasks');
    }

    public function edit_task($id) {
        $staff = DB::table('users')->get(['id', 'name']);
        $task = DB::table('tasks')->get(['id', 'title', 'description', 'deadline', 'status'])->where('id', $id)->first();

        $task_to = DB::table('task_to')->get()->where('task_id', '=', $id);

        return view('new_edit_task', ['task' => $task, 'task_to' => $task_to, 'staff' => $staff]);
    }

    public function update_task($id) {
        $title = request()->input('title');
        $desc = request()->input('description');
        $deadline = request()->input('deadline');
        $status = request()->input('status');
        $task_to = request()->input('task_to');
        $made_at = now()->format("Y-m-d H:i:s");

        $task = DB::table('tasks')->where('id', $id)->update([
            'title' => $title,
            'description' => $desc,
            'deadline' => $deadline,
            'status' => $status,
            'created_at' => $made_at,
            'updated_at' => $made_at,
        ]);

        $old_task_to = DB::table('task_to')->get()->where('task_id', '=', $id);

        $old_to_ids = [];

        foreach ($old_task_to as $t) {
            array_push($old_to_ids, $t->to_id);
        }

        $not_in_new = array_diff($old_to_ids, $task_to); // to delete
        $not_in_old = array_diff($task_to, $old_to_ids); // to add

        foreach ($not_in_old as $toAdd) {
            DB::table('task_to')->insert([
                'task_id' => $id,
                'to_id' => $toAdd,
            ]);
        }

        foreach($not_in_new as $toDel) {
            DB::table('task_to')->where('to_id', $toDel)->delete();
        }

        return redirect()->route('tasks');
    }

    public function delete_task($id) {
        $task = DB::table('tasks')->where('id', $id)->delete();

        return redirect()->route('tasks');
    }
}