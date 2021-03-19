<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\SigninController;
use \App\Http\Controllers\TicketController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/dashboard/set-agent', [DashboardController::class, 'setAgentToTicket'])->middleware('auth');

Route::post('/post', function (Request $request){
   return view('/');
});

Route::resource('/admin/user', UserController::class)->middleware('checkIfUserIsAdmin');

//signinController
Route::get('/signin', [SigninController::class, 'index'])->name('login');
Route::get('/signin/logout', [SigninController::class, 'logout']);
Route::post('signin/login', [SigninController::class, 'login']);
Route::get('/tickets',[TicketController::class, 'index'])->middleware('auth');
Route::post('/tickets/{ticket_id}/{statut}' ,[TicketController::class, 'store'])->name('update-ticket');
Route::get('/tickets/update' ,[TicketController::class, 'test']);

Route::get('/stat', [DashboardController::class, 'statistique']);

Route::get('/test', function (){
   return \Illuminate\Support\Facades\Auth::id();
});


//TODO 1: Gestion des utilisateurs
    //TODO 1.1 Création du UserController
