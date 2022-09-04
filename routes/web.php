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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/task', taskController::class);


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home',[taskController::class,'index']);
Route::post('task/destory/bulk',[taskController::class,'bulkDestroy'])->name('task.destroy.bulk');
Route::post('task/edit/bulk',[taskController::class,'bulkEdit'])->name('task.edit.bulk');
Route::put('task/edit/bulk',[taskController::class,'bulkUpdate'])->name('task.edit.bulk.submit');