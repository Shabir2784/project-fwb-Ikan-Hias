<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');

});



Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('form/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/validasi', function (Request $request) {
    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ], [
        'email.required' => 'Email tidak boleh kosong',
        'password.required' => 'Password tidak boleh kosong'
    ]);

    $credentials = $request->only(['email', 'password']);

    if (Auth::attempt($credentials)) {
        return view('admin.dashboard');
    } else {
        return back()->with([
            'error' => 'Email atau password invalid'
        ]);
    }
})->name('validasi');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return "mahasiswa";
    }); 
});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {

    Route::get('/mahasiswa', function () {
        return "mahasiswa";
    });

    
});

Route::middleware(['auth', 'role:dosen'])->group(function () {

    Route::get('/dosen', function () {
        return "mahasiswa";
    });

    
});

