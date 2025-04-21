<?php

use App\Http\Controllers\StaffController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/home/staff/', [StaffController::class, 'index'])->name('staffs');
Route::get('/home/staff/c', [StaffController::class, 'new_staff'])->name('staffs.add');
Route::post('/home/staff/c', [StaffController::class, 'save_new_staff'])->name('staffs.save');
Route::get('/home/staff/u/{id}', [StaffController::class, 'edit_staff'])->name('staffs.edit');
Route::put('/home/staff/u/{id}', [StaffController::class, 'update_staff'])->name('staffs.update');
Route::delete('/home/staff/d/{id}', [StaffController::class, 'delete_staff'])->name('staffs.delete');

Route::get('/home/tasks/', [TaskController::class, 'index'])->name('tasks');
Route::get('/home/tasks/c', [TaskController::class, 'new_task'])->name('tasks.add');
Route::post('/home/tasks/c', [TaskController::class, 'save_new_task'])->name('tasks.save');
Route::get('/home/tasks/u/{id}', [TaskController::class, 'edit_task'])->name('tasks.edit');
Route::put('/home/tasks/u/{id}', [TaskController::class, 'update_task'])->name('tasks.update');
Route::delete('/home/tasks/d/{id}', [TaskController::class, 'delete_task'])->name('tasks.delete');