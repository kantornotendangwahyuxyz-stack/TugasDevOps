<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevopsTaskController;
use App\Http\Controllers\HealthCheckController;

Route::get('/', function () {
    return view('welcome');
});

// Fitur 1: Task Manager Eloquent CRUD
Route::get('/tasks', [DevopsTaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [DevopsTaskController::class, 'store'])->name('tasks.store');
Route::patch('/tasks/{task}/status', [DevopsTaskController::class, 'updateStatus'])->name('tasks.updateStatus');
Route::delete('/tasks/{task}', [DevopsTaskController::class, 'destroy'])->name('tasks.destroy');

// Fitur 2: System Health Monitor API
Route::get('/health', [HealthCheckController::class, 'check'])->name('health.check');
