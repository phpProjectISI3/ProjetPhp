@extends('layout.app')

@section('title','Détails')

@section('linkcss')
<link rel="stylesheet" href="../css/detailrecherche.css" />
<link rel="stylesheet" href="../css/designRadioBtn.css" />
<link rel="stylesheet" href="../css/modalLogin.css" />
@endsection

@section('body')
<div class="fh5co-parallax" id="mainCover" data-stellar-background-ratio="0.5">
    <img name="slide" alt="image">
    <br />
    <a class="prev" onclick="previous()">&#10094;</a>
    <a class="next" onclick="next()">&#10095;</a>
</div>

<div id="fh5co-hotel-section">
    <div class="container containers">
        <div class="row" id="Row">
            <h1>-{{$logement->nom_logement}}-</h1>
            <div id="division">
                <label id="chambres"
                    name="chambrs">{{DB::table('logement')->join('detail_logement', 'logement.detail_logement_', '=', 'detail_logement.id_detail')->join('type_logement','detail_logement.type_logement_','=','type_logement.id_type_logement')->select('type_logement.libelle_type_logement')->where('logement.id_logement',$logement->id_logement)->value('libelle_type_logement') }}
                    avec <i class="fas fa-door-open"></i> {{$logement->nbr_piece}} piéces (en total
                    {{$logement->superficie_logement}} m&sup2;) pour <i class="fas fa-users"></i>
                    {{$logement->capacite_personne_max}} personnes </label>
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
                    <p id="valeurRadioBtn">Piscine.</p>
                </div>
                @endif
                <br />
                @if($logement->parking_disponible)
                <div class="roundedTwo">
                    <input type="checkbox" value="None" id="roundedTwo" name="check" disabled checked />
                    <label for="roundedTwo"></label>
                    <p id="valeurRadioBtn">Parking securisé.</p>
                </div>
                @endif
                <br />
                @if($logement->jardin_cours)
                <div class="roundedTwo">
                    <input type="checkbox" value="None" id="roundedTwo" name="check" disabled checked />
                    <label for="roundedTwo"></label>
                    <p id="valeurRadioBtn">petit jardin/cours pour mieu se détendre.</p>
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
                <iframe class="fh5co-map" id="map" src="{{$logement->localisation_logement}}" width="600" height="450"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
        <div id="rightside" class="rightside">
            <h2>
                @if((int)Carbon\Carbon::now()->format('m')
                < 6) {{$logement->tarif_par_nuit_bs}} @else {{$logement->tarif_par_nuit_hs}} @endif <span>
                    Dhs/nuit</span>
            </h2>
            <hr size="30" />
            {{-- <form id="MyForm" action=""> --}}

            <div>
                <div class="dates">
                    <span>Dates</span>
                    <div id="showdates">
                        <label id="DateEntree" style="font-size: 13px;">{{$datedebut}}</label>
                        <span>
                            <i class="fas fa-angle-double-right"></i>
                        </span>
                        <label id="DateSortie" style="font-size: 13px;">{{$datefin}}</label>
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
                            < 6) {{$logement->tarif_par_nuit_bs}} @else {{$logement->tarif_par_nuit_hs}} @endif Dhs
                                </span> </div> <hr class="scndhr" />
                            <div class="dates">
                                <span id="total" class="black">Total </span>
                                <span id="totalnuit" class="black">
                                    @if((int)Carbon\Carbon::now()->format('m')
                                    < 6) {{$tarif_bs}} @else {{$tarif_hs}} @endif MAD </span> </div> </div> <div
                                        id="reserver">
                                        @if(!App\Http\Controllers\Auth_Role_PersonneController::IsAuthentificated())
                                        <input type="submit" data-toggle="modal" data-target="#login-modal-redirect"
                                            value="Confirmer !" />
                                        @else
                                        <a href="/review/{{ $logement->id_logement}}">
                                            <input type="submit" value="Confirmer !" />
                                        </a>
                                        @endif
                            </div>
                    </div>
                    {{-- </form> --}}

                </div>
            </div>
        </div>
        <div class="modal fade" id="login-modal-redirect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="loginmodal-container">
                    <h1>Se connecter pour réserver</h1>
                    <br />
                    <form action="{{route('loginAndRedirectReview')}}" method="POST">
                        @csrf
                        <input type="text" name="email" placeholder="Pseudo" value="mail1@gmail.com" />
                        <input type="password" name="motdepasse" placeholder="Mot de passe" value="MotDePasse1" />
                        <input type="submit" class="login loginmodal-submit" value="Login" />

                        <input type="text" id="PageActuel" name="PageActuel" hidden />
                    </form>
                    <div class="login-help">
                        <a href="#">Mot de passe oublié ?</a>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('scripts')
        <script src="/js/jquery-2.1.4.min.js"></script>
        <script src="../js/detailRecherche.js"></script>
        <script>
            $(document).ready(function () {
                $("a.active").removeClass();
                $("#PageActuel").val(window.location);
            });

        </script>
        <script>
            var i, j = 0;
            var images = [];

            images = <?php echo json_encode($photo_logement); ?> ;


            function next() {

                if (i < images.length - 1) {
                    i++;
                } else {
                    i = 0;
                }

                document.slide.src = images[i].chemin_photo;
            }

            function previous() {
                if (i > 0)
                    i--;

                else {
                    i = images.length - 1;
                }
                document.slide.src = images[i].chemin_photo;
            }

            document.slide.src = images[0].chemin_photo;

        </script>
        @endsection
