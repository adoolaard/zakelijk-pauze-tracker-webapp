<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\BreakController;
use App\Http\Controllers\BreakRuleController;
use App\Http\Controllers\BusyPeriodController;
use Illuminate\Support\Facades\Route;

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

    Route::delete('employees', [EmployeeController::class, 'destroyAll'])->name('employees.destroyAll');
    Route::resource('employees', EmployeeController::class);
    Route::resource('shifts', ShiftController::class);
    Route::resource('break-rules', BreakRuleController::class)->only(['index', 'edit', 'update']);
    Route::resource('busy-periods', BusyPeriodController::class)->only(['index', 'store', 'destroy']);
    Route::get('breaks', [BreakController::class, 'index'])->name('breaks.index');
    Route::post('breaks/bulk-confirm', [BreakController::class, 'bulkConfirm'])->name('breaks.bulk-confirm');
    Route::post('breaks/{shift}/confirm', [BreakController::class, 'confirm'])->name('breaks.confirm');
    Route::post('breaks/{shift}/reject', [BreakController::class, 'reject'])->name('breaks.reject');
});

require __DIR__.'/auth.php';
