<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

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

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/auth-login', [LoginController::class,'authLogin'])->name('authLogin');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard');

    Route::prefix('/user')->group(function(){
        Route::get('/', [UserController::class,'index'])->name('user');
        Route::get('/getDataUser', [UserController::class,'getData'])->name('getdata-user');
        Route::post('/createUser', [UserController::class,'create'])->name('create-user');
        Route::post('/updateUser/{id}', [UserController::class,'update'])->name('update-user');
        Route::post('/deleteUser/{id}', [UserController::class,'delete'])->name('delete-user');

    });

    Route::get('/student', [StudentController::class,'index'])->name('student');
    Route::get('/jurusan', [ResultController::class,'index'])->name('jurusan');

});
