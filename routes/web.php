<?php

use App\Http\Controllers\Main;
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

Route::get('/', [Main::class, 'index'])->name('index');
Route::get('login', [Main::class, 'login'])->name('login');
Route::post('/login_submit', [Main::class, 'login_submit'])->name('login_submit');
Route::get('temp',[Main::class, 'temp']);
Route::get('/home',[Main::class, 'home'])->name('home');
Route::get('/logout',function(){
    session()->forget('usuario');
    return redirect()->route('index');
})->name('logout');