<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProfileController;

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

Route::get('/dashboard', function () {
    return view('admin.control-panel');
})->middleware(['auth'])->name('dashboard');


// === routes for administration ===>
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/users', [UsersController::class, 'showUsers'])->name('users');
    Route::get('/user-new', [UsersController::class, 'newUser'])->name('users.new');
    Route::post('/user-new', [UsersController::class, 'createUser'])->name('users.create');

    //Edit users
    Route::get('/user-edit/{id}', [UsersController::class, 'editForm'])->name('users.editForm');
    Route::put('/user-edit/{id}', [UsersController::class, 'updateUser'])->name('users.update');
});
// <=== routes for administration ===


// === routes for users ===>

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/profile/', [ProfileController::class, 'showProfile'])->name('user.profile');
    Route::put('/profile/', [ProfileController::class, 'updateProfile'])->name('update.profile');
});

// <=== routes for users ===

require __DIR__ . '/auth.php';
