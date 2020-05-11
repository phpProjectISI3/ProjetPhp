@extends('layout.app')

@section('title','Nos Offres')

@section('linkcss')
<link rel="stylesheet" href="../css/hotel.css">
<link rel="stylesheet" href="../css/btnHeart.css">

@endsection
@section('body')
<div class="fh5co-parallax" style="background-image: url(/images/1.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                <div class="fh5co-intro fh5co-table-cell">
                    <h1 class="text-center">Choisissez Votre Offre</h1>
                    <p>La vie est à peu près la même sous toutes les latitudes.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="fh5co-hotel-section">
    <div class="container">
        <div id="SearchBtn">
            <button id="Search"> Search
                <i class="glyphicon glyphicon-search" style="padding-left:  1em;"></i>
            </button>
            <div id="SearchZone">
                <div class="a-col selets">
                    <section>
                        <select id="typeid" name="typeid" class="cs-select cs-skin-border selectManual types">
                            @foreach($types as $type)
                            <option value="{{ $type->id_type_logement }}">{{ $type->libelle_type_logement }}
                            </option>
                            @endforeach
                        </select>
                    </section>
                </div>
                <div class="a-col selets">
                    <section>
                        <select class="cs-select cs-skin-border selectManual">
                            @foreach($CapacitePersonne as $capacite)
                            <option value="{{ $capacite->capacite_personne_max }}">{{ $capacite->capacite_personne_max }}
                            </option>
                            @endforeach
                        </select>
                    </section>
                </div>
                <div class="a-col selets">
                    <section>
                        <select class="cs-select cs-skin-border selectManual">
                            @foreach($villes as $ville)
                            <option value="{{ $ville->adress_logement }}">
                                {{ $ville->adress_logement }}
                            </option>
                            @endforeach
                        </select>
                    </section>
                </div>
                <div class="alternates">
                    <div class="a-col alternate selets">
                        <div class="input-field">
                            <label for="date-start">Date Arrivée</label>
                            <input type="text" class="form-control" id="date-start" />
                        </div>
                    </div>
                    <div class="a-col alternate selets">
                        <div class="input-field">
                            <label for="date-end">Date Sortie</label>
                            <input type="text" class="form-control" id="date-end" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

            {{-- <script src="../js/jquery.js"></script> --}}

        </div>

    </div>
</div>
</div>

@endsection

@section('scripts')
<script src="/js/search.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/notification/notify.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('select.types').change(function(){
        alert($('select.types option:selected').val());
    })

    function AddToFavorite(id_logement) {
        var checkBox = document.getElementById("heart" + id_logement);
        if (checkBox.checked == true) {
            $.ajax({
                url: "{{route('PagesController.favorit')}}",
                method: "GET",
                data: {
                    ID: id_logement
                },
                dataType: 'json',
                success: function(text) {
                    $.notify(text.nomLogement + " : au favoris !", {
                        className: "success",
                        showDuration: 800,
                        hideDuration: 800,
                        autoHideDelay: 8000,
                        position: "top right",
                        arrowShow: true,
                    });
                }
            });
        } else {
            $.ajax({
                url: "{{route('PagesController.NonFavorit')}}",
                method: "GET",
                data: {
                    ID: id_logement
                },
                dataType: 'json',
                success: function(text) {
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
<script>
    $(document).ready(function() {
        $("a.active").removeClass();
        $("a#linkNosOffres").addClass('active');
    });
</script>
@endsection