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
<span class="posted_time">{{$mes->created_at->diffForHumans()}}</span>

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



<div class="col-lg-8 col-md-12 pd-right-none pd-left-none" style="height: 300px;">
    <div class="con-title mg-3" style="border-radius: 0px; padding:29px; background-color: white;">
        <div class="message-bar-head">
            <div class="usr-msg-details">
                <div class="usr-ms-img">
                    <img src="{{asset('images/logo.png')}}" alt="">
                </div>
                <div class="usr-mg-info">
                    <h3>BetterliDays</h3>
                </div>
            </div>
            
        </div>
        <div class="messages-line" style="background-image: url({{asset('images/fondelamessagerie.jpg')}}); background-repeat: no-repeat; margin-top: 100px;">
            
        </div>
    </div>
<div class="message-send-area">
</div>
</div>
</div>
</div>
</div>
</div>
</section>
@endsection