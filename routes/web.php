<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
Route::post('/{id}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/{id}/delete', [TaskController::class, 'destroy'])->name('tasks.destroy');
