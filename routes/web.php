<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', function () {
    if (!session()->has('user_id')) {
        return redirect('/login');
    }

    return app(ProfileController::class)->index();
});

Route::post('/logout', function (Request $request) {

    $request->session()->flush();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')
        ->with('success', 'You have been logged out.');

});

Route::get('/profiles/create', function () {
    if (!session()->has('user_id')) {
        return redirect('/login');
    }

    return app(ProfileController::class)->create();
});

Route::post('/profiles', function (Request $request) {
    if (!session()->has('user_id')) {
        return redirect('/login');
    }

    return app(ProfileController::class)->store($request);
});

Route::get('/profiles/{id}/edit', function ($id) {
    if (!session()->has('user_id')) {
        return redirect('/login');
    }

    return app(ProfileController::class)->edit($id);
});

Route::post('/profiles/{id}/update', function (Request $request, $id) {
    if (!session()->has('user_id')) {
        return redirect('/login');
    }

    return app(ProfileController::class)->update($request, $id);
});

Route::post('/profiles/{id}/delete', function ($id) {
    if (!session()->has('user_id')) {
        return redirect('/login');
    }

    return app(ProfileController::class)->destroy($id);
});