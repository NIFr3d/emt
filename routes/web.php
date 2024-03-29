<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\RecupPasswordController;

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


Route::get('/Connexion', function () {
    return view('login');
});
Route::get('/Enregistrement', function () {
    return view('register');
});
Route::get('/MDPOublie', function () {
    return view('forgottenpassword');
});

Route::get('/', function () {
    return view('index');
})->middleware('auth');
Route::get('/Historique', function () {
    return view('historique');
})->middleware('auth');
Route::get('/run', function () {
    return view('run');
})->middleware('auth');

Route::get('/ListeUtilisateurs', function () {
    return view('userlist');
})->middleware('admin');
Route::get('/AjoutUtilisateurs', function () {
    return view('adduser');
})->middleware('admin');

Route::get('cookieAuth',[AuthController::class,'cookieAuth']);
Route::get('Deconnexion',[AuthController::class,'logout']);
Route::post('deleteUser',[UsersController::class,'delete']);
Route::post('userNormal',[UsersController::class,'toNormal']);
Route::post('userAdmin',[UsersController::class,'toAdmin']);
Route::post('userStrategy',[UsersController::class,'toStrategy']);
Route::post('authorizeUser',[UsersController::class,'authorizeUser']);
Route::post('refuseUser',[UsersController::class,'refuseUser']);
Route::post('login',[AuthController::class,'login']);
Route::post('CourseToExcel',[DataController::class,'excel']);
Route::post('sendPasswordMail',[RecupPasswordController::class,'envoyerMail']);