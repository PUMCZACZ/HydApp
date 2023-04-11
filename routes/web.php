<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MaterialGroupController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::prefix('/profile')
        ->name('profile.')
        ->group(function () {
            Route::get('/', [ProfileController::class, 'edit'])->name('edit');
            Route::patch('/', [ProfileController::class, 'update'])->name('update');
            Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
        });

    Route::prefix('/client')
        ->name('clients.')
        ->group(function () {
            Route::get('/', [ClientController::class, 'index'])->name('index');
            Route::get('/create', [ClientController::class, 'create'])->name('create');
            Route::post('/', [ClientController::class, 'store'])->name('store');
            Route::get('/{client}', [ClientController::class, 'edit'])->name('edit');
            Route::post('/{client}', [ClientController::class, 'update'])->name('update');
            Route::delete('/{client}', [ClientController::class, 'destroy'])->name('destroy');
        });

    Route::prefix('/material')
        ->name('materials.')
        ->group(function () {
            Route::get('/', [MaterialController::class, 'index'])->name('index');
            Route::get('/create', [MaterialController::class, 'create'])->name('create');
            Route::post('/', [MaterialController::class, 'store'])->name('store');
            Route::get('/{material}', [MaterialController::class, 'edit'])->name('edit');
            Route::post('/{material}', [MaterialController::class, 'update'])->name('update');
            Route::delete('/{material}', [MaterialController::class, 'destroy'])->name('destroy');
        });

    Route::prefix('/material-group')
        ->name('material-groups.')
        ->group(function () {
            Route::get('/', [MaterialGroupController::class, 'index'])->name('index');
            Route::get('/create', [MaterialGroupController::class, 'create'])->name('create');
            Route::post('/', [MaterialGroupController::class, 'store'])->name('store');
            Route::get('/{material_group}', [MaterialGroupController::class, 'edit'])->name('edit');
            Route::post('/{material_group}', [MaterialGroupController::class, 'update'])->name('update');
            Route::delete('/{material_group}', [MaterialGroupController::class, 'destroy'])->name('destroy');
            Route::get('/show/{material_group}', [MaterialGroupController::class, 'show'])->name('show');
            Route::get('/show/create/{material_group}', [MaterialGroupController::class, 'createMaterialToGroup'])->name('createMaterialToGroup');
            Route::get('/show/edit/{material_group}', [MaterialGroupController::class, 'editMaterialToGroup'])->name('editMaterialToGroup');
            Route::post('/show/create/', [MaterialGroupController::class, 'storeMaterialToGroup'])->name('storeMaterialToGroup');
        });
});

require __DIR__ . '/auth.php';
