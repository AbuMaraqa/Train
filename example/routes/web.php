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

Route::get('index',[\App\Http\Controllers\NotesController::class , 'index'])->name('index');
Route::get('add',[\App\Http\Controllers\NotesController::class , 'add'])->name('notes.add');
Route::post('create',[\App\Http\Controllers\NotesController::class , 'create'])->name('notes.create');
