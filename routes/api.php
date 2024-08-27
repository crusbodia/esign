<?php

use App\Domains\Auth\Http\Controllers\Login\LoginController;
use App\Domains\Document\Http\Controllers\Upload\UploadController;
use App\Domains\Signature\Http\Controllers\Request\RequestController;
use App\Domains\Signature\Http\Controllers\Sign\SignController;
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
                Route::post('upload', [UploadController::class, 'index'])->name('upload');
            });

        Route::name('signatures.')
            ->prefix('signatures')
            ->group(function () {
                Route::post('request', [RequestController::class, 'index'])->name('request');
                Route::patch('{signature}/sign', [SignController::class, 'index'])->name('request');
            });

        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
