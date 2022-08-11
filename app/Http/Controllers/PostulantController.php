<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\Postulant;
use App\Models\Profile;
use App\Models\Post;
use App\Models\notification;
use App\Mail\TestMail;
use App\Mail\TestMarkdownMail;
use App\Models\User;
use App\Models\Messageri;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Gate;

class PostulantController extends Controller
{
    function note(Request $request, $id)
    {
        $postulant = Postulant::find($id);
        $post = Post::find($postulant->post_id);
        $post->update([
            'statu' => "Terminer",
            'note' => $request->note,
        ]);

        return redirect(url()->previous());
    }
    public function search(Request $request)
    {
        $s = User::all();
        $i = 0;
        $notif = notification::all();
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
        $x = request()->input('search');
        $users = User::where('name','like', "%$x%")->where('type', 0)->orWhere('email','like',"%$x%")->where('type', 0)->get();                   
        return view('search', [
            'users' => $users,
            'profile' => $profile,
            'notif' => $notif,
            't' => $t,
            'nombre' => $nombre,
            'newmessage' => $newmessage,
            'table' => $table,
        ]);
    } 
    public function search1(Request $request)
    {
        $s = User::all();
        $i = 0;
        $notif = notification::all();
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
        $x = request()->input('search');
        $users =$users = User::where('name','like', "%$x%")->where('type', 1)->orWhere('email','like',"%$x%")->where('type', 1)->get(); 
        //dd($users);
        return view('search', [
            'users' => $users,
            'profile' => $profile,
            'notif' => $notif,
            't' => $t,
            'nombre' => $nombre,
            'newmessage' => $newmessage,
            'table' => $table,
        ]);
    } 
    function potulant(Request $request ) {
        $i = 0;
        $s = User::all();
        $notif = notification::all();
        $t=notification::where( 'user_id', $request->user()->id)->count();
        $profile=Profile::where( 'user_id', $request->user()->id)->first();
        $postulants= Postulant::all();//->orderBy('created_at');
        $post=Post::all()->where( 'user_id', $request->user()->id);
        //dd($post);
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
        return view('vacancier', [
            'postulant' => $postulants,
            'profile' => $profile,
            'posts' => $post,
            'notif' => $notif,
            't' => $t,
            'nombre' => $nombre,
            'newmessage' => $newmessage,
            'table' => $table,
        ]);
    }

    public function store(Request $request, $id)
    {
        if(Postulant::where('post_id', '=', $id)->where('user_id','=',$request->user()->id)->first())
        {

        }
        else
        {
            $postulant = new Postulant;
            $postulant->post_id = $id;
            $postulant->user_id = $request->user()->id;
            $postulant->save(); 

            $notyf = new notification;
            $notyf->content = " a postuler pour l'offre de ";
            $notyf->user_id = $postulant->post->user->id;
            $notyf->post_id = $postulant->post_id;
            $notyf->save();

        }
        
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function retenu($id)
    {
        $postulant = Postulant::find($id);
        $post = Post::find($postulant->post_id);
        if(Postulant::where('post_id', '=', $postulant->post_id)->where('type','=',1)->first())
        {

        }
        else
        {
            $post->update([
                'statu' => "programmé"
            ]);
            $postulant->update([
                'type' => 1 
            ]);
            $notyf = new notification;
            $notyf->content = " a accepter votre postulation pour l'offre de ";
            $notyf->user_id = $postulant->user_id;
            $notyf->post_id = $postulant->post_id;
            $notyf->save();

            $massage = ['message'=>'votre postulation pour l offre de','decision'=>'a été accepter'];

            //mail::to($postulant->user->email)->send(new TestMarkdownMail($postulant, $massage));
            
        }   

        return redirect()->intended(RouteServiceProvider::postulant);
    }

    public function changer($id)
    {

        $postulant = Postulant::find($id);
        $postulant->update([
            'type' => 0 
        ]);
        $notyf = new notification;
        $notyf->content = "vous a retenir l'offre de ";
        $notyf->user_id =  $postulant->user_id;
        $notyf->post_id =  $postulant->post_id;
        $notyf->save();

        $massage = ['message'=>'la postulation pour l offre de','decision'=>'vous a été retinir'];

        //mail::to($postulant->user->email)->send(new TestMarkdownMail($postulant, $massage));

        return redirect()->intended(RouteServiceProvider::postulant);
    }

    public function refuser($id)
    {
        $post = Postulant::find($id);

        $notyf = new notification;
        $notyf->content = " a rejeté votre postulation pour l'offre de ";
        $notyf->user_id = $post->user_id;
        $notyf->post_id = $post->post_id;
        $notyf->save();

        $massage = ['message'=>'votre postulation pour l offre de','decision'=>'a été refuser'];

        //mail::to($post->user->email)->send(new TestMarkdownMail($post, $massage));

        $post->delete();

        
        return redirect()->intended(RouteServiceProvider::postulant);
    }
}
