@extends('layout.app')

@section('title','Détails')

@section('linkcss')
     <link rel="stylesheet" href="../css/detailrecherche.css"/>
	 <script src="https://kit.fontawesome.com/4f2d779e50.js" crossorigin="anonymous"></script>
	 <link rel="stylesheet" href="../css/designRadioBtn.css" />
	 <link rel="stylesheet" href="../css/modalLogin.css" />
	 <style>
	 #valeurRadioBtn{
	 position: absolute;
    margin-left: 30px;
    margin-top: 3%;
    padding: 0px;
    display: inline;
    width: 600px;
	 }
	 #rightside {
    position: fixed;
    width: 25%;
    height: 32em;
    background-color: #f5f5f5;
    box-shadow: 0 0 7px rgb(207, 207, 207);
    border-radius: 10px;
    z-index: 50;
    padding: 2em;
    top: 11em;
    right: -7%;
    transform: translate(-50%,0);
    }
	 </style>
@endsection

@section('body')
<div class="fh5co-parallax"   id="mainCover" data-stellar-background-ratio="0.5">
        <img name="slide"  alt="image">
		<!-- <script>
			var url = window.location.pathname;
			var pathIndex = url.substring(url.lastIndexOf('/') + 1);
			// alert(id);
			{{ $array = DB::table('photo_logement')->join('logement','photo_logement.logement_','=','logement.id_logement')->select('photo_logement.chemin_photo')->where('logement.id_logement',$logement->id_logement)->get() }}
			
			var i =0;
			var images = [];

			images = json_encode({{$array}});
			// images = json_encode({{$array}});

			
			function next () {

				if (i < images.length - 1) {
					i++;
				}
				else {
					i = 0;
				}
				
				document.slide.src = images[i];
			}

			function previous () {
				if (i > 0)
					i--;

				else {
					i = images.length - 1;
				}
				document.slide.src = images[i];
			}

			document.slide.src = images[0];
		</script> -->
        <br />
        <a class="prev" onclick="previous()">&#10094;</a>
        <a class="next" onclick="next()">&#10095;</a>
    </div>
    
	<div id="fh5co-hotel-section">
		<div class="container">
			<div class="row" id="Row">
				<h1>-{{$logement->nom_logement}}-</h1>
				<div id="division">
					<label id="chambres" name="chambrs">{{DB::table('logement')->join('detail_logement', 'logement.detail_logement_', '=', 'detail_logement.id_detail')->join('type_logement','detail_logement.type_logement_','=','type_logement.id_type_logement')->select('type_logement.libelle_type_logement')->where('logement.id_logement',$logement->id_logement)->value('libelle_type_logement') }} avec <i class="fas fa-door-open"></i> {{$logement->nbr_piece}} piéces (en total {{$logement->superficie_logement}} m&sup2;) pour <i class="fas fa-users"></i> {{$logement->capacite_personne_max}} personnes </label>
				</div>
				<hr>
				<div id="description">
					<p>{{$logement->description_logement}}</p>
				</div>
				<hr>
				<div id="Services">
					<h3>Services</h3>
				       @if($logement->piscine_disponible)
						    <div class="roundedTwo">
							  <input type="checkbox" value="None" id="roundedTwo" name="check" disabled checked />
							  <label for="roundedTwo"></label>
							  <p id="valeurRadioBtn" >Piscine.</p>
							</div>
						@endif
						<br />
						@if($logement->parking_disponible)
						    <div class="roundedTwo">
							  <input type="checkbox" value="None" id="roundedTwo" name="check" disabled checked />
							  <label for="roundedTwo"></label>
							  <p id="valeurRadioBtn" >Parking securisé.</p>
							 </div>
						@endif
						<br />
						@if($logement->jardin_cours)
						    <div class="roundedTwo">
							  <input type="checkbox" value="None" id="roundedTwo" name="check" disabled checked />
							  <label for="roundedTwo"></label>
							  <p id="valeurRadioBtn" >petit jardin/cours pour mieu se détendre.</p>
							</div>
						@endif
						<br />
						@if($logement->massage_disponible)
						    <div class="roundedTwo">
							  <input type="checkbox" value="None" id="roundedTwo" name="check" disabled checked />
							  <label for="roundedTwo"></label>
							  <p id="valeurRadioBtn">Massage/Spa par des profesionnels.</p>
							</div>
						@endif
			</div>
			<hr>
				<div id="Adresse">
					<h3>Adresse</h3>
					<p>{{ $logement->adress_logement}} </p>
					<iframe class="fh5co-map" id="map"
					src="{{$logement->localisation_logement}}"
					width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
					tabindex="0"></iframe>
				</div>
			</div>
			<div id="rightside">
				<h2>
					@if((int)Carbon\Carbon::now()->format('m')
					< 6)
						{{$logement->tarif_par_nuit_bs}}
				 @else
				    {{$logement->tarif_par_nuit_hs}}
				 @endif
					<span> Dhs/nuit</span>
				</h2>
				<hr size="30" />
				<!--			<form action="">
-->
				<div>
					<div class="dates">
						<span>Dates</span>
						<div id="showdates">
							<label id="DateEntree">{{$datedebut}}</label>
							<span>
								<i class="fas fa-angle-double-right"></i>
							</span>
							<label id="DateSortie">{{$datefin}}</label>
						</div>
					</div>
					<div class="dates">
						<div class="dates">
							<span>
								Séjour :
							</span>
							<span id="totalnuit">{{ $interval }} jours</span>
						</div>
						<hr class="scndhr" />
						<div class="dates">
							<span>
								Tarif :
							</span>
							<span id="totalnuit">
								@if((int)Carbon\Carbon::now()->format('m')
								< 6)
									{{$tarif_bs}}
							 @else
								{{$tarif_hs}}
							 @endif
							 Dhs (TTC)
							</span>
						</div>
						<hr class="scndhr" />
						<div class="dates">
							<span id="total" class="black">Total  </span>
							<span id="totalnuit" class="black">
							@if((int)Carbon\Carbon::now()->format('m')
								< 6)
									{{$tarif_bs}}
							 @else
								{{$tarif_hs}}
							 @endif
							MAD 
							</span>
						</div>
					</div>
					<div id="reserver">
						<input type="submit" data-toggle="modal" data-target="#login-modal" value="Confirmer !" />
					</div>
				</div>
				<!--			</form>
-->
			</div>
	</div>
	</div>

	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="loginmodal-container">
			<h1>Se connecter pour réserver</h1>
			<br />
			<form action="/Finalisation">
				<input type="text" name="user" placeholder="Pseudo" />
				<input type="password" name="pass" placeholder="Mot de passe" />
				<input type="submit" name="login" class="login loginmodal-submit" value="Login" />
			</form>

			<div class="login-help">
				<a href="#">Mot de passe oublié ?</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="../js/detailRecherche.js"></script>

<!-- <script type="text/javascript">
var i = 0;
var images = [];

images[0] = "../images/1.jpg";
images[1] = "../images/2.jpg";
images[2] = "../images/3.jpg";

function next () {

    if (i < images.length - 1) {
        i++;
    }
    else {
        i = 0;
    }
    
    document.slide.src = images[i];
}

function previous () {
    if (i > 0)
        i--;

    else {
        i = images.length - 1;
    }
    document.slide.src = images[i];
}

document.slide.src = images[0];

</script> -->
@endsection
