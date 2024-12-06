<?php

use App\Http\Controllers\CageController;
use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [CageController::class, 'index'])->name('cages.index');
Route::get('index', [HomeController::class, 'index'])->name('index');


Route::get('/cages', [CageController::class, 'index'])->name('cages.index'); 
Route::get('/cages/create', [CageController::class, 'create'])->name('cages.create'); 
Route::post('/cages', [CageController::class, 'store'])->name('cages.store'); 
Route::get('/cages/{cage}', [CageController::class, 'show'])->name('cages.show'); 
Route::get('/cages/{cage}/edit', [CageController::class, 'edit'])->name('cages.edit'); 
Route::put('/cages/{cage}', [CageController::class, 'update'])->name('cages.update'); 
Route::delete('/cages/{cage}', [CageController::class, 'destroy'])->name('cages.destroy');


Route::get('/animals', [AnimalController::class, 'index'])->name('animals.index'); 
Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals.create'); 
Route::post('/animals', [AnimalController::class, 'store'])->name('animals.store'); 
Route::get('/animals/{animal}', [AnimalController::class, 'show'])->name('animals.show'); 
Route::get('/animals/{animal}/edit', [AnimalController::class, 'edit'])->name('animals.edit'); 
Route::put('/animals/{animal}', [AnimalController::class, 'update'])->name('animals.update'); 
Route::delete('/animals/{animal}', [AnimalController::class, 'destroy'])->name('animals.destroy'); 
