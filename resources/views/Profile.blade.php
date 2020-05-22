@extends('layout.app')

@section('title','Profile')

@section('linkcss')
	<link rel="stylesheet" href="/assets/css/plugins/ekko-lightbox.css">
	<link rel="stylesheet" href="/assets/css/plugins/lightbox.min.css">
	<!-- vendor css -->
	<link rel="stylesheet" href="/assets/css/style.css">
@endsection

@section('body')
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	
	 <!-- <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
	</header> -->

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
	<div class="pcoded-content">
		<!-- [ Main Content ] start -->
		<!-- profile header start -->
		<div class="user-profile user-card mb-4">

			<div class="card-body py-0">
				<div class="user-about-block m-0">
					<div class="row">
						<div class="col-md-4 text-center mt-n5" id="nameProfil">
							<h5 class="mb-1">{{$personnes[0]->nom . ' ' . $personnes[0]->prenom}}</h5>
							<p class="mb-2 text-muted">{{$personnes[0]->libelle_grade}}</p>
						</div>
						<div class="col-md-8 mt-md-4">
	
							<ul class="nav nav-tabs profile-tabs nav-fill profilbar" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link text-reset" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="feather icon-user mr-2"></i>Profile</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- profile header end -->
	@if(Session::has('message'))
       <p >{{ Session::get('message') }}</p>
     @endif
		<!-- profile body start -->
		<div class="row">
			<div class="col-md-8 order-md-2" style="margin-left: 18%;">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="card">
							<div class="card-body d-flex align-items-center justify-content-between">
								<h5 class="mb-0">Détails personnels </h5>
								<button type="button" class="btn btn-primary btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pro-det-edit" aria-expanded="false" aria-controls="pro-det-edit-1 pro-det-edit-2">
									<i class="feather icon-edit"></i>
								</button>
							</div>
							<div class="card-body border-top pro-det-edit collapse show" id="pro-det-edit-1">
								<form>

									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Référent Client</label>
										<div class="col-sm-9">
											{{$personnes[0]->id_client}}
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nom Complet</label>
										<div class="col-sm-9">
											{{$personnes[0]->nom . ' ' . $personnes[0]->prenom}}
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Sexe</label>
										<div class="col-sm-9">
											{{$personnes[0]->libelle_sexe}}
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Date de Naissance</label>
										<div class="col-sm-9">
											{{$personnes[0]->date_naissance}}
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Statut familiale</label>
										<div class="col-sm-9">
											@if($personnes[0]->est_marie === true)
												Marié
											@else 
												Célibataire
											@endif
										</div>
									</div>
								</form>
							</div>
							<div class="card-body border-top pro-det-edit collapse " id="pro-det-edit-2">
								<form action="/editPerrsonnal" method="POST">
								@csrf
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nom Complet</label>
										<div class="col-sm-9">
											<input type="text" name="fullname" class="form-control" placeholder="Nom et Prenom" value="{{ $personnes[0]->nom . ' ' . $personnes[0]->prenom}}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Sexe</label>
										<div class="col-sm-9">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" value="1"  {{ $personnes[0]->sexe_ == 1 ? 'checked' : '' }}>
												<label class="custom-control-label" for="customRadioInline1">Homme</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="customRadioInline2" name="customRadioInline1" value="2" class="custom-control-input"  {{ $personnes[0]->sexe_ == 2 ? 'checked' : '' }}>
												<label class="custom-control-label" for="customRadioInline2">Femme</label>
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Date de Naissance</label>
										<div class="col-sm-9">
											<input type="date" class="form-control" value="{{$personnes[0]->date_naissance}}" name="birthDate">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Statut familiale</label>
										<div class="col-sm-9">
											<select name="familaleStatu" class="form-control" id="exampleFormControlSelect1">
												<option>Selectionner votre statut familiale</option>
												<option value="true"  {{ $personnes[0]->est_marie == true ? 'selected' : '' }}>Marié</option>
												<option value="false" {{ $personnes[0]->est_marie == false ? 'selected' : '' }}>Célibataire</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-primary" name="personnalInformation">Save</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="card">
							<div class="card-body d-flex align-items-center justify-content-between">
								<h5 class="mb-0">Informations pour calcul</h5>
								<button type="button" class="btn btn-primary btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pro-dont-edit" aria-expanded="false" aria-controls="pro-dont-edit-1 pro-dont-edit-2">
									<i class="feather icon-edit"></i>
								</button>
							</div>
							<div class="card-body border-top pro-dont-edit collapse show" id="pro-dont-edit-1">
								<form>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nombre d'enfant scholarisé</label>
										<div class="col-sm-9">
											{{$personnes[0]->nbr_enfant_scolarise}}
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nombre d'enfant non scholarisé</label>
										<div class="col-sm-9">
											{{$personnes[0]->nbr_enfant_non_scolarise}}
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Grade</label>
										<div class="col-sm-9">
											{{$personnes[0]->libelle_grade}}
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Point</label>
										<div class="col-sm-9">
											{{$personnes[0]->point_personne}}
										</div>
									</div>
								</form>
							</div>
							<div class="card-body border-top pro-dont-edit collapse " id="pro-dont-edit-2">
								<form action="/editPerrsonnal" method="POST">
								@csrf
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nombre d'enfant Scholarisé</label>
										<div class="col-sm-9">
											<input type="number" class="form-control" placeholder="Nombre d'enfant scholarisé" name="nbreEnfantScholarise" value="{{$personnes[0]->nbr_enfant_scolarise}}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Nombre d'enfant non scholarisé</label>
										<div class="col-sm-9">
											<input type="number" class="form-control" placeholder="Nombre enfant non scholarisé" name="nbreEnfantNonScholarise" value="{{$personnes[0]->nbr_enfant_non_scolarise}}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-primary" name="calculSubmit">Save</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="card">
							<div class="card-body d-flex align-items-center justify-content-between">
								<h5 class="mb-0">Informations d'authentification</h5>
								<button type="button" class="btn btn-primary btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pro-wrk-edit" aria-expanded="false" aria-controls="pro-wrk-edit-1 pro-wrk-edit-2">
									<i class="feather icon-edit"></i>
								</button>
							</div>
							<div class="card-body border-top pro-wrk-edit collapse show" id="pro-wrk-edit-1">
								<form>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Username</label>
										<div class="col-sm-9">
											{{$personnes[0]->username_email}}
										</div>
									</div>
								</form>
							</div>
							<div class="card-body border-top pro-wrk-edit collapse " id="pro-wrk-edit-2">
								<form action="/editPerrsonnal" method="POST">
								@csrf
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Username</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" placeholder="Username" value="{{$personnes[0]->username_email}}" name="username">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label font-weight-bolder">Mot de passe</label>
										<div class="col-sm-9">
											<input type="password" class="form-control" placeholder="Mot de passe" value="{{$personnes[0]->mot_de_passe}}" name="password">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-primary" name="loginButon">Save</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
						<div class="row">
							<div class="col-md-6">
								<div class="card user-card user-card-1">
									<div class="card-header border-0 p-2 pb-0">
										<div class="cover-img-block">
											<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
												<div class="carousel-inner">
													<div class="carousel-item active">
														<img src="assets/images/widget/slider5.jpg" alt="" class="img-fluid">
													</div>
													<div class="carousel-item">
														<img src="assets/images/widget/slider6.jpg" alt="" class="img-fluid">
													</div>
													<div class="carousel-item">
														<img src="assets/images/widget/slider7.jpg" alt="" class="img-fluid">
													</div>
												</div>
												<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></a>
												<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></a>
											</div>
										</div>
									</div>
									<div class="card-body pt-0">
										<div class="user-about-block text-center">
											<div class="row align-items-end">
												<div class="col text-left pb-3"><a href="#!"><i class="icon feather icon-star text-muted f-20"></i></a></div>
												<div class="col"><img class="img-radius img-fluid wid-80" src="assets/images/user/avatar-4.jpg" alt="User image"></div>
												<div class="col text-right pb-3">
													<div class="dropdown">
														<a class="drp-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#">Action</a>
															<a class="dropdown-item" href="#">Another action</a>
															<a class="dropdown-item" href="#">Something else here</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="text-center">
											<h6 class="mb-1 mt-3">Joseph William</h6>
											<p class="mb-3 text-muted">UI/UX Designer</p>
											<p class="mb-1">Lorem Ipsum is simply dummy text</p>
											<p class="mb-0">been the industry's standard</p>
										</div>
										<hr class="wid-80 b-wid-3 my-4">
										<div class="row text-center">
											<div class="col">
												<h6 class="mb-1">37</h6>
												<p class="mb-0">Mails</p>
											</div>
											<div class="col">
												<h6 class="mb-1">2749</h6>
												<p class="mb-0">Followers</p>
											</div>
											<div class="col">
												<h6 class="mb-1">678</h6>
												<p class="mb-0">Following</p>
											</div>
										</div>
									</div>
								</div>
							</div>
		<!-- profile body end -->
	</div>
</div>


@endsection
@section('scripts')
    <!-- Required Js -->
	<!-- <script src="../js/jquery.js"></script> -->
    <script src="../assets/js/vendor-all.min.js"></script>
    <script src="/assets/js/plugins/bootstrap.min.js"></script>
    <script src="/assets/js/ripple.js"></script>
	<script src="/assets/js/pcoded.min.js"></script>
	



<!-- ekko-lightbox Js -->
<script src="/assets/js/plugins/ekko-lightbox.min.js"></script>
<script src="/assets/js/pages/ac-lightbox.js"></script>
<script>
    $(document).ready(function () {
        $('#fh5co-header-section').css('background-image', 'url("/images/2.jpg")');
        $("a.active").removeClass();
        $("#PageActuel").val(window.location);
        $("#InDateEntree").val($("#DateEntree").text());
		$("#InDateSortie").val($("#DateSortie").text());
		$("#profile-tab").click()
	});
</script>
</script>
<script>
    document.getElementById('footer').style.display="none";
</script>

@endsection