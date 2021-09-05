<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OneToOneController;
use App\Http\Controllers\OneToManyController;
use App\Http\Controllers\HasManyThroughController;
use App\Http\Controllers\ManyToManyController;
use App\Http\Controllers\PolymorphController;

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

// One to One | Route grouping exemplified.
Route::group(['prefix' => 'one-to-one'], function () {
    Route::get('/add', [OneToOneController::class, 'add'])->name('one-to-one-add');
    Route::post('/create', [OneToOneController::class, 'create'])->name('one-to-one-create');
    Route::get('/read', [OneToOneController::class, 'read'])->name('one-to-one-read');
});

// One to Many | Route grouping exemplified on another way.
Route::prefix('one-to-many')->group(function () {
    Route::get('/add', [OneToManyController::class, 'add'])->name('one-to-many-add');
    Route::post('/create', [OneToManyController::class, 'create'])->name('one-to-many-create');
    Route::get('/read', [OneToManyController::class, 'read'])->name('one-to-many-read');
    Route::post('/post', [OneToManyController::class, 'read'])->name('one-to-many-read-post');
});

// has Many through
Route::prefix('has-many-through')->group(function () {
    Route::get('/add', [HasManyThroughController::class, 'add'])->name('has-many-through-add');
    Route::post('/create', [HasManyThroughController::class, 'create'])->name('has-many-through-create');
    Route::get('/read', [HasManyThroughController::class, 'read'])->name('has-many-through-read');
});

// Many to Many
Route::prefix('many-to-many')->group(function () {
    Route::get('/add', [ManyToManyController::class, 'add'])->name('many-to-many-add');
    Route::post('/create', [ManyToManyController::class, 'create'])->name('many-to-many-create');
    Route::get('/read', [ManyToManyController::class, 'read'])->name('many-to-many-read');
});

// Polymorph Controller
Route::prefix('polymorph')->group(function () {
    Route::get('/add', [PolymorphController::class, 'add'])->name('polymorph-add');
    Route::post('/create', [PolymorphController::class, 'create'])->name('polymorph-create');
    Route::get('/read', [PolymorphController::class, 'read'])->name('polymorph-read');
});

Route::get('/', function () {   
    return view('welcome');
});
