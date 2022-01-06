<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PackageController as ControllersPackageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index']);

Auth::routes();

Route::get('/check', function(){
    if (Auth::user()->role == 'admin') {
        return redirect('/home');
    }else{
        return redirect('/');
    }
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('category', CategoriesController::class);
Route::resource('package', PackageController::class);
Route::resource('paket', ControllersPackageController::class);
Route::resource('profile', ProfileController::class);
Route::resource('user', UserController::class);
Route::get('/transactions', [TransactionController::class, 'index'])->name('transaction.index');
