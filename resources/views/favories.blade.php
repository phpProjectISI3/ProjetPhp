@extends('layout.app')

@section('title','Favories')

@section('linkcss')
<link rel="stylesheet" href="../css/hotel.css">
<link rel="stylesheet" href="../css/btnHeart.css">


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
        background-color: #f5f5f5 !important;
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

    </div>
</div>
</div>

@endsection

@section('scripts')
<script src="../js/jquery.js"></script>
<script src="../js/notification/notify.min.js"></script>

<script>
    $(document).ready(function () {
        $('#fh5co-header-section').css('background-image', 'url("/images/2.jpg")');
        $("a.active").removeClass();
        $("#PageActuel").val(window.location);
        $("#InDateEntree").val($("#DateEntree").text());
        $("#InDateSortie").val($("#DateSortie").text());
    });

     var divs = document.getElementsByClassName('carte__description');
    for (i = 0; i < divs.length; i++) {
        divs[i].innerHTML = divs[i].innerHTML.substring(0, 110) + '....<a href="{{url('detailRecherche ')}}" style="color: orangered;">plus de détail !</a>';
    }
</script>
<script>
    function AddToFavorite(id_logement) {
        var checkBox = document.getElementById("heart" + id_logement);
        if (checkBox.checked == true) {
            console.log("checked !");
            $.ajax({
                url: "{{route('PagesController.NonFavorit')}}",
                method: "GET",
                data: {
                    ID: id_logement
                },
                dataType: 'json',
                success: function (text) {
                    $.notify(text.nomLogement + " : suprimé des favoris !", {
                        className: "error",
                        showDuration: 800,
                        hideDuration: 800,
                        autoHideDelay: 8000,
                        position: "top right",
                        arrowShow: true,
                    });
                }
            });
        }
    }
</script>
@endsection
