<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\TransactionController;

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

// Show Landing Page
Route::get('/',
    [LandingController::class, 'index']);

// Store Newsletter Email
Route::post('/newsletter',
    [NewsletterController::class, 'store']);

// Show App Home View
Route::get('/app/',
    [TransactionController::class, 'index'])->middleware('auth');

// Send Email
Route::post('/app/email',
    [MailController::class, 'sendMail']);

// Show App News View
Route::get('/app/news',
    [NewsController::class, 'index'])->middleware('auth');

// Show App Transactions
Route::get('/app/transactions',
    [TransactionController::class, 'transactions'])->middleware('auth');

// Store App Transaction
Route::post('/app/transactions/store',
    [TransactionController::class, 'store'])->middleware('auth');

// Delete App Transaction
Route::delete('/app/transactions/{transaction}',
    [TransactionController::class, 'destroy'])->middleware('auth');

// Show App Categories
Route::get('/app/transactions/categories',
    [CategoryController::class, 'index'])->middleware('auth');

// Store App Category
Route::post('/app/transactions/categories/store',
    [CategoryController::class, 'store'])->middleware('auth');

// Delete App Category
Route::delete('/app/transactions/categories/{category}',
    [CategoryController::class, 'destroy'])->middleware('auth');

// Show App Register/Create Form
Route::get('/app/register',
    [UserController::class, 'create'])->middleware('guest');

// Create App New User
Route::post('/app/users', 
    [UserController::class, 'store'])->middleware('guest');

// Logout App User
Route::post('/app/logout',
    [UserController::class, 'logout'])->middleware('auth');

// Show App Login Form
Route::get('/app/login', 
    [UserController::class, 'login'])->name('login')->middleware('guest');

// Login App User
Route::post('/app/users/authenticate', 
    [UserController::class, 'authenticate'])->middleware('guest');
