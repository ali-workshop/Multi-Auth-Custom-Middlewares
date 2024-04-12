<?php

use App\Http\Controllers\UserController;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth','role:User'])->group(function(){
  Route::get('/user/home/',[UserController::class,'userhome'])
  ->name('home.user');
///here is playground for any user routes/
});
#second way
// Route::get('/user/home/',[UserController::class,'userhome'])
// ->middleware(['auth','role:User'])
// ->name('home.user');

Route::middleware(['auth','role:Admin'])
->group(function(){
Route::get('/admin/home/',[UserController::class,'adminhome'])
->name('home.admin');
});

Route::middleware(['auth','role:Manager'])
->group(function(){
Route::get('/manager/home/',[UserController::class,'managerhome'])
->name('home.manager');
});