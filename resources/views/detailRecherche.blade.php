@extends('layout.app')

@section('title','Détails')

@section('linkcss')
     <link rel="stylesheet" href="../css/detailrecherche.css"/>
	 <script src="https://kit.fontawesome.com/4f2d779e50.js" crossorigin="anonymous"></script>
	 <link rel="stylesheet" href="../css/designRadioBtn.css" />
	 <style>
	 #valeurRadioBtn{
	 position: absolute;
    margin-left: 30px;
    margin-top: 3%;
    padding: 0px;
    display: inline;
    width: 600px;
	 }
	 </style>
@endsection

@section('body')
<div class="fh5co-parallax"   id="mainCover" data-stellar-background-ratio="0.5">
        <img name="slide"  alt="image">
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
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.91245062501!2d-1.9006504850806016!3d34.65691389307045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7864a5817de333%3A0x4365aa956bd4ff1e!2sSupMTI!5e0!3m2!1sfr!2sma!4v1584826832545!5m2!1sfr!2sma"
					width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
					tabindex="0"></iframe>
				</div>
			</div>
			<div id="rightside" name="rightside">
				<h2>
				@if((int)Carbon\Carbon::now()->format('m') < 6)
				{{$logement->tarif_par_nuit_bs}}
				@else
				{{$logement->tarif_par_nuit_hs}}
				@endif
				<span>/nuit</span>
				</h2>
				<hr size="30">
				<form action="{{url('login')}}">
					
					<div class="dates">
						<span>Dates</span>
						<div id="showdates">
							<label id="DateEntree">{{$datedebut ?? 'Debut'}}</label>
							<span>
								<i class="fas fa-angle-double-right"></i>					
							</span>
							<label id="DateSortie">{{$datefin ?? 'Fin'}}</label>
						</div>
					</div>
					<div class="dates">
						<div class="dates">
							<span>
								Séjour :
							</span>
							<span id="totalnuit">5 nuits</span>
						</div>
						<hr class="scndhr" />
						<div class="dates">
							<span>
								Tarif :
							</span>
							<span id="totalnuit">
								@if((int)Carbon\Carbon::now()->format('m')< 6)
									{{$logement->tarif_par_nuit_bs}}
								 @else
									{{$logement->tarif_par_nuit_hs}}
								 @endif
								 Dhs (TTC)
							</span>
						</div>
						<hr class="scndhr" />
						<div class="dates">
							<span id="total" class="black">Total  </span>
							<span id="totalnuit" class="black">MAD 2.916</span>
						</div>
					</div>
			<div id="reserver">
				<input type="submit" value="Réserver" >	
			</div>
		</form>
		</div>
	</div>
	</div>
@endsection

@section('scripts')
<!--<script src="../js/detailRecherche.js"></script>
-->
<script type="text/javascript">
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

</script>
@endsection
