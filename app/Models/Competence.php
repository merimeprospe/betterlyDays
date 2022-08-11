<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = [
        'competence',
        'profile_id',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    } 
}
