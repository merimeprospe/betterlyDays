@extends("layouts.master")

@section("contenu")

@foreach($posts as $post)
<section style="padding: 60px ;">

<!--------------------------------- PREMIER -------------------------------------------->

    <!----------------------------- POSTULANT ADMIE -------------------------------------->
    <?php
        $n=0;
        foreach($postulant as $p)
        {
            if($p->post_id==$post->id)
            {
               if($p->type==1)
               {
                    $n=$n+1;
               }
            }
        }
    ?>
    @if($n>0)
        <div class="container">
            <div class="company-title">
                <h3>{{ $post->title }}</h3>
            </div>
            @foreach($postulant as $p)
            @if($p->post_id==$post->id)
            @if($p->type==1)
            <div class="companies-list">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="company_profile_info">
                            <div class="company-up-info">
                                <h2 style="margin-bottom: 20px;">Postulant Retenu</h2>
                                @if ($post->user->profile->image_profil == "default.pgj")
                                    <img style="border-radius:60%;" src="images/resources/user-pro-img.jpg" alt="">
                                @else
                                    <img src="{{ Storage::url($post->user->profile->image_profil)}}" alt="">
                                @endif
                                <h3>{{$p->user->name}}</h3>
                                <h4>{{$p->user->profile->comptence}}</h4>
                                <ul>
                                    <li><a href="{{ route('show',['id' => $p->user->id]) }}" title="" class="hire-us">Message</a></li>
                                    @if($post->note)
                                        <li><a  href="#open"  rel="nofollow"  title="" class="follow">Note: {{$post->note}}</a></li>
                                    @else
                                        <li><a  href="#open"  rel="nofollow"  title="" class="follow">Note</a></li>
                                    @endif
                                    <div id="open" class="modalBox">
                                        <div>
                                            <p><a class="close" title="Fermer" href="#close" rel="nofollow">X</a></p>
                                            <h1 style="margin-bottom: 10px;">Note!</h1>
                                            <h2 style="margin-bottom: 20px;">Veuiller Noter le vacancier</h2>
                                            <form   method="POST" action="{{ route('note',['id' => $post->id]) }}" >
                                                @csrf
                                                <input placeholder="Entrer une Note" type="number" name="note" style="margin-bottom: 20px; border: none; background-color: rgb(167, 167, 167); border-radius: 10px; padding: 10px;" required> <label style="background-color: red; border-radius: 10px; padding:10px;">/10</label> <br>
                                                <li><button type="submit" class="follow">Noter</a></button>

                                            </form> 
                                            
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        @endif    
 <!---------------------------------FIN DE LA LISTE DE L'ADMIE-------------------------------->



 <!------------------------------------ LISTE DES POSTULANTS --------------------------------->
 <?php
        $n=0;
        foreach($postulant as $p)
        {
            if($p->post_id==$post->id)
            {
               if($p->type==0)
               {
                    $n=$n+1;
               }
            }
        }
    ?>
    @if($n>0)
            <div class="company-title">
                <h3> LISTE DES POSTULANTS POUR L'OFFRE DE {{ $post->title }}</h3>
            </div>
            <div class="companies-list">
                <div class="row">
                    @foreach($postulant as $p)
                    @if($p->post_id==$post->id)
                    @if($p->type==0)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="company_profile_info">
                            <div class="company-up-info">
                                <h2 style="margin-bottom: 20px;">postulant</h2>
                                @if ($post->user->profile->image_profil == "default.pgj")
                                    <img style="border-radius:60%;" src="images/resources/user-pro-img.jpg" alt="">
                                @else
                                    <img src="{{ Storage::url($post->user->profile->image_profil)}}" alt="">
                                @endif
                                <h3>{{$p->user->name}}</h3>
                                <h4>{{$p->user->profile->comptence}}</h4>
                                <ul>
                                    <li><a href="{{ route('retenu', ['id' => $p->id] )}}" title="" class="follow">Retenir</a></li>
                                    <li><a href="{{ route('show',['id' => $p->user->id]) }}" title="" class="hire-us">Message</a></li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                    @endif
                    @endif
                    @endforeach
                </div>
            </div>
    @endif       

              <!--------------------------------------- FIN DU PREMIER POST--------------------------------->
        </div>
      

</section>

@endforeach


<div class="process-comm">
    <div class="spinner">
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
    </div>
    </div>
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
</style>


@endsection