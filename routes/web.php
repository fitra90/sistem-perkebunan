<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\TransactionHeaderController;
use App\Http\Controllers\FruitCriteriaController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UsersController;
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
// 
//  transaction header CRUD
//
Route::get('/transaction-header', [TransactionHeaderController::class, 'viewAll']);
Route::get('/new-header', [TransactionHeaderController::class, 'viewNew']);
Route::post('/save-new-header', [TransactionHeaderController::class, 'saveNew']);
Route::post('/save-edit-header/{id}', [TransactionHeaderController::class, 'saveEdit']);
Route::get('/edit-header/{id}', [TransactionHeaderController::class, 'viewEdit']);
Route::delete('/delete-header/{id}', [TransactionHeaderController::class, 'delete']);

// 
//  transaction detail CRUD
//
Route::get('/', [TransactionDetailController::class, 'viewAll']);
Route::get('/new-transaction', [TransactionDetailController::class, 'viewNew']);
Route::post('/save-new-transaction', [TransactionDetailController::class, 'saveNew']);
Route::post('/save-edit-transaction/{id}', [TransactionDetailController::class, 'saveEdit']);
Route::get('/edit-transaction/{id}', [TransactionDetailController::class, 'viewEdit']);
Route::delete('/delete-transaction/{id}', [TransactionDetailController::class, 'delete']);

// 
//  Report
//
Route::get('/report', [ReportController::class, 'viewAll']);

// 
//  fruit criteria CRUD
//
Route::get('/fruit-criteria', [FruitCriteriaController::class, 'viewAll']);
Route::get('/new-fruit-criteria', [FruitCriteriaController::class, 'viewNew']);
Route::post('/save-new-fruit-criteria', [FruitCriteriaController::class, 'saveNew']);
Route::post('/save-edit-fruit-criteria/{id}', [FruitCriteriaController::class, 'saveEdit']);
Route::get('/edit-fruit-criteria/{id}', [FruitCriteriaController::class, 'viewEdit']);
Route::delete('/delete-fruit-criteria/{id}', [FruitCriteriaController::class, 'delete']);

// 
//  user CRUD
//
Route::get('/users', [UsersController::class, 'viewAll']);
Route::get('/new-user', [UsersController::class, 'viewNew']);
Route::post('/save-new-user', [UsersController::class, 'saveNew']);
Route::post('/save-edit-user/{id}', [UsersController::class, 'saveEdit']);
Route::get('/edit-user/{id}', [UsersController::class, 'viewEdit']);
Route::delete('/delete-user/{id}', [UsersController::class, 'delete']);

//
// Login & Logout
//
Route::get('/login', [UsersController::class, 'login']);
Route::post('/process-login', [UsersController::class, 'getLogin']);
Route::get('/logout', [UsersController::class, 'logout']);