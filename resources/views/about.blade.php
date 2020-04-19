@extends('layout.app')

@section('title','Nos Offres')

@section('linkcss')
		<link rel="stylesheet" href="../css/hotel.css">

@endsection
@section('body')
<div class="fh5co-parallax" style="background-image: url(/images/1.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
					<div class="fh5co-intro fh5co-table-cell">
						<h1 class="text-center">Choisissez Votre Offre</h1>
						<p>La vie une est à peu près la même sous toutes les latitudes.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-hotel-section">
		<div class="container">
			<div id="SearchBtn">
				<button id="Search"> Search
					<i class="glyphicon glyphicon-search" style="padding-left:  1em;"></i>
				</button>
				<div id="SearchZone">
					<div class="a-col selets">
						<section>
							<select class="cs-select cs-skin-border selectManual">
								<option value="" disabled selected>Type </option>
								<option value="email">Villa</option>
								<option value="twitter">Maison</option>
								<option value="linkedin">Appartement</option>
							</select>
						</section>
					</div>
					<div class="a-col selets">
						<section>
							<select class="cs-select cs-skin-border selectManual">
								<option value="" disabled selected>Nombre des Chambres </option>
								<option value="email">2</option>
								<option value="twitter">2 à 4</option>
								<option value="linkedin">+4</option>
							</select>
						</section>
					</div>
					<div class="a-col selets">
						<section>
							<select class="cs-select cs-skin-border selectManual">
								<option value="" disabled selected>Nombre des Personnes </option>
								<option value="email">2</option>
								<option value="twitter">2 à 4</option>
								<option value="linkedin">+4</option>
							</select>
						</section>
					</div>
					<div class="a-col selets">
						<section>
							<select class="cs-select cs-skin-border selectManual">
								<option value="" disabled selected>Ville </option>
								<option value="Oujda">Oujda</option>
								<option value="Meknes">Meknes</option>
								<option value="Rabat">Rabat</option>
							</select>
						</section>
					</div>
					<div class="alternates">
						<div class="a-col alternate selets">
							<div class="input-field">
								<label for="date-start">Date Arrivée</label>
								<input type="text" class="form-control" id="date-start" />
							</div>
						</div>
						<div class="a-col alternate selets">
							<div class="input-field">
								<label for="date-end">Date Sortie</label>
								<input type="text" class="form-control" id="date-end" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($logements as $logement)
				<div class="col-md-4" >
					<div class="hotel-content" >
						<div class="hotel-grid"  style="background-image: url({{ DB::table('photo_logement')->join('logement','photo_logement.logement_','=','logement.id_logement')->select('photo_logement.chemin_photo')->where('logement.id_logement',$logement->id_logement)->value('chemin_photo')}});">
							<div class="price" ><small></small><span>{{$logement->tarif_par_nuit_hs}}/nuit</span></div>
							<a class="book-now text-center" href="/detailRecherche/{{$logement->id_logement}}"><i class="ti-calendar"></i> Réserver ! </a>
						</div>
						<div class="desc sameHeight" id="carte">
							<h3><a href="/detailRecherche/{{$logement->id_logement}}">{{$logement->nom_logement}} </a></h3>
							<p class="carte__description">{{$logement->description_logement}}</p>
						</div>
					</div>
				</div>
				@endforeach
				<script>
					var i;
					var divs = document.getElementsByClassName('carte__description');
					for (i = 0; i < divs.length; i++) {
						divs[i].innerHTML = divs[i].innerHTML.substring(0, 110) + '....<a href="{{url('detailRecherche')}}" style="color: orangered;">plus de détail !</a>';
					}
				</script>
				</div>
		</div>
	</div>

@endsection

@section('scripts')
	<script src="/js/search.js"></script>
@endsection
