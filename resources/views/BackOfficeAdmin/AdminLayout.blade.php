<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<link rel="stylesheet" href="{{ asset('../css/app.css') }}" />
	<link rel="stylesheet" href="../css/styleSidebarAdmin.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
<!--	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
		rel="stylesheet"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
		crossorigin="anonymous" />-->
	<title>@yield('title')</title>
</head>
<body>
	<div class="container d-flex align-items-stretch" >
		<nav id="sidebar" class="img"
			style="top: 0px;position: fixed;left: 0px;background-image: url(../images/bg_1.jpg);height: 100%;">
			<div class="p-4">
				<h1>
					<a href="index.html" class="logo">
						<img src="../images/LogoIliass.png" alt="Agence de réservations" style="width: 150px;margin-left:30px;" />
					</a>
				</h1>
				<ul class="list-unstyled components mb-5">
					<li>
						<a href="#">
							<span class="fas fa-house-user mr-3"></span> Accueil
						</a>
					</li>
					<li class="active">
						<a href="{{route('Logements.index')}}">
							<span class="fas fa-building mr-3"></span> Logements
						</a>
					</li>
					<li>
						<a href="#">
							<span class="fas fa-users mr-3"></span> Clients
						</a>
					</li>
					<li>
						<a href="#">
							<span class="fas fa-scroll mr-3"></span> Demandes
						</a>
					</li>
					<li>
						<a href="#">
							<span class="fas fa-edit mr-3"></span> Réservations
						</a>
					</li>
					<li>
						<a href="#">
							<span class="fas fa-file-invoice-dollar mr-3"></span> Facturations
						</a>
					</li>
					<li>
						<a href="#">
							<span class="fas fa-chart-line mr-3"></span> Statistiques
						</a>
					</li>
					<li>
						<a href="#">
							<span class="fas fa-history mr-3"></span> Historique
						</a>
					</li>
				</ul>

				
			
				
				<div class="footer" style="position: absolute;  bottom: 0px;">
					<p>
						&nbsp;&nbsp;&nbsp;Isi3
						<a href="#" target="_blank">Grp N&ordm;2</a>.
						<br />Copyright &copy;
						<script>document.write(new Date().getFullYear());</script> All rights reserved
					</p>
				</div>
			</div>
		</nav>
	</div>

	<div class="container" style="margin-left:23%;">
		@yield('content')
	</div>
	<script src="{{ asset('../js/app.js') }}"></script>

	<<script src="../js/jquery.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/mainSidebarAdmin.js"></script>


</body>
</html>
