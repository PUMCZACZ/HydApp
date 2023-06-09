<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MaterialToGroupController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderPositionContoller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnitSiController;
use App\Http\Controllers\WorkController;
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

            Route::prefix('/{group}/materials')
                ->name('materials.')
                ->group(function () {
                    Route::get('/', [MaterialToGroupController::class, 'index'])->name('index');
                    Route::get('/create', [MaterialToGroupController::class, 'create'])->name('create');
                    Route::post('/', [MaterialToGroupController::class, 'store'])->name('store');
                    Route::get('/{materialToGroup}/edit', [MaterialToGroupController::class, 'edit'])->name('edit');
                    Route::post('/{materialToGroup}', [MaterialToGroupController::class, 'update'])->name('update');
                    Route::delete('/{materialToGroup}', [MaterialToGroupController::class, 'destroy'])->name('destroy');
                });
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
                    Route::get('/create', [OrderPositionContoller::class, 'create'])->name('create');
                    Route::post('/', [OrderPositionContoller::class, 'store'])->name('store');
                    Route::get('/{orderPosition}/edit', [OrderPositionContoller::class, 'edit'])->name('edit');
                    Route::post('/{orderPosition}', [OrderPositionContoller::class, 'update'])->name('update');
                    Route::delete('/{orderPosition}', [OrderPositionContoller::class, 'destroy'])->name('destroy');
                });
        });

    Route::prefix('/works')
        ->name('works.')
        ->group(function () {
            Route::get('/',[WorkController::class, 'index'])->name('index');
            Route::get('/create',[WorkController::class, 'create'])->name('create');
            Route::post('/',[WorkController::class, 'store'])->name('store');
            Route::get('/{work}',[WorkController::class, 'edit'])->name('edit');
            Route::post('/{work}',[WorkController::class, 'update'])->name('update');
            Route::delete('/{work}',[WorkController::class, 'destroy'])->name('destroy');
        });

    Route::prefix('/unit-sis')
        ->name('unit-sis.')
        ->group(function () {
            Route::get('/', [UnitSiController::class, 'index'])->name('index');
            Route::get('/create', [UnitSiController::class, 'create'])->name('create');
            Route::post('/', [UnitSiController::class, 'store'])->name('store');
            Route::get('/{unit_si}', [UnitSiController::class, 'edit'])->name('edit');
            Route::post('/{unit_si}', [UnitSiController::class, 'update'])->name('update');
            Route::delete('/{unit_si}', [UnitSiController::class, 'destroy'])->name('destroy');

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
