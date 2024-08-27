<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth','verified'])->group(function () {
    Route::get('index', function () {
        return view('client.index');
    });

    Route::get('expired', function () {
        return view('client.expired');
    });

    Route::get('create', function () {
        return view('client.create');
    });

    Route::get('report', function () {
        return view('client.report');
    });

    Route::get('setting', function () {
        return view('setting');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //ClientController
    Route::get('/index', [ClientController::class, 'index']);
    Route::get('/client/{id}', [ClientController::class, 'show']);
    Route::delete('/client/{id}', [ClientController::class,'destroy']);
});

Route::get('/auth/google/redirect', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

require __DIR__.'/auth.php';
