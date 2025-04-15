<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
        return Post::whereIn('user_id', $friends)->orwhere('user_id', $this->id)->latest()->get();
    }

    public function avatar($size = 40) {
        return 'https://i.pravatar.cc/'. $size . '?u=' . $this->email;
    }

    public function follows() {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function follow(User $user) {
        return $this->follows()->save($user);
    }

    public function getRouteKeyName() {
        return 'name';
    }
}
