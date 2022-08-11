
<!DOCTYPE html>
<html>

<!-- Mirrored from gambolthemes.net/workwise-new/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 May 2022 16:26:35 GMT -->
<head>
<meta charset="UTF-8">
<title> BetterliDays</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>
<body class="sign-in">
<div class="wrapper">
<div class="sign-in-page">
<div class="signin-popup">
<div class="signin-pop">
<div class="row">
<div class="col-lg-6">
<div class="cmp-info">
<div class="cm-logo">
<img src="images/logo1.jpg" alt="">
<p>BetterliDays,est une plateforme mondiale de travail independant et de reseautage ou une organisation et les vaccanciers proffessinels collabore a distance</p>
</div>
<img src="images/cm-main-img.png" alt="">
</div>
</div>
<div class="col-lg-6">
<div class="login-sec">
<ul class="sign-control">
<li data-tab="tab-1" class="current"><a href="#" title="">Connexion</a></li>
<li data-tab="tab-2"><a href="#" title="">S'inscrire</a></li>
</ul>
<div class="sign_in_sec current" id="tab-1">
<h3>connexion</h3>
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />
        <br>
        <br>
        <br>
        <div class="text-danger">
          <!-- Validation Errors -->
          <x-auth-validation-errors class="mb-4" :errors="$errors" />
        </div>
<form action="{{ route('login') }}" method="post" >
@csrf
<div class="row">
<div class="col-lg-12 no-pdd">
<div class="sn-field">
<input type="text" name="email" id="email" placeholder="email" required autofocus>
<i class="la la-user"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="sn-field">
<input type="password" name="password" id="password" placeholder="Mot de passe" required autocomplete="current-password">
<i class="la la-lock"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="checky-sec">
<div class="fgt-sec">
<input type="checkbox" name="remember" id="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
<label for="remember" class="inline-flex items-center">
<span></span>
</label>
<small>Se Souvenir de moi</small>
</div>
<a href="{{ route('password.request') }}" title="">Mot de passe oublié?</a>
</div>
</div>
<div class="col-lg-12 no-pdd">
<button type="submit" value="submit">Connexion</button>
</div>
</div>
</form>

</div>
<div class="sign_in_sec" id="tab-2">
<div class="signup-tab">


<ul>
<li data-tab="tab-3" class="current"><a href="#" title="">vaccanciers</a></li>
<li data-tab="tab-4"><a href="#" title="">Organisation</a></li>
</ul>
</div>
<div class="dff-tab current" id="tab-3">
<form method="POST" action="{{ route('register') }}">
@csrf
<div class="row">
<div class="col-lg-12 no-pdd">
<div class="sn-field"> 
<input type="text" name="name" id="name" placeholder="Nom utilisateur">
<i class="la la-user"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="sn-field">
<input type="email" name="email" id="email" placeholder="Adress mail">
<i class="la la-globe"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">

</div>
<div class="col-lg-12 no-pdd">
<div class="sn-field">
<input type="password" name="password" id="password" placeholder="Mot de Passe" required autocomplete="new-password">
<i class="la la-lock"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="sn-field">
<input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmer le Mot de Passe" name="password_confirmation" required>
<i class="la la-lock"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="checky-sec st2">
<div class="fgt-sec">
<input type="checkbox" name="cc" id="c2">
<label for="c2">
<span></span>
</label>
<small>Oui, Je comprend et j'accepte les Conditions d'utilisation de BetterliDays</small>
</div>
</div>
</div>
<div class="col-lg-12 no-pdd">
<button type="submit" value="submit">Creer</button>
</div>
</div>
</form>
</div>
<div class="dff-tab" id="tab-4">
<form method="POST" action="{{ route('register1') }}">
@csrf
<div class="row">
<div class="col-lg-12 no-pdd">
<div class="sn-field">
<input type="text" name="name" id="name" placeholder="Nom de l'Organisation">
<i class="la la-building"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="sn-field">
<input type="email" name="email" id="email" placeholder="Adresse Mail">
<i class="la la-globe"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="sn-field">
<input type="password" name="password" id="password" placeholder="Mot de Passe">
<i class="la la-lock"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="sn-field">
<input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmer le Mot de Passe">
<i class="la la-lock"></i>
</div>
</div>
<div class="col-lg-12 no-pdd">
<div class="checky-sec st2">
<div class="fgt-sec">
<input type="checkbox" name="cc" id="c3">
<label for="c3">
<span></span>
</label>
<small>Oui, Je comprend et j'accepte les Conditions d'utilisation de BetterliDays</small>
</div>
</div>
</div>
<div class="col-lg-12 no-pdd">
<button type="submit" value="submit">Connexion</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="footy-sec">
<div class="container">

<p><img src="images/copy-icon.png" alt="">Copyright Projet academique 2021/2022</p>
</div>
</div>
</div>
</div>
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>

<!-- Mirrored from gambolthemes.net/workwise-new/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 May 2022 16:26:38 GMT -->
</html>