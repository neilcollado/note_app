<?php

use App\Http\Controllers\taskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/',[taskController::class,'index'])->middleware('auth');

Auth::routes();

Route::resource('/task', taskController::class);

//extra methods for task bulk
Route::post('task/destory/bulk',[taskController::class,'bulkDestroy'])->name('task.destroy.bulk');
Route::post('task/edit/bulk',[taskController::class,'bulkEdit'])->name('task.edit.bulk');
Route::put('task/edit/bulk',[taskController::class,'bulkUpdate'])->name('task.edit.bulk.submit');