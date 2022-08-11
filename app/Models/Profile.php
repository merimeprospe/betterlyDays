<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Competence;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'contact',
        'age',
        'pays',
        'regnion',
        'ville',
        'adresse',
        'font_profil',
        'image_profil',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    } 

    public function competence()
    {
        return $this->hasMany(Competence::class);
    }
}
