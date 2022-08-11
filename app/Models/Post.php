<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Commentaire;
use App\Models\User;
use App\Models\Postulant;

class Post extends Model
{
    use HasFactory;
    protected $guardet = [];

    protected $fillable = [
        'title',
        'content',
        'pays',
        'competence',
        'prix',
        'date_debut',
        'date_fin',
        'image',
        'user_id',
        'statu',
        'note'
    ];

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function postulant()
    {
        return $this->hasMany(Postulant::class);
    }  
}
