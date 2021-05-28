<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::post('/auth/save', [MainController::class, 'save'])->name('auth.save');

Route::group(['middleware' => ['autoCheck']], function(){
    Route::get('/auth/register', [MainController::class, 'register'])->name('auth.register');
    Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');
});