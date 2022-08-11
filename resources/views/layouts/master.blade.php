<!DOCTYPE html>
<html>


<head>
<meta charset="UTF-8">
<title>BetterlyDays</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome-font-awesome.min.css')}}">
<link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('lib/slick/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('lib/slick/slick-theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
</head>
<body>
<div class="wrapper">
<header>
<div class="container">
<div class="header-data">
<div class="logo">
<a href="{{ route('posts') }}" title=""><img src="{{asset('images/logo.png')}}" alt=""></a>
</div>
<div class="search-bar">
@if(Auth::user()->type==0)    
<form action="{{ route('recherche') }}" >
    <input type="text" name="search" value=" {{request()->search ? : ''}}" placeholder="Recherche...">
    <button type="submit"><i class="la la-search"></i></button>
</form>
@else
<form action="{{ route('recherche1') }}" >
    <input type="text" name="search" value=" {{request()->search ? : ''}}" placeholder="Recherche...">
    <button type="submit"><i class="la la-search"></i></button>
</form>
@endif
</div>
<nav>
<ul>
<li>
<a href="{{ route('posts') }}" title="">
<span><img src="{{asset('images/icon1.png')}}" alt=""></span>
Accueil
</a>
</li>
<li>
@if(Auth::user()->type==0)     
    <a href="{{route('organisations')}}" title="">
    <span><img src="{{asset('images/icon2.png')}}" alt=""></span>
    <a href="{{route('organisations')}}" title="">Organisations</a>
    </a>
    </li>
@else
    <li>
    <a href="{{route('potulant')}}" title="">
    <span><img src="{{asset('images/icon4.png')}}" alt=""></span>
    Vacanciers
    </a>
    </li>
@endif
<li>
<a href="#" title="" class="not-box-openm">
<span><img src="{{asset('images/icon6.png')}}" alt="">@if($nombre>0){{$nombre}} @endif</span>
Messages
</a>
<div class="notification-box msg" id="message">
<div class="nott-list" style="overflow-y: scroll">
<!-----------------------------------notification---------------------------------------------------->
@foreach($table as $u)
    <?php
        $n=0;
        $mes;
        foreach($newmessage as $ms)
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
    <div class="conv-list active">
    <div class="usr-ms-img">
    @if ($u->profile->image_profil == "default.pgj")
        <img src="{{asset('images/resources/user-pro-img.jpg')}}" style="border-radius:60%;" alt="">
    @else
        <img src="{{ Storage::url($u->profile->image_profil)}}" alt="">
    @endif
    <span class="active-status activee"></span>
    </div>
    <a href="{{ route('show',['id' => $u->id]) }}">
    <div class="usy-info">
    <h3>{{$u->name}}</h3>
    <span>{{ Str::limit($mes->content, 20)}}</span>
    </div>
    <div>
    <span>{{$mes->created_at->diffForHumans()}}</span>
    </div>
    <span class="msg-numbers">{{$n}}</span>
    </a>
    </div>
    @endforeach
<!-----------------------------------fin notification---------------------------------------------------->
<div class="view-all-nots">
<a href="{{ route('conversation') }}" title="">Voir tous les messages</a>
</div>
</div>
</div>
</li>
<li>
<a href="#" title="" class="not-box-open">
<span><img src="{{asset('images/icon7.png')}}" alt=""> @if($t>0) {{$t}} @endif</span>
Notification
</a>
<div class="notification-box noti" id="notification">
<div class="nt-title">
</div>
<div class="nott-list" style="overflow-y: scroll">
<!-----------------------------------message---------------------------------------------------->
@foreach($notif as $n)
@if($n->user->name == Auth::user()->name)
<div class="notfication-details">
<div class="noty-user-img">
    @if ($n->user->profile->image_profil == "default.pgj")
        <img style="border-radius:40%;" src="{{asset('images/resources/user-pro-img.jpg')}}" alt="">
    @else
        <img style="border-radius:40%;" src="{{ Storage::url($n->user->profile->image_profil)}}" alt="">    
    @endif
</div>
<div class="notification-info">
<h3><a href="#" title="">{{$n->user->name}}</a>{{$n->content}} {{ Str::title($n->post->title) }}.</h3>
<br>
<span>{{ $n->created_at->diffForHumans()}}</span>
</div>
</div>
@endif
@endforeach
<!-----------------------------------fin message---------------------------------------------------->
<div class="view-all-nots">
<a href="" title="">FERMER</a>
</div>
</div>
</div>
</li>
</ul>
</nav>
<div class="menu-btn">
<a href="#" title=""><i class="fa fa-bars"></i></a>
</div>
<div class="user-account">
<div class="user-info">
    @if ($profile->image_profil == "default.pgj")
  
        <img style="width: 25px; margin: right 5px;" src="{{asset('images/resources/user-pro-img.jpg')}}" alt="">
      @else
        <img style="width: 25px; margin: right 5px;" src="{{ Storage::url($profile->image_profil)}}" alt="">    
    @endif
<a href="#" title="" style="">{{Auth::user()->name}}</a>
<i  class="la la-sort-down"></i>
</div>
<div class="user-account-settingss" id="users">
<h3 class="tc"><form method="POST" action="{{ route('logout') }}">
    @csrf
        <x-dropdown-link :href="route('logout')"
           onclick="event.preventDefault();
                this.closest('form').submit();">
                   {{ __('Deconnecter') }}
        </x-dropdown-link>
 </form>
</h3>
</div>
</div>
</div>
</div>
</header>

@yield("contenu")


<div class="overview-box" id="create-portfolio">
<div class="overview-edit">
<h3>Create Portfolio</h3>
<form>
<input type="text" name="pf-name" placeholder="Portfolio Name">
<div class="file-submit">
<input type="file" name="file">
</div>
<div class="pf-img">
<img src="images/resources/np.png" alt="">
</div>
<input type="text" name="website-url" placeholder="htp://www.example.com">
<button type="submit" class="save">Save</button>
<button type="submit" class="cancel">Cancel</button>
</form>
<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
</div>
</div>
</div>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
</body>

<!-- Mirrored from gambolthemes.net/workwise-new/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 May 2022 16:26:21 GMT -->
</html>
