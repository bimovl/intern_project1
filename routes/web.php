<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\LinkaccessController;


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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/googleae7623dc6864c8c7.html', function () {return view('googleae7623dc6864c8c7');});

Auth::routes(['verify'=>true]);
Route::get('/', function () {return view('landingpages');});

// -----------------------------login-----------------------------------------
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//google
Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback'])->name('callback.google');

//github
Route::get('/login/github', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGithub'])->name('login.github');
Route::get('/login/github/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGithubCallback'])->name('callback.github');

//facebook
Route::get('/login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback'])->name('callback.facebook');

//User
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/user/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/user', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::post('/user/disable', [App\Http\Controllers\UserController::class, 'disable'])->name('user.disable');

//portfolio
Route::get('/portfolio', [App\Http\Controllers\PortfolioController::class, 'index'])->name('portfolio');
Route::post('/portfolio', [App\Http\Controllers\PortfolioController::class, 'update'])->name('portfolio.update');
Route::post('/portfolio/storeportfolio', [App\Http\Controllers\PortfolioController::class, 'storeportfolio']);
Route::post('/portfolio/storecv', [App\Http\Controllers\PortfolioController::class, 'storecv']);
Route::post('/portfolio/storeotherdoc', [App\Http\Controllers\PortfolioController::class, 'storeotherdoc']);


//announcement
Route::get('/linkaccess', [App\Http\Controllers\LinkaccessController::class, 'index'])->name('linkaccess');
Route::get('/linkaccess/add', [App\Http\Controllers\LinkaccessController::class, 'add'])->name('linkaccess.add');
Route::post('/linkaccess/update', [App\Http\Controllers\LinkaccessController::class, 'update'])->name('linkaccess.update');
Route::get('linkaccess/edit/{number}', [App\Http\Controllers\LinkaccessController::class, 'edit']);
Route::post('/linkaccess', [App\Http\Controllers\LinkaccessController::class, 'store'])->name('linkaccess.store');
Route::get('linkaccess/delete/{number}', [App\Http\Controllers\LinkaccessController::class, 'destroy']);

//linkaccess
Route::get('/announcement', [App\Http\Controllers\AnnouncementController::class, 'index'])->name('announcement');
Route::get('/announcement/add', [App\Http\Controllers\AnnouncementController::class, 'add'])->name('announcement.add');
Route::post('/announcement/update', [App\Http\Controllers\AnnouncementController::class, 'update'])->name('announcement.update');
Route::get('announcement/edit/{number}', [App\Http\Controllers\AnnouncementController::class, 'edit']);
Route::get('announcement/detail/{number}', [App\Http\Controllers\AnnouncementController::class, 'detail']);
Route::post('/announcement', [App\Http\Controllers\AnnouncementController::class, 'store'])->name('announcement.store');
Route::get('announcement/delete/{number}', [App\Http\Controllers\AnnouncementController::class, 'destroy']);

//balanceuser
Route::get('/balance', [App\Http\Controllers\BalanceController::class, 'index'])->name('balance');
Route::get('/balance/cashdetail', [App\Http\Controllers\BalanceController::class, 'cashdetail'])->name('balance.cashdetail');
Route::get('/balance/usertransfer', [App\Http\Controllers\BalanceController::class, 'usertransfer'])->name('balance.usertransfer');
Route::get('/balance/usertransferrsu', [App\Http\Controllers\BalanceController::class, 'usertransferrsu'])->name('balance.usertransferrsu');
Route::get('/balance/userwithdraw', [App\Http\Controllers\BalanceController::class, 'userwithdraw'])->name('balance.userwithdraw');
Route::get('/balance/userwithdrawrsu', [App\Http\Controllers\BalanceController::class, 'userwithdrawrsu'])->name('balance.userwithdrawrsu');
Route::get('/balance/rsudetail', [App\Http\Controllers\BalanceController::class, 'rsudetail'])->name('balance.rsudetail');

Route::post('/balance/storecash', [App\Http\Controllers\BalanceController::class, 'storecash'])->name('balance.storecash');

//balanceadmincash
Route::get('/balance/indexcash', [App\Http\Controllers\BalanceController::class, 'indexcash'])->name('balance.indexcash');
Route::get('/balance/addcash', [App\Http\Controllers\BalanceController::class, 'addcash'])->name('balance.addcash');
Route::get('balance/depositcash/{number}', [App\Http\Controllers\BalanceController::class, 'depositcash']);
Route::get('balance/withdrawcash/{number}', [App\Http\Controllers\BalanceController::class, 'withdrawcash']);
Route::post('/balance/updatewithdrawcash', [App\Http\Controllers\BalanceController::class, 'updatewithdrawcash'])->name('balance.updatewithdrawcash');

//balanceadminrsu
Route::get('/balance/indexrsu', [App\Http\Controllers\BalanceController::class, 'indexrsu'])->name('balance.indexrsu');
Route::get('/balance/addrsu', [App\Http\Controllers\BalanceController::class, 'addrsu'])->name('balance.addrsu');
Route::post('/balance', [App\Http\Controllers\BalanceController::class, 'storersu'])->name('balance.storersu');
Route::get('balance/depositrsu/{number}', [App\Http\Controllers\BalanceController::class, 'depositrsu']);
Route::get('balance/withdrawrsu/{number}', [App\Http\Controllers\BalanceController::class, 'withdrawrsu']);
Route::post('/balance/updatewithdrawrsu', [App\Http\Controllers\BalanceController::class, 'updatewithdrawrsu'])->name('balance.updatewithdrawrsu');


// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//     Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
    
// });

