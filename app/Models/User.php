<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'mobile',
        'capacity',
        'notes',
        'title',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'created_at' => 'datetime:U',
        'updated_at' => 'datetime:U',
        'email_verified_at' => 'datetime:U'
    ];

    protected $appends = ['full_name'];

    public const ROLE_ADMIN = "admin";
    public const ROLE_USER = "user";

    public const ROLES = [
        self::ROLE_USER,
        self::ROLE_ADMIN
    ];

    public function isAdmin() {
        return $this->role == self::ROLE_ADMIN;
    }

    public const CAPACITY_PART_TIME = "part_time";
    public const CAPACITY_FULL_TIME = "full_time";

    public const CAPACITIES = [
        self::CAPACITY_PART_TIME,
        self::CAPACITY_FULL_TIME
    ];


    public function getFullNameAttribute() {
        return "{$this->first_name} {$this->last_name}";
    }

    public function articles() {
        return $this->hasMany(Article::class);
    }
}
