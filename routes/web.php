<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Election;
use App\Http\Controllers\VoteController;

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

Route::middleware(['auth', 'not_admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('admin')->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.dashboard'));

    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');

    Route::resource('/elections', Admin\ElectionController::class);
    Route::delete('/elections/{election}/votes', [Admin\ElectionController::class, 'deleteVotes'])->name('elections.reset');

    Route::resource('/positions', Admin\PositionController::class)
        ->only(['index', 'store', 'update', 'destroy']);
    Route::resource('/candidates', Admin\CandidateController::class);
    Route::resource('/voters', Admin\VoterController::class);
});

Route::resource('/vote', VoteController::class);

Route::get('/election/{id}/vote', [Election\ElectionController::class, 'voteindex'])->name('election.vote');
Route::post('/election/{id}/vote', [Election\ElectionController::class, 'vote'])->name('election.vote.store');
Route::resource('/election', Election\ElectionController::class);

require __DIR__ . '/auth.php';
