@extends('layout.app')

@section('title','Détails')
<link rel="stylesheet" href="../css/detailrecherche.css" />
<link rel="stylesheet" href="../css/review.css" />
<script src="https://kit.fontawesome.com/4f2d779e50.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/designRadioBtn.css" />
@section('linkcss')

<style>
    #valeurRadioBtn {
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
        transform: translate(-50%, 0);
    }
</style>
@endsection

@section('body')
<div id="fh5co-hotel-section">
    <div class="container">
        <div class="row" id="Row">
            <h1>
                <i class="fas fa-scroll mr-3"></i> Quelque régles de base
            </h1>
            <hr />
            <div id="Entre">
                <h3>Rappel des caractéristiques.</h3>
                <ul>
                    <b>
                        <i class="fas fa-house-user mr-3"></i> -{{ $logement->nom_logement }}-
                    </b>
                    <br />
                    <i class="input-group-text fas fa-map-marked-alt"></i>
                    <em>{{ $logement->adress_logement }}</em>
                    <br />
                    <i class="input-group-text fas fa-map-marked-alt"></i>
                    <em>une superficie de {{ $logement->superficie_logement }} m&sup2;</em>
                    <br />
                    <i class="input-group-text fas fa-door-open"></i>
                    <em>{{ $logement->nbr_piece }} piéces.</em>

                </ul>
            </div>
            <hr />
            <div id="Description">
                <h3>Description</h3>
                <ul>
                    <p>{{ $logement->description_logement }}</p>
                </ul>
            </div>
            <hr />
            <div id="Sortie">
                <h3>Les services et conforts.</h3>
                <ul>
                    @if($logement->piscine_disponible)
                    <div class="roundedTwo">
                        <input type="checkbox" value="None" id="roundedTwo" name="check" disabled checked />
                        <label for="roundedTwo"></label>
                        <p id="valeurRadioBtn">Piscine.</p>
                    </div>
                    <br />
                    @endif
                    @if($logement->parking_disponible)
                    <div class="roundedTwo">
                        <input type="checkbox" value="None" id="roundedTwo" name="check" disabled checked />
                        <label for="roundedTwo"></label>
                        <p id="valeurRadioBtn">Parking securisé.</p>
                    </div>
                    <br />
                    @endif
                    @if($logement->jardin_cours)
                    <div class="roundedTwo">
                        <input type="checkbox" value="None" id="roundedTwo" name="check" disabled checked />
                        <label for="roundedTwo"></label>
                        <p id="valeurRadioBtn">petit jardin/cours pour mieu se détendre.</p>
                    </div>
                    <br />
                    @endif
                    @if($logement->massage_disponible)
                    <div class="roundedTwo">
                        <input type="checkbox" value="None" id="roundedTwo" name="check" disabled checked />
                        <label for="roundedTwo"></label>
                        <p id="valeurRadioBtn">Massage/Spa par des profesionnels.</p>
                    </div>
                    @endif
                </ul>
            </div>
            <hr />
            <div id="Services">
                <h3>Regles &aacute; respecter.</h3>
                <ul>
                    <p>
                        Ces conditions, politiques et normes s'appliquent dans le cadre de votre accès et de votre
                        utilisation de la plate-forme
                        <a href="#" style="text-decoration:underline">Luxe Booking</a> en complément de nos Conditions
                        générales et de nos Conditions de service relatives aux paiements.
                    </p>
                    <ul>
                        <li> Respecter le temps impartie et choisit lors de votre réservation.</li>
                        <li>Bien etre au rendez vous et respectez le dernier delais de sortie.</li>
                        <li>Ne pas depasser les 7jours par reservation </li>
                        <li>Prendre soin du logement ainsi que toute l'électro-menager disponible</li>
                        <li>Ne pas deranger les autres locataires/voisins du lieu destiné.</li>
                    </ul>
                </ul>
            </div>
            <hr />
            <div id="Interdictions">
                <h3>En cas d'annulation</h3>
                <ul>
                    Marge d&acute;annulation : &nbsp;
                    <b style="color:red; text-decoration:underline ">{{ $logement->marge_annulation }} jours</b>
                    <br />
                    Tarif/sanction d&acute;annulation : &nbsp;
                    <b style="color:red; text-decoration:underline ">{{ $logement->tarif_annulation }} Dhs</b>
                    <br />
                    <br />
                    <p style="text-align: center;border:dashed">
                        Il est fortement recommander de jeter un coup d'oeil sur
                        <a href="#" style=" text-decoration:underline;">notre politique d'annulation</a> afin que vous
                        soyez remboursée en cas vous auriez changer d'avis ou de destination ..
                        Ainsi eviter tout mal entendu/conflit car il est tout a fait possible d'etre sanctionné si vous
                        integrer la marge d'annulation (qui dépend de chaque logement).
                    </p>
                </ul>
            </div>
        </div>
        <div id="rightside">
            <h2>
                @if((int)Carbon\Carbon::now()->format('m')
                < 6) {{$logement->tarif_par_nuit_bs}} @else {{$logement->tarif_par_nuit_hs}} @endif <span>
                    Dhs/nuit</span>
            </h2>
            <hr size="30" />
            <form action="{{route('saveDemande')}}" method="POST">
                @csrf
                <div>
                    <div class="dates">
                        <span>Dates</span>
                        <div id="showdates">
                            <label id="DateEntree" name="DateEntree" style="font-size: 13px;">{{$datedebut}}</label>
                            <span style="padding-left: 30%;padding-top: 15%;">
                                <i class="fas fa-angle-double-right"></i>
                            </span>
                            <label id="DateSortie" style="font-size: 13px;">{{$datefin}}</label>

                            <input type="text" id="InDateEntree" name="InDateEntree" hidden />
                            <input type="text" id="InDateSortie" name="InDateSortie" hidden />
                            <input type="text" id="PageActuel" name="PageActuel" hidden />
                        </div>
                    </div>
                    <div class="dates">
                        <div class="dates">
                            <span>
                                Séjour :
                            </span>
                            <span id="totalnuit">{{$interval}} nuit</span>
                        </div>
                        <hr class="scndhr" />
                        <div class="dates">
                            <span>
                                Tarif :
                            </span>
                            <span id="totalnuit">
                                @if((int)Carbon\Carbon::now()->format('m')
                                < 6) {{$logement->tarif_par_nuit_bs}} @else {{$logement->tarif_par_nuit_hs}} @endif Dhs</span> </div> <hr class="scndhr" />
                                <div class="dates">
                                    <span id="total" class="black">Total </span>
                                    <span id="totalnuit" class="black" style="margin-left: 0%;">
                                        @if((int)Carbon\Carbon::now()->format('m')
                                        < 6) {{$tarif_bs}} @else {{$tarif_hs}} @endif Dhs (TTC) </span> </div> </div> <div id="reserver">
                                            <input type="submit" value="Demander une réservation !" />
                                </div>
                        </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/jquery.js"></script>

<script>
    $(document).ready(function() {
        $('#fh5co-header-section').css('background-image', 'url("/images/2.jpg")');
        $("a.active").removeClass();
        $("#PageActuel").val(window.location);
        $("#InDateEntree").val("{{$datedebutNoFormat}}");
        $("#InDateSortie").val("{{$datefinNoFormat}}");
    });
</script>
<!-- END fh5co-page -->

@endsection
@section('scripts')
<script>
    document.getElementById('footer').style.display = "none";
</script>
@endsection