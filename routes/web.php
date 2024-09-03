<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ToyyibpayController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminAccess;
use App\Http\Middleware\ShareUserData;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth','verified', ShareUserData::class])->group(function () {

    Route::get('setting', function () {
        return view('setting');
    });

    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //ClientController
    Route::view('client/create', 'client.create');
    Route::get('/clients/index', [ClientController::class, 'index']);
    Route::get('/clients/expired', [ClientController::class, 'expired']);
    Route::post('/client/create', [ClientController::class, 'store']);
    Route::get('/client/{id}', [ClientController::class, 'show'])->name('client.show');
    Route::patch('/client/{id}',[ClientController::class, 'patch']);
    Route::delete('/client/{id}', [ClientController::class,'destroy']);

    //ToyyibpayController
    Route::get('toyyibpay', [ToyyibpayController::class, 'createBill'])->name('toyyibpay-create');
    Route::get('toyyibpay-status', [ToyyibpayController::class, 'paymentStatus'])->name('toyyibpay-status');
    Route::post('toyyibpay-callback', [ToyyibpayController::class, 'callback'])->name('toyyibpay-callback');


    Route::get('/auth/google/redirect', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
});

Route::middleware(['auth','verified', ShareUserData::class, AdminAccess::class])->group(function ()
{
    //UserController
    Route::view('user/create', 'user.create');
    Route::post('/user/create', [UserController::class, 'store']);
    Route::get('/users/index', [UserController::class,'index']);
    Route::patch('/user/{id}', [UserController::class,'patch']);
    Route::get('user/{id}', [UserController::class,'show'])->name('user.show');
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
});

route::get('testview', function () {
    $user = (Auth::user());
    dd($user->name, $user->email);
});


require __DIR__.'/auth.php';
