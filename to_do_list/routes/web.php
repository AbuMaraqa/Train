<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/create', [App\Http\Controllers\TasksController::class, 'create'])->name('tasks.create');
Route::get('/edit/{noor}',[App\Http\Controllers\TasksController::class, 'edit'])->name('task.edit');
Route::post('/update',[App\Http\Controllers\TasksController::class, 'update'])->name('task.update');
Route::get('/delete/{noor}',[App\Http\Controllers\TasksController::class, 'delete'])->name('task.delete');
