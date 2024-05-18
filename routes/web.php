<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\all_user_controller;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\TotalDonationController;
use App\Http\Controllers\UserInputController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/settings',[SettingsController::class, 'index'])->name('settings');
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class);
});
Route::resource('donations', DonationController::class);

Route::post('submit_donation',[UserInputController::class,'store']);
Route::get('edit_data/{id}',[UserInputController::class, 'edit'])->name('edit_data');
Route::put('users.update{id}',[UserInputController::class, 'update'])->name('users.update');
Route::get('delete_data/{id}',[UserInputController::class, 'delete'])->name('delete_data');

Route::get('edit_donation/{id}',[DonationController::class, 'edit'])->name('edit_donation');
Route::put('users.donation{id}',[DonationController::class, 'update'])->name('users.donation');
Route::get('delete_donation/{id}',[DonationController::class, 'destroy'])->name('delete_donation');

Route::get('/create_user', function () {
    return view('user.create_user');
})->name('create_user');
Route::post('create_user',[UserInputController::class,'create'])->name('create_user');


Route::post('withdraw',[TotalDonationController::class,'store']);
Route::get('/withdraw', [TotalDonationController::class, 'index'])->name('withdraw.index');




