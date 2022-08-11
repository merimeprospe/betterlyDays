@extends("layouts.main")

@section("contenu")
<!-- start widget -->
<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Tableau de bord</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="{{ route('dshboard_admin') }}">Accueil</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Tableau de bord</li>
							</ol>
						</div>
                    </div>
                    <div class="state-overview" style="margin-top:100px">
						<div class="row">
							<div class="col-xl-3 col-md-6 col-12" style="margin-left:80px;">
								<div class="info-box bg-b-green">
									<span class="info-box-icon push-bottom"><i data-feather="users"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Vacancier</span>
										<span class="info-box-number">{{$v}}</span>
										<div class="progress">
											<div class="progress-bar" style="width: {{$vp}}%"></div>
										</div>
										<span class="progress-description">
                                        {{$vp}}% Increase in 28 Days
										</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
							<div class="col-xl-3 col-md-6 col-12" style="margin-left:40px;">
								<div class="info-box bg-b-yellow">
									<span class="info-box-icon push-bottom"><i data-feather="users"></i></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total organisation</span>
										<span class="info-box-number">{{$o}}</span>
										<div class="progress">
											<div class="progress-bar" style="width: {{$op}}%"></div>
										</div>
										<span class="progress-description">
                                        {{$op}}% Increase in 28 Days
										</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<div class="col-xl-3 col-md-6 col-12" style="margin-left:40px;">
								<div class="info-box bg-b-yellow">
									<span class="info-box-icon push-bottom"><i data-feather="users"></i></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Total Administrateurs</span>
										<span class="info-box-number">{{$a}}</span>
										<div class="progress">
											<div class="progress-bar" style="width: {{$ap}}%"></div>
										</div>
										<span class="progress-description">
                                        {{$ap}}% Increase in 28 Days
										</span>
									</div>
									<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>

					</div>
                    </div>
                    </div>
@endsection