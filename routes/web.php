<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\taskController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamTaskController;

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
Route::get('/home',[taskController::class,'index'])->middleware('auth');
Route::get('/',[taskController::class,'index'])->middleware('auth');

Auth::routes();

Route::middleware('auth')->group(function(){
  //extra methods for users
  Route::get('users/profile', [UserController::class, 'profile'])->name('users.profile');
  Route::get('users/security', [UserController::class, 'security'])->name('users.security');
  Route::patch('users/updateSecurity/{id}', [UserController::class, 'updateSecurity'])->name('users.updateSecurity');

  //extra methods for task bulk
  Route::post('task/destory/bulk',[taskController::class,'bulkDestroy'])->name('task.destroy.bulk');
  Route::post('task/edit/bulk',[taskController::class,'bulkEdit'])->name('task.edit.bulk');
  Route::put('task/edit/bulk',[taskController::class,'bulkUpdate'])->name('task.edit.bulk.submit');
  Route::get('task/complete',[taskController::class,'getComplete'])->name('task.getComplete');

  //route resources
  Route::resource('/users', UserController::class)->middleware('isOwner');
  Route::resource('/task', taskController::class);

  // collab
  Route::resource('/teams', TeamController::class);
  Route::resource('/members', MemberController::class);
  Route::resource('/teamtasks', TeamTaskController::class);

});

