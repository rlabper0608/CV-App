<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\FotografiaController;

Route::get('/', [MainController::class, 'main'])->name('main');

Route::get('alumno', [AlumnoController::class, 'index'])->name('alumnos.index');
Route::get('alumno/create', [AlumnoController::class, 'create'])->name('alumnos.create');
Route::post('alumno', [AlumnoController::class, 'store'])->name('alumnos.store');
Route::get('alumno/{id}', [AlumnoController::class, 'show'])->name('alumnos.show');
Route::get('alumno/{id}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit');
Route::put('alumno/{id}', [AlumnoController::class, 'update'])->name('alumnos.update');
Route::delete('alumno/{id}', [AlumnoController::class, 'index'])->name('alumnos.destroy');

Route::get('fotografia/{id}', [FotografiaController::class,'fotografia'])->name('fotografia.fotografia');