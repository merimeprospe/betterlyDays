<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notification;
use App\Models\Profile;
use App\Models\User;
use App\Models\Messageri;

class MessagerisController extends Controller
{
     public function index(Request $request){
        $notif = notification::all();
        $t=notification::where( 'user_id', $request->user()->id)->count();
        $profile=Profile::where( 'user_id', $request->user()->id)->first();

        $tab = [];
        $i=0;
        $s= User::all();

        $m= Messageri::where( 'to_id', $request->user()->id)->orwhere( 'from_id', $request->user()->id)->get();
       
        foreach($s as $user)
        {
            foreach($m as $req)
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
         return view('indexconversation',[
            'notif' => $notif,
            't' => $t,
            'profile' => $profile,
            'tab' => $tab,
            'm' =>  $m,
            'nombre' => $nombre,
            'newmessage' => $newmessage,
            'table' => $table,
         ]);
     }
    public function ajour(Request $request, $id)
    {       
        $m1= Messageri::where( 'to_id', $request->user()->id)->where( 'from_id', $id)->get();
        foreach($m1 as $t)
        {
            $t->update([
                'activ' => 1,
            ]);
                   
        }
        return redirect(url()->previous());
    }
     public function show(Request $request, $id){
        $notif = notification::where( 'user_id', $request->user()->id)->get();
        $tttt=notification::where( 'user_id', $request->user()->id)->count();
        $profile=Profile::where( 'user_id', $request->user()->id)->first();
        $table = [];
        $table1 = [];
        $tab1 = [];
        $i=0;
        $j=0;
        $s=User::all();
        $users= User::all();
        $s1= User::find($id);
        $m1= Messageri::where( 'to_id', $request->user()->id)->where( 'from_id', $id)->get();
        foreach($m1 as $t)
        {
            $t->update([
                'activ' => 1,
            ]);
                   
        }
        $m2= Messageri::where( 'to_id', $id)->where( 'from_id', $request->user()->id)->get();
        $mesg= Messageri::where( 'to_id', $request->user()->id)->orwhere( 'from_id', $request->user()->id)->get();
        foreach($s as $user)
        {
            foreach($mesg as $req)
            {
                if($req->from_id == $user->id)
                {
                    if($user->id != $request->user()->id) 
                    {
                        $table1[$i]=$user;
                        $i++;
                        break;
                    }
                }
                if($req->to_id == $user->id)
                {
                    if($user->id != $request->user()->id) 
                    {
                        $table1[$i]=$user;
                        $i++;
                        break;
                    }
                }
            }
        }
        //dd($tab1);   
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
         return view('conversation',[
            'notif' => $notif,
            't' => $tttt,
            'profile' => $profile,
            'tab' => $table1,
            'message' => $mesg,
            'newmessage' => $newmessage,
            'user' => $s1,
            'm' =>  $mesg,
            'mes' => null,
            'nombre' => $nombre,
            'table' => $table,
         ]);
     }
    public function store(Request $request, $id){
        
        $m1= Messageri::where( 'to_id', $request->user()->id)->where( 'from_id', $id)->get();
        foreach($m1 as $t)
        {
            $t->update([
                'activ' => 1,
            ]);
                   
        }

        $user = User::find($id);

        $message = new Messageri();
        $message->content = $request->message;
        $message->from_id = $request->user()->id;
        $message->to_id = $user->id;
        $message->save();

        return redirect(url()->previous());
    }
}
