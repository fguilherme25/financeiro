<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\OperationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Banks
Route::get('/banks', [BankController::class, 'index'])->name('banks.index');
Route::get('/banks/show/{bank}', [BankController::class, 'show'])->name('banks.show');
Route::get('/banks/create', [BankController::class, 'create'])->name('banks.create');
Route::post('/banks/store', [BankController::class, 'store'])->name('banks.store');
Route::get('/banks/edit/{bank}', [BankController::class, 'edit'])->name('banks.edit');
Route::put('/banks/update/{bank}', [BankController::class, 'update'])->name('banks.update');
Route::get('/banks/destroy/{bank}', [BankController::class, 'destroy'])->name('banks.destroy');
Route::put('/banks/disable/{bank}', [BankController::class, 'disable'])->name('banks.disable');

//Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/show/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/categories/destroy/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::put('/categories/disable/{category}', [CategoryController::class, 'disable'])->name('categories.disable');

//Expenses
Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
Route::get('/expenses/show/{expense}', [ExpenseController::class, 'show'])->name('expenses.show');
Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
Route::post('/expenses/store', [ExpenseController::class, 'store'])->name('expenses.store');
Route::get('/expenses/edit/{expense}', [ExpenseController::class, 'edit'])->name('expenses.edit');
Route::put('/expenses/update/{expense}', [ExpenseController::class, 'update'])->name('expenses.update');
Route::get('/expenses/destroy/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
Route::put('/expenses/disable/{expense}', [ExpenseController::class, 'disable'])->name('expenses.disable');

//Accounts
Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
Route::get('/accounts/show/{account}', [AccountController::class, 'show'])->name('accounts.show');
Route::get('/accounts/create', [AccountController::class, 'create'])->name('accounts.create');
Route::post('/accounts/store', [AccountController::class, 'store'])->name('accounts.store');
Route::get('/accounts/edit/{account}', [AccountController::class, 'edit'])->name('accounts.edit');
Route::put('/accounts/update/{account}', [AccountController::class, 'update'])->name('accounts.update');
Route::get('/accounts/destroy/{account}', [AccountController::class, 'destroy'])->name('accounts.destroy');
Route::put('/accounts/disable/{account}', [AccountController::class, 'disable'])->name('accounts.disable');

//Operations
Route::get('/operations', [OperationController::class, 'index'])->name('operations.index');
Route::get('/operations/show/{operation}', [OperationController::class, 'show'])->name('operations.show');
Route::get('/operations/create', [OperationController::class, 'create'])->name('operations.create');
Route::post('/operations/store', [OperationController::class, 'store'])->name('operations.store');
Route::get('/operations/edit/{operation}', [OperationController::class, 'edit'])->name('operations.edit');
Route::put('/operations/update/{operation}', [OperationController::class, 'update'])->name('operations.update');
Route::get('/operations/destroy/{operation}', [OperationController::class, 'destroy'])->name('operations.destroy');
Route::put('/operations/disable/{operation}', [OperationController::class, 'disable'])->name('operations.disable');