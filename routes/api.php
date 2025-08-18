<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProyectoApiController;

Route::middleware('jwt.auth')->group(function () {
	Route::apiResource('proyectos', ProyectoApiController::class)
		->names([
			'index' => 'api.proyectos.index',
			'store' => 'api.proyectos.store',
			'show' => 'api.proyectos.show',
			'update' => 'api.proyectos.update',
			'destroy' => 'api.proyectos.destroy',
		]);
});

use App\Http\Controllers\Api\AuthController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);