<?php

use App\Domains\Auth\Http\Controllers\Login\LoginController;
use App\Domains\Document\Http\Controllers\Upload\UploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::name('auth.')
    ->prefix('auth')
    ->group(function () {
        Route::post('login', [LoginController::class, 'index'])
            ->name('login');
    });


Route::middleware('auth:sanctum')
    ->group(function () {
        Route::name('document.')
            ->prefix('documents')
            ->group(function () {
                Route::post('upload', [UploadController::class, 'index'])
                    ->name('upload');
            });


        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
