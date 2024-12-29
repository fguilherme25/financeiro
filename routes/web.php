<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OperationController;

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//Banks
Route::get('/banks', [BankController::class, 'index'])->name('bank.index');
Route::get('/banks/show/{bank}', [BankController::class, 'show'])->name('bank.show');
Route::get('/banks/create', [BankController::class, 'create'])->name('bank.create');
Route::post('/banks/store', [BankController::class, 'store'])->name('bank.store');
Route::get('/banks/edit/{bank}', [BankController::class, 'edit'])->name('bank.edit');
Route::put('/banks/update/{bank}', [BankController::class, 'update'])->name('bank.update');
Route::get('/banks/destroy/{bank}', [BankController::class, 'destroy'])->name('bank.destroy');
Route::put('/banks/disable/{bank}', [BankController::class, 'disable'])->name('bank.disable');

//Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/show/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/categories/update/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/categories/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::put('/categories/disable/{category}', [CategoryController::class, 'disable'])->name('category.disable');

//Expenses
Route::get('/expenses', [ExpenseController::class, 'index'])->name('expense.index');
Route::get('/expenses/show/{expense}', [ExpenseController::class, 'show'])->name('expense.show');
Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expense.create');
Route::post('/expenses/store', [ExpenseController::class, 'store'])->name('expense.store');
Route::get('/expenses/edit/{expense}', [ExpenseController::class, 'edit'])->name('expense.edit');
Route::put('/expenses/update/{expense}', [ExpenseController::class, 'update'])->name('expense.update');
Route::get('/expenses/destroy/{expense}', [ExpenseController::class, 'destroy'])->name('expense.destroy');
Route::put('/expenses/disable/{expense}', [ExpenseController::class, 'disable'])->name('expense.disable');

//Accounts
Route::get('/accounts', [AccountController::class, 'index'])->name('account.index');
Route::get('/accounts/show/{account}', [AccountController::class, 'show'])->name('account.show');
Route::get('/accounts/create', [AccountController::class, 'create'])->name('account.create');
Route::post('/accounts/store', [AccountController::class, 'store'])->name('account.store');
Route::get('/accounts/edit/{account}', [AccountController::class, 'edit'])->name('account.edit');
Route::put('/accounts/update/{account}', [AccountController::class, 'update'])->name('account.update');
Route::get('/accounts/destroy/{account}', [AccountController::class, 'destroy'])->name('account.destroy');
Route::put('/accounts/disable/{account}', [AccountController::class, 'disable'])->name('account.disable');

//Operations
Route::get('/operations', [OperationController::class, 'index'])->name('operation.index');
Route::get('/operations/show/{operation}', [OperationController::class, 'show'])->name('operation.show');
Route::get('/operations/create', [OperationController::class, 'create'])->name('operation.create');
Route::post('/operations/store', [OperationController::class, 'store'])->name('operation.store');
Route::get('/operations/edit/{operation}', [OperationController::class, 'edit'])->name('operation.edit');
Route::put('/operations/update/{operation}', [OperationController::class, 'update'])->name('operation.update');
Route::get('/operations/destroy/{operation}', [OperationController::class, 'destroy'])->name('operation.destroy');
Route::put('/operations/disable/{operation}', [OperationController::class, 'disable'])->name('operation.disable');




