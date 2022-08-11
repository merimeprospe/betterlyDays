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
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use Illuminate\Database\Eloquent\Collection; 

class adminController extends Controller
{
    function bloquer($id) {
        
        $user=User::find($id);
        $user->update([
            'active' => 0,
        ]);
        
        return redirect(url()->previous());
    }

    function debloquer($id) {
        
        $user=User::find($id);
        $user->update([
            'active' => 1,
        ]);
        
        return redirect(url()->previous());
    }

    function sup($id) {
       
        $post=Post::find($id);
        $post->delete();
        return redirect(url()->previous());
    }

    function admin(Request $request ) {
        
        $v=0;
        $o=0;
        $a=0;
        $m=0;
        $users=User::all();
        foreach($users as $user)
        {
            $m=$m+1;
            if($user->admin==1)
            {
                $a=$a+1;
            }
            else
            {
                if($user->type==0)
                {
                    $v=$v+1;
                }
                if($user->type==1)
                {
                    $o=$o+1;
                }
            }
        }
        $vp=($v*100)/$m;
        $op=($o*100)/$m;
        $ap=($a*100)/$m;
        return view('dshboard_admin',[
            'a' => $a,
            'o' => $o,
            'v' => $v,
            'ap' => $ap,
            'op' => $op,
            'vp' => $vp,
        ]);
    }
    function liste_vacancier()
    {
        $users=User::where('admin',0)->where('type',0)->get();
        return view('liste_vacancier',[
            'user' => $users, 
        ]);
    }
    function liste_organisation()
    {
        $users=User::where('admin',0)->where('type',1)->get();
        return view('lisre_organisation',[
            'user' => $users, 
        ]);
    }
    function liste_post()
    {
        $posts=Post::all();
        return view('liste_post',[
            'posts' => $posts,
        ]);
    }
    function liste_admin()
    {
        $users=User::where('admin',1)->get();
        return view('liste_admin',[
            'user' => $users, 
        ]);
    }
    public function search(Request $request)
    {
        $x = request()->input('search');
        $users = User::where('name','like', "%$x%")->orWhere('email','like',"%$x%")->get();
                          
        return view('recherche_admin', [
            'user' => $users,
            
        ]);
    } 
    function new_admin()
    {
        return view('new_admin');
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'admin' => [],
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin' => 1,
        ]);
        
        $profile = new Profile();
        $profile->nom = $request->name;
        $profile->user_id = $user->id;
        $profile->contact = 'aucun';
        $profile->pays = 'aucun';
        $profile->regnion = 'aucun';
        $profile->ville = 'aucun';
        $profile->adresse = 'aucun';
        $profile->save();

        
        return redirect(url()->previous());
    }
    
    
}
