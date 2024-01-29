<?php

declare(strict_types=1);

use App\Http\Controllers\App\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
//    Route::get('/', function () {
//        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
//    });
//
    Route::get('/',[FrontendController::class,'viewBlog'])->name('/');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::prefix('news')->group(function (){
        Route::get('view', [NewsController::class,'view'])->name('view.news');
        Route::get('create', [NewsController::class,'create'])->name('create.news');
        Route::post('store', [NewsController::class,'store'])->name('store.news');
        Route::get('edit/{id}', [NewsController::class,'edit'])->name('edit.news');
        Route::post('update/{id}', [NewsController::class,'update'])->name('update.news');
        Route::get('delete/{id}', [NewsController::class,'delete'])->name('delete.news');

    });






    require __DIR__.'/app_auth.php';
});

