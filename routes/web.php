<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LoginController;

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
    return view('auth.login');
});

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::view('/pusher', 'pusher');
Route::get('/posts', [TestController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts', [TestController::class, 'store'])->name('posts.store')->middleware('auth');

Route::get('/sendMessage', [TestController::class, 'sendMessage'])->name('sendMessage')->middleware('auth');
Route::resource('departments', DepartmentController::class)->except(['show'])->middleware('auth');
