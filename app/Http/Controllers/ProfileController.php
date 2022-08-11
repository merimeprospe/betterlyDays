<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\image;
use App\Models\Post;
use App\Models\notification;
use App\Models\Competence;
use App\Models\Postulant;
use App\Models\User;
use App\Models\Messageri;
use App\Providers\RouteServiceProvider;

class ProfileController extends Controller
{
    //
    public function store(Request $request)
    {
        
        $profile=Profile::where( 'user_id', $request->user()->id)->first();
        $profile->update([
            'nom' => $request->first_name,
            'prenom' => $request->last_name,
            'contact'=> $request->phone,
            'age' => $request->age,
            'pays' => $request->pays,
            'regnion' => $request->region,
            'ville' => $request->ville,
            'adresse' => $request->adresse,
            'comptence' => $request->comptence,
        ]);   
        return redirect(url()->previous());
    }

    public function competence(Request $request)
    {
        $profile=Profile::where( 'user_id', $request->user()->id)->first();
        $comp= new Competence();
        $comp->competence = $request->info;
        $comp->profile_id = $profile->id;
        $comp->save();
        return redirect(url()->previous());
    }

    function profile(Request $request, $id) {

        $i = 0;
        $s = User::all();
        $profile=Profile::find($id);
        $postulant = Postulant::where('user_id', $id)->where('type', 1)->get();
        $comp = Competence::where('profile_id', $profile->id)->get();
        //dd($post);
        $notif = notification::all();
        $img=Image::all();
        $posts = Post::all();
        $t=notification::where( 'user_id', $request->user()->id)->count();
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
        
        return view('profile', [
            'profile' => $profile,
            't' => $t,
            'notif' => $notif,
            'posts' => $posts,
            'img' => $img,
            'nombre' => $nombre,
            'newmessage' => $newmessage,
            'table' => $table,
            'postulant' => $postulant,
            'comp' => $comp
        ]);
    }

    function about(Request $request) {
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

        return view('about', [
            'profile' => $profile,
            'notif' => $notif,
            't' => $t,
            'nombre' => $nombre,
            'newmessage' => $newmessage,
            'table' => $table,
        ]);
    }


    function organisation($id) {

        $profile=Profile::where('user_id', $id)->first();

        return view('organisation', [
            'profile' => $profile
        ]);
    }
    function my_organisation(Request $request) {

        $profile=Profile::where( 'user_id', $request->user()->id)->first();

        return view('my_organisation', [
            'profile' => $profile
        ]);
    }

    function my_profile(Request $request) {
        $s = User::all();
        $i = 0;
        $p=Post::where( 'user_id', $request->user()->id)->count();
        $posts = Post::all();
        $img=Image::all();
        $profile=Profile::where( 'user_id', $request->user()->id)->first();
        $comp = Competence::where('profile_id', $profile->id)->get();
        $notif = notification::all();
        $t=notification::where( 'user_id', $request->user()->id)->count();
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
        return view('my_profile', [
            'profile' => $profile,
            't' => $t,
            'notif' => $notif,
            'p' => $p,
            'posts' => $posts,
            'img' => $img,
            'nombre' => $nombre,
            'newmessage' => $newmessage,
            'table' => $table,
            'comp' => $comp
        ]);
    }

    public function font(Request $request)
    {
        
        $filename= time() . '.' . $request->avatar->extension();

        $path = $request->file('avatar')->storeAs(
            'image_font',
            $filename,  
            'public'
        );

        $profile=Profile::where( 'user_id', $request->user()->id)->first();
      
        $profile->update([
            'font_profil' => $path,
        ]);
        
        $image = new image();
        $image->image = $path;
        $image->user_id = $request->user()->id;
        $image->save();

        return redirect(url()->previous());
    }

    public function image_p(Request $request)
    {
        //dd($request->avatar1);
        $filename= time() . '.' . $request->avatar1->extension();

        $path = $request->file('avatar1')->storeAs(
            'profil_image',
            $filename,  
            'public'
        );

        $profile=Profile::where( 'user_id', $request->user()->id)->first();
      //  dd($profile);
        $profile->update([
            'image_profil' => $path,
        ]);
        
        $image = new image();
        $image->image = $path;
        $image->user_id = $request->user()->id;
        $image->save();

        return redirect(url()->previous());
    }
}
