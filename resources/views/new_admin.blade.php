@extends("layouts.main")

@section("contenu")

<!-- start page content -->
<div class="page-content-wrapper">
				<div class="page-content">
					<div class="page-bar">
						<div class="page-title-breadcrumb">
							<div class=" pull-left">
								<div class="page-title">Ajouter un administrateur</div>
							</div>
							<ol class="breadcrumb page-breadcrumb pull-right">
								<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
										href="{{ route('dshboard_admin') }}">Tableau de Bord</a>&nbsp;<i class="fa fa-angle-right"></i>
								</li>
								<li class="active"> Ajouter Un administrateur </li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Information Basique</header>
									<button id="panel-button"
										class="mdl-button mdl-js-button mdl-button--icon pull-right"
										data-upgraded=",MaterialButton">
									
									</button>
									
								</div>
                                <form action="{{ route('register_admin') }}" method="post">
                                 @csrf
								<div class="card-body row">
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtFirstName" name="name" required>
											<label class="mdl-textfield__label">Nom d'utilisateur</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width" >
											<input class="mdl-textfield__input" type="email" id="txtemail" name="email" required>
											<label class="mdl-textfield__label">Email</label>
											<span class="mdl-textfield__error">Enter une Adresse Mail Valide</span>
										</div>
									</div>
									
									
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="password" id="txtPwd" name="password" required>
											<label class="mdl-textfield__label">Mot De Passe</label>
										</div>
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="password" id="txtConfirmPwd" name="password_confirmation" required>
											<label class="mdl-textfield__label">Confirmer le Mot De Passe</label>
										</div>
									</div>
									
									<div class="col-lg-12 p-t-20 text-center">
										<button type="submit"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Envoyer</button>
										<button type="submit"
											class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger">Annuler</button>
									</div>
								</div>
                            </form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end page content -->

@endsection