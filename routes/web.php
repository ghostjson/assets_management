<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function (){
    return redirect('admin/');
});

Route::prefix('/admin')->group(function (){
    Route::get('/', [AdminController::class, 'dashboardView'])->name('dashboardView');

    Route::get('/assets', [AdminController::class, 'assetsView'])->name('assetsView');
    Route::get('/asset/{asset}', [AdminController::class, 'assetView'])->name('assetView');
    Route::get('/assets/create', [AdminController::class, 'assetsCreateView'])->name('assetsCreateView');
    Route::post('/assets/create', [AdminController::class, 'assetsCreate'])->name('assetsCreate');
    Route::get('/assets/edit/{asset}', [AdminController::class, 'assetsEditView'])->name('assetsEditView');
    Route::post('/assets/edit/{asset}', [AdminController::class, 'assetsEdit'])->name('assetsEdit');
    Route::get('/assets/delete/{asset}', [AdminController::class, 'assetsDelete'])->name('assetsDelete');
    Route::get('/assets/returned/{asset}', [AdminController::class, 'assetReturned'])->name('assetReturned');

    Route::get('/employee/{user}', [AdminController::class, 'employeeView'])->name('employeeView');
    Route::get('/employees', [AdminController::class, 'employeesView'])->name('employeesView');
    Route::get('/employees/create', [AdminController::class, 'employeesCreateView'])->name('employeesCreateView');
    Route::post('/employees/create', [AdminController::class, 'employeesCreate'])->name('employeesCreate');
    Route::get('/employees/edit/{user}', [AdminController::class, 'employeesEditView'])->name('employeesEditView');
    Route::post('/employees/edit/{user}', [AdminController::class, 'employeesEdit'])->name('employeesEdit');
    Route::get('/employees/delete/{user}', [AdminController::class, 'employeesDelete'])->name('employeesDelete');

    Route::get('/ticket/{ticket}', [AdminController::class, 'ticketView'])->name('adminTicketView');

    ROute::get('/ticket/assign/{ticket}/{user}', [AdminController::class, 'ticketAssign'])->name('ticketAssign');
    ROute::get('/ticket/assign/add/{asset}/{user}', [AdminController::class, 'assignAsset'])->name('assignAsset');
    ROute::get('/ticket/complete/{ticket}', [AdminController::class, 'completeTicket'])->name('completeTicket');


    Route::get('/settings', [AdminController::class, 'settingsView'])->name('settingsView');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('updateSettings');
});

Route::prefix('employee')->group(function (){
    Route::get('/', [EmployeeController::class, 'dashboardView'])->name('employeeDashboardView');

    Route::get('/profile', [EmployeeController::class, 'profileView'])->name('employeeProfileView');
    Route::post('/change-password', [EmployeeController::class, 'changePassword'])->name('changePassword');

    Route::post('/ticket', [EmployeeController::class, 'createTicket'])->name('createTicket');
    Route::get('/ticket/{ticket}', [EmployeeController::class, 'ticketView'])->name('ticketView');
});

Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/test', function (){
    \Illuminate\Support\Facades\Mail::send(
        new \App\Mail\CreateTicketMail()
    );
});
