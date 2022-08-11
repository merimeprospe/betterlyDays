@extends("layouts.master")

@section("contenu")
<!----------------------------------------- MAIN --------------------------------------------->
<section class="cover-sec">
@if ($profile->font_profil == "aucun")
    <img src="images/resources/cover-img.jpg" alt="">
@else
    <img style="max-width: 100%; height: 400px;" src="{{ Storage::url($profile->font_profil)}}" alt="">
@endif
<div class="add-pic-box">
<div class="container">
<div class="row no-gutters">
<form  method="POST" action="{{ route('font') }}" enctype="multipart/form-data">
@csrf   
<input type="file" id="file" style="margin-left: 10px;" name="avatar" required >
<label for="file"><i class="fas fa-camera" name="avatar"  ></i></label>
<button class="active" type="submit" value="post" style="font-size: 20px;">Changer</button></li>
</form>
</div>
</div>
</div>
</div>
</section>
<main>
<div class="main-section">
<div class="container">
<div class="main-section-data">
<div class="row">
<div class="col-lg-3">
<div class="main-left-sidebar">
<div class="user_profile">
<div class="user-pro-img">
@if ($profile->image_profil == "default.pgj")
    <img src="images/resources/user-pro-img.jpg" alt="">
@else
    <img src="{{ Storage::url($profile->image_profil)}}" alt="">
@endif
<div  id="OpenImgUpload">
<form  style="display: flex;"  method="POST" action="{{ route('image_p') }}" enctype="multipart/form-data" >
@csrf
<input type="file" id="file" name="avatar1" required>
<button class="active" type="submit" value="post" style="margin-left: 10px;">Changer</button></li>
</form>
</div>
</div>
<div class="user_pro_status">
<ul class="flw-status">
<li>
<span>Nombere De Post</span>
<b>{{$p}}</b>
</li>

</ul>
</div>

</div>


<!---------------------------------Competence---------------------------------------->
@if(Auth::user()->type==0) 
<div class="suggestions full-width">
<div class="sd-title">
<h3>Competence</h3>
<i class="la la-ellipsis-v"></i>
</div>
<div class="suggestions-list">

<div class="suggestion-usd">

<div class="sgt-text">
<h4>Ajouter une competence</h4>

</div>

<span><a href="#open"  rel="nofollow" title=""><i class="la la-plus"></i>
<div id="open" class="modalBox">
    <div>
        <p><a class="close" title="Fermer" href="#close" rel="nofollow">X</a></p>
        <h1 style="margin-bottom: 10px;">Competence</h1>
        <h2 style="margin-bottom: 20px;">Veuiller entrer une Competence</h2>
        <form method="POST" action="{{ route('comp') }}">
            @csrf
            <input placeholder="Entrer une Note" type="text" name="info" style="margin-bottom: 20px; border: none; background-color: rgb(167, 167, 167); border-radius: 10px; padding: 10px;"> <br>
            <button type="submit" class="follow">Creer</a></button>

        </form> 
                                            
    </div>
</div>
</a></span>
<div class="user-profile-ov" style="overflow-y: scroll; height: 200px; margin-top: 50px; border-radius: 10px; border: solid 0.5px grey;">
    <ul>
        @foreach($comp as $c)
            <li><a href="#" title="">{{$c->competence}}</a></li>
        @endforeach
    </ul>
</div>
</div>

</div>
</div>
@endif
</div>
</div>

<!----------------------------------Fin Competence------------------------------------>



<!------------------------------Debut Nom d'utilisateur et section poste - info - Gaeries -------------------->
<div class="col-lg-6">
<div class="main-ws-sec">
<div class="user-tab-sec rewivew">
<h3>{{Auth::user()->name}}</h3>
<div class="star-descp">
@if (Auth::user()->type == 0) 
    <span>Vacancier</span>
@else
    <span>Organisation<span>
@endif

</div>
<div class="tab-feed st2 settingjb">
<ul>
<li data-tab="feed-dd" class="active">
<a href="#" title="">
<img src="images/ic1.png" alt="">
<span>Post</span>
</a>
</li>
<li data-tab="info-dd">
<a href="#" title="">
<img src="images/ic2.png" alt="">
<span>Info</span>
</a>
</li>

<li data-tab="portfolio-dd">
<a href="#" title="">
<img src="images/ic3.png" alt="">
<span>Galeries</span>
</a>
</li>

</ul>
</div>
</div>


<!----------------------------------Fin Nom d'utilisateur et section poste - info - Gaeries ----------------------------------->
<div class="product-feed-tab" id="saved-jobs">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="mange-tab" data-toggle="tab" href="#mange" role="tab" aria-controls="home" aria-selected="true">Manage Jobs</a>
</li>
<li class="nav-item">
<a class="nav-link" id="saved-tab" data-toggle="tab" href="#saved" role="tab" aria-controls="profile" aria-selected="false">Saved Jobs</a>
</li>
<li class="nav-item">
<a class="nav-link" id="contact-tab" data-toggle="tab" href="#applied" role="tab" aria-controls="applied" aria-selected="false">Applied Jobs</a>
</li>
<li class="nav-item">
<a class="nav-link" id="cadidates-tab" data-toggle="tab" href="#cadidates" role="tab" aria-controls="contact" aria-selected="false">Applied cadidates</a>
</li>
</ul>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="mange" role="tabpanel" aria-labelledby="mange-tab">
<div class="posts-bar">
<div class="post-bar bgclr">
<div class="wordpressdevlp">
<h2>Senior Wordpress Developer</h2>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
<br>
<div class="row no-gutters">
<div class="col-md-6 col-sm-12">
<div class="cadidatesbtn">
<button type="button" class="btn btn-primary">
<span class="badge badge-light">3</span>Candidates
</button>
<a href="#">
<i class="far fa-edit"></i>
</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
<div class="col-md-6 col-sm-12">
<ul class="bk-links bklink">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="posts-bar">
<div class="post-bar bgclr">
<div class="wordpressdevlp">
<h2>Senior Php Developer</h2>
<p><i class="la la-clock-o"></i> Posted on 29 August 2018</p>
</div>
<br>
<div class="row no-gutters">
<div class="col-md-6 col-sm-12">
<div class="cadidatesbtn">
<button type="button" class="btn btn-primary">
<span class="badge badge-light">3</span>Candidates
</button>
<a href="#">
<i class="far fa-edit"></i>
</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
<div class="col-md-6 col-sm-12">
<ul class="bk-links bklink">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="posts-bar">
<div class="post-bar bgclr">
<div class="wordpressdevlp">
<h2>Senior UI UX Designer</h2>
<div class="row no-gutters">
<div class="col-md-6 col-sm-12">
<p class="posttext"><i class="la la-clock-o"></i>Posted on 5 June 2018</p>
</div>
<div class="col-md-6 col-sm-12">
<p><i class="la la-clock-o"></i>Expiried on 5 October 2018</p>
</div>
</div>
</div>
<br>
<div class="row no-gutters">
<div class="col-md-6 col-sm-12">
<div class="cadidatesbtn">
<button type="button" class="btn btn-primary">
<span class="badge badge-light">3</span>Candidates
</button>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
<div class="col-md-6 col-sm-12">
<ul class="bk-links bklink">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="saved" role="tabpanel" aria-labelledby="saved-tab">
<div class="post-bar">
<div class="p-all saved-post">
<div class="usy-dt">
<div class="wordpressdevlp">
<h2>Senior Wordpress Developer</h2>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<ul class="savedjob-info saved-info">
<li>
<h3>Applicants</h3>
<p>10</p>
</li>
<li>
<h3>Job Type</h3>
<p>Full Time</p>
</li>
<li>
<h3>Salary</h3>
<p>$600 - Mannual</p>
</li>
<li>
<h3>Posted : 5 Days Ago</h3>
<p>Open</p>
</li>
<div class="devepbtn saved-btn">
<a class="clrbtn" href="#">Unsaved</a>
<a class="clrbtn" href="#">Message</a>
</div>
</ul>
</div>
<div class="post-bar">
<div class="p-all saved-post">
<div class="usy-dt">
<div class="wordpressdevlp">
<h2>Senior PHP Developer</h2>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<ul class="savedjob-info saved-info">
<li>
<h3>Applicants</h3>
<p>10</p>
</li>
<li>
<h3>Job Type</h3>
<p>Full Time</p>
</li>
<li>
<h3>Salary</h3>
<p>$600 - Mannual</p>
</li>
<li>
<h3>Posted : 5 Days Ago</h3>
<p>Open</p>
</li>
<div class="devepbtn saved-btn">
<a class="clrbtn" href="#">Unsaved</a>
<a class="clrbtn" href="#">Message</a>
</div>
</ul>
</div>
<div class="post-bar">
<div class="p-all saved-post">
<div class="usy-dt">
 <div class="wordpressdevlp">
<h2>UI UX Designer</h2>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<ul class="savedjob-info saved-info">
<li>
<h3>Applicants</h3>
<p>10</p>
</li>
<li>
<h3>Job Type</h3>
<p>Full Time</p>
</li>
<li>
<h3>Salary</h3>
<p>$600 - Mannual</p>
</li>
<li>
<h3>Posted : 5 Days Ago</h3>
<p>Open</p>
</li>
<div class="devepbtn saved-btn">
<a class="clrbtn" href="#">Unsaved</a>
<a class="clrbtn" href="#">Message</a>
</div>
</ul>
</div>
</div>
<div class="tab-pane fade" id="applied" role="tabpanel" aria-labelledby="applied-tab">
<div class="post-bar">
<div class="p-all saved-post">
<div class="usy-dt">
<div class="wordpressdevlp">
<h2>Senior Wordpress Developer</h2>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
 </div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<ul class="savedjob-info saved-info">
<li>
<h3>Applicants</h3>
<p>10</p>
</li>
<li>
<h3>Job Type</h3>
<p>Full Time</p>
</li>
<li>
<h3>Salary</h3>
<p>$600 - Mannual</p>
</li>
<li>
<h3>Posted : 5 Days Ago</h3>
<p>Open</p>
</li>
<div class="devepbtn saved-btn">
<a class="clrbtn" href="#">Applied</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</ul>
</div>
<div class="post-bar">
<div class="p-all saved-post">
<div class="usy-dt">
<div class="wordpressdevlp">
<h2>Senior PHP Developer</h2>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
 <li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<ul class="savedjob-info saved-info">
<li>
<h3>Applicants</h3>
<p>10</p>
</li>
<li>
<h3>Job Type</h3>
<p>Full Time</p>
</li>
<li>
<h3>Salary</h3>
<p>$600 - Mannual</p>
</li>
<li>
<h3>Posted : 5 Days Ago</h3>
<p>Open</p>
</li>
<div class="devepbtn saved-btn">
<a class="clrbtn" href="#">Applied</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</ul>
</div>
<div class="post-bar">
<div class="p-all saved-post">
<div class="usy-dt">
<div class="wordpressdevlp">
<h2>UI UX Designer</h2>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
 <li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<ul class="savedjob-info saved-info">
<li>
<h3>Applicants</h3>
<p>10</p>
</li>
<li>
<h3>Job Type</h3>
<p>Full Time</p>
</li>
<li>
<h3>Salary</h3>
<p>$600 - Mannual</p>
</li>
<li>
<h3>Posted : 5 Days Ago</h3>
<p>Open</p>
</li>
<div class="devepbtn saved-btn">
<a class="clrbtn" href="#">Applied</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</ul>
</div>
</div>
<div class="tab-pane fade" id="cadidates" role="tabpanel" aria-labelledby="cadidates-tab">
<div class="post-bar">
<div class="post_topbar applied-post">
<div class="usy-dt">
<img src="images/resources/us-pic.png" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<div class="epi-sec epi2">
<ul class="descp descptab bklink">
<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
</div>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
 <li><a href="#" title="">Accept</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
<div class="job_descp noborder">
<div class="star-descp review profilecnd">
<ul class="bklik">
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star-half-o"></i></li>
<a href="#" title="">5.0 of 5 Reviews</a>
</ul>
</div>
<div class="devepbtn appliedinfo noreply">
<a class="clrbtn" href="#">Accept</a>
<a class="clrbtn" href="#">View Profile</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
</div>
</div>
<div class="post-bar">
<div class="post_topbar  applied-post">
<div class="usy-dt">
<img src="images/resources/us-pic.png" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<div class="epi-sec epi2">
<ul class="descp descptab bklink">
<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
</div>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
 <li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Accept</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
<div class="job_descp noborder">
<div class="star-descp review profilecnd">
<ul class="bklik">
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star-half-o"></i></li>
<a href="#" title="">5.0 of 5 Reviews</a>
</ul>
</div>
<div class="devepbtn appliedinfo noreply">
<a class="clrbtn" href="#">Accept</a>
<a class="clrbtn" href="#">View Profile</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
</div>
</div>
<div class="post-bar">
<div class="post_topbar applied-post">
<div class="usy-dt">
<img src="images/resources/us-pic.png" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<div class="epi-sec epi2">
<ul class="descp descptab bklink">
<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
</div>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Accept</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
<div class="job_descp noborder">
<div class="star-descp review profilecnd">
<ul class="bklik">
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star-half-o"></i></li>
<a href="#" title="">5.0 of 5 Reviews</a>
</ul>
</div>
<div class="devepbtn appliedinfo noreply">
<a class="clrbtn" href="#">Accept</a>
<a class="clrbtn" href="#">View Profile</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="product-feed-tab current" id="feed-dd">
<div class="posts-section">


<!--Debut du post-->
@if ($posts->count() > 0)
@foreach($posts as $post)
@if ($post->user == Auth::user())
<div class="post-bar">
    <div class="post_topbar">
    <div class="usy-dt">
    <img style="width: 50px; height: auto; border-radius:45%;" src="images/resources/pacha.jpg" alt="">
    <div class="usy-name">
    <h3>{{ $post->user->name}}</h3>
    <span><img src="images/clock.png" alt="">il y'a {{ $post->created_at->format('d M Y')}}</span>
    </div>
    </div>
    <div class="ed-opts">
    <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
    <ul class="ed-options">
    <li><a href="#" title="">Modifier le Post</a></li>
    <li><a href="#" title="">Supprimer le post</a></li>
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
        <li><p>{{ $post->date_fin}} </p></li>
    </ul>
    </div>
    <div class="job_descp">
    <h3> {{ Str::title($post->title) }}</h3>
    <!--IMage du post-->
    @if ($post->image != 'aucun')
        <img class="imgpos" src="{{ Storage::url($post->image) }}">
    @endif
    </div>
    
    <p class="debordement">{{ Str::limit($post->content, 120)}}</p>
    
    </div>
    @endif
@endforeach
@endif
<!--Fin du post-->




<div class="process-comm">
<div class="spinner">
<div class="bounce1"></div>
<div class="bounce2"></div>
<div class="bounce3"></div>
</div>
</div>
</div>
</div>
<div class="product-feed-tab" id="my-bids">
<ul class="nav nav-tabs bid-tab" id="myTab" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Manage Bids</a>
</li>
<li class="nav-item">
<a class="nav-link" id="bidders-tab" data-toggle="tab" href="#bidders" role="tab" aria-controls="contact" aria-selected="false">Manage Bidders</a>
</li>
<li class="nav-item">
<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">My Active Bids</a>
</li>
</ul>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
<div class="post-bar">
<div class="post_topbar">
<div class="wordpressdevlp">
<h2>Travel Wordpress Theme</h2>
<p><i class="la la-clock-o"></i>5 Hour Lefts</p>
</div>
<ul class="savedjob-info mangebid manbids">
<li>
<h3>Bids</h3>
<p>4</p>
</li>
<li>
<h3>Avg Bid (USD)</h3>
<p>$510</p>
</li>
<li>
<h3>Project Budget (USD)</h3>
<p>$500 - $600</p>
</li>
<ul class="bk-links bklink">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
</ul>
</ul>
<br>
<div class="cadidatesbtn bidsbtn">
<button type="button" class="btn btn-primary">
<span class="badge badge-light">3</span>Candidates
</button>
<a href="#">
<i class="far fa-edit"></i>
</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
</div>
<div class="post-bar">
<div class="post_topbar">
<div class="wordpressdevlp">
<h2>Travel Wordpress Theme</h2>
<p><i class="la la-clock-o"></i>5 Hour Lefts</p>
</div>
<ul class="savedjob-info mangebid manbids">
<li>
<h3>Bids</h3>
<p>4</p>
</li>
<li>
<h3>Avg Bid (USD)</h3>
<p>$510</p>
</li>
<li>
<h3>Project Budget (USD)</h3>
<p>$500 - $600</p>
</li>
<ul class="bk-links bklink">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
</ul>
</ul>
<br>
<div class="cadidatesbtn bidsbtn">
<button type="button" class="btn btn-primary">
<span class="badge badge-light">3</span>Candidates
</button>
<a href="#">
<i class="far fa-edit"></i>
</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
</div>
<div class="post-bar">
<div class="post_topbar">
<div class="wordpressdevlp">
<h2>Travel Wordpress Theme</h2>
<p><i class="la la-clock-o"></i>5 Hour Lefts</p>
</div>
<ul class="savedjob-info mangebid manbids">
<li>
<h3>Bids</h3>
<p>4</p>
</li>
<li>
<h3>Avg Bid (USD)</h3>
<p>$510</p>
</li>
<li>
<h3>Project Budget (USD)</h3>
<p>$500 - $600</p>
</li>
<ul class="bk-links bklink">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
</ul>
</ul>
<br>
<div class="cadidatesbtn bidsbtn">
<button type="button" class="btn btn-primary">
<span class="badge badge-light">3</span>Candidates
</button>
<a href="#">
<i class="far fa-edit"></i>
</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<div class="post-bar">
<div class="post_topbar active-bids">
<div class="usy-dt">
<div class="wordpressdevlp">
<h2>Travel Wordpress Theme</h2>
</div>
</div>
</div>
<ul class="savedjob-info activ-bidinfo">
<li>
<h3>Fixed Price</h3>
<p>$500</p>
</li>
<li>
<h3>Delivery Time</h3>
<p>8 Days</p>
</li>
<div class="devepbtn activebtn">
<a href="#">
<i class="far fa-edit"></i>
</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</ul>
 </div>
<div class="post-bar">
<div class="post_topbar active-bids">
<div class="usy-dt">
<div class="wordpressdevlp">
<h2>Restaurant Android Application</h2>
</div>
</div>
</div>
<ul class="savedjob-info activ-bidinfo">
<li>
<h3>Fixed Price</h3>
<p>$1500</p>
</li>
<li>
<h3>Delivery Time</h3>
<p>15 Days</p>
</li>
<div class="devepbtn activebtn">
<a href="#">
<i class="far fa-edit"></i>
</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</ul>
</div>
<div class="post-bar">
<div class="post_topbar active-bids">
<div class="usy-dt">
<div class="wordpressdevlp">
<h2>Online Shopping Html Template with PHP</h2>
</div>
</div>
</div>
<ul class="savedjob-info activ-bidinfo">
<li>
<h3>Fixed Price</h3>
<p>$1500</p>
</li>
<li>
<h3>Delivery Time</h3>
<p>15 Days</p>
</li>
<div class="devepbtn activebtn">
<a href="#">
<i class="far fa-edit"></i>
</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</ul>
</div>
</div>
<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
<div class="post-bar">
<div class="post_topbar">
<div class="usy-dt">
<div class="wordpressdevlp">
<h2>Senior Wordpress Developer</h2>
<br>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<ul class="savedjob-info">
<li>
<h3>Applicants</h3>
<p>10</p>
</li>
<li>
<h3>Job Type</h3>
<p>Full Time</p>
</li>
<li>
<h3>Salary</h3>
<p>$600 - Mannual</p>
</li>
<li>
<h3>Posted : 5 Days Ago</h3>
<p>Open</p>
</li>
<div class="devepbtn">
<a class="clrbtn" href="#">Applied</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</ul>
</div>
<div class="post-bar">
<div class="post_topbar">
<div class="usy-dt">
<div class="wordpressdevlp">
<h2>Senior PHP Developer</h2>
<br>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<ul class="savedjob-info">
<li>
<h3>Applicants</h3>
<p>10</p>
</li>
<li>
<h3>Job Type</h3>
<p>Full Time</p>
</li>
<li>
<h3>Salary</h3>
<p>$600 - Mannual</p>
</li>
<li>
<h3>Posted : 5 Days Ago</h3>
<p>Open</p>
</li>
<div class="devepbtn">
<a class="clrbtn" href="#">Applied</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</ul>
</div>
<div class="post-bar">
<div class="post_topbar">
<div class="usy-dt">
<div class="wordpressdevlp">
<h2>UI UX Designer</h2>
<br>
<p><i class="la la-clock-o"></i>Posted on 30 August 2018</p>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<ul class="savedjob-info">
<li>
<h3>Applicants</h3>
<p>10</p>
</li>
<li>
<h3>Job Type</h3>
<p>Full Time</p>
</li>
<li>
<h3>Salary</h3>
<p>$600 - Mannual</p>
</li>
<li>
<h3>Posted : 5 Days Ago</h3>
<p>Open</p>
</li>
<div class="devepbtn">
<a class="clrbtn" href="#">Applied</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</ul>
</div>
</div>
<div class="tab-pane fade" id="bidders" role="tabpanel" aria-labelledby="bidders-tab">
<div class="post-bar">
<div class="post_topbar post-bid">
<div class="usy-dt">
<img src="images/resources/us-pic.png" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<div class="epi-sec epi2">
<ul class="descp descptab bklink">
<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
</div>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Accept</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
<div class="job_descp noborder">
<div class="star-descp review profilecnd">
 <ul class="bklik">
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star-half-o"></i></li>
<a href="#" title="">5.0 of 5 Reviews</a>
</ul>
</div>
<ul class="savedjob-info biddersinfo">
<li>
<h3>Fixed Price</h3>
<p>$500</p>
</li>
<li>
<h3>Delivery Time</h3>
<p>10 Days</p>
</li>
</ul>
<div class="devepbtn appliedinfo bidsbtn">
<a class="clrbtn" href="#">Accept</a>
<a class="clrbtn" href="#">View Profile</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
</div>
</div>
<div class="post-bar">
<div class="post_topbar post-bid">
<div class="usy-dt">
<img src="../../www.gambolthemes.net/workwise-new/images/resources/Jassica.html" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<div class="epi-sec epi2">
<ul class="descp descptab bklink">
<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
</div>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Accept</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
<div class="job_descp noborder">
<div class="star-descp review profilecnd">
<ul class="bklik">
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star-half-o"></i></li>
<a href="#" title="">5.0 of 5 Reviews</a>
</ul>
</div>
<ul class="savedjob-info biddersinfo">
<li>
<h3>Fixed Price</h3>
<p>$500</p>
</li>
<li>
<h3>Delivery Time</h3>
<p>10 Days</p>
</li>
</ul>
<div class="devepbtn appliedinfo bidsbtn">
<a class="clrbtn" href="#">Accept</a>
<a class="clrbtn" href="#">View Profile</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
</div>
</div>
<div class="post-bar">
<div class="post_topbar post-bid">
<div class="usy-dt">
<img src="images/resources/rock.jpg" alt="">
<div class="usy-name">
 <h3>John Doe</h3>
<div class="epi-sec epi2">
<ul class="descp descptab bklink">
<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
</div>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Accept</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
<div class="job_descp noborder">
<div class="star-descp review profilecnd">
<ul class="bklik">
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star-half-o"></i></li>
<a href="#" title="">5.0 of 5 Reviews</a>
</ul>
</div>
<ul class="savedjob-info biddersinfo">
<li>
<h3>Fixed Price</h3>
<p>$500</p>
</li>
<li>
<h3>Delivery Time</h3>
<p>10 Days</p>
</li>
</ul>
<div class="devepbtn appliedinfo bidsbtn">
<a class="clrbtn" href="#">Accept</a>
<a class="clrbtn" href="#">View Profile</a>
<a class="clrbtn" href="#">Message</a>
<a href="#">
<i class="far fa-trash-alt"></i>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!------------------------------ parametre info ------------------------->
<div class="product-feed-tab" id="info-dd">
<div class="user-profile-ov">
<h3>Info-personnel</h3>
<div class="col-sm-9">

      
  <div class="tab-content">
    <div class="tab-pane active" id="home">
        <hr>
          <form class="form" action="{{ route('edite') }}" method="post" id="registrationForm">
             @csrf
              <div class="form-group">
                  
                  <div class="col-xs-6">
                      <label for="first_name"><h4>Nom</h4></label>
                      <input type="text" class="form-control" name="first_name" id="first_name" value="{{Auth::user()->profile->nom}}" title="enter your first name if any.">
                  </div>
              </div>
              <div class="form-group">
                  
                  <div class="col-xs-6">
                    <label for="last_name"><h4>Prenom</h4></label>
                      <input type="text" class="form-control" name="last_name" id="last_name" value="{{Auth::user()->profile->prenom}}" title="enter your last name if any.">
                  </div>
              </div>
              @if(Auth::user()->type == 1) 
              <div class="form-group">
                  
                  <div class="col-xs-6">
                      <label for="email"><h4>nombre d'année aprè la creation </h4></label>
                      <input type="number" class="form-control" id="location" name="age" value="{{Auth::user()->profile->age}}" title="enter a location">
                  </div>
              </div>
              @else
              <div class="form-group">
                  
                  <div class="col-xs-6">
                      <label for="email"><h4>age</h4></label>
                      <input type="number" class="form-control" id="location" name="age" value="{{Auth::user()->profile->age}}" title="enter a location">
                  </div>
              </div>
              @endif

              <div class="form-group">
                  
                  <div class="col-xs-6">
                      <label for="phone"><h4>Telephone</h4></label>
                      <input type="tel" class="form-control" name="phone" id="phone" value="{{Auth::user()->profile->contact}}" title="enter your phone number if any.">
                  </div>
              </div>
  
              
              <div class="form-group">
                  
                  <div class="col-xs-6">
                      <label for="email"><h4>pays</h4></label>
                      <input type="text" class="form-control" name="pays" id="email" value="{{Auth::user()->profile->pays}}" title="entrer votre email.">
                  </div>
              </div>
              <div class="form-group">
                  
                  <div class="col-xs-6">
                      <label for="email"><h4>region</h4></label>
                      <input type="text" class="form-control" id="location" name="region"  value="{{Auth::user()->profile->regnion}}" title="enter a location">
                  </div>
              </div>


              <div class="form-group">
                  
                  <div class="col-xs-6">
                      <label for="email"><h4>ville</h4></label>
                      <input type="text" class="form-control" name="ville" id="location" value="{{Auth::user()->profile->ville}}" title="enter a location">
                  </div>
              </div>
              @if(Auth::user()->type == 1)
              <div class="form-group">
                  
                  <div class="col-xs-6">
                      <label for="email"><h4>Domaine d'activité</h4></label>
                      <input type="text" class="form-control" id="location" name="comptence" value="{{Auth::user()->profile->comptence}}" title="enter a location">
                  </div>
              </div>
              @else
              <div class="form-group">
                  
                  <div class="col-xs-6">
                      <label for="email"><h4>comptence</h4></label>
                      <input type="text" class="form-control" id="location" name="comptence" value="{{Auth::user()->profile->comptence}}" title="enter a location">
                  </div>
              </div>
              @endif
              
              <div class="form-group">
                  
                  <div class="col-xs-6">
                      <label for="email"><h4>adresse</h4></label>
                      <input type="text" class="form-control" id="location" name="adresse" value="{{Auth::user()->profile->adresse}}" title="enter a location">
                  </div>
              </div>
              <div class="form-group">
                   <div class="col-xs-12">
                        <br>
                          <button class="btn btn-lg btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Enregistrer</button>
                           <button class="btn btn-lg btn-danger" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reinitialiser </button>
                    </div>
              </div>
          </form>
      
      <hr>
      
    </div> <!--/tab-pane-->
    
     
  </div>
</div> <!--/col-9--> 

</div>




</div>
<!------------------------------Fin parametre info ------------------------->



<div class="product-feed-tab" id="rewivewdata">
<section></section>
<div class="posts-section">
<div class="post-bar reviewtitle">
<h2>Reviews</h2>
</div>
<div class="post-bar ">
<div class="post_topbar">
<div class="usy-dt">
<img src="images/resources/bg-img3.png" alt="">
<div class="usy-name">
<h3>Rock William</h3>
<div class="epi-sec epi2">
<ul class="descp review-lt">
<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
</div>
</div>
</div>
</div>
<div class="job_descp mngdetl">
<div class="star-descp review">
<ul>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star-half-o"></i></li>
</ul>
<a href="#" title="">5.0 of 5 Reviews</a>
</div>
<div class="reviewtext">
<p>Lorem ipsum dolor sit amet, adipiscing elit. Nulla luctus mi et porttitor ultrices</p>
<hr>
</div>
<div class="post_topbar post-reply">
<div class="usy-dt">
<img src="images/resources/bg-img4.png" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<div class="epi-sec epi2">
<p><i class="la la-clock-o"></i>3 min ago</p>
<p class="tahnks">Thanks :)</p>
</div>
</div>
</div>
</div>
<div class="post_topbar rep-post rep-thanks">
<hr>
<div class="usy-dt">
<img src="images/resources/bg-img4.png" alt="">
<input class="reply" type="text" placeholder="Reply">
<a class="replybtn" href="#">Send</a>
</div>
</div>
</div>
</div>
<div class="post-bar post-thanks">
<div class="post_topbar">
<div class="usy-dt">
<img src="images/resources/bg-img1.png" alt="">
<div class="usy-name">
<h3>Jassica William</h3>
<div class="epi-sec epi2">
<ul class="descp review-lt">
<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
</div>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<div class="job_descp mngdetl">
<div class="star-descp review">
<ul>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star"></i></li>
<li><i class="fa fa-star-half-o"></i></li>
</ul>
<a href="#" title="">5.0 of 5 Reviews</a><br><br>
<p>Awesome Work, Thanks John!</p>
<hr>
</div>
<div class="post_topbar rep-post">
<div class="usy-dt">
<img src="images/resources/bg-img4.png" alt="">
<input class="reply" type="text" placeholder="Reply">
<a class="replybtn" href="#">Send</a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="product-feed-tab" id="my-bids">
<div class="posts-section">
<div class="post-bar">
<div class="post_topbar">
<div class="usy-dt">
<img src="images/resources/us-pic.png" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<span><img src="images/clock.png" alt="">3 min ago</span>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<div class="epi-sec">
<ul class="descp">
<li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
<ul class="bk-links">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
<li><a href="#" title="" class="bid_now">Bid Now</a></li>
</ul>
</div>
<div class="job_descp">
<h3>Simple Classified Site</h3>
<ul class="job-dt">
<li><span>$300 - $350</span></li>
</ul>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
<ul class="skill-tags">
<li><a href="#" title="">HTML</a></li>
<li><a href="#" title="">PHP</a></li>
<li><a href="#" title="">CSS</a></li>
<li><a href="#" title="">Javascript</a></li>
<li><a href="#" title="">Wordpress</a></li>
<li><a href="#" title="">Photoshop</a></li>
<li><a href="#" title="">Illustrator</a></li>
<li><a href="#" title="">Corel Draw</a></li>
</ul>
</div>
<div class="job-status-bar">
<ul class="like-com">
<li>
<a href="#"><i class="la la-heart"></i> Like</a>
<img src="images/liked-img.png" alt="">
<span>25</span>
</li>
<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
</ul>
<a><i class="la la-eye"></i>Views 50</a>
</div>
</div>
<div class="post-bar">
<div class="post_topbar">
<div class="usy-dt">
<img src="images/resources/us-pic.png" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<span><img src="images/clock.png" alt="">3 min ago</span>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<div class="epi-sec">
<ul class="descp">
<li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
<ul class="bk-links">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
<li><a href="#" title="" class="bid_now">Bid Now</a></li>
</ul>
</div>
 <div class="job_descp">
<h3>Ios Shopping mobile app</h3>
<ul class="job-dt">
<li><span>$300 - $350</span></li>
</ul>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
<ul class="skill-tags">
<li><a href="#" title="">HTML</a></li>
<li><a href="#" title="">PHP</a></li>
<li><a href="#" title="">CSS</a></li>
<li><a href="#" title="">Javascript</a></li>
<li><a href="#" title="">Wordpress</a></li>
<li><a href="#" title="">Photoshop</a></li>
<li><a href="#" title="">Illustrator</a></li>
<li><a href="#" title="">Corel Draw</a></li>
</ul>
</div>
<div class="job-status-bar">
<ul class="like-com">
<li>
<a href="#"><i class="la la-heart"></i> Like</a>
<img src="images/liked-img.png" alt="">
<span>25</span>
</li>
<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
</ul>
<a><i class="la la-eye"></i>Views 50</a>
</div>
</div>
<div class="post-bar">
<div class="post_topbar">
<div class="usy-dt">
<img src="images/resources/us-pic.png" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<span><img src="images/clock.png" alt="">3 min ago</span>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<div class="epi-sec">
<ul class="descp">
<li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
<ul class="bk-links">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
<li><a href="#" title="" class="bid_now">Bid Now</a></li>
</ul>
</div>
<div class="job_descp">
<h3>Simple Classified Site</h3>
<ul class="job-dt">
<li><span>$300 - $350</span></li>
</ul>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
<ul class="skill-tags">
<li><a href="#" title="">HTML</a></li>
<li><a href="#" title="">PHP</a></li>
<li><a href="#" title="">CSS</a></li>
<li><a href="#" title="">Javascript</a></li>
<li><a href="#" title="">Wordpress</a></li>
<li><a href="#" title="">Photoshop</a></li>
<li><a href="#" title="">Illustrator</a></li>
<li><a href="#" title="">Corel Draw</a></li>
</ul>
</div>
<div class="job-status-bar">
<ul class="like-com">
<li>
<a href="#"><i class="la la-heart"></i> Like</a>
<img src="images/liked-img.png" alt="">
<span>25</span>
</li>
 <li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
</ul>
<a><i class="la la-eye"></i>Views 50</a>
</div>
</div>
<div class="post-bar">
<div class="post_topbar">
<div class="usy-dt">
<img src="images/resources/us-pic.png" alt="">
<div class="usy-name">
<h3>John Doe</h3>
<span><img src="images/clock.png" alt="">3 min ago</span>
</div>
</div>
<div class="ed-opts">
<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
<ul class="ed-options">
<li><a href="#" title="">Edit Post</a></li>
<li><a href="#" title="">Unsaved</a></li>
<li><a href="#" title="">Unbid</a></li>
<li><a href="#" title="">Close</a></li>
<li><a href="#" title="">Hide</a></li>
</ul>
</div>
</div>
<div class="epi-sec">
<ul class="descp">
<li><img src="images/icon8.png" alt=""><span>Frontend Developer</span></li>
<li><img src="images/icon9.png" alt=""><span>India</span></li>
</ul>
<ul class="bk-links">
<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
<li><a href="#" title="" class="bid_now">Bid Now</a></li>
</ul>
</div>
<div class="job_descp">
<h3>Ios Shopping mobile app</h3>
<ul class="job-dt">
<li><span>$300 - $350</span></li>
</ul>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
<ul class="skill-tags">
<li><a href="#" title="">HTML</a></li>
<li><a href="#" title="">PHP</a></li>
<li><a href="#" title="">CSS</a></li>
<li><a href="#" title="">Javascript</a></li>
<li><a href="#" title="">Wordpress</a></li>
<li><a href="#" title="">Photoshop</a></li>
<li><a href="#" title="">Illustrator</a></li>
<li><a href="#" title="">Corel Draw</a></li>
</ul>
</div>
<div class="job-status-bar">
<ul class="like-com">
<li>
<a href="#"><i class="la la-heart"></i> Like</a>
<img src="images/liked-img.png" alt="">
<span>25</span>
</li>
<li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
</ul>
<a><i class="la la-eye"></i>Views 50</a>
</div>
</div>
<div class="process-comm">
<a href="#" title=""><img src="images/process-icon.png" alt=""></a>
</div>
</div>
</div>


<!------------------------------------------Galerie------------------------------------------------>
<div class="product-feed-tab" id="portfolio-dd">
<div class="portfolio-gallery-sec">
<h3>Galeries</h3>

<div class="gallery_pf">
<div class="row">

@foreach($img as $i)
    @if (Auth::user()->name == $i->user->name)
    <div class="col-lg-4 col-md-4 col-sm-6 col-6">
    <div class="gallery_pt">
    <img src="{{ Storage::url($i->image)}}" alt="">
    <a href="#" title=""><img src="images/all-out.png" alt=""></a>
    </div>
    </div>
   @endif
@endforeach
</div>
</div>
</div>
</div>

<!----------------------------------------Fin galerie--------------------------------->
<div class="product-feed-tab" id="payment-dd">
<div class="billing-method">
<ul>
<li>
<h3>Add Billing Method</h3>
<a href="#" title=""><i class="fa fa-plus-circle"></i></a>
</li>
<li>
<h3>See Activity</h3>
<a href="#" title="">View All</a>
</li>
<li>
<h3>Total Money</h3>
<span>$0.00</span>
</li>
</ul>
<div class="lt-sec">
<img src="images/lt-icon.png" alt="">
<h4>All your transactions are saved here</h4>
<a href="#" title="">Click Here</a>
</div>
</div>
<div class="add-billing-method">
<h3>Add Billing Method</h3>
<h4><img src="images/dlr-icon.png" alt=""><span>With workwise payment protection , only pay for work delivered.</span></h4>
<div class="payment_methods">
<h4>Credit or Debit Cards</h4>
<form>
<div class="row">
<div class="col-lg-12">
<div class="cc-head">
<h5>Card Number</h5>
<ul>
<li><img src="images/cc-icon1.png" alt=""></li>
<li><img src="images/cc-icon2.png" alt=""></li>
<li><img src="images/cc-icon3.png" alt=""></li>
<li><img src="images/cc-icon4.png" alt=""></li>
</ul>
</div>
<div class="inpt-field pd-moree">
<input type="text" name="cc-number" placeholder="">
<i class="fa fa-credit-card"></i>
</div>
</div>
<div class="col-lg-6">
<div class="cc-head">
<h5>First Name</h5>
</div>
<div class="inpt-field">
<input type="text" name="f-name" placeholder="">
</div>
</div>
<div class="col-lg-6">
<div class="cc-head">
<h5>Last Name</h5>
</div>
<div class="inpt-field">
<input type="text" name="l-name" placeholder="">
</div>
</div>
<div class="col-lg-6">
<div class="cc-head">
<h5>Expiresons</h5>
</div>
<div class="rowwy">
<div class="row">
<div class="col-lg-6 pd-left-none no-pd">
<div class="inpt-field">
<input type="text" name="f-name" placeholder="">
</div>
</div>
<div class="col-lg-6 pd-right-none no-pd">
<div class="inpt-field">
<input type="text" name="f-name" placeholder="">
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="cc-head">
<h5>Cvv (Security Code) <i class="fa fa-question-circle"></i></h5>
</div>
<div class="inpt-field">
<input type="text" name="l-name" placeholder="">
</div>
</div>
<div class="col-lg-12">
<button type="submit">Continue</button>
</div>
</div>
</form>
<h4>Add Paypal Account</h4>
</div>
</div>
</div>
</div>
</div>


<!------------------------------Fin nom D'utilisateur-->
<div class="col-lg-3">
<div class="right-sidebar">
<div class="message-btn">
<a href="profile-account-setting.html" title=""><i class="fas fa-cog"></i> Parametre </a>
</div>
<div class="widget widget-portfolio">
<div class="wd-heady">
<h3>Photo</h3>
<img src="images/photo-icon.png" alt="">
</div>
<div class="pf-gallery">
<ul>
@foreach($img as $i)
    @if (Auth::user()->name == $i->user->name)
    <li><a href="#" title=""><img src="{{ Storage::url($i->image)}}" alt=""></a></li>
   @endif
@endforeach




</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
<style>

.companies-info{
    border-bottom: solid 10px red;
}
    .modalBox {
    position:fixed;
    font-family: Arial, Helvetica,sans-serif;
    top:0;
    right:0;
    bottom:0;
    left:0;
    background: rgba(0,0,0,0.8);
    color:black;
    z-index:99999;
    opacity :0;
    -webkit-transition:opacity 400ms ease-in;
    -moz-transition:opacity 400ms ease-in;
    transition:opacity 400ms ease-in;
    pointer-events:none;
}
/*Quand on click sur les href*/
.modalBox:target {
    opacity: 1;
    pointer-events: auto;
}
/*Positionnement de la boîte enfant*/
.modalBox>div {
    width:400px;
    position:relative;
    margin:10% auto;
    padding:5px 20px 13px 20px;
    border-radius:0px;
    background:white;
}
/*Positionnement et style du bouton fermer*/
.close {
    background:white;
    color:red;
    line-height:25px;
    position:absolute;
    right:1px;
    text-align:center;
    top:1px;
    width:35px;
    text-decoration:none;
    font-weight:bold;
    -webkit-border-radius:12px;
    -moz-border-radius:12px;
    border-radius:12px;
    -moz-box-shadow:1px 1px 3px red;
    -webkit-box-shadow:1px 1px 3px red;
    box-shadow:none;
    border:none;
}
/*Style lorsque la souris survole le bouton fermer*/
.close:hover {
    background:red;
    color:white;
}
/*Style par défaut du bouton ouvrir le popup*/

</style>
@endsection