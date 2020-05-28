<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<link rel="stylesheet" href="{{ asset('../css/app.css') }}" />
	<link rel="stylesheet" href="{{ url('../css/styleSidebarAdmin.css')}}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />

	<title>@yield('title')</title>
</head>

<body>
	<div class="container d-flex align-items-stretch">
		<nav id="sidebar" class="img" style="top: 0px;position: fixed;left: 0px;background-image: url({{ url('../images/bg_1.jpg')}});height: 100%;">
			<div class="p-4">
				<h1>
					<a href="index.html" class="logo">
						<img src="{{ url('../images/LogoIliass.png')}}" alt="Agence de réservations" style="width: 150px;margin-left:30px;" />
					</a>
				</h1>
				<ul class="list-unstyled components mb-5">
					<li>
						<a href="/">
							<span class="fas fa-house-user mr-3"></span> Accueil clientél
						</a>
					</li>
					<li id="logementLink" class="active">
						<a href="{{route('Logements.index')}}">
							<span class="fas fa-building mr-3"></span> Logements
						</a>
					</li>
					<li id="clientLink">
						<a href="{{url('Admin/Clients')}}">
							<span class="fas fa-users mr-3"></span> Clients
						</a>
					</li>
					<li id="demandeLink">
						<a href="{{url('Admin/Demandes')}}">
							<span class="fas fa-scroll mr-3"></span> Demandes
						</a>
					</li>
					<li id="reservationLink">
						<a href="{{url('Admin/Reservation')}}">
							<span class="fas fa-edit mr-3"></span> Réservations
						</a>
					</li>
					<li id="FacturationLink">
						<a href="{{url('Admin/Facturation')}}">
							<span class="fas fa-file-invoice-dollar mr-3"></span> Facturations
						</a>
					</li>
					<li id="StatistiqueLink">
						<a href="{{url('Admin/Statistiques')}}">
							<span class="fas fa-chart-line mr-3"></span> Statistiques
						</a>
					</li>
					<li id="historiqueLink">
						<a href="{{url('Admin/Historique')}}">
							<span class="fas fa-history mr-3"></span> Historique
						</a>
					</li>
				</ul>

				<div class="footer" style="position: absolute;  bottom: 0px;">
					<p>
						&nbsp;&nbsp;&nbsp;Isi3
						<a href="#" target="_blank">Grp N&ordm;2</a>.
						<br />Copyright &copy;
						<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved
					</p>
				</div>
			</div>
		</nav>
	</div>

	<div class="container" style="margin-left:23%;">
		@yield('content')
	</div>
	<script src="{{ asset('../js/app.js') }}"></script>

	<script src="{{ url('../js/jquery.js')}}">
	</script>
	<script src="{{ url('../js/popper.js')}}"></script>
	<script src="{{ url('../js/bootstrap.min.js')}}"></script>
	<script src="{{ url('../js/mainSidebarAdmin.js')}}"></script>


</body>

</html>