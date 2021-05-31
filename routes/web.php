<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Session;

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
Route::middleware(['locale'])->group(function () {
    Route::get('/setLocal-{lang}', function($lang) {
        Session::put('lang', $lang);
        return back();
    });

Route::post('/auth/save', [MainController::class, 'createAdmin'])->name('auth.createAdmin');
Route::post('/auth/check',[MainController::class, 'checkLogin'])->name('auth.checkLogin');

Route::group(['middleware' => ['autoCheck']], function(){
    Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
    Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
    Route::get('/todolist/index', [MainController::class, 'index'])->name('todolist.index');
});
});