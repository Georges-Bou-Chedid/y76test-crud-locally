<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
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
    $products = app('firebase.firestore')->database()->collection('Products')->documents();
    $invoices = app('firebase.firestore')->database()->collection('Invoices')->documents();
    return view('welcome', compact('products', 'invoices'));
});

Route::get(uri: 'create', action: [ProductController::class, 'create']);
Route::post(uri: 'create', action: [ProductController::class, 'storeInFirestore']);
Route::put(uri: 'edit/{id}', action: [ProductController::class, 'edit']);
Route::delete(uri: 'delete/{id}', action: [ProductController::class, 'delete']);


Route::prefix('invoices')->group(function() {
    Route::get(uri: 'create', action: [InvoiceController::class, 'create']);
    Route::post(uri: 'create', action: [InvoiceController::class, 'storeInFirestore']);
    Route::put(uri: 'edit/{id}', action: [InvoiceController::class, 'edit']);
    Route::delete(uri: 'delete/{id}', action: [InvoiceController::class, 'delete']);
});

