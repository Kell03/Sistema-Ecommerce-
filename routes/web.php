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


route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

route::get('/practica', [App\Http\Controllers\HomeController::class, 'practica'])->name('practica');


route::get('/login', [App\Http\Controllers\ConnectController::class, 'getlogin'])->name('login');
route::get('/recover/password', [App\Http\Controllers\ConnectController::class, 'getrecover'])->name('recover');
route::get('/reset/{email?}', [App\Http\Controllers\ConnectController::class, 'getreset'])->name('reset');
route::post('/reset/{email}', [App\Http\Controllers\ConnectController::class, 'update_password'])->name('update_password');
route::post('/post/recover/password', [App\Http\Controllers\ConnectController::class, 'postrecover'])->name('post_recover');
route::post('/login', [App\Http\Controllers\ConnectController::class, 'postlogin'])->name('login');

route::get('/register/create', [App\Http\Controllers\ConnectController::class, 'getregister'])->name('register');
route::post('/register', [App\Http\Controllers\ConnectController::class, 'postregister'])->name('register.store');
route::get('/logout', [App\Http\Controllers\ConnectController::class, 'logout'])->name('logout');