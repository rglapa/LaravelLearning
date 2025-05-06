<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SessionController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update'])
    ->middleware('auth')
    ->can('update', 'job');

Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
    ->middleware('auth')
    ->can('delete', 'job');

Route::get('/notes', [NoteController::class, 'index']);
Route::get('/notes/create', [NoteController::class, 'create']);
Route::post('/notes', [NoteController::class, 'store'])
    ->middleware('auth');
Route::get('/notes/{note}', [NoteController::class, 'show']);
Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'note');
Route::patch('/notes/{note}', [NoteController::class, 'update']);

Route::delete('/notes/{note}', [NoteController::class, 'destroy']);

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
