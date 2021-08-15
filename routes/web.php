<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CanineController;
use App\Models\Canine;
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

Route::get('/', function () {

    return view('welcome');
});


// Turn this into a component!
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Users
Route::resource('/dashboard/users', UserController::class)->middleware(['auth']);

Route::get('/dashboard/users/create', function () {
    return view('auth.register');
})->middleware(['auth'])->name('createUser');

// Roles
Route::resource('/dashboard/roles', RoleController::class)->middleware(['auth']);

// Canines
Route::resource('/dashboard/canines', CanineController::class)->middleware(['auth']);

require __DIR__ . '/auth.php';
