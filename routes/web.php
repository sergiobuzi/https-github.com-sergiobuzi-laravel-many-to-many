<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TypeController;


Route::get('/', [ProjectController :: class, 'index'])
    ->name('project.index');

Route :: get('/projects/create', [ProjectController :: class, 'create'])
    ->name('project.create');

Route :: post('/projects/create', [ProjectController :: class, 'store'])
    ->name('project.store');