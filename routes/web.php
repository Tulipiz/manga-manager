<?php

use App\Livewire\CadastrarProjeto;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/cadastro', CadastrarProjeto::class);
