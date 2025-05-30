<?php

namespace App\Models;

use App\Enums\Identity\Provider;
use Carbon\CarbonInterface;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

final class User extends Authenticatable
{
    /**
     * @property string $id
     * @property string $name
     * @property string $email
     * @property string $password
     * @property null|string $remember_token
     * @property null|CarbonInterface $email_verified_at
     * @property null|CarbonInterface $created_at
     * @property null|CarbonInterface $updated_at
     * @property null|CarbonInterface $deleted_at
     */

    /** @use HasFactory<UserFactory> */
    use HasFactory;
    use HasUlids;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'handle',
        'email',
        'avatar',
        'provider',
        'provider_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'email_verified_at' => 'datetime',
        'provider' => Provider::class,
        'provider_id' => 'encrypted',
        'password' => 'hashed',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
