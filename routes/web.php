<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenancyRegisterController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('tenancies')->group(function (){
   Route::get('register-tenancy',[TenancyRegisterController::class, 'create'])->name('register-tenancy.create');
   Route::post('register-tenancy',[TenancyRegisterController::class, 'store'])->name('register-tenancy.store');
});









require __DIR__.'/auth.php';
