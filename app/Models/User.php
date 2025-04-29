<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,Followable,likable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded =[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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

    public function timeline() {
        $friends = $this->follows()->pluck('id');
        return Post::whereIn('user_id', $friends)->orwhere('user_id', $this->id)->WithLikes()->latest()->get();
    }

    public function avatar() : Attribute {
        return Attribute::make(
            get: fn($value) => asset($value ? '/storage/'. $value : '/images/default-avatar.jpg' ),
        );
    }

    public function banner() : Attribute {
        return Attribute::make(
            get: fn($value) => asset($value ? '/storage/'. $value : '/images/default-banner.jpg' ),
        );
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function path($append = '') {
        $path = route('profile', $this->username);
        return $append ? "{$path}/{$append}" : $path;
    }
}
