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

    Route::prefix('/material-groups')
        ->name('material-groups.')
        ->group(function () {
            Route::get('/', [MaterialGroupController::class, 'index'])->name('index');
            Route::get('/create', [MaterialGroupController::class, 'create'])->name('create');
            Route::post('/', [MaterialGroupController::class, 'store'])->name('store');
            Route::get('/{material_group}/edit', [MaterialGroupController::class, 'edit'])->name('edit');
            Route::post('/{material_group}', [MaterialGroupController::class, 'update'])->name('update');
            Route::delete('/{material_group}', [MaterialGroupController::class, 'destroy'])->name('destroy');
            Route::get('/{material_group}', [MaterialGroupController::class, 'show'])->name('show');

            Route::prefix('/{material_group}/materials')
                ->as('materials.')
                ->group(function () {
                    Route::get('/create', [MaterialGroupController::class, 'createMaterialToGroup'])
                        ->name('create');
                    Route::get('/{material}/edit', [MaterialGroupController::class, 'editMaterialToGroup'])
                        ->name('edit');
                    Route::post('/', [MaterialGroupController::class, 'storeMaterialToGroup'])
                        ->name('store');
                });
        });

});

require __DIR__ . '/auth.php';

//Route::get('/posts'); // index
//Route::get('/posts/create'); // formularz tworzenia
//Route::post('/posts'); // dodaj nowy
//Route::get('/posts/{post}'); // wyświetl jeden
//Route::get('/posts/{post}/edit'); // edytuj
//Route::patch('/posts/{post}'); // zaktualizuj
//Route::delete('/posts/{post}'); // usuń element

