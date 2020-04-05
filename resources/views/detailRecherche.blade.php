@extends('app')

@section('title','Détails')

@section('linkcss')
     <link rel="stylesheet" href="css/detailrecherche.css">
@endsection

@section('body')
<div class="fh5co-parallax"   id="mainCover" data-stellar-background-ratio="0.5">
        <img name="slide"  alt="">
        <br />
        <a class="prev" onclick="previous()">&#10094;</a>
        <a class="next" onclick="next()">&#10095;</a>
    </div>
    
	<div id="fh5co-hotel-section">
		<div class="container">
			<div class="row" id="Row">
				<h1>Villa</h1>
				<div id="division">
					<label id="chambres" name="chambrs">2 Chambres</label><span></span>
					<label id="toilettes" name="toilettes">1 Toilette </label><span></span>
					<label id="sallemanger" name="sallemanger">1 Salle à manger </label><span></span>
					<label id="sejour" name="sejour">1 Sejour</label>
				</div>
				<hr>
				<div id="description">
					<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus praesentium asperiores esse facere libero deserunt dolores hic ipsa? Dolorem nam ratione voluptatibus iusto fugit nostrum recusandae placeat pariatur porro, veritatis facere aliquam nulla corporis iure, repellendus autem ea molestias praesentium. Voluptatibus voluptatum quisquam, modi laudantium unde voluptate dolore aliquid soluta.</p>
				</div>
				<hr>
				<div id="Services">
					<h3>Services</h3>
					<ul>
						<li> Eau Chaude </li>
						<li> Télévision </li>
						<li> Climatiseur </li>
						<li> Wifi </li>
					</ul>
				</div>
				<div id="Interdictions">
					<h3>Interdictions</h3>
					<ul>
						<li> Espace non fumeur </li>
						<li> Fête ou Partie </li>
						<li> Chien </li>
					</ul>
				</div>
				<hr>
				<div id="Adresse">
					<h3>Adresse</h3>
					<p><span>Oujda</span> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam, reprehenderit! </p>
					<iframe class="fh5co-map" id="map"
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.91245062501!2d-1.9006504850806016!3d34.65691389307045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7864a5817de333%3A0x4365aa956bd4ff1e!2sSupMTI!5e0!3m2!1sfr!2sma!4v1584826832545!5m2!1sfr!2sma"
					width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
					tabindex="0"></iframe>
				</div>
			</div>
			<div id="rightside" name="rightside">
				<h2>MAD486 <span>/nuit</span></h2>
				<hr size="30">
				<form action="{{url('login')}}">
					
					<div class="dates">
						<span>Dates</span>
						<div id="showdates">
							<Label id="DateEntree">2020-04-14</Label>
							<span><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172"
								style=" fill:#000000;">
								<g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter"
								stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none"
								font-size="none" text-anchor="none" style="mix-blend-mode: normal">
								<path d="M0,172v-172h172v172z" fill="none"></path>
								<g fill="#a5a5a5">
									<path
									d="M91.15104,9.18229l-10.30208,10.30208l59.34896,59.34896h-140.19792v14.33333h140.19792l-59.34896,59.34896l10.30208,10.30208l71.66667,-71.66667l4.92708,-5.15104l-4.92708,-5.15104z">
								</path>
								</g>
							</g>
						</svg></span>
						<Label id="DateSortie">2020-04-17</Label>
					</div>
				</div>
				<div class="dates">
					<span>Dates</span>
					<div id="guests">
						<select class="count" name="" id="">
							<option value="" selected disabled>Choisir le nombre de personnes</option>
							<option value="1">- 2</option>
							<option value="2">2 - 4</option>
							<option value="3">4 - 8</option>
							<option value="4">8 +</option>
						</select>
					</div>
					<div class="dates">
						<span>MAD486 <span id="numbernuit"> x 3 nuits</span></span>
					<span id="totalnuit">MAD 1,458</span>
				</div>
				<hr class="scndhr">
				<div class="dates">
					<span>MAD 1.458 <span id="numbernuit"> x 2 pers</span></span>
					<span id="totalnuit">MAD 2.916</span>
				</div>
				<hr class="scndhr">
				<div class="dates">
					<span id="total" class="black">Total : </span>
					<span id="totalnuit" class="black">MAD 2.916</span>
				</div>
			</div>
			<div id="reserver">
				<input type="submit" value="Réserver" >	
			</div>
		</form>
		</div>
	</div>
@endsection

@section('scripts')
<script src="js/scrolling.js"></script>
	<script src="js/detailRecherche.js"></script>
@endsection