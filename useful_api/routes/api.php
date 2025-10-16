<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/modules', [ModulesController::class, 'getModules']);

/*Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Uses first & second middleware...
    });

    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});*/

Route::controller(ModulesController::class)->group(function () {
    Route::get('/modules', 'getModules');
    Route::post('/modules/{id}/activate', 'moduleActivate');
    Route::post('/modules/{id}/deactivate', 'moduleDeactivate');
});
