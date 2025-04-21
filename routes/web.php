<?php

use App\Http\Controllers\StaffController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/home/staff/', [StaffController::class, 'index'])->name('staff');
Route::get('/home/staff/c', [StaffController::class, 'new_staff'])->name('staff.add');
Route::post('/home/staff/c', [StaffController::class, 'save_new_staff'])->name('staff.save');
Route::get('/home/staff/u/{id}', [StaffController::class, 'edit_staff'])->name('staff.edit');
Route::post('/home/staff/u/{id}', [StaffController::class, 'update_staff'])->name('staff.update');
Route::delete('/home/staff/d/{id}', [StaffController::class, 'delete_staff'])->name('staff.delete');

Route::get('/home/tasks/', [TaskController::class, 'index'])->name('tasks');