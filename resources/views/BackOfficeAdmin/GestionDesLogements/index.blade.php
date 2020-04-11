@extends('BackOfficeAdmin.AdminLayout')

<link rel="stylesheet" href="css/items.css" />
<link rel="stylesheet" href="css/jumbotron.css" />
<link rel="stylesheet" href="css/SearchRBNB.css" />

<!-- Icons font CSS-->
<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all" />
<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all" />
<!-- Font special for pages-->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet" />

<!-- Vendor CSS-->
<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all" />
<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all" />

<!-- Main CSS-->
<link href="css/main.css" rel="stylesheet" media="all" />

<script src="https://kit.fontawesome.com/4f2d779e50.js" crossorigin="anonymous"></script>

@section('title','Accueil')

@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet" />

<a href="{{route('Logements.create')}}" class="btn btn-success">
	<i class="fa fa-plus" aria-hidden="true"></i>
	Nouveau Logement
</a>

<div class="cardCodePen cardCodePen-7 ">
	<div class="cardCodePen-body">
		<form class="form" method="POST" action="#">
			<div class="input-groupCodePen input--large">
				<label class="labelCodePen">Aller à ..!</label>
				<input class="input--style-1" type="text" placeholder="Destination, nom du lieu" name="going" />
			</div>
			<div class="input-groupCodePen input--medium">
				<label class="labelCodePen">Depuis</label>
				<input class="input--style-1" type="text" name="checkin" placeholder="Mois/Jour/Année" id="input-start" />
			</div>
			<div class="input-groupCodePen input--medium">
				<label class="labelCodePen">Jusqu'à</label>
				<input class="input--style-1" type="text" name="checkout" placeholder="Mois/Jour/Année" id="input-end" />
			</div>
			<div class="input-groupCodePen input--medium">
				<label class="labelCodePen">Voyageurs</label>
				<div class="input-groupCodePen-icon js-number-input">
					<div class="icon-con">
						<span class="plus">+</span>
						<span class="minus">-</span>
					</div>
					<input class="input--style-1 quantity" type="text" name="guests" value="2 Persn" />
				</div>
			</div>
			<button class="btn-submit" type="submit">search</button>
		</form>
	</div>
</div>

<div class="MonContainer">
	@foreach($logements as $logement)
	<article class="carte">
		<header class="carte__thumb">
			<a href="#">
				<img id="imgLogement" src="https://a0.muscache.com/im/pictures/e85d7dbf-ff50-42d6-8e61-dfb242813fd5.jpg?aki_policy=xx_large" />
			</a>
		</header>
		<div class="carte__date">
			<span class="carte__date__day">12</span>
			<span class="carte__date__month">Mai</span>
		</div>
		<div class="carte__body">
			<h2 class="carte__title">
				<a href="#">{{$logement->nom_logement}}</a>
			</h2>

			<div class="carte__subtitle">{{$logement->adress_logement}}</div>
			<p class="carte__description" id="description">
				{{ DB::table('logement')->join('detail_logement', 'logement.detail_logement_', '=', 'detail_logement.id_detail')->select('detail_logement.description_logement')->where('logement.id_logement',$logement->id_logement)->value('description_logement') }}

			</p>
		</div>
		<footer class="carte__footer">
			<span class="fa fa-star"></span> 5
                &nbsp;&nbsp;&nbsp;
			<span class="fa fa-commenting-o"></span>
			<a href="#">39 comments</a>
		</footer>
	</article>
	@endforeach
	<script>
		var i;
		var divs = document.getElementsByClassName('carte__description');
		for (i = 0; i < divs.length; i++) {
			divs[i].innerHTML = divs[i].innerHTML.substring(0, 300) + '....<a href="#" style="color: blue;">plus de détail !</a>';
			console.log('test !');

		}
	</script>

	<!-- Jquery JS-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<!-- Vendor JS-->
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/jquery-validate/jquery.validate.min.js"></script>
	<script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
	<script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
	<script src="vendor/datepicker/moment.min.js"></script>
	<script src="vendor/datepicker/daterangepicker.js"></script>

	<!-- Main JS-->
	<script src="js/global.js"></script>
</div>
@endsection
