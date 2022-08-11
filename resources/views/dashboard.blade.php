<!DOCTYPE html>
<html>


<head>
<meta charset="UTF-8">
<title>BetterlyDays</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>
<body>
<div class="wrapper">
<header>
<div class="container">
<div class="header-data">
<div class="logo">
<a href="{{ route('posts') }}" title=""><img src="images/logo.png" alt=""></a>
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
<span><img src="images/icon1.png" alt=""></span>
Accueil
</a>
</li>
<li>
@if(Auth::user()->type==0)     
    <a href="{{route('organisations')}}" title="">
    <span><img src="images/icon2.png" alt=""></span>
    <a href="{{route('organisations')}}" title="">Organisations</a>
    </a>
    </li>
@else
    <li>
    <a href="{{route('potulant')}}" title="">
    <span><img src="images/icon4.png" alt=""></span>
    Vacanciers
    </a>
    </li>
@endif
<li>
<a href="#" title="" class="not-box-openm">
<span><img src="images/icon6.png" alt="">@if($nombre>0){{$nombre}} @endif</span>
Messages
</a>
<div class="notification-box msg" id="message">
<div class="nott-list" style="overflow-y: scroll">
<!-----------------------------------notification---------------------------------------------------->
@foreach($tab as $u)
    <?php
        $n=0;
        $mes;
        foreach($message as $ms)
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
    <div style="margin-top:10px">
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
<span><img src="images/icon7.png" alt=""> @if($t>0) {{$t}} @endif</span>
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
        <img style="border-radius:40%;" src="images/resources/user-pro-img.jpg" alt="">
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
  
        <img style="width: 25px; margin: right 5px;" src="images/resources/user-pro-img.jpg" alt="">
      @else
        <img style="width: 25px; margin: right 5px;" src="{{ Storage::url($profile->image_profil)}}" alt="">    
    @endif
<a href="#" title="" style="margin-left:7px">{{Auth::user()->name}}</a>
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
<main>
<div class="main-section">
<div class="container">
<div class="main-section-data">
<div class="row">
<div class="col-lg-3 col-md-4 pd-left-none no-pd">
<div class="main-left-sidebar no-margin">
<div class="user-data full-width">
<div class="user-profile">
<div class="username-dt">
<div class="usr-pic">
@if ($profile->image_profil == "default.pgj")
    <img src="images/resources/user-pro-img.jpg" alt="">
@else
    <img src="{{ Storage::url($profile->image_profil)}}" alt="">
@endif
</div>
</div>
<div class="user-specs">
<h3>{{Auth::user()->name}}</h3>
@if (Auth::user()->type == 0) 
    <span>Vacancier</span>
@else
    <span>Organisation<span>
@endif
</div>
</div>
<ul class="user-fw-status">
<li>
<h4>Nombre de Post</h4>
<span>{{$p}}</span>
</li>
<li>
@if (Auth::user()->type == 0) 
    <a href="{{ route('my_profile') }}" title="">Voir le Profil</a>
@else
    <a href="{{ route('my_profile') }}" title="">Voir le Profil</a>
@endif
</li>
</ul>
</div>
<!--<div class="suggestions full-width">
<div class="sd-title">
<h3>Liste des organisations </h3>
<i class="la la-ellipsis-v"></i>
</div>
<div class="suggestions-list">
<div class="suggestion-usd">
<img src="images/resources/s1.png" alt="">
<div class="sgt-text">
<h4>Jessica William</h4>
<span>Graphic Designer</span>
</div>
<span><a href="#"><i class="la la-envelope"></i></a></span>
</div>
<div class="suggestion-usd">

<div class="sgt-text">

</div>

</div>
<div class="suggestion-usd">

<div class="sgt-text">

</div>

</div>
<div class="suggestion-usd">

<div class="sgt-text">

</div>

</div>
<div class="suggestion-usd">

<div class="sgt-text">

</div>

</div>
<div class="suggestion-usd">

<div class="sgt-text">

</div>

</div>

</div>
</div>-->
<div class="tags-sec full-width">

<div class="cp-sec">
<img src="images/logo1.jpg" alt="">
<p><img src="images/cp.png" alt="">Copyright Projet accademique 2021/2022</p>
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-8 no-pd">
<div class="main-ws-sec">
<div class="post-topbar">
<div class="user-picy">
    @if ($profile->image_profil == "default.pgj")
        <img style="border-radius:40%;" src="images/resources/user-pro-img.jpg" alt="">
    @else
        <img style="border-radius:40%;" src="{{ Storage::url($profile->image_profil)}}" alt="">
    @endif
</div>
<div>
    <!--<h3>{{Auth::user()->name}}</h3>-->
</div>    
<div class="post-st">
<ul>
<li><a class="post-jb active" href="#" title="">Creer un post</a></li>
</ul>
</div>
</div>

<!-- DEbut des profits Organisation -->
<div class="top-profiles">
    <div class="pf-hd">
    <h3>quelque Profiles</h3>
    <i class="la la-ellipsis-v"></i>
    </div>
    <div class="profiles-slider">
    @if(Auth::user()->type == 0)     
    @if ($compte->count() > 0)
        @foreach($compte as $c)
        @if($c->user->type == 1)
        <div class="user-profy">
        @if ($c->image_profil == "default.pgj")
            <img style="border-radius:50%;" src="images/resources/user-pro-img.jpg" alt="">
        @else
            <img src="{{ Storage::url($c->image_profil)}}" alt="">
        @endif
        <h3>{{ $c->user->name}}</h3>
        <span>{{$c->comptence}}</span>
        <a href="{{ route('profile',['id' => $c->id]) }}" title=""> Voir le  Profil</a>
        </div>
        @endif
        @endforeach
    @else
    <div class="profiles-slider">
    <div class="user-profy">
     <img src="images/logo.png" alt="">
    <h3>BetterliDay</h3>
    <span>Développeur</span>
    <a href="{{ route('my_organisation') }}" title="">Voir le  Profil </a>
    </div>
    @endif    
    @endif
    
    @if(Auth::user()->type == 1) 
    @if ($compte->count() > 0)
        @foreach($compte as $c)
        @if($c->user->type == 0)
        <div class="user-profy">
        @if ($c->image_profil == "default.pgj")
            <img style="border-radius:50%;" src="images/resources/user-pro-img.jpg" alt="">
        @else
            <img src="{{ Storage::url($c->image_profil)}}" alt="">
        @endif
        <h3>{{ $c->user->name}}</h3>
        <span>{{$c->comptence}}</span>
        <a href="{{ route('profile',['id' => $c->id]) }}" title=""> Voir le  Profil</a>
        </div>
        @endif
        @endforeach
    @else
    <div class="profiles-slider">
    <div class="user-profy">
     <img src="images/logo.png" alt="">
    <h3>BetterliDay</h3>
    <span>Développeur</span>
    <a href="{{ route('my_organisation') }}" title="">Voir le  Profil</a>
    </div>
    @endif 
    @endif   
   
    
    
    </div>
</div>
<!-- Fin du profils-->
<div class="posts-section">

@if (Auth::user()->type == 0)
    @if ($posts->count() > 0)
        @foreach($posts as $post)
        @if($post->statu == "publicton")
            @if ($post->user->type == 1)
                <div class="post-bar">
                <div class="post_topbar">
                <div class="usy-dt">
                <div class="user-picy">
                    @if ($post->user->profile->image_profil == "default.pgj")
                        <img style="border-radius:60%;" src="images/resources/user-pro-img.jpg" alt="">
                    @else
                        <img src="{{ Storage::url($post->user->profile->image_profil)}}" alt="">
                    @endif
                </div>
                <div class="usy-name">
                <h3>{{ $post->user->name}}</h3>
                <span><img src="images/clock.png" alt="">{{ $post->created_at->format('d M Y')}}</span>
                </div>
                </div>
                <div class="ed-opts">
                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                <ul class="ed-options">
                <li><a href="#" title="">telecharger</a></li>
                </ul>
                </div>
                </div>
                <div class="epi-sec">
                <ul class="descp">
                <li><img src="images/icon8.png" alt=""><span>recherche d'un</span></li>
                <li><span class="bid_now" style="color: white;">{{ $post->competence}}</span></li>
                <li><img src="images/icon9.png" alt=""><span>qui sera en vaccance au <p class="bid_now">{{ $post->pays}}</p></span></li>
                </ul>
                <ul class="job-dt">
                    <li><p>{{ $post->date_debut}}</p></li>
                    <li><p>{{ $post->date_fin}}</p></li>
                    <li><span>{{ $post->prix}} FCFA</span></li>
                </ul>
                </div>
                <div class="job_descp">
                <h3> {{ Str::title($post->title) }}</h3>
                <!--IMage du post-->
                @if ($post->image != 'aucun')
                    <img class="imgpos" src="{{ Storage::url($post->image)}}">
                @endif
                </div>

                <p class="debordement">{{ Str::limit($post->content, 120)}}</p>

                <div class="job-status-bar">
                <a href="{{ route('postuler', ['id' => $post->id] )}}" class="com"><button> Postuler </button></a>

                </ul>
                </div>
                </div>
                <!-- Fin post-->
            @endif
            @endif
        @endforeach
    @else
        <span>aucun post en base de donnees</span>
    @endif  
@else
    @if ($posts->count() > 0)
        @foreach($posts as $post)
            @if ($post->user->type == 0)
                <div class="post-bar">
                <div class="post_topbar">
                <div class="usy-dt">
                <img src="images/resources/us-pic.png" alt="">
                <div class="usy-name">
                <h3>{{ $post->user->name}}</h3>
                <span><img src="images/clock.png" alt="">{{ $post->created_at->format('d M Y')}}</span>
                </div>
                </div>
                <div class="ed-opts">
                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                <ul class="ed-options">
                <li><a href="#" title="">telecharger</a></li>
                </ul>
                </div>
                </div>
                <div class="epi-sec">
                <ul class="descp">
                <li><img src="images/icon8.png" alt=""><span class="bid_now" style="color: white;">{{ $post->competence}}</span></li>
                <li><img src="images/icon9.png" alt=""><span>Sera en vaccance au <p class="bid_now">{{ $post->pays}}</p></span></li>
                </ul>
                <ul class="job-dt">
                    <li><p>{{ $post->date_debut}}</p></li>
                    <li><p>{{ $post->date_fin}}</p></li>
                    <li><span>{{ $post->prix}} FCFA</span></li>
                </ul>
                </div>
                <div class="job_descp">
                <h3>{{ Str::title($post->title) }}</h3>
                <!--IMage du post-->
                @if ($post->image != 'aucun')
                    <img class="imgpos" src="{{ Storage::url($post->image)}}">
                @endif
                </div>

                <p class="debordement">{{ Str::limit($post->content, 120)}}</p>

                <div class="job-status-bar">
                <a href="#" class="com"><button> Message </button></a>

                </ul>
                </div>
                </div>
                <!-- Fin post-->
            @endif
        @endforeach
    @else
        <span>aucun post en base de donnees</span>
    @endif
@endif      


<div class="process-comm">
<div class="spinner">
<div class="bounce1"></div>
<div class="bounce2"></div>
<div class="bounce3"></div>
</div>
</div>
</div>
</div>
</div>



<div class="col-lg-3 pd-right-none no-pd">
<div class="right-sidebar">
<div class="widget widget-about">
<img src="images/logo.png" alt="">
<h3>Suivi des offres sur BetterliDays</h3>
<span>Le travail est la seul chose qu'on ne peut s'empecher de faire meme ci on n'a evi d'arreter de le faire</span>
<div class="sign_link">
<h3>Agreable Sejour</h3>
<a href="{{route('about')}}" title="">En savoir plus sur BetterliDays</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
<div class="post-popup job_post">
<div class="post-project">
<h3>creer un Poste</h3>
<div class="post-project-fields">
<form method="POST" action="{{ route('post') }}" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-lg-12">
<input type="text" name="title" placeholder="Titre" required>
</div>
<div class="col-lg-12">
    <input type="text" name="competence" placeholder="Quel est votre competence" required>
    </div>
<div class="col-lg-12">
<input type="file" name="avatar" placeholder="Entrer l'image a poster">
</div>
<div class="col-lg-6">
<div class="price-br">
<input type="text" name="prix" placeholder="Prix" required>
<i class="la la-dollar"></i>
</div>
</div>
<div class="col-lg-6">
<div class="inp-field">
    <select name="pays">
        <option value="France" selected="selected">France </option>
        
        <option value="Afghanistan">Afghanistan </option>
        <option value="Afrique_Centrale">Afrique_Centrale </option>
        <option value="Afrique_du_sud">Afrique_du_Sud </option>
        <option value="Albanie">Albanie </option>
        <option value="Algerie">Algerie </option>
        <option value="Allemagne">Allemagne </option>
        <option value="Andorre">Andorre </option>
        <option value="Angola">Angola </option>
        <option value="Anguilla">Anguilla </option>
        <option value="Arabie_Saoudite">Arabie_Saoudite </option>
        <option value="Argentine">Argentine </option>
        <option value="Armenie">Armenie </option>
        <option value="Australie">Australie </option>
        <option value="Autriche">Autriche </option>
        <option value="Azerbaidjan">Azerbaidjan </option>
        
        <option value="Bahamas">Bahamas </option>
        <option value="Bangladesh">Bangladesh </option>
        <option value="Barbade">Barbade </option>
        <option value="Bahrein">Bahrein </option>
        <option value="Belgique">Belgique </option>
        <option value="Belize">Belize </option>
        <option value="Benin">Benin </option>
        <option value="Bermudes">Bermudes </option>
        <option value="Bielorussie">Bielorussie </option>
        <option value="Bolivie">Bolivie </option>
        <option value="Botswana">Botswana </option>
        <option value="Bhoutan">Bhoutan </option>
        <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
        <option value="Bresil">Bresil </option>
        <option value="Brunei">Brunei </option>
        <option value="Bulgarie">Bulgarie </option>
        <option value="Burkina_Faso">Burkina_Faso </option>
        <option value="Burundi">Burundi </option>
        
        <option value="Caiman">Caiman </option>
        <option value="Cambodge">Cambodge </option>
        <option value="Cameroun">Cameroun </option>
        <option value="Canada">Canada </option>
        <option value="Canaries">Canaries </option>
        <option value="Cap_vert">Cap_Vert </option>
        <option value="Chili">Chili </option>
        <option value="Chine">Chine </option>
        <option value="Chypre">Chypre </option>
        <option value="Colombie">Colombie </option>
        <option value="Comores">Colombie </option>
        <option value="Congo">Congo </option>
        <option value="Congo_democratique">Congo_democratique </option>
        <option value="Cook">Cook </option>
        <option value="Coree_du_Nord">Coree_du_Nord </option>
        <option value="Coree_du_Sud">Coree_du_Sud </option>
        <option value="Costa_Rica">Costa_Rica </option>
        <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
        <option value="Croatie">Croatie </option>
        <option value="Cuba">Cuba </option>
        
        <option value="Danemark">Danemark </option>
        <option value="Djibouti">Djibouti </option>
        <option value="Dominique">Dominique </option>
        
        <option value="Egypte">Egypte </option>
        <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
        <option value="Equateur">Equateur </option>
        <option value="Erythree">Erythree </option>
        <option value="Espagne">Espagne </option>
        <option value="Estonie">Estonie </option>
        <option value="Etats_Unis">Etats_Unis </option>
        <option value="Ethiopie">Ethiopie </option>
        
        <option value="Falkland">Falkland </option>
        <option value="Feroe">Feroe </option>
        <option value="Fidji">Fidji </option>
        <option value="Finlande">Finlande </option>
        <option value="France">France </option>
        
        <option value="Gabon">Gabon </option>
        <option value="Gambie">Gambie </option>
        <option value="Georgie">Georgie </option>
        <option value="Ghana">Ghana </option>
        <option value="Gibraltar">Gibraltar </option>
        <option value="Grece">Grece </option>
        <option value="Grenade">Grenade </option>
        <option value="Groenland">Groenland </option>
        <option value="Guadeloupe">Guadeloupe </option>
        <option value="Guam">Guam </option>
        <option value="Guatemala">Guatemala</option>
        <option value="Guernesey">Guernesey </option>
        <option value="Guinee">Guinee </option>
        <option value="Guinee_Bissau">Guinee_Bissau </option>
        <option value="Guinee equatoriale">Guinee_Equatoriale </option>
        <option value="Guyana">Guyana </option>
        <option value="Guyane_Francaise ">Guyane_Francaise </option>
        
        <option value="Haiti">Haiti </option>
        <option value="Hawaii">Hawaii </option>
        <option value="Honduras">Honduras </option>
        <option value="Hong_Kong">Hong_Kong </option>
        <option value="Hongrie">Hongrie </option>
        
        <option value="Inde">Inde </option>
        <option value="Indonesie">Indonesie </option>
        <option value="Iran">Iran </option>
        <option value="Iraq">Iraq </option>
        <option value="Irlande">Irlande </option>
        <option value="Islande">Islande </option>
        <option value="Israel">Israel </option>
        <option value="Italie">italie </option>
        
        <option value="Jamaique">Jamaique </option>
        <option value="Jan Mayen">Jan Mayen </option>
        <option value="Japon">Japon </option>
        <option value="Jersey">Jersey </option>
        <option value="Jordanie">Jordanie </option>
        
        <option value="Kazakhstan">Kazakhstan </option>
        <option value="Kenya">Kenya </option>
        <option value="Kirghizstan">Kirghizistan </option>
        <option value="Kiribati">Kiribati </option>
        <option value="Koweit">Koweit </option>
        
        <option value="Laos">Laos </option>
        <option value="Lesotho">Lesotho </option>
        <option value="Lettonie">Lettonie </option>
        <option value="Liban">Liban </option>
        <option value="Liberia">Liberia </option>
        <option value="Liechtenstein">Liechtenstein </option>
        <option value="Lituanie">Lituanie </option>
        <option value="Luxembourg">Luxembourg </option>
        <option value="Lybie">Lybie </option>
        
        <option value="Macao">Macao </option>
        <option value="Macedoine">Macedoine </option>
        <option value="Madagascar">Madagascar </option>
        <option value="Madère">Madère </option>
        <option value="Malaisie">Malaisie </option>
        <option value="Malawi">Malawi </option>
        <option value="Maldives">Maldives </option>
        <option value="Mali">Mali </option>
        <option value="Malte">Malte </option>
        <option value="Man">Man </option>
        <option value="Mariannes du Nord">Mariannes du Nord </option>
        <option value="Maroc">Maroc </option>
        <option value="Marshall">Marshall </option>
        <option value="Martinique">Martinique </option>
        <option value="Maurice">Maurice </option>
        <option value="Mauritanie">Mauritanie </option>
        <option value="Mayotte">Mayotte </option>
        <option value="Mexique">Mexique </option>
        <option value="Micronesie">Micronesie </option>
        <option value="Midway">Midway </option>
        <option value="Moldavie">Moldavie </option>
        <option value="Monaco">Monaco </option>
        <option value="Mongolie">Mongolie </option>
        <option value="Montserrat">Montserrat </option>
        <option value="Mozambique">Mozambique </option>
        
        <option value="Namibie">Namibie </option>
        <option value="Nauru">Nauru </option>
        <option value="Nepal">Nepal </option>
        <option value="Nicaragua">Nicaragua </option>
        <option value="Niger">Niger </option>
        <option value="Nigeria">Nigeria </option>
        <option value="Niue">Niue </option>
        <option value="Norfolk">Norfolk </option>
        <option value="Norvege">Norvege </option>
        <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
        <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>
        
        <option value="Oman">Oman </option>
        <option value="Ouganda">Ouganda </option>
        <option value="Ouzbekistan">Ouzbekistan </option>
        
        <option value="Pakistan">Pakistan </option>
        <option value="Palau">Palau </option>
        <option value="Palestine">Palestine </option>
        <option value="Panama">Panama </option>
        <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
        <option value="Paraguay">Paraguay </option>
        <option value="Pays_Bas">Pays_Bas </option>
        <option value="Perou">Perou </option>
        <option value="Philippines">Philippines </option>
        <option value="Pologne">Pologne </option>
        <option value="Polynesie">Polynesie </option>
        <option value="Porto_Rico">Porto_Rico </option>
        <option value="Portugal">Portugal </option>
        
        <option value="Qatar">Qatar </option>
        
        <option value="Republique_Dominicaine">Republique_Dominicaine </option>
        <option value="Republique_Tcheque">Republique_Tcheque </option>
        <option value="Reunion">Reunion </option>
        <option value="Roumanie">Roumanie </option>
        <option value="Royaume_Uni">Royaume_Uni </option>
        <option value="Russie">Russie </option>
        <option value="Rwanda">Rwanda </option>
        
        <option value="Sahara Occidental">Sahara Occidental </option>
        <option value="Sainte_Lucie">Sainte_Lucie </option>
        <option value="Saint_Marin">Saint_Marin </option>
        <option value="Salomon">Salomon </option>
        <option value="Salvador">Salvador </option>
        <option value="Samoa_Occidentales">Samoa_Occidentales</option>
        <option value="Samoa_Americaine">Samoa_Americaine </option>
        <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
        <option value="Senegal">Senegal </option>
        <option value="Seychelles">Seychelles </option>
        <option value="Sierra Leone">Sierra Leone </option>
        <option value="Singapour">Singapour </option>
        <option value="Slovaquie">Slovaquie </option>
        <option value="Slovenie">Slovenie</option>
        <option value="Somalie">Somalie </option>
        <option value="Soudan">Soudan </option>
        <option value="Sri_Lanka">Sri_Lanka </option>
        <option value="Suede">Suede </option>
        <option value="Suisse">Suisse </option>
        <option value="Surinam">Surinam </option>
        <option value="Swaziland">Swaziland </option>
        <option value="Syrie">Syrie </option>
        
        <option value="Tadjikistan">Tadjikistan </option>
        <option value="Taiwan">Taiwan </option>
        <option value="Tonga">Tonga </option>
        <option value="Tanzanie">Tanzanie </option>
        <option value="Tchad">Tchad </option>
        <option value="Thailande">Thailande </option>
        <option value="Tibet">Tibet </option>
        <option value="Timor_Oriental">Timor_Oriental </option>
        <option value="Togo">Togo </option>
        <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
        <option value="Tristan da cunha">Tristan de cuncha </option>
        <option value="Tunisie">Tunisie </option>
        <option value="Turkmenistan">Turmenistan </option>
        <option value="Turquie">Turquie </option>
        
        <option value="Ukraine">Ukraine </option>
        <option value="Uruguay">Uruguay </option>
        
        <option value="Vanuatu">Vanuatu </option>
        <option value="Vatican">Vatican </option>
        <option value="Venezuela">Venezuela </option>
        <option value="Vierges_Americaines">Vierges_Americaines </option>
        <option value="Vierges_Britanniques">Vierges_Britanniques </option>
        <option value="Vietnam">Vietnam </option>
        
        <option value="Wake">Wake </option>
        <option value="Wallis et Futuma">Wallis et Futuma </option>
        
        <option value="Yemen">Yemen </option>
        <option value="Yougoslavie">Yougoslavie </option>
        
        <option value="Zambie">Zambie </option>
        <option value="Zimbabwe">Zimbabwe </option>
        
        </select>
</div>
</div>
<div class="col-lg-6">
    <div class="price-br">
    <p>Date de Debut</p>
    <input type="date" name="date_debut" required>
    </div>
    </div>
    <div class="col-lg-6">
    <div class="inp-field">
    <p>Date Fin</p>
    <input type="date" name="date_fin" required>
    </div>
    </div>
<div class="col-lg-12">
<textarea name="content" placeholder="Description" required></textarea>
</div>
<div class="col-lg-12">
<ul>
<li><button class="active" value="post">Post</button></li>
<li><a href="#" title="">Cancel</a></li>
</ul>
</div>
</div>
</form>
</div>
<a href="#" title=""><i class="la la-times-circle-o"></i></a>
</div>
</div>
<div class="chatbox-list">
@foreach($tab as $u)
<?php
        $n=0;
        $mes;
        foreach($message as $ms)
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
<div class="chatbox">
    <div class="chat-mg">
        <a href="{{ route('ajour', ['id' => $u->id]) }}" title="">
            @if ($u->profile->image_profil == "default.pgj")            
                <img src="{{asset('images/resources/user-pro-img.jpg')}}" style="border-radius:60%;" alt="">
            @else
                <img src="{{ Storage::url($u->profile->image_profil)}}" alt="">
            @endif
        </a>
        <span>{{$n}}</span>
    </div>
    <div class="conversation-box">
        <div class="con-title mg-3">
            <div class="chat-user-info">
                <div class="usr-ms-img">
                    @if ($u->profile->image_profil == "default.pgj")
                        <img src="{{asset('images/resources/user-pro-img.jpg')}}" style="border-radius:60%;" alt="">
                    @else
                        <img src="{{ Storage::url($u->profile->image_profil)}}" alt="">
                    @endif
                </div>
                <h3>{{$u->name}} <span class="status-info"></span></h3>
            </div>
            <div class="st-icons">
                <a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
                <a href="{{ route('ajour', ['id' => $u->id]) }}" title="" ><i class="la la-spinner"></i></a>
            </div>
        </div>
        <div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
            @foreach($mmmm as $m)
                @if($m->from_id == Auth::user()->id)
                    @if($m->to_id == $u->id)
                    <div class="chat-msg">
                        <p>{{$m->content}}</p>
                        <span>{{$m->created_at->diffForHumans()}}</span>
                    </div>
                    @endif
                @else
                    @if($m->from_id == $u->id)
                        <div class="chat-msg st2">
                            <p>{{$m->content}}</p>
                            <span>{{$m->created_at->diffForHumans()}}</span>
                        </div>
                    @endif
                @endif
            @endforeach    
        </div>
        <div class="typing-msg">
            <form method="POST" action="{{ route('messag', ['id' => $u->id]) }}">
                @csrf
                <textarea placeholder="Type a message here" name="message" ></textarea>
                <button type="submit"><i class="fa fa-send"></i></button>
            </form>
        <!--    <ul class="ft-options">
                <li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
                <li><a href="#" title=""><i class="la la-camera"></i></a></li>
                <li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
            </ul>-->
        </div>
    </div>
</div>
@endforeach
<div class="chatbox">
<div class="chat-mg bx">
<a href="#" title=""><img src="images/chat.png" alt=""></a>
<span></span>
<span>@if($nombre>0){{$nombre}}@endif</span>
</div>
<div class="conversation-box">
<div class="con-title">
<h3>Messages</h3>
<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
</div>
<div class="chat-list">
    @foreach($tab as $u)
    <?php
        $n=0;
        $mes;
        foreach($message as $ms)
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
    <div class="ct-time">
    <span>{{$mes->created_at->diffForHumans()}}</span>
    </div>
    <span class="msg-numbers">{{$n}}</span>
    </a>
    </div>
    @endforeach
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>

<!-- Mirrored from gambolthemes.net/workwise-new/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 May 2022 16:25:54 GMT -->
</html>