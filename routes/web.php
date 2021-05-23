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

Route::get('/', [\App\Http\Controllers\Main::class, 'home'])->name("home");
Route::get('/new_task', [\App\Http\Controllers\Main::class, 'new_task'])->name("new_task");
Route::post('/new_task_submit', [\App\Http\Controllers\Main::class, 'new_task_submit'])->name("new_task_submit");
Route::get('/done_task/{id}', [\App\Http\Controllers\Main::class, 'done_task'])->name("done_task");
Route::get('/undone_task/{id}', [\App\Http\Controllers\Main::class, 'undone_task'])->name("undone_task");
Route::get('/edit_task/{id}', [\App\Http\Controllers\Main::class, 'edit_task'])->name("edit_task");
Route::post('/edit_task_submit/{id}', [\App\Http\Controllers\Main::class, 'edit_task_submit'])->name("edit_task_submit");
Route::get('/delete_task/{id}', [\App\Http\Controllers\Main::class, 'delete_task'])->name("delete_task");
Route::get('/show_deleted_tasks', [\App\Http\Controllers\Main::class, 'show_deleted_tasks'])->name("show_deleted_tasks");
Route::get('/undelete_task/{id}', [\App\Http\Controllers\Main::class, 'undelete_task'])->name("undelete_task");

