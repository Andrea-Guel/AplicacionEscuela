<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MaestrosController;
use App\Http\Controllers\MateriaController;


Route::get('/home', function () {
    return view('layouts/home');
});


Route::get('/Materias', [MateriaController::class,'index']);

Route::get('/AgregarMaterias', function () {
    return view('Materias/materias_create');
});

Route::post('/newMateria',[MateriaController::class,'store'])->name('materia.store');
Route::post('/editMateria',[MateriaController::class,'update'])->name('materia.update');
Route::get('/verMateria/{materia}', [MateriaController::class,'show']);
Route::post('/dropMateria/{id}', [MateriaController::class,'destroy'])->name('materia.destroy');

Route::get('/Maestros', [MaestrosController::class,'index']);
Route::get('/Maestroslist', [MaestrosController::class,'listado']);
Route::post('/newMaestros',[MaestrosController::class,'store'])->name('maestro.store');
Route::get('/verMaestro/{id}', [MaestrosController::class,'show']);
Route::post('/dropMaestro/{id}', [MaestrosController::class,'destroy'])->name('maestro.destroy');
Route::post('/editMaestro',[MaestrosController::class,'update'])->name('maestro.update');
