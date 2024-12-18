<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\NoAuthMiddleware;
use Illuminate\Support\Facades\Route;


Route::middleware([NoAuthMiddleware::class])->group(function(){
    Route::get('/', function () {
        return view('login');
    });
    Route::post('/login', [AuthController::class,'login'])->name('login');
});
Route::prefix('admin')->middleware([AuthMiddleware::class,AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Expense reports
    Route::get('/expences', [AdminController::class, 'viewExpenses'])->name('admin.expenses');
    Route::post('/expences', [AdminController::class, 'viewExpenses'])->name('admin.expenses');
   
    // Manage users
    Route::get('/users', [AdminController::class, 'viewUsers'])->name('admin.users');
    Route::get('/users/{id}', [AdminController::class, 'viewUsersDetails'])->name('admin.usersDetails');

    Route::get('/category', [AdminController::class, 'category'])->name('admin.category');
    Route::post('/category', [AdminController::class, 'categoryStore'])->name('admin.categoryStore');

    Route::get('/logout', [AuthController::class,'logout'])->name('logout');
});
