@extends('layout.app')

@section('title','Détails')

@section('linkcss')
<link rel="stylesheet" href="../css/detailrecherche.css" />
<link rel="stylesheet" href="../css/review.css" />
<script src="https://kit.fontawesome.com/4f2d779e50.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/designRadioBtn.css" />

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
    <div class="row">
        @foreach($logements as $logement)
        <div class="col-md-4">
            <div class="hotel-content">
                <div class="hotel-grid"
                    style="background-image: url({{ DB::table('photo_logement')->join('logement','photo_logement.logement_','=','logement.id_logement')->select('photo_logement.chemin_photo')->where('logement.id_logement',$logement->id_logement)->value('chemin_photo')}});">
                    <div class="price"><small></small><span>{{$logement->tarif_par_nuit_hs}}/nuit</span></div>
                    <a class="book-now text-center" href="/detailRecherche/{{$logement->id_logement}}"><i
                            class="ti-calendar"></i> Réserver </a>
                </div>
                <div class="desc sameHeight" id="carte">
                    <h3><a href="/detailRecherche/{{$logement->id_logement}}">{{$logement->nom_logement}} </a></h3>
                    <p class="carte__description">{{$logement->description_logement}}</p>
                </div>
            </div>
            @if(App\Http\Controllers\Auth_Role_PersonneController::IsAuthentificated())
            <div style="margin-top: -19%;">
                @if(DB::table('sauvegarde_logement')->where('sauvegarde_logement.client_',session()->get('userObject')->id_client)->where('sauvegarde_logement.logement_',$logement->id_logement)->exists())
                <input id="heart{{$logement->id_logement}}" class="heart" type="checkbox"
                    onclick="AddToFavorite({{$logement->id_logement}})" checked />
                @else
                <input id="heart{{$logement->id_logement}}" class="heart" type="checkbox"
                    onclick="AddToFavorite({{$logement->id_logement}})" />
                @endif
                <label for="heart{{$logement->id_logement}}" class="label_heart">❤</label>
            </div>
            @endif
        </div>
        @endforeach

        {{-- <script src="../js/jquery.js"></script> --}}

    </div>
@endsection
