<?php
declare(strict_types=1);

use App\Http\Controllers\Oauth\GitHub\CallbackController;
use App\Http\Controllers\Oauth\GitHub\RedirectController;
use Illuminate\Support\Facades\Route;

Route::prefix('github')
    ->as('github:')
    ->group(static function (): void {
        Route::get('redirect', RedirectController::class)->name('redirect');
        Route::get('callback', CallbackController::class)->name('callback');
    });
