@extends("layouts.master")

@section("contenu")

<section class="messages-page">
<div class="container">
<div class="messages-sec">
<div class="row">
<div class="col-lg-4 col-md-12 no-pdd">
<div class="msgs-list">
<div class="msg-title">
<h3>Messages</h3>

</div>

<!------------------------------------------------- partie navbarGauche-------------------------------------->
<div class="messages-list" style="overflow-y:scroll;">
<ul>
@foreach($tab as $u)
<?php
    $n=0;
    $mes;
    foreach($m as $ms)
    {
        if($ms->from_id == $u->id)
        {
            if($ms->activ == 0)
            {
                $n++;
            }
            $mes = $ms;
        }
    }
?>
@if($n != 0)
<li class="active">
<a href="{{ route('show',['id' => $u->id]) }}">    
<div class="usr-msg-details">
<div class="usr-ms-img">
@if ($u->profile->image_profil == "default.pgj")
       <img src="{{asset('images/resources/user-pro-img.jpg')}}" style="border-radius:60%;" alt="">
    @else
        <img src="{{ Storage::url(u->profile->image_profil)}}" alt="">
    @endif
<span class="msg-status"></span>
</div>
<div class="usr-mg-info">
<h3>{{$u->name}}</h3>
@if($mes)
<p>{{ Str::limit($mes->content, 20)}}</p>
</div>
<span class="posted_time"> {{$mes->created_at->diffForHumans()}}</span>

    <span class="msg-notifc">{{$n}}</span>
  
</div>
@endif
</a>
</li>
@endif  
@endforeach
@foreach($tab as $u)
<?php
    $n=0;
    $mes;
    foreach($m as $ms)
    {
        if($ms->from_id == $u->id)
        {
            if($ms->activ == 0)
            {
                $n++;
            }
            $mes = $ms;
        }
        if($ms->to_id == $u->id)
        {
            $mes = $ms;
        }
    }
?>
@if($n == 0)
<li>
<a href="{{ route('show',['id' => $u->id]) }}">      
<div class="usr-msg-details">
 <div class="usr-ms-img">
@if ($u->profile->image_profil == "default.pgj")
    <img src="{{asset('images/resources/user-pro-img.jpg')}}" style="border-radius:60%;" alt="">
@else
    <img src="{{ Storage::url($u->profile->image_profil)}}" alt="">
@endif
</div>
<div class="usr-mg-info">
<h3>{{$u->name}}</h3>
@if($mes)
    <p>{{ Str::limit($mes->content, 20)}}</p>
    </div>
    <span class="posted_time">{{$mes->created_at->diffForHumans()}}</span>
    </div>
@endif    
</a>  
</li>
@endif  
@endforeach
</ul>
</div>
</div>
</div>

<!------------------------------------------------- Fin partie navbarGauche-------------------------------------->



<div class="col-lg-8 col-md-12 pd-right-none pd-left-none">
    <div class="con-title mg-3" style="border-radius: 0px; padding:29px; background-color: white;">
        <div class="usr-ms-img" >
            @if ($user->profile->image_profil == "default.pgj")
                <img src="{{asset('images/resources/user-pro-img.jpg')}}" style="border-radius:60%;" alt="">
            @else
                <img src="{{ Storage::url(Auth::user()->profile->image_profil)}}" alt="">
            @endif
            
        </div>
        <div class="usr-mg-info">
            <h3 style="color:black;">{{$user->name}}<span class="status-info"></span></h3>
        </div> 
    </div>
    <div class="chat-hist mCustomScrollbar" data-mcs-theme="dark"  style="overflow-y:scroll; height: 400px;">
        @foreach($message as $m)
            @if($m->from_id == Auth::user()->id)
                @if($m->to_id == $user->id)
                    <div class="chat-msg" style="margin-top: 20px;">
                        <p style="overflow: hidden;">{{$m->content}}</p>
                        <span>{{$m->created_at->diffForHumans()}}</span>
                    </div>
                @endif
            @else
                <!--<div class="date-nd">
                    <span>Sunday, August 24</span>
                </div>-->
                @if($m->from_id == $user->id)
                <div class="chat-msg st2">
                    <p style="overflow: hidden;">{{$m->content}}</p>
                    <span>{{$m->created_at->diffForHumans()}}</span>
                </div>
                @endif
            @endif
        @endforeach    
    </div>
    <div class="typing-msg">
        <form style="padding: 5px;" method="POST" action="{{ route('messag', ['id' => $user->id]) }}">
            @csrf
            <textarea placeholder="Envoyer votre message" name="message" style="padding: 30px;" ></textarea>
            <button type="submit"><i class="fa fa-send" style="margin-top: 10px; margin-right: 20px;"></i></button>
        </form>
        
       <!-- <ul class="ft-options">
        <li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
        <li><a href="#" title=""><i class="la la-camera"></i></a></li>
        <li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
        </ul> -->
    </div>
</div>


</div>
</section>

@endsection