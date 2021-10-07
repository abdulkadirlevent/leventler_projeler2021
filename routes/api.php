<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CariController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\ProjelerController;
use App\Http\Controllers\Api\UserCarisController;
use App\Http\Controllers\Api\TesisatlarController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\CariProjelersController;
use App\Http\Controllers\Api\TesisatIsAdimlariController;
use App\Http\Controllers\Api\ProjelerTesisatlarsController;
use App\Http\Controllers\Api\TesisatlarTesisatIsAdimlarisController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('users', UserController::class);

        // User Caris
        Route::get('/users/{user}/caris', [
            UserCarisController::class,
            'index',
        ])->name('users.caris.index');
        Route::post('/users/{user}/caris', [
            UserCarisController::class,
            'store',
        ])->name('users.caris.store');

        Route::apiResource('caris', CariController::class);

        // Cari Projelers
        Route::get('/caris/{cari}/projelers', [
            CariProjelersController::class,
            'index',
        ])->name('caris.projelers.index');
        Route::post('/caris/{cari}/projelers', [
            CariProjelersController::class,
            'store',
        ])->name('caris.projelers.store');

        Route::apiResource('projelers', ProjelerController::class);

        // Projeler Tesisatlars
        Route::get('/projelers/{projeler}/tesisatlars', [
            ProjelerTesisatlarsController::class,
            'index',
        ])->name('projelers.tesisatlars.index');
        Route::post('/projelers/{projeler}/tesisatlars', [
            ProjelerTesisatlarsController::class,
            'store',
        ])->name('projelers.tesisatlars.store');

        Route::apiResource('tesisatlars', TesisatlarController::class);

        // Tesisatlar Tesisat Is Adimlaris
        Route::get('/tesisatlars/{tesisatlar}/tesisat-is-adimlaris', [
            TesisatlarTesisatIsAdimlarisController::class,
            'index',
        ])->name('tesisatlars.tesisat-is-adimlaris.index');
        Route::post('/tesisatlars/{tesisatlar}/tesisat-is-adimlaris', [
            TesisatlarTesisatIsAdimlarisController::class,
            'store',
        ])->name('tesisatlars.tesisat-is-adimlaris.store');
    });
