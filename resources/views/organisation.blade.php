@extends("layouts.master")

@section("contenu")


<section class="companies-info">

<!--------------------------------- PREMIER -------------------------------------------->

    <!----------------------------- POSTULANT ADMIE -------------------------------------->
    <?php
        $n=0;
        foreach($postulant as $p)
        {
            if($p->post->statu == "programmé")
            {
                $n=$n+1;
            }
        }
    ?>
        <div class="container">
           @if($n>0) 
            <div class="company-title">
                <h3>Post En Cour</h3>
            </div>
            <div class="companies-list">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="company_profile_info">
                        @if (Auth::user()->type == 0)
                            @if ($postulant->count() > 0)
                                @foreach($postulant as $p)
                                    @if($p->post->statu == "programmé")
                                        <div class="company-up-info">
                                            <h3>{{$p->user->name}}</h3>
                                            <h3>{{$p->post->title}}</h3>
                                            <p>Date du <span> {{$p->post->created_at->format('d M Y')}}</span></p>
                                            <P style="overflow:hidden; padding:40px; margin-right:15px;">{{$p->post->content}}</P>
                                            <ul>
                                                <li><a href="" title="" class="hire-us">Message</a></li>
                                                
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
           
 <!--------------------------------FIN DE LA LISTE DE L'ADMIE-------------------------------->



 <!------------------------------------ LISTE DES POSTULANTS --------------------------------->
 <?php
        $n=0;
        foreach($postulant as $p)
        {
            if($p->post->statu == "Terminer")
            {
                $n=$n+1;
            }
        }
    ?>

            <div class="companies-list">
        @if($n>0)  
            <div class="company-title">
                <h3>{{$n}} publication terminer </h3>
            </div> 
                <div class="row">
                
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="company_profile_info">
                        @if (Auth::user()->type == 0)
                            @if ($postulant->count() > 0)
                                @foreach($postulant as $p)
                                    @if($p->post->statu == "Terminer")
                                        <div class="company-up-info">
                                            <h3>{{$p->user->name}}</h3>
                                            <h3> {{$p->post->title}}</h3>
                                            <p>Date du <span> {{$p->post->created_at->format('d M Y')}}</span></p>
                                            <P style="overflow:hidden; padding:40px; margin-right:15px;">{{$p->post->content}}</P>
                                            <h3></h3>
                                            <h4></h4>
                                            <ul>
                                                <li><a href="" title="" class="follow">Note: {{$p->post->note}}/10</a></li>
                                            </ul>
                                            
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        @endif    
                        </div>
                    </div>
                   
                </div>
                @endif
            </div>
           

            <!--------------------------------------- FIN DU PREMIER POST--------------------------------->
        </div>
      

</section>



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