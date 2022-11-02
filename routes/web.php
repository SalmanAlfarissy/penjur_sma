<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Semester1Controller;
use App\Http\Controllers\Semester2Controller;
use App\Http\Controllers\Semester3Controller;
use App\Http\Controllers\Semester4Controller;
use App\Http\Controllers\Semester5Controller;

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
    return redirect(route('login'));
});

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

    Route::prefix('/student')->group(function(){
        Route::get('/', [StudentController::class,'index'])->name('student');
        Route::get('/getDataStudent', [StudentController::class,'getData'])->name('getdata-student');
        Route::post('/createStudent', [StudentController::class,'create'])->name('create-student');
        Route::post('/updateStudent/{id}', [StudentController::class,'update'])->name('update-student');
        Route::post('/deleteStudent/{id}', [StudentController::class,'delete'])->name('delete-student');
    });

    Route::prefix('/jurusan')->group(function(){
        Route::get('/', [ResultController::class,'index'])->name('jurusan');
        Route::get('/getDataJurusan', [ResultController::class,'getData'])->name('getdata-jurusan');
        Route::get('/resultValue', [ResultController::class,'resultValue'])->name('resultvalue-jurusan');
        Route::post('/createJurusan', [ResultController::class,'create'])->name('create-jurusan');
        Route::post('/updateJurusan/{id}', [ResultController::class,'update'])->name('update-jurusan');
        Route::post('/deleteJurusan/{id}', [ResultController::class,'delete'])->name('delete-jurusan');
    });

    Route::prefix('/score')->group(function(){
        Route::get('/', [ScoreController::class,'index'])->name('score');
        Route::get('/getDataScore', [ScoreController::class,'getData'])->name('getdata-score');
        Route::post('/deleteScore/{id}',[ScoreController::class,'delete'])->name('delete-score');
    });

    Route::prefix('/semester1')->group(function(){
        Route::post('/createSemester1', [Semester1Controller::class,'create'])->name('create-semester1');
        Route::post('/updateSemester1/{id}', [Semester1Controller::class,'update'])->name('update-semester1');
    });
    Route::prefix('/semester2')->group(function(){
        Route::post('/createSemester2', [Semester2Controller::class,'create'])->name('create-semester2');
        Route::post('/updateSemester2/{id}', [Semester2Controller::class,'update'])->name('update-semester2');
    });
    Route::prefix('/semester3')->group(function(){
        Route::post('/createSemester3', [Semester3Controller::class,'create'])->name('create-semester3');
        Route::post('/updateSemester3/{id}', [Semester3Controller::class,'update'])->name('update-semester3');
    });
    Route::prefix('/semester4')->group(function(){
        Route::post('/createSemester4', [Semester4Controller::class,'create'])->name('create-semester4');
        Route::post('/updateSemester4/{id}', [Semester4Controller::class,'update'])->name('update-semester4');
    });
    Route::prefix('/semester5')->group(function(){
        Route::post('/createSemester5', [Semester5Controller::class,'create'])->name('create-semester5');
        Route::post('/updateSemester5/{id}', [Semester5Controller::class,'update'])->name('update-semester5');
    });


});
