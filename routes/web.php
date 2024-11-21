<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/add-todo-list',[HomeController::class, 'add']);
Route::post('/add-todo-list',[HomeController::class, 'store'])->name('add');
Route::delete('/delete-todo-list/{id}',[HomeController::class, 'destroy'])->name('delete');
Route::get('/todo-list-update/{id}',[HomeController::class, 'show'])->name('show.update');
Route::put('/todo-list-update/{id}',[HomeController::class, 'update'])->name('update');

Route::apiResource('/list-siswa', StudentController::class);


// Route::get('/dashboard', function () {
//     return view('dashboard.dashboard');
// });

