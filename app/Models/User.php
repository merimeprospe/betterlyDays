<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;
use App\Models\Profile;
use App\Models\image;
use App\Models\Postulant;
use App\Models\Commentaire;
use App\Models\notification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'active',
        'admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function commantaires()
    {
        return $this->hasMany(Commentaire::class);
    } 
    public function posts()
    {
        return $this->hasMany(Post::class);
    } 
    public function profile()
    {
        return $this->hasOne(Profile::class);
    } 
    public function images()
    {
        return $this->hasMany(image::class);
    } 
    public function postulant()
    {
        return $this->hasMany(Postulant::class);
    }
    public function notification()
    {
        return $this->hasMany(notification::class);
    }  
}
