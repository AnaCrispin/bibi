<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\navegacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí puedes registrar las rutas web de tu aplicación. Estas rutas son
| cargadas por el RouteServiceProvider y todas se asignarán al grupo de
| middleware "web". ¡Haz algo increíble!
|
*/

// Rutas de navegación principales
Route::get('/', [navegacionController::class, 'vinicio'])->name('vinicio');
Route::get('/listarlibros', [navegacionController::class, 'listarlibros'])->name('listarlibros');
Route::get('/acercade', [navegacionController::class, 'vacercade'])->name('vacercade');
Route::get('/vinicio', [navegacionController::class, 'vinicio'])->name('vinicio');

// Rutas para el dashboard protegido
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas que requieren autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de autenticación
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']); // Esta línea es importante

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

// Ruta para el logout
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

// Incluir las rutas generadas por Laravel Breeze, Jetstream o similar
require __DIR__.'/auth.php';
