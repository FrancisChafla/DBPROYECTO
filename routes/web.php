<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'verify' =>true
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::resource('usuarios', App\Http\Controllers\UsuarioController::class);
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('usuarios-roles', App\Http\Controllers\UsuariosRoleController::class);

Route::post('/usuarios/{id}/activar', [App\Http\Controllers\UsuarioController::class, 'activar'])->name('usuarios.activar');
Route::post('/usuarios/{id}/desactivar', [App\Http\Controllers\UsuarioController::class, 'desactivar'])->name('usuarios.desactivar');