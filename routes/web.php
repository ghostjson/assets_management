<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

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
    Route::get('/employees/create', [AdminController::class, 'employeesCreateView'])->name('employeesCreateView');
    Route::post('/employees/create', [AdminController::class, 'employeesCreate'])->name('employeesCreate');
    Route::get('/employees/edit/{user}', [AdminController::class, 'employeesEditView'])->name('employeesEditView');
    Route::post('/employees/edit/{user}', [AdminController::class, 'employeesEdit'])->name('employeesEdit');
    Route::get('/employees/delete/{user}', [AdminController::class, 'employeesDelete'])->name('employeesDelete');


    Route::get('/settings', [AdminController::class, 'settingsView'])->name('settingsView');
});

Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
