<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::prefix('oauth')->as('oauth:')->group(
    base_path(path: 'routes/web/oauth.php'),
);
