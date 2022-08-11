<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\image;
use App\Models\Profile;
use App\Models\Messageri;
use App\Models\Commentaire;
use App\Models\notification;
use App\Models\Postulant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\Collection; 

class Postcontroller extends Controller
{
    function organisations(Request $request) {
        $s = User::all();
        $i = 0;
        $notif = notification::all();
        $postulant = Postulant::where('user_id', $request->user()->id)->where('type', 1)->get();
        
        $t=notification::where( 'user_id', $request->user()->id)->count();
        $profile=Profile::where('user_id', $request->user()->id)->first();
        $table =  [];
        $nombre= Messageri::where( 'to_id', $request->user()->id)->where( 'activ', 0)->count();  
        $newmessage= Messageri::where( 'to_id', $request->user()->id)->where( 'activ', 0)->get();
        foreach($s as $user)
        {
            foreach($newmessage as $req)
            {
                if($req->from_id == $user->id)
                {
                    if($user->id != $request->user()->id) 
                    {
                        $table[$i]=$user;
                        $i++;
                        break;
                    }
                }
                if($req->to_id == $user->id)
                {
                    if($user->id != $request->user()->id) 
                    {
                        $table[$i]=$user;
                        $i++;
                        break;
                    }
                }
            }
        }

        return view('organisation', [
            'profile' => $profile,
            'notif' => $notif,
            't' => $t,
            'nombre' => $nombre,
            'newmessage' => $newmessage,
            'table' => $table,
            'postulant' => $postulant,
        ]);
    }
    function posts(Request $request ) {
        $tab = [];
        $i = 0;
        $posts= Post::all();//->sortBy('updated_at-created_at DESC')->get();
        $commentaires = Commentaire::all();
        $s = User::all();
        $nombre= Messageri::where( 'to_id', $request->user()->id)->where( 'activ', 0)->count();
        $message= Messageri::where( 'to_id', $request->user()->id)->where( 'activ', 0)->get();
        foreach($s as $user)
        {
            foreach($message as $req)
            {
                if($req->from_id == $user->id)
                {
                    if($user->id != $request->user()->id) 
                    {
                        $tab[$i]=$user;
                        $i++;
                        break;
                    }
                }
                if($req->to_id == $user->id)
                {
                    if($user->id != $request->user()->id) 
                    {
                        $tab[$i]=$user;
                        $i++;
                        break;
                    }
                }
            }
        }
       # $profile=Profile::find(1);
        $notif = notification::all();
        $compte = Profile::all();
        $profile=Profile::where( 'user_id', $request->user()->id)->first();
        $p=Post::where( 'user_id', $request->user()->id)->count();
        $t=notification::where( 'user_id', $request->user()->id)->count();
        $mes= Messageri::where( 'to_id', $request->user()->id)->orwhere( 'from_id', $request->user()->id)->get();
        return view('dashboard', [
            'posts' => $posts,
            'profile' => $profile,
            'commentaires' => $commentaires,
            'p' => $p,
            'notif' => $notif,
            't' => $t,
            'profile'=> $profile,
            'compte' => $compte,
            'nombre' => $nombre,
            'tab' => $tab,
            'message' => $message,
            'mmmm' => $mes,
        ]);
    }

    public function store(Request $request)
    {
    
        //$name = Storage::disk('local')->put('avatars', $request->avatar);
        
        //return Storage::download($name);
       // die(Storage::url($name));
       
       if( $request->avatar != null)
       {
         
            $filename= time() . '.' . $request->avatar->extension();

            $path = $request->file('avatar')->storeAs(
                'image_posts',
                $filename,  
                'public'
            );
            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->pays = $request->pays;
            $post->competence = $request->competence;
            $post->prix = $request->prix;
            $post->date_debut = $request->date_debut;
            $post->date_fin = $request->date_fin;
            $post->image = $path;
            $post->user_id = $request->user()->id;
            
            $image = new image();
            $image->image = $path;
            $image->user_id = $request->user()->id;
            $image->save();

            $post->save();
       }
       else
       {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->pays = $request->pays;
        $post->competence = $request->competence;
        $post->prix = $request->prix;
        $post->date_debut = $request->date_debut;
        $post->date_fin = $request->date_fin;
        $post->user_id = $request->user()->id;
        

        $post->save();
       }
        

        return redirect()->intended(RouteServiceProvider::HOME);   
    }

    public function supprime($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->intended(RouteServiceProvider::HOME);
    }
    
//--------------------- par encor fonctionnel---------------------

    public function modifier(Request $request, $id)
    {
        $filename= time() . '.' . $request->avatar->extension();

        $path = $request->file('avatar')->storeAs(
            'image_posts',
            $filename,  
            'public'
        );

        $post = Post::find($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path,
        ]);
        
        $image = new image();
        $image->image = $path;
        $image->user_id = $request->user()->id;
    }

    public function download($id)
    {
        $post = Post::find($id);
        $name = $post->image;
        return Storage::download($name);
    }

}
