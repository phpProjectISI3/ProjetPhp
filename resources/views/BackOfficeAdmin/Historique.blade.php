@extends('BackOfficeAdmin.AdminLayout')

@section('title','Historique')
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<script src="/js/modernizr-2.6.2.min.js"></script>

@section('content')
<style>
    .alert {
        padding: .75rem 1rem;
    }
</style>

<script src="../js/jquery.js"></script>
<script>
    function Refuser(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('RefuserDemande') }}",
            method: "POST",
            data: {
                id_demande: id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $("#rep-att-" + id).fadeOut(2000);
                $("#div-dmd-" + id).fadeOut(2000);

                setTimeout(function() {
                    $("#div-dmd-refuse-" + id).fadeIn(2000);
                    $("#rep-refus-" + id).fadeIn(2000);
                }, 2000);
            }
        });
    }

    function Accepter(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('AccepterDemande') }}",
            method: "POST",
            data: {
                id_demande: id
            },
            dataType: 'json',
            success: function(demande_refusees) {

                demande_refusees.premier_tableau.forEach(function(id_dmd) {
                    console.log(id_dmd.id_demande);
                    if (id_dmd.id_demande != demande_refusees.dmd_exception) {

                        $("#rep-att-" + id_dmd.id_demande).fadeOut(2000);
                        $("#div-dmd-" + id_dmd.id_demande).fadeOut(2000);

                        setTimeout(function() {
                            $("#div-dmd-refuse-" + id_dmd.id_demande).fadeIn(2000);
                            $("#rep-refus-" + id_dmd.id_demande).fadeIn(2000);
                        }, 2000);
                    }
                })

                demande_refusees.deuxieme_tableau.forEach(function(id_dmd) {

                    if (id_dmd.id_demande != demande_refusees.dmd_exception) {
                        $("#rep-att-" + id_dmd.id_demande).fadeOut(2000);
                        $("#div-dmd-" + id_dmd.id_demande).fadeOut(2000);

                        setTimeout(function() {
                            $("#div-dmd-refuse-" + id_dmd.id_demande).fadeIn(2000);
                            $("#rep-refus-" + id_dmd.id_demande).fadeIn(2000);
                        }, 2000);
                    }
                })

                $("#rep-att-" + id).fadeOut(2000);
                $("#div-dmd-" + id).fadeOut(2000);
                setTimeout(function() {
                    $("#div-dmd-accepte-" + id).fadeIn(2000);
                    $("#rep-accpt-" + id).fadeIn(2000);
                }, 2000);
            }
        });
    }
</script>

<div class='' style="margin-top: 5%;">
    <table class='table table-hover display' id="MyTable">
        <thead>
            <tr>
                <th scope="col">Client</th>
                <th scope="col">Demande</th>
                <th scope="col">Le logement</th>
                <th scope="col">Pour le</th>
                <th scope="col">jusqu'à</th>
                <th scope="col">status</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($demandes as $row)
            <tr>
                <td>
                    <abbr title="ID{{$row->id_client}}">{{$row->nom_complet}}</abbr>
                    <br>
                    <small> ({{$row->point_personne}} points) </small>
                </td>
                <td>
                    {{$row->date_demande}}
                    <br>
                    <small> (DMD{{$row->id_demande}})</small>
                </td>
                <td>{{$row->nom_logement}}</td>
                <td>{{$row->date_debut}}</td>
                <td>{{$row->date_fin}}</td>
                <td>
                    @if($row->refuse_par_admin)
                    <span class="" style="color: red;font-weight: bold;text-decoration: underline;">
                        <abbr title="15 janvier 2020">Refusée</abbr>
                    </span>

                    @elseif($row->annule_par_client)
                    <span class="badge badge-danger" id="badgeAnnulation">
                        <abbr title="15 janvier 2020">Annulée</abbr>
                    </span>

                    @elseif(DB::table('facturation')->join('reservation_logement','facturation.reservation_logement_','=','reservation_logement.id_reservation')->join('demande_reservation','demande_reservation.id_demande','=','reservation_logement.demande_reservation_')->where('demande_reservation.id_demande',$row->id_demande)->exists())
                    <span class="badge badge-primary" id="badgePayement">
                        Payée
                    </span>

                    @elseif(DB::table('reservation_logement')->where('demande_reservation_',$row->id_demande)->exists())
                    <span class="badge badge-success">
                        Accordée
                    </span>

                    @else
                    <span class="" style="color: dodgerblue;font-weight: bold;text-decoration: underline;" id="rep-att-{{$row->id_demande}}">En attente</span>
                    <span style="color: red;font-weight: bold;text-decoration: underline;display:none;" id="rep-refus-{{$row->id_demande}}">
                        <abbr title="Aujourd'hui">Refusée</abbr>
                    </span>
                    <span class="badge badge-success" style="display:none;" id="rep-accpt-{{$row->id_demande}}">
                        Accordée
                    </span>


                    @endif
                </td>
                <td>
                    @if($row->refuse_par_admin)
                    <div class="alert alert-info" style="text-align: center;" role="alert">
                        Refusée en {{ $row->date_refus }}
                    </div>

                    @elseif($row->annule_par_client)
                    <div class="alert alert-danger" role="alert" style="text-align: center;">
                        Annulée en {{$row->date_annulation}}
                    </div>

                    @elseif(DB::table('facturation')->join('reservation_logement','facturation.reservation_logement_','=','reservation_logement.id_reservation')->join('demande_reservation','demande_reservation.id_demande','=','reservation_logement.demande_reservation_')->where('demande_reservation.id_demande',$row->id_demande)->exists())
                    <div class="alert alert-primary" role="alert">
                        <img src="{{url('images/money_blue.png')}}" style="width: 25px;" />
                        Séjour passé et payé.
                    </div>

                    @elseif(DB::table('reservation_logement')->where('demande_reservation_',$row->id_demande)->exists())
                    <div class="alert alert-success" role="alert">
                        <img src="{{url('images/accorder.png')}}" style="width: 25px;" />
                        Par un ADMIN
                    </div>

                    @else
                    <div id="div-dmd-{{$row->id_demande}}">
                        <a class="btn btn-danger" onclick='Refuser({{$row->id_demande}})'>
                            <i class="fas fa-user-slash"></i>
                            Refuser
                        </a>
                        <a class="btn btn-success" onclick='Accepter({{$row->id_demande}})'>
                            <i class="fas fa-clipboard-check"></i>
                            Accorder
                        </a>

                    </div>
                    <div id="div-dmd-accepte-{{$row->id_demande}}" style="display: none;">
                        <div class="alert alert-success" role="alert">
                            <img src="{{url('images/accorder.png')}}" style="width: 25px;" />
                            Par un ADMIN
                        </div>
                    </div>
                    <div id="div-dmd-refuse-{{$row->id_demande}}" style="display:none;">
                        <div class="alert alert-info" style="text-align: center;" role="alert">
                            Refusée aujourd'hui
                        </div>
                    </div>

                    @endif



                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<script>
    $(document).ready(function() {
        $("#sidebar ul li.active").removeClass();
        $("#historiqueLink").addClass('active');
        $('#MyTable').DataTable({
            "order": [],
            "oLanguage": {
                "sSearch": "Rechercher"
            },
            "pageLength": 25,
            "language": {
                "sLengthMenu": "Afficher _MENU_ lignes",
                "paginate": {
                    "first": "1",
                    "last": "Dernier",
                    "next": "Suivant",
                    "previous": "Précedent"
                },
                "zeroRecords": "Aucune demande.",
                "processing": "En cours de recherche",
                "info": "",
            },
        });

    });
</script>

@endsection