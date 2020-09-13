<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('/admin')->group(function (){
    Route::get('/', [AdminController::class, 'dashboardView'])->name('dashboardView');

    Route::get('/assets', [AdminController::class, 'assetsView'])->name('assetsView');
    Route::get('/asset/{asset}', [AdminController::class, 'assetView'])->name('assetView');
    Route::get('/assets/create', [AdminController::class, 'assetsCreateView'])->name('assetsCreateView');
    Route::post('/assets/create', [AdminController::class, 'assetsCreate'])->name('assetsCreate');
    Route::get('/assets/edit/{asset}', [AdminController::class, 'assetsEditView'])->name('assetsEditView');
    Route::post('/assets/edit/{asset}', [AdminController::class, 'assetsEdit'])->name('assetsEdit');

    Route::get('/assets/delete/{asset}', [AdminController::class, 'assetsDelete'])->name('assetsDelete');

    Route::get('/employees', [AdminController::class, 'employeesView'])->name('employeesView');
    Route::get('/settings', [AdminController::class, 'settingsView'])->name('settingsView');
});

Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
