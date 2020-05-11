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
</style>

@endsection
@section('body')


<div id="fh5co-hotel-section">
    <div class="container">
        <h2 style="text-align: center;">
            <input id="FirstHeart" class="heart" type="checkbox" checked />
            <label for="FirstHeart" class="label_heart" style="margin: 0px;font-size: 30px;animation: none;">❤ Mes Logements favories</label>
        </h2>
        <br>
        <br>
        <div class="row">
            @foreach($logements as $logement)
            <div class="col-md-4">
                <div class="hotel-content">
                    <div class="hotel-grid" style="background-image: url({{ DB::table('photo_logement')->join('logement','photo_logement.logement_','=','logement.id_logement')->select('photo_logement.chemin_photo')->where('logement.id_logement',$logement->id_logement)->value('chemin_photo')}});">
                        <div class="price"><small></small><span>{{$logement->tarif_par_nuit_hs}}/nuit</span></div>
                        <a class="book-now text-center" href="/detailRecherche/{{$logement->id_logement}}"><i class="ti-calendar"></i> Réserver </a>
                    </div>
                    <div class="desc sameHeight" id="carte">
                        <h3><a href="/detailRecherche/{{$logement->id_logement}}">{{$logement->nom_logement}} </a></h3>
                        <p id="description{{ $logement->id_logement }}" class="carte__description">{{$logement->description_logement}}</p>
                        <script>
                            var description = document.getElementById('description{{ $logement->id_logement }}');
                            description.innerHTML = description.innerHTML.substring(0, 110) + '....<a href="/detailRecherche/{{$logement->id_logement}}" style="color: orangered;">plus de détail !</a>';
                        </script>
                    </div>
                </div>
                @if(App\Http\Controllers\Auth_Role_PersonneController::IsAuthentificated())
                <div style="margin-top: -19%;">
                    @if(DB::table('sauvegarde_logement')->where('sauvegarde_logement.client_',session()->get('userObject')->id_client)->where('sauvegarde_logement.logement_',$logement->id_logement)->exists())
                    <input id="heart{{$logement->id_logement}}" class="heart" type="checkbox" onclick="AddToFavorite({{$logement->id_logement}})" checked />
                    @else
                    <input id="heart{{$logement->id_logement}}" class="heart" type="checkbox" onclick="AddToFavorite({{$logement->id_logement}})" />
                    @endif
                    <label for="heart{{$logement->id_logement}}" class="label_heart">❤</label>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>

@endsection

@section('scripts')
<script src="../js/jquery.js"></script>
<script src="../js/notification/notify.min.js"></script>

<script>
    $(document).ready(function() {
        $('#fh5co-header-section').css('background-image', 'url("/images/2.jpg")');
        $("a.active").removeClass();
    });
</script>
<script>
    function AddToFavorite(id_logement) {
        var checkBox = document.getElementById("heart" + id_logement);
        if (checkBox.checked == false) {

            $.ajax({
                url: "{{route('PagesController.NonFavorit')}}",
                method: "GET",
                data: {
                    ID: id_logement
                },
                dataType: 'json',
                success: function(text) {
                    location.reload(true);
                }
            });
        }
    }
</script>
@endsection