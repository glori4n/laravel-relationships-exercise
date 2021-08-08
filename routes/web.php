<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OneToOneController;
use App\Http\Controllers\OneToManyController;

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

// One to One
Route::get('/one-to-one-add', [OneToOneController::class, 'add'])->name('one-to-one-add');
Route::post('/one-to-one-create', [OneToOneController::class, 'create'])->name('one-to-one-create');
Route::get('/one-to-one-read', [OneToOneController::class, 'read'])->name('one-to-one-read');

// One to Many
Route::get('/one-to-many-add', [OneToManyController::class, 'add'])->name('one-to-many-add');
Route::post('/one-to-many-create', [OneToManyController::class, 'create'])->name('one-to-many-create');
Route::get('/one-to-many-read', [OneToManyController::class, 'read'])->name('one-to-many-read');

Route::get('/', function () {   
    return view('welcome');
});
