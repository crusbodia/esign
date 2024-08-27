<?php

namespace App\Providers;

use App\Domains\Auth\Services\AuthService;
use App\Domains\Auth\Services\AuthServiceInterface;
use App\Domains\Document\Repositories\DocumentPgRepository;
use App\Domains\Document\Repositories\DocumentRepository;
use App\Domains\Document\Services\DocumentService;
use App\Domains\Document\Services\DocumentServiceInterface;
use App\Domains\Document\Services\UploadService;
use App\Domains\Document\Services\UploadServiceInterface;
use App\Domains\Signature\Repositories\SignaturePgRepository;
use App\Domains\Signature\Repositories\SignatureRepository;
use App\Domains\Signature\Services\SignatureService;
use App\Domains\Signature\Services\SignatureServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(AuthServiceInterface::class, AuthService::class);
        $this->app->singleton(UploadServiceInterface::class, UploadService::class);
        $this->app->singleton(DocumentServiceInterface::class, DocumentService::class);
        $this->app->singleton(SignatureServiceInterface::class, SignatureService::class);

        $this->app->singleton(DocumentRepository::class, DocumentPgRepository::class);
        $this->app->singleton(SignatureRepository::class, SignaturePgRepository::class);
    }
}
