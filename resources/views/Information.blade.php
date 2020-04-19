@extends('layout.app')

@section('title','Informations')

@section('linkcss')
     <link rel="stylesheet" href="css/detailrecherche.css">
     <link rel="stylesheet" href="css/review.css">
     <link rel="stylesheet" href="css/information.css">
@endsection

@section('body')
<div id="fh5co-hotel-section">
                <div class="container">
                    <div class="row" id="Row">
                        <h1>Dire quelques chose ?</h1>
                        <div id="division">
                            <textarea name="direqlqchose" id="" cols="70" rows="7"></textarea>
                        </div>
                        <hr>
                        <div id="information">
                            <h3>Verifier Numéro de téléphone</h3>
                            <div >
                                <div id="Phone">
                                    <h3>Numéro de téléphone</h3>
                                    <input type="tel" name="tel" id="" placeholder="Numéro de téléphone">
                                </div>
                            </div>
                        </div>
                        
                        <div id="continue">
                            <input type="submit" value="Valider">
                        </div>



                        <!-- start: lors de la vérification du code envoyé  -->
                            <!-- <h3>Entrez le code de vérification</h3>
                            <div >
                                <input type="text" name="verificationCode" placeholder="Entree ici" style="text-align:center;" id="">
                            </div>
                        </div>
                        
                        <div id="continue">
                            <input type="submit" value="Valider">
                        </div> -->
                        <!-- : end -->
                        
                        

                        <!-- start: when number verified this will be showed -->
                            <!-- <h3>Votre Numéro est vérifié</h3>
                            <p><img src="images/checkmark.png" alt="">+212642833827</p>
                        </div>
                        
                        <div id="continue">
                            <input type="submit" value="Continue">
                        </div>  -->
                        <!-- : end -->


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
                </div>
            </div>
            <!-- END fh5co-page -->

@endsection
