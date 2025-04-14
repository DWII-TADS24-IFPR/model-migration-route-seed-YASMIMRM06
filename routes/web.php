<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaControllers;

Route::get('/pessoas',[PessoaController::class,'index'])->name('pessoas.index');
Route::get('/pessoas/create',[PessoaController::class,'create']);
Route::post('/pessoas',[PessoaController::class,'store'])->name('pessoas.store');
