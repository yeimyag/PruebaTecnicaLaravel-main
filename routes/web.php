<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeworkController;
use Illuminate\Support\Facades\Route;
//PUBLIC


Route::view('/', 'login')->name('login')->middleware('guest');
Route::view('/sign-up', 'register')->name('register')->middleware('guest');

Route::post('/', [AuthController::class, 'login']);
Route::post('/sign-up', [AuthController::class, 'register']);

//PRIVATE
Route::get('/logout',[AuthController::class, 'logout'])->middleware('auth');
Route::get('/home',[HomeworkController::class, 'getHomework'])->name('home')->middleware('auth');
Route::view('/add', 'add')->name('addHomeworks')->middleware('auth');
Route::post('/add',[HomeworkController::class, 'addHomework'])->middleware('auth');
Route::get('/complete/{id}',[HomeworkController::class, 'setHomework'])->name('complete')->middleware('auth');