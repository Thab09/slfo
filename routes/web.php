<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TeamAchievementController;
use App\Http\Controllers\Admin\PlayerAchievementController;
use App\Http\Controllers\GuestController;
use App\Models\Team;

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

Route::get('/', [GuestController::class, 'home']);
Route::get('/teams', [GuestController::class, 'teams'])->name('teams');
Route::get('/teams/{team}', [GuestController::class, 'team'])->name('team');
Route::get('/players', [GuestController::class, 'players'])->name('players');
Route::get('/achievements', [GuestController::class, 'achievements'])->name('achievements');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/admin/teams', TeamController::class, ['as' => 'admin'])->middleware(['auth', 'verified']);
Route::resource('/admin/players', PlayerController::class, ['as' => 'admin'])->middleware(['auth', 'verified']);
Route::resource('/admin/teamachievements', TeamAchievementController::class, ['as' => 'admin'])->except('show')->middleware(['auth', 'verified']);
Route::resource('/admin/playerachievements', PlayerAchievementController::class, ['as' => 'admin'])->except('show')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
