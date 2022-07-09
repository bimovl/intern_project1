<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'lastname',
        'provider_id',
    ];

    public function portfolio()
    {
        return $this->hasMany(Portfolio::class);
    }
    public function cv()
    {
        return $this->hasMany(Cv::class);
    }
    public function otherdoc()
    {
        return $this->hasMany(Otherdoc::class);
    }
    public function balancersu()
    {
        return $this->hasMany(Balancersu::class);
    }
    public function balancecash()
    {
        return $this->hasMany(Balancecash::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
}
