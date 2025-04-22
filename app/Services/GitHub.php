<?php declare(strict_types=1);

namespace App\Services;

use Laravel\Socialite\Contracts\Provider;
use Laravel\Socialite\Contracts\User as UserContract;
use Laravel\Socialite\Two\User;
use Symfony\Component\HttpFoundation\RedirectResponse;

final readonly class GitHub
{
    public function __construct(
        private Provider $provider,
    ) {}

    public function redirect(): RedirectResponse
    {
        return $this->provider->redirect();
    }

    public function user(): User|UserContract
    {
        return $this->provider->user();
    }
}
