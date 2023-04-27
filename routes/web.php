<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderPositionsContoller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'web'])->group(function () {

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
            Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('edit');
            Route::post('/{client}', [ClientController::class, 'update'])->name('update');
            Route::delete('/{client}', [ClientController::class, 'destroy'])->name('destroy');
        });

    Route::prefix('/material')
        ->name('materials.')
        ->group(function () {
            Route::get('/', [MaterialController::class, 'index'])->name('index');
            Route::get('/create', [MaterialController::class, 'create'])->name('create');
            Route::post('/', [MaterialController::class, 'store'])->name('store');
            Route::get('/{material}/edit', [MaterialController::class, 'edit'])->name('edit');
            Route::post('/{material}', [MaterialController::class, 'update'])->name('update');
            Route::delete('/{material}', [MaterialController::class, 'destroy'])->name('destroy');
        });

    Route::prefix('/groups')
        ->name('groups.')
        ->group(function () {
            Route::get('/', [GroupController::class, 'index'])->name('index');
            Route::get('/create', [GroupController::class, 'create'])->name('create');
            Route::post('/', [GroupController::class, 'store'])->name('store');
            Route::get('/{group}/edit', [GroupController::class, 'edit'])->name('edit');
            Route::post('/{group}', [GroupController::class, 'update'])->name('update');
            Route::delete('/{group}', [GroupController::class, 'destroy'])->name('destroy');
            Route::get('/{group}', [GroupController::class, 'show'])->name('show');

            Route::prefix('/{material_group}/materials')
                ->name('materials.')
                ->group(function () {
                    Route::get('/create', [GroupController::class, 'createMaterialToGroup'])
                        ->name('create');
                    Route::post('/', [GroupController::class, 'storeMaterialToGroup'])
                        ->name('store');
                    Route::get('/{material}/edit', [GroupController::class, 'editMaterialToGroup'])
                        ->name('edit'); // TODO: refactor
                    Route::post('/{material}', [GroupController::class, 'updateMaterialToGroup'])
                        ->name('update'); // TODO: refactor
                    Route::delete('/{material}', [GroupController::class, 'deleteMaterialToGroup'])
                        ->name('destroy'); // TODO: refactor
                });
        });

    Route::prefix('/material_to_groups')
        ->name('material_to_groups.')
        ->group(function (){
            Route::post('{materialToGroup}');
            Route::get('{materialToGroup}/edit');
        });

    Route::prefix('/orders')
        ->name('orders.')
        ->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('index');
            Route::get('/create', [OrderController::class, 'create'])->name('create');
            Route::post('/', [OrderController::class, 'store'])->name('store');
            Route::get('/{order}/edit', [OrderController::class, 'edit'])->name('edit');
            Route::post('/{order}', [OrderController::class, 'update'])->name('update');
            Route::delete('/{order}', [OrderController::class, 'destroy'])->name('destroy');

            Route::prefix('/{order}/group')
                ->name('groups.')
                ->group(function () {
                    Route::get('/create', [OrderPositionsContoller::class, 'create'])->name('create');
                    Route::post('/', [OrderPositionsContoller::class, 'store'])->name('store');
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
