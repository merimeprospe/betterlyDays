<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    public function store(Request $request, $id)
    {
        $commentaire = new Commentaire();
        $commentaire->content = $request->commenter;
        $commentaire->post_id = $id;
        $commentaire->user_id = $request->user()->id;
        $commentaire->save();
    
    }
}
