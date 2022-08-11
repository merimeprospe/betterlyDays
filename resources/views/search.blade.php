@extends("layouts.master")

@section("contenu")

<section class="companies-info">
@if(Auth::user()->type == 0)    
<div class="container">
<div class="company-title">
<h3>  vacancier </h3>
</div>
<div class="companies-list">
<div class="row">
@foreach($users as $u)   
<div class="col-lg-3 col-md-4 col-sm-6 col-12">
<div class="company_profile_info">
<div class="company-up-info">
@if ($u->profile->image_profil == "default.pgj")
    <img style="border-radius:60%;" src="images/resources/user-pro-img.jpg" alt="">
@else
    <img src="{{ Storage::url($u->profile->image_profil)}}" alt="">
@endif
<h3>{{$u->name}}</h3>
<h4>{{$u->profile->comptence}}</h4>
<ul>
<li><a href="{{ route('show',['id' => $u->profile->id]) }}" title="" class="hire-us">Message</a></li>
</ul>
</div>
<a href="{{ route('profile',['id' => $u->profile->id]) }}" title="" class="view-more-pro">View Profile</a>
</div>
</div>
@endforeach
</div>
</div>
<div class="process-comm">
<div class="spinner">
<div class="bounce1"></div>
<div class="bounce2"></div>
<div class="bounce3"></div>
</div>
</div>
</div>
@else
<div class="container">
<div class="company-title">
<h3>  organisations </h3>
</div>
<div class="companies-list">
<div class="row">
@foreach($users as $u)   
<div class="col-lg-3 col-md-4 col-sm-6 col-12">
<div class="company_profile_info">
<div class="company-up-info">
@if ($u->profile->image_profil == "default.pgj")
    <img style="border-radius:60%;" src="images/resources/user-pro-img.jpg" alt="">
@else
    <img src="{{ Storage::url($u->profile->image_profil)}}" alt="">
@endif
<h3>{{$u->name}}</h3>
<h4>{{$u->profile->comptence}}</h4>
<ul>
<li><a href="{{ route('show',['id' => $u->profile->id]) }}" title="" class="hire-us">Message</a></li>
</ul>
</div>
<a href="{{ route('profile',['id' => $u->profile->id]) }}" title="" class="view-more-pro">View Profile</a>
</div>
</div>
@endforeach
</div>
</div>
<div class="process-comm">
<div class="spinner">
<div class="bounce1"></div>
<div class="bounce2"></div>
<div class="bounce3"></div>
</div>
</div>
</div>
@endif
</section>
@endsection