@extends('layout.app')

@section('title','Mes séjours')

@section('linkcss')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<style>
    .MyInputs {
        margin-right: 600px;
        width: 22em;
        margin-top: -1.5em;
        margin-left: 178px;
        padding: .4em;
        border: 2.2px solid orangered;
        margin-bottom: 24px;
        font-weight: bold;
        /* text-decoration: underline; */
        color: black;
        font-size: 15px;
        border-radius: 12px;
    }

    #badgePayement {
        display: inline-block;
        padding: .25em .4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        color: #fff;
        background-color: #007bff;
    }

    #badgeAnnulation {
        display: inline-block;
        padding: .25em .4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        color: #fff;
        background-color: #DC3551;
    }
</style>
@endsection

@section('body')
<div id="fh5co-hotel-section">
    <div class="">
        <table id="myTable" class="table table-hover" style="width: 90%;margin-left: 5%;">
            <thead>
                <tr>
                    <th scope="col">Demandé en</th>
                    <th scope="col">Logement</th>
                    <th scope="col">Pour le</th>
                    <th scope="col">jusqu'à</th>
                    <th scope="col">status</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($demandes as $dmd)
                <tr>
                    <th scope="row" style="font-weight: bold;text-decoration: underline;">{{$dmd->date_demande}}</th>
                    <td>
                        <p style="max-width: 250px;overflow-wrap: anywhere;">{{$dmd->nom_logement}}</p>
                    </td>
                    <td>{{$dmd->date_debut}}</td>
                    <td>{{$dmd->date_fin}}</td>
                    <td>
                        @if($dmd->refuse_par_admin)
                        <span class="" style="color: red;font-weight: bold;text-decoration: underline;">Refusée</span>

                        @elseif($dmd->annule_par_client)
                        <span class="badge badge-danger" id="badgeAnnulation">Annulée</span>

                        @elseif(DB::table('facturation')->join('reservation_logement','facturation.reservation_logement_','=','reservation_logement.id_reservation')->join('demande_reservation','demande_reservation.id_demande','=','reservation_logement.demande_reservation_')->where('demande_reservation.id_demande',$dmd->id_demande)->exists())
                        <span class="badge badge-primary" id="badgePayement">Payée</span>

                        @elseif(DB::table('reservation_logement')->where('demande_reservation_',$dmd->id_demande)->exists())
                        <span style="color: yellowgreen;font-weight: bold;text-decoration: underline;">Acceptée</span>

                        @else
                        <span class="" style="color: dodgerblue;font-weight: bold;text-decoration: underline;">En attente</span>

                        @endif
                    </td>

                    <td style="width: 30%;">
                        @if($dmd->refuse_par_admin)
                        <div class="alert alert-secondary" role="alert">
                            <i class="far fa-frown"></i>&nbsp;
                            Votre demande n'a malheureusement pas été selectionnée ...
                        </div>

                        @elseif($dmd->annule_par_client)
                        <div class="alert alert-danger" role="alert" style="font-size: 15px;">
                            <i class="fas fa-ban"></i>&nbsp;
                            Vous avez annulé cette demande le {{$dmd->date_annulation}}
                        </div>

                        @elseif(DB::table('facturation')->join('reservation_logement','facturation.reservation_logement_','=','reservation_logement.id_reservation')->join('demande_reservation','demande_reservation.id_demande','=','reservation_logement.demande_reservation_')->where('demande_reservation.id_demande',$dmd->id_demande)->exists())
                        <div class="alert alert-primary" role="alert">&nbsp;
                            <img src="images/money_blue.png" style="width: 30px;" />
                            Séjour passé et payé, bsa7tkom !
                        </div>

                        @elseif(DB::table('reservation_logement')->where('demande_reservation_',$dmd->id_demande)->exists())
                        <button type="button" class="btn btn-warning btnAnnuler" style="border:0px;padding:0px;font-weight: bold;width: 120px;background-color: #ffc107;border-color: #ffc107;border-radius: 20px;" id="{{ $dmd->id_demande }}">
                            <img src="images/interdit.png" style="width:25px;" />
                            Annuler
                        </button>
                        <a href="/Finalisation/{{ $dmd->id_demande }}" class="btn btn-primary" style="border:0px;padding: 5px;font-weight: bold;width: 120px;background-color: #007bff;border-color: #007bff;border-radius: 20px;">
                            <img src="images/money.png" style="width:30px;" />
                            Payer !
                        </a>

                        @else
                        <button type="button" class="btn btn-warning btnAnnuler" style="border:0px;padding:0px;font-weight: bold;width: 120px;background-color: #ffc107;border-color: #ffc107;border-radius: 20px;" id="{{ $dmd->id_demande }}">
                            <img src="images/interdit.png" style="width:25px;" />
                            Annuler
                        </button>
                        <a class="btn btn-primary disabled" style="border:0px;padding: 5px;font-weight: bold;width: 120px;background-color: #007bff;border-color: #007bff;border-radius: 20px;" role="button" aria-disabled="true">
                            <img src="images/money.png" style="width:30px;" />
                            Payer !
                        </a>

                        @endif
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <div id="dataModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">
                            <img src="images/warning.png" style="width: 30px;">
                            &nbsp;
                            Avertissement
                        </h3>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="employee_detail">
                        <h4 style="margin: 0px;"><i class="far fa-frown"></i>&nbsp; Voulez vous vraiment annuler ?!</h4>
                        <h4 class="nom_logement" style="margin: 20px 0 15px 0;">-Hotel tildi-</h4>
                        <img id="photo_logement">
                        <br>
                        <br>
                        <p style="font-size: 13px;">
                            En annulant votre demande, vos points se diminueront de <span style="color: red;text-decoration: underline; ">-1</span> et il est fort possible que des frais d'annulation soit appliqué selon le logement , veuillez visiter la page de
                            <a id="linkLogement" href="" target="_blank"> <span style="text-decoration: underline;" class="nom_logement"></span> </a>
                        </p>
                        <small><a href="">Lire notre politique d'annulation !</a></small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 10px;">Retour</button>
                        <a id="btnConfirmer" href="" class="btn btn-danger" style="border-radius: 10px;">Confirmer l'annulation</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')

<script src="../js/jquery.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#fh5co-header-section').css('background-image', 'url("/images/2.jpg")');
        $("a.active").removeClass();
        $('#myTable').DataTable({
            "oLanguage": {
                "sSearch": "Rechercher"
            },
            "pageLength": 25,
            "language": {
                "paginate": {
                    "first": "1",
                    "last": "Dernier",
                    "next": "Suivant",
                    "previous": "Précedent"
                },
                "zeroRecords": "Aucune demande.",
                "processing": "En cours de recherche",
                "emptyTable": "Vous n'avez réalisez aucune demande pour l'instant? <a href='about/-1'>Profiter de NOS OFFRES !</a>",
                "info": "",
            },
        });

        function reglerAffichageParPage() {
            var div = document.getElementById("myTable_info");
            var text = '<label>Afficher <select name="myTable_length" aria-controls="myTable" class=""><option value="10">10</option><option value="25" selected>25</option><option value="50">50</option><option value="100">100</option></select> par pages.</label>';
            div.innerHTML = text;
        }
        reglerAffichageParPage();
        $('.btnAnnuler').click(function MyClickEvent() {
            id = $(this).attr("id");
            $.ajax({
                url: "{{ route('DemandeReservationClientController.InfoAnnulationDemande') }}",
                method: "GET",
                data: {
                    id_demande: id
                },
                dataType: 'json',
                success: function(data) {
                    $('.nom_logement').html('-' + data.nom_logement + '-');
                    $('#photo_logement').attr("src", data.photo_logement);
                    $('#photo_logement').css("width", "460px");
                    $('#photo_logement').css("height", "250px");
                    $('#linkLogement').attr("href", "review/" + data.id_logement);
                    $('#btnConfirmer').attr("href", "AnnulationDemande/" + id);
                    $('#dataModal').modal("show");
                }
            });
        });
        $("#myTable").click(function() { // todo : eviter redendance d'eevent
            reglerAffichageParPage();

            // function MyClickEvent() {
            //     id = $(this).attr("id");
            //     $.ajax({
            //         url: "{{ route('DemandeReservationClientController.InfoAnnulationDemande') }}",
            //         method: "GET",
            //         data: {
            //             id_demande: id
            //         },
            //         dataType: 'json',
            //         success: function(data) {
            //             $('.nom_logement').html('-' + data.nom_logement + '-');
            //             $('#photo_logement').attr("src", data.photo_logement);
            //             $('#photo_logement').css("width", "460px");
            //             $('#photo_logement').css("height", "250px");
            //             $('#linkLogement').attr("href", "review/" + data.id_logement);
            //             $('#btnConfirmer').attr("href", "AnnulationDemande/" + id);
            //             $('#dataModal').modal("show");
            //         }
            //     });
            // }
            try {
                $(".btnAnnuler").unbind("click", MyClickEvent);
            } catch (erreur) {
                // console.log(erreur);
            } finally {
                console.log("block finaly !")
                // $('.btnAnnuler').bind("click", MyClickEvent);
            }
        });
        $("#myTable_length").remove();
        // $("#myTable_paginate").remove();
        var label = $("#myTable_filter").children('label')[0];
        $("input[type='search']").addClass("MyInputs");
        $("input[type='search']").keyup(function() {
            reglerAffichageParPage();
        });
        $("th[scope='col']")[0].click();
    });
</script>
@endsection