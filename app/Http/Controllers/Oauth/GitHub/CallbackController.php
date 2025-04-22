<?php declare(strict_types=1);

namespace App\Http\Controllers\Oauth\GitHub;

use App\Services\GitHub;
use App\Services\Identity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final readonly class CallbackController
{
    public function __construct(
        private GitHub $github,
        private Identity $identity,
    ) {}

    public function __invoke(Request $request): RedirectResponse
    {
        $this->identity->authenticate(
            user: $this->identity->updateOrCreate(
                user: $this->github->user(),
            ),
        );

        return new RedirectResponse(
            url: route('home'),
        );
    }
}
