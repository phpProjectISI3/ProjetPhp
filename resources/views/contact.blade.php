@extends('layout.app')

@section('title','Contact')
<link rel="stylesheet" href="css/notifStyle.css" />
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
@section('body')
<!--<script>
    $.notify("Message envoyé. Nous vous répondrons dés que possible !", {
        className: "success",
        showDuration: 800,
        hideDuration: 800,
        autoHideDelay: 8000,
        position: "top center",
        arrowShow: true,
        color: "#fff",
        background: "#D44950"
    });
</script>-->
<div class="fh5co-parallax" style="background-image: url(images/1.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
				<div class="fh5co-intro fh5co-table-cell">
					<h1 class="text-center elem-demo">Conctacter Nous</h1>
					<p>
						Si vous avez des questions ou pour plus d'informations,
						<a href="#map"> Veuillez nous contacter! </a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="fh5co-contact-section">
	<div class="row">
		<div class="col-md-6">
			<iframe class="fh5co-map" id="map"
				src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.91245062501!2d-1.9006504850806016!3d34.65691389307045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd7864a5817de333%3A0x4365aa956bd4ff1e!2sSupMTI!5e0!3m2!1sfr!2sma!4v1584826832545!5m2!1sfr!2sma"
				width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
				tabindex="0"></iframe>
		</div>
		<div class="col-md-6">
			<div class="col-md-12">
				<h3 class="testh3">Notre Adresse</h3>
				<p>Nous sommes à l'écoute si vous avez besoin de plus d'informations !</p>
				<ul class="contact-info">
					<li>
						<i class="ti-map"></i>Boulevad almaqdis, N6 Oujda
					</li>
					<li>
						<i class="ti-mobile"></i>+212 5366-90906
					</li>
					<li>
						<i class="ti-envelope"></i>
						<a href="#">supmtioujda@gmail.com</a>
					</li>
					<li>
						<i class="ti-home"></i>
						<a href="#">www.supmtioujda.ma</a>
					</li>
				</ul>
			</div>
			<div class="col-md-12">
				<div class="row">
					<form id="contactForm">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" id="text_nom" class="form-control" placeholder="Nom Complet (facultatif..)" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input name="id_client" id="id_client" type="number" class="form-control" placeholder="Votre réferent client"  required />
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<textarea name="message_ecrit" class="form-control" id="message_ecrit" cols="30" rows="7" placeholder="Votre message ici. (max : 250 caractères)" required></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input id="BtnEnvoyer" type="submit" value="Envoyer" class="btn btn-primary" style="height: unset;width:unset;" />

								<div class="notifAlert hide">
									<span class="fas fa-envelope-open-text"></span>
									<span class="msg">Message envoyé. Nous répondrons aussit&ocirc;t!</span>
									<div class="close-btn">
										<span class="fas fa-times"></span>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<!--<script src="/js/jquery.js"></script>-->
<!--<script>
    $('#BtnEnvoyer').click(function () {
        $('.notifAlert').addClass("show");
        $('.notifAlert').removeClass("hide");
        $('.notifAlert').addClass("showAlert");
      setTimeout(function () {
          $('.notifAlert').removeClass("show");
          $('.notifAlert').addClass("hide");
      }, 5000);
    });
    $('.close-btn').click(function () {
        $('.notifAlert').removeClass("show");
        $('.notifAlert').addClass("hide");
    });
</script>-->
<script>

	$(document).ready(function () {
        $('#contactForm').on('submit', function (event) {
            event.preventDefault();

            emeteur = $('#id_client').val();
            message = $('#message_ecrit').val();

            $.ajax({
                url: "/contact",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    emeteur: emeteur,
                    message: message
				},
                success: function () {
                    $('.notifAlert').addClass("show");
                    $('.notifAlert').removeClass("hide");
                    $('.notifAlert').addClass("showAlert");
                    setTimeout(function () {
                        $('.notifAlert').removeClass("show");
                        $('.notifAlert').addClass("hide");
					}, 5000);
					$("#id_client").val("");
					$("#message_ecrit").val("");
					$("#text_nom").val("");
                }
            });
        });
    });
</script>

@endsection

