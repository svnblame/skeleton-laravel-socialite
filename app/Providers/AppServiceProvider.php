<?php

namespace App\Providers;

use App\Enums\Identity\Provider;
use App\Services\GitHub;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;

final class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Model::shouldBeStrict();
    }

    public function register(): void
    {
        $this->app->singleton(
            abstract: GitHub::class,
            concrete: fn () => Socialite::driver(
                driver: Provider::GitHub->value,
            )
        );
    }
}
