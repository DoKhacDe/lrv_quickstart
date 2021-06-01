<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\TodoController;
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
Auth::routes();
Route::middleware(['locale'])->group(function () {
    Route::get('/setLocal-{lang}', function($lang) {
        Session::put('lang', $lang);
        return back();
    });

Route::post('/auth/save', [MainController::class, 'createAdmin'])->name('auth.createAdmin');
Route::post('/auth/check',[MainController::class, 'checkLogin'])->name('auth.checkLogin');
Route::get('/auth/logout',[MainController::class, 'logout'])->name('auth.logout');
Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
Route::group(['middleware' => ['autoCheck']], function(){
    Route::resource('todos', TodoController::class);
    Route::get('{id}/todos', [TodoController::class, 'completed']);
    Route::fallback(function() {
        return 'Có lỗi ở đâu đó';
    });
});
});