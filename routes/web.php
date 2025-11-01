<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AlumnoController;

Route::get('/', [MainController::class, 'main'])->name('name');

Route::get('alumno', [AlumnoController::class, 'index'])->name('alumnos.index');
Route::get('alumno/create', [AlumnoController::class, 'create'])->name('alumnos.create');
Route::post('alumno', [AlumnoController::class, 'create'])->name('alumnos.create');
Route::get('alumno/{id}', [AlumnoController::class, 'show'])->name('alumnos.show');
Route::get('alumno/{id}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit');
Route::put('alumno/{id}', [AlumnoController::class, 'update'])->name('alumnos.update');
Route::delete('alumno/{id}', [AlumnoController::class, 'index'])->name('alumnos.destroy');