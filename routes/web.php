<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandlordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/landlords', [LandlordController::class, "index"])->name('landlords.index');
Route::get('/landlords/create', [LandlordController::class, 'create'])->name('landlords.create');
Route::post('/landlords/store', [LandlordController::class, 'store'])->name('landlords.store');
Route::get('/landlords/{landlord}/edit', [LandlordController::class, 'edit'])->name('landlords.edit');
Route::put('/landlords/update{landlord}',[LandlordController::class, 'update'])->name('landlords.update');
Route::delete('landlords/{landlord}', [LandlordController::class, 'delete'])->name('landlords.delete');

Route::get('/properties', [PropertyController::class, "index"])->name('properties.index');
Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
Route::post('/properties/store',[PropertyController::class, 'store'])->name('properties.store');
Route::get('/properties/{property}/edit',[PropertyController::class, 'edit'])->name('properties.edit');
Route::put('/properties/upadate/{property}',[PropertyController::class, 'update'])->name('properties.update');
Route::delete('/properties/delete/{property}',[PropertyController::class, 'delete'])->name('properties.delete');

require __DIR__.'/auth.php';
