<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OperationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Banks
Route::get('/banks', [BankController::class, 'index'])->name('banks.index');
Route::get('/banks/show', [BankController::class, 'show'])->name('banks.show');
Route::get('/banks/create', [BankController::class, 'create'])->name('banks.create');
Route::post('/banks/store', [BankController::class, 'store'])->name('banks.store');
Route::get('/banks/edit', [BankController::class, 'edit'])->name('banks.edit');
Route::put('/banks/update', [BankController::class, 'update'])->name('banks.update');
Route::delete('/banks/destroy', [BankController::class, 'destroy'])->name('banks.destroy');

//Accounts
Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
Route::get('/accounts/show', [AccountController::class, 'show'])->name('accounts.show');
Route::get('/accounts/create', [AccountController::class, 'create'])->name('accounts.create');
Route::post('/accounts/store', [AccountController::class, 'store'])->name('accounts.store');
Route::get('/accounts/edit', [AccountController::class, 'edit'])->name('accounts.edit');
Route::put('/accounts/update', [AccountController::class, 'update'])->name('accounts.update');
Route::delete('/accounts/destroy', [AccountController::class, 'destroy'])->name('accounts.destroy');

//Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/show', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/update', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');


//Operations
Route::get('/operations', [OperationController::class, 'index'])->name('operations.index');
Route::get('/operations/show', [OperationController::class, 'show'])->name('operations.show');
Route::get('/operations/create', [OperationController::class, 'create'])->name('operations.create');
Route::post('/operations/store', [OperationController::class, 'store'])->name('operations.store');
Route::get('/operations/edit', [OperationController::class, 'edit'])->name('operations.edit');
Route::put('/operations/update', [OperationController::class, 'update'])->name('operations.update');
Route::delete('/operations/destroy', [OperationController::class, 'destroy'])->name('operations.destroy');