<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use \App\Http\Controllers\UserController;
use \http\Env\Request;

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

Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::post('/post', function (Request $request){
   return view('/');
});


Route::resource('/admin/user', UserController::class);


//TODO 1: Gestion des utilisateurs
    //TODO 1.1 Création du UserController
