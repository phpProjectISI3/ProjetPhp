@extends('layout.app')

@section('title','Détails')

@section('linkcss')
     <link rel="stylesheet" href="css/detailrecherche.css">
     <link rel="stylesheet" href="css/review.css">
     <link rel="stylesheet" href="css/confirmation.css">
     <link rel="stylesheet" href="css/information.css">
@endsection

@section('body')
<div id="fh5co-hotel-section">
                <div class="container">
                    <div class="row" id="Row">
                      <div id="information">
                            <div >
                                <div id="Phone">
                                    <h3  style="margin: 7px 0px 20px 0px;" > &nbsp;Numéro de téléphone </h3>
                                    <input type="tel" name="tel" id="" placeholder="+212 06 98 42 17 20" required>
                                </div>
                            </div>
                        </div>
                     <h3 style="margin:5px;">Avez-vous des questions ?</h3>
                        <div id="division">
                            <textarea name="direqlqchose" id="" cols="70" rows="4" placeholder="Facultatif ..."></textarea>
                        </div>
                        
                        <div id="continue">
                            <input type="submit" value="Valider">
                        </div>

                        <!-- start: lors de la vérification du code envoyé  -->
                           <h3>Entrez le code de vérification</h3>
                            <div >
                                <input type="text" name="verificationCode" placeholder="Entree ici" style="text-align:center;" id="">
                            </div>
                      </div>
                        <div id="continue">
                            <input type="submit" value="Valider">
                        </div> 
                        <!-- : end -->
                        
                        <!-- start: when number verified this will be showed -->
                            <h3>Votre Numéro est vérifié</h3>
                            <p><img src="images/checkmark.png" alt="">+212642833827</p>
                        </div>
                        
                        <div id="continue">
                            <input type="submit" value="Continue">
                        </div> 
                        <!-- : end -->
                     </div>

                        <h1>Confirmation de payement</h1>
                        <div id="division">
                            <div id="firstname">
                                <h3>Prénom</h3>
                                <input type="text" name="firstName" id="" placeholder="Entrez votre prénom">
                            </div>
                            <div id="lastname">
                                <h3>Nom</h3>
                                <input type="text" name="lastName" id="" placeholder="Entrez votre nom">
                            </div>
                        </div>
                        <hr>
                        <div id="acceptedcards">
                            <h3>Les cartes acceptes </h3>
                            <div id="cards">
                                <img src="images/visa.png" alt="">
                                <img src="images/MasterCard_Logosvg.png" alt="">
                            </div>
                        </div>
                        <hr>
                        <div id="CardInfo">
                            <h3>Informations de la carte</h3>
                            <input type="text" name="cardnumber" placeholder="Numéro de la carte" id="cardnumber">
                            <div >
                                <input type="text" name="expiration"  placeholder="Date d'expiration" id="expiration">
                                <input type="text" name="CVV" placeholder="Code CVV" id="CVV">
                                <input type="text" name="zipCode"  placeholder="Zip Code" id="expiration">
                            </div>
                            
                        </div>
                        <hr>
                        <div id="cancellationpolicy">
                            <h3>Politiques d'annulation</h3>
                            <p>Une annulation 5 jours avant sera gratuite</p>
                            <p>Une annulation 3 jours avant, vous serez rembourssé de 80%</p>
                            <p>Une annulation avant moins de 3 jours, vous serez rembourssé que de 10%</p>
                        </div>
                        <hr>
                        <div id="policy">
                            <img src="images/privacy-policy.png" alt=""> 
                            <p id="lastP">
                            En sélectionnant le bouton en bas, vous acceptez les règles de la maison, la politique d'annulation et la politique de remboursement des clients. vous acceptez également de payer le montant total indiqué, qui comprend les taxes d'occupation et les frais de service. ISI3 perçoit et remet désormais les taxes d'occupation imposées par le gouvernement à cet endroit. </p>

                        </div>
                                <div id="continue">
                                    <input type="submit" value="Confirmer">
                                </div>
                    <div id="rightside">
                        <h2>MAD486 <span>/nuit</span></h2>
                        <hr size="30">
                        <form action="login.html">

                            <div class="dates">
                                <span>Dates</span>
                                <div id="showdates">
                                    <Label id="DateEntree">2020-04-14</Label>
                                    <span><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24"
                                            viewBox="0 0 172 172" style=" fill:#000000;">
                                            <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1"
                                                stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10"
                                                stroke-dasharray="" stroke-dashoffset="0" font-family="none"
                                                font-weight="none" font-size="none" text-anchor="none"
                                                style="mix-blend-mode: normal">
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
                                    <span id="total" class="black">Total  </span>
                                    <span id="totalnuit" class="black">MAD 2.916</span>
                                </div>
                            </div>
                            <!-- <div id="reserver">
                                <input type="submit" value="Réserver">
                            </div> -->
                        </form>
                    </div>
            <!-- END fh5co-page -->
<script src="../js/jquery.js"></script>
<script>
	$(document).ready(function () {
		$('#fh5co-header-section').css('background-image', 'url("/images/2.jpg")');
		$("a.active").removeClass();
	});
</script>
@endsection
