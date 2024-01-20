<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Settings\LanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Items\ItemController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Invoices\InvoiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

 
Route::get('/',  [HomeController::class, 'index'])->name('home.index');

// Users Routes
Route::get('/users',  [UserController::class, 'index'])->name('users.index');
// End Users Routes

// items Routes
Route::get('/items',  [ItemController::class, 'index'])->name('items.index');
// End items Routes

// Invoices Routes
Route::get('/invoices/create',  [InvoiceController::class, 'index'])->name('invoices.create');
Route::post('/invoices/store',  [InvoiceController::class, 'store'])->name('invoices.store');
Route::get('/invoices/users',  [InvoiceController::class, 'getUsers'])->name('invoices.users');
Route::get('/invoices/items',  [InvoiceController::class, 'getItems'])->name('invoices.items');
Route::post('/invoices/selected/items',  [InvoiceController::class, 'getSelectedItems'])->name('invoices.items.selected');
// End Invoices Routes

// Route For change language
Route::get('set-locale/{lang}', [LanguageController::class, 'switch'])
    ->name('languages.switch');
 // End Route For change language
