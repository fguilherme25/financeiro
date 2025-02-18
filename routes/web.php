<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreditcardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;


//Home
Route::get('/', [HomeController::class, 'index'])->name('home');

//Autenticação
Auth::routes();

//Dashboards
Route::get('/home', [DashboardController::class, 'index'])->name('dashboard.index');

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
Route::get('/operations/transfer', [OperationController::class, 'transfer'])->name('operation.transfer');
Route::post('/operations/dotransfer', [OperationController::class, 'dotransfer'])->name('operation.dotransfer');
Route::get('/operations/edit/{operation}', [OperationController::class, 'edit'])->name('operation.edit');
Route::put('/operations/update/{operation}', [OperationController::class, 'update'])->name('operation.update');
Route::get('/operations/destroy/{operation}', [OperationController::class, 'destroy'])->name('operation.destroy');
Route::put('/operations/disable/{operation}', [OperationController::class, 'disable'])->name('operation.disable');

//Creditcards
Route::get('/creditcards', [CreditcardController::class, 'index'])->name('creditcard.index');
Route::get('/creditcards/dashboard', [CreditcardController::class, 'dashboard'])->name('creditcard.dashboard');
Route::get('/creditcards/show/{creditcard}', [CreditcardController::class, 'show'])->name('creditcard.show');
Route::get('/creditcards/create', [CreditcardController::class, 'create'])->name('creditcard.create');
Route::post('/creditcards/store', [CreditcardController::class, 'store'])->name('creditcard.store');
Route::get('/creditcards/edit/{creditcard}', [CreditcardController::class, 'edit'])->name('creditcard.edit');
Route::put('/creditcards/update/{creditcard}', [CreditcardController::class, 'update'])->name('creditcard.update');
Route::get('/creditcards/destroy/{creditcard}', [CreditcardController::class, 'destroy'])->name('creditcard.destroy');
Route::put('/creditcards/disable/{creditcard}', [CreditcardController::class, 'disable'])->name('creditcard.disable');

//Payments
Route::get('/payments', [PaymentController::class, 'index'])->name('payment.index');
Route::get('/payments/show/{payment}', [PaymentController::class, 'show'])->name('payment.show');
Route::get('/payments/create', [PaymentController::class, 'create'])->name('payment.create');
Route::post('/payments/store', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payments/edit/{payment}', [PaymentController::class, 'edit'])->name('payment.edit');
Route::put('/payments/update/{payment}', [PaymentController::class, 'update'])->name('payment.update');
Route::get('/payments/destroy/{payment}', [PaymentController::class, 'destroy'])->name('payment.destroy');
Route::put('/payments/disable/{payment}', [PaymentController::class, 'disable'])->name('payment.disable');

//User
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/show/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/users/update/{user}', [UserController::class, 'update'])->name('user.update');
Route::get('/users/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');
Route::put('/users/disable/{user}', [UserController::class, 'disable'])->name('user.disable');
