<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.dashboard'));

    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');

    Route::get('/elections', fn () => view('admin.elections.index'))->name('elections');

    Route::resource('positions', Admin\PositionController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy']);
});


require __DIR__.'/auth.php';
