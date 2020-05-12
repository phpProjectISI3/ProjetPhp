@extends('layout.app')

@section('title','Nos Offres')

@section('linkcss')
<link rel="stylesheet" href="../css/hotel.css">
<link rel="stylesheet" href="../css/btnHeart.css">
<style>
    #FormMultiCritere {
        visibility: hidden;
    }

    .MysubmitSearch {
        width: 200px !important;
        margin-top: .8em;
        margin-left: 9em;
        background-color: #FF6347 !important;
        box-shadow: 0 0 5px rgb(253, 207, 190) !important;
        color: black !important;
    }
</style>

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
            <button id="Search" style="border-radius: 20px 0px 20px 0px;">
                <i class="glyphicon glyphicon-filter"></i>
                Filtrer
            </button>
            <div id="SearchZone" style="border-radius: 0px 20px 20px 20px;">
                <form id="FormMultiCritere" action="{{route('PagesController.selectType')}}" method="GET" autocomplete="off">
                    <div class="a-col selets">
                        <section>
                            <select id="typeid" name="typeid" class="cs-select cs-skin-border selectManual types">
                                <option disabled selected>Type</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id_type_logement }}"> {{ $type->libelle_type_logement }}
                                </option>
                                @endforeach
                            </select>
                        </section>
                    </div>
                    <div class="a-col selets">
                        <section>
                            <select name="capacitepersonne" class="cs-select cs-skin-border selectManual">
                                <option disabled selected>Nombre de personnes</option>
                                @foreach($CapacitePersonne as $capacite)
                                <option value="{{ $capacite->capacite_personne_max }}">{{ $capacite->capacite_personne_max }}
                                </option>
                                @endforeach
                            </select>
                        </section>
                    </div>
                    <div class="a-col selets">
                        <section>
                            <select name="ville" class="cs-select cs-skin-border selectManual">
                                <option disabled selected>Ville</option>
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
                                <label for="date-start" style="width: 111px;">à partir de</label>
                                @if(Session()->has('datedebut') && Session()->has('datefin') )
                                <input type="text" placeholder="Mois/Jour/Année" class="form-control" id="date-start" name="date-start" style="margin-left: 10px;" />
                                @else
                                <input type="text" placeholder="Mois/Jour/Année" class="form-control" id="date-start" name="date-start" Required style="margin-left: 10px;" />
                                @endif
                            </div>
                        </div>
                        <div class="a-col alternate selets">
                            <div class="input-field">
                                <label for="date-end">Jusqu'au &nbsp; </label>
                                @if(Session()->has('datefin'))
                                <input type="text" placeholder="Mois/Jour/Année" class="form-control" id="date-end" name="date-end" style="margin-left: 10px;" />
                                @else
                                <input type="text" placeholder="Mois/Jour/Année" class="form-control" id="date-end" name="date-end" Required style="margin-left: 10px;" />
                                @endif
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Rechercher" class="MysubmitSearch alternate">
                </form>
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


        </div>

    </div>
</div>
</div>

@endsection

@section('scripts')
{{-- <script src="/js/jquery.js"></script> --}}
<script src="/js/jquery.js"></script>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/search.js"></script>
<script src="/js/notification/notify.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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

    $(document).ready(function() {
        $("a.active").removeClass();
        $("a#linkNosOffres").addClass('active');
    });

    var filtreDiv_is_visible = false;
    $("#Search").click(function() {
        filtreDiv_is_visible = !filtreDiv_is_visible;
        !filtreDiv_is_visible ? $("#FormMultiCritere").css("visibility", "hidden") : $("#FormMultiCritere").css("visibility", "visible");
    });
</script>
@endsection