<?php declare(strict_types=1);

namespace App\Http\Controllers\Oauth\GitHub;

use App\Services\GitHub;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

final readonly class RedirectController
{
    public function __construct(
        private GitHub $github,
    ) {}

    public function __invoke(
        Request $request): RedirectResponse
    {
        return $this->github->redirect();
    }
}
