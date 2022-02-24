<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;

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
    return view('index');
});
Route::get('/Connexion', function () {
    return view('login');
});
Route::get('/Enregistrement', function () {
    return view('register');
});
Route::get('/MDPOublie', function () {
    return view('forgottenpassword');
});
Route::get('/Historique', function () {
    return view('historique');
});
Route::get('/ListeUtilisateurs', function () {
    return view('userlist');
});
Route::post('deleteUser',[UsersController::class,'delete']);
Route::post('userNormal',[UsersController::class,'toNormal']);
Route::post('userAdmin',[UsersController::class,'toAdmin']);
Route::post('userStrategy',[UsersController::class,'toStrategy']);
Route::post('login',[AuthController::class,'login']);
