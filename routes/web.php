<?php

use App\Http\Controllers\StaffController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/home/staff/', [StaffController::class, 'index'])->name('staff');
Route::get('/home/tasks/', function () {
    return view('tasks');
})->name('tasks');