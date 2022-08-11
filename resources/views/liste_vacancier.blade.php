@extends("layouts.main")

@section("contenu")

			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Liste des Vacanciers</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="{{ route('dshboard_admin') }}">Tableau de Bord</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Vacanciers</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="tabbable-line">
								<!-- <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab1" data-bs-toggle="tab"> List View </a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-bs-toggle="tab"> Grid View </a>
                                    </li>
                                </ul> -->
								<ul class="nav customtab nav-tabs" role="tablist">
									<li class="nav-item"><a href="#tab1" class="nav-link active"
											data-bs-toggle="tab">Affichage en Liste
											View</a></li>
									<li class="nav-item"><a href="#tab2" class="nav-link" data-bs-toggle="tab">Affichage 
											En Grile</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active fontawesome-demo" id="tab1">
										<div class="row">
											<div class="col-md-12">
												<div class="card card-box">
													<div class="card-head">
														<header>Tous les Vacanciers</header>
														<div class="tools">
															<a class="fa fa-repeat btn-color box-refresh"
																href="javascript:;"></a>
															<a class="t-collapse btn-color fa fa-chevron-down"
																href="javascript:;"></a>
															<a class="t-close btn-color fa fa-times"
																href="javascript:;"></a>
														</div>
													</div>
													<div class="card-body ">
														
														<table
															class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
															id="example4">
															<thead>
																<tr>
																	<th>photo</th>
																	<th> Nom d'utilisateur </th>
																	<th> Nom </th>
																	<th> Prenom </th>
																	<th> Contact </th>
																	<th> Adresse </th>
																	<th> Pays </th>
																	<th>statut</th>
																	<th> Action </th>
																</tr>
															</thead>
															<tbody>
																@foreach($user as $u)
																<tr class="odd gradeX">
																	<td class="patient-img">
																		@if ($u->profile->image_profil == "default.pgj")
																			<img src="{{asset('images/resources/user-pro-img.jpg')}}" style="border-radius:60%;" alt="">
																		@else
																			<img src="{{ Storage::url($u->profile->image_profil)}}" alt="">
																		@endif
																	</td>
																	<td>{{$u->name}}</td>
																	<td class="left">{{$u->profile->nom}}</td>
																	<td class="left">{{$u->profile->prenom}}</td>
																	<td class="left">{{$u->profile->contact}}</td>
																	<td><a href="tel:4444565756">
																	{{$u->profile->adresse}} </a></td>
																	<td><a href="">
																	{{$u->profile->pays}} </a></td>
																	<td class="left">@if($u->active==1)actif @else bloquer @endif </td>
																	<td>
																	@if($u->active==1)
																		<a class="tblDelBtn" href="{{ route('bloquer',['id' => $u->id]) }}">
																		<image src="{{asset('images/lock.png')}}" style="width:24px;"></image>
																		</a>
																		@else
																		<a href="{{ route('debloquer',['id' => $u->id]) }}"
																			class="tblEditBtn">
																			<image src="{{asset('images/unlock.png')}}" style="width:24px;"></image>
																		</a>
																	@endif	
																	</td>
																</tr>
																@endforeach
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab2">
										<div class="row">
										@foreach($user as $u)
											<div class="col-md-4">
												<div class="card card-box">
													<div class="card-body no-padding ">
														<div class="doctor-profile">
															@if ($u->profile->image_profil == "default.pgj")
																<img style="whith:500px; height:250px;" src="{{asset('images/resources/user-pro-img.jpg')}}" style="border-radius:60%;" alt="">
															@else
																<img  style="whith:500px; height:250px;" src="{{ Storage::url($u->profile->image_profil)}}" alt="">
															@endif
															<div class="profile-usertitle">
																<div class="doctor-name">{{$u->name}} </div>
																<div class="name-center"> {{$u->profile->contact}} </div>
															</div>
															<p> cree le {{$u->created_at->format('d M Y')}} <br />pays: {{$u->profile->pays}} </p>
															<div>
																<p><i class="fa fa-phone"></i><a
																		href="tel:(123)456-7890"> {{$u->profile->adresse}}</a></p>
															</div>
															<div class="profile-userbuttons">
															@if($u->active==1)
																<a href="{{ route('bloquer',['id' => $u->id]) }}"
																	class="btn btn-circle deepPink-bgcolor btn-sm">Bloquer
																</a>
															@else
																<a href="{{ route('debloquer',['id' => $u->id]) }}"
																	class="btn btn-circle btn btn-success btn-sm" >Debloquer
																</a>
															@endif	
															</div>
														</div>
													</div>
												</div>
											</div>
											@endforeach	
										</div>

								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->

@endsection