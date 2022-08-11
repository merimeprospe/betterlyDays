@extends("layouts.main")

@section("contenu")

			<!-- start page content -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Liste des Posts</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="{{ route('dshboard_admin') }}">Tableau de Bord</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active">Posts</li>
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
											</a></li>
								</ul>
								<div class="tab-content">
										<div class="tab-content">
												<div class="tab-pane active fontawesome-demo" id="tab1">
													<div class="row">
														<div class="col-md-12">
															<div class="card card-box">
																<div class="card-head">
																	<header>Tous les Postes Effectues</header>
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
																				<th> Nom </th>
																				<th> competence </th>
																				<th> Titre </th>
																				<th> pays </th>
																				<th> note </th>
																				<th> statu </th>
																				<th>Date de publication du poste</th>
																				<th> Action </th>
																			</tr>
																		</thead>
																		<tbody>
                                                                            @foreach($posts as $p)
                                                                                <tr class="odd gradeX">
                                                                                    <td class="patient-img">
                                                                                        @if ($p->user->profile->image_profil == "default.pgj")
                                                                                            <img src="{{asset('images/resources/user-pro-img.jpg')}}" style="border-radius:60%;" alt="">
                                                                                        @else
                                                                                            <img src="{{ Storage::url($p->user->profile->image_profil)}}" alt="">
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>Rajesh</td>
                                                                                    <td class="left">{{$p->user->name}}</td>
                                                                                    <td class="left">{{$p->competence}}</td>
                                                                                    <td class="left">{{$p->title}}</td>
                                                                                    <td><a href="tel:4444565756">
                                                                                    {{$p->note}} </a></td>
                                                                                    <td><a>
                                                                                    {{$p->statu}} </a></td>
                                                                                    <td class="left">{{$p->created_at->format('d M Y')}}</td>
                                                                                    <td>
                                                                                        <a class="tblDelBtn"  href="{{ route('suppre',['id' => $p->id]) }}">
																							<image src="{{asset('images/delete.jpg')}}" style="width:34px;"></image>
                                                                                        </a>
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
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->


@endsection