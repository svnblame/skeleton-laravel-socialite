<?php declare(strict_types=1);

namespace App\Services;

use App\Enums\Identity\Provider;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\DatabaseManager;
use Laravel\Socialite\Contracts\User as UserContract;
use Laravel\Socialite\Two\User as OAuthUser;

final readonly class Identity
{
    public function __construct(
        private AuthManager $auth,
        private DatabaseManager $database,
    ) {}

    public function updateOrCreate(
        UserContract|OAuthUser $user
    ): User {
        return $this->database->transaction(
            callback: fn () => User::query()->updateOrCreate(
                attributes: [
                    'provider_id' => $user->getId(),
                    'provider' =>  Provider::GitHub,
                    'email' => $user->email,
                ],
                values: [
                    'name'  => $user->name,
                    'handle' => $user->nickname,
                    'avatar' => $user->avatar,
                ],
            ),
            attempts: 3,
        );
    }

    public function authenticate(
        User|Authenticatable $user
    ): void {
        $this->auth->login(
            user: $user,
        );
    }
}
