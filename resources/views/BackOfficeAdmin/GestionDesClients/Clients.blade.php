@extends('BackOfficeAdmin.AdminLayout')


@section('title','Clients')
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<style>
    #my-btn-primay {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .monbtn {
        background-color: #f7b42c;
        background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%);
        color: white;
        margin-top: 5px;
        height: 70px;
        width: 200px;
        /* padding-top: 10px; */
        border-radius: 20px;
        text-align: center;
    }
</style>

@section('content')

<a style="color: white;margin-left: 2%;" data-toggle="modal" data-target="#dataModal">
    <button class="monbtn">
        <i class="fa fa-plus" aria-hidden="true"></i>
        <strong>Nouveau Client</strong>
    </button>
</a>

<div style="margin-top: 5%;">
    <table class='table table-hover display' id="MyTable">
        <thead>
            <tr>
                <th style="text-align: center;">Nom complet<br>&nbsp;</th>
                <th style="text-align: center;">Grade<br>&nbsp;</th>
                <th style="text-align: center;">Points<br>&nbsp;</th>
                <th style="text-align: center;">Sauvegardes<br>&nbsp;</th>
                <th style="text-align: center;">Demandes <br>en attente</th>
                <th style="text-align: center;">Séjours <br>accordés</th>
                <th style="text-align: center;">Séjours <br>payés</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $cl)
            <tr style="text-align: center;">
                <td title="ID{{$cl->id_client}}" style="vertical-align: middle;">
                    <strong style="text-decoration: underline;cursor: default;">
                        {{$cl->nom_complet}}
                    </strong>
                </td>
                <td style="vertical-align: middle;">{{$cl->libelle_grade}}</td>
                <td style="text-align: center;vertical-align: middle;">
                    <button type="button" class="btn btn-primary" style="border-radius: 50px;">
                        <span class="badge badge-light">{{$cl->point_personne}}</span>
                    </button>
                </td>
                <td style="text-align: center;vertical-align: middle;">
                    <img src="{{url('images/signet.png')}}">
                    @if($cl->point_personne > 9)
                    <text style="position: relative;left: -30%;font-weight: 900;">{{$cl->point_personne}}</text>
                    @else
                    <text style="position: relative;left: -27%;font-weight: 900;">{{$cl->point_personne}}</text>
                    @endif
                </td>
                <td style="color: blue;text-decoration: underline;font-weight: 900;vertical-align: middle;">
                    {{ collect(DB::select("select count(*) as nbr_en_attente
                    from personne inner join demande_reservation on personne.id_client = demande_reservation.personne_
                    where personne.id_client = $cl->id_client
                    and demande_reservation.refuse_par_admin = false
                    and demande_reservation.annule_par_client = false
                    and demande_reservation.id_demande not in (select demande_reservation_
                    from reservation_logement )
                    "))
            ->first()
            ->nbr_en_attente }}
                </td>
                <td style="color: darkseagreen;text-decoration: underline;font-weight: 900;vertical-align: middle;">
                    {{ collect(DB::select("select count(*) as nbr_acceptee
                                            from personne inner join demande_reservation on personne.id_client = demande_reservation.personne_
                                                        inner join reservation_logement on reservation_logement.demande_reservation_ = demande_reservation.id_demande
                                            where personne.id_client = $cl->id_client
                                            and demande_reservation.refuse_par_admin = false
                                            and demande_reservation.annule_par_client = false
                                            and demande_reservation.id_demande not in (select demande_reservation_
                                                                                        from facturation inner join reservation_logement on facturation.reservation_logement_ = reservation_logement.id_reservation )
                   "))
                    ->first()
                    ->nbr_acceptee }}<img src="{{url('images/accorder.png')}}" style="width: 25px;">
                </td>
                <td style="color: dodgerblue;text-decoration: underline;font-weight: 900;vertical-align: middle;">
                    {{ collect(DB::select("select count(*) as nbr_payees
                                        from personne inner join demande_reservation on personne.id_client = demande_reservation.personne_
                                                    inner join reservation_logement on reservation_logement.demande_reservation_ = demande_reservation.id_demande
                                                    inner join facturation on facturation.reservation_logement_ = reservation_logement.id_reservation 
                                        where personne.id_client = $cl->id_client
                                        and demande_reservation.refuse_par_admin = false
                                        and demande_reservation.annule_par_client = false
                   "))
                    ->first()
                    ->nbr_payees }}<img src="{{url('images/money_blue.png')}}" style="width: 30px;">
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
                        <img src="{{url('images/Add_user.png')}}" style="width: 50px;">
                        &nbsp;
                        Ajouter nouveau client
                    </h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="employee_detail">
                    <form action="{{ route('EnregistrerClient') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputNom">Nom</label>
                                <input type="text" style="border:solid;color: black;" class="form-control" name="InputNom" id="InputNom" placeholder="Nom" required>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputPrenom">Prénom</label>
                                <input type="text" style="border:solid;color: black;" name="InputPrenom" class="form-control" id="InputPrenom" placeholder="Prénom" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputEnfant_sco">Enfant scolarisé</label>
                                <input type="number" style="border:solid;color: black;" class="form-control" name="InputEnfant_sco" id="InputEnfant_sco" min="0" max="5" required>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputEnfant_non_sco">Enfant non scolarisé</label>
                                <input type="number" style="border:solid;color: black;" class="form-control" id="InputEnfant_non_sco" name="InputEnfant_non_sco" min="0" max="5" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="InputSexe">Sexe</label>
                                <select style="border:solid;color: black;" class="form-control" name="InputSexe" id="InputSexe" required>
                                    <option value="" selected disabled>-Choisir-</option>
                                    <option value="1">Homme</option>
                                    <option value="2">Femme</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="InputGrade">Grade</label>
                                <select style="border:solid;color: black;" class="form-control" id="InputGrade" name="InputGrade" aria-describedby="emailHelp" placeholder="Enter email" required>
                                    <option value="" selected disabled>-Choisir-</option>
                                    <option value="0">Administratif</option>
                                    <option value="1">Directeur</option>
                                    <option value="2">Employé/cadre</option>
                                    <option value="3">Retraité</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="InputSituation">Situation</label>
                                <select style="border:solid;color: black;" class="form-control" id="InputSituation" name="InputSituation" required>
                                    <option value="" selected disabled>-Choisir-</option>
                                    <option value="true">Marié(e)</option>
                                    <option value="false">Célibataire</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="InputDateN">Date de naissance</label>
                            <input type="date" style="border:solid;color: black;" class="form-control" id="InputDateN" name="InputDateN" required>
                        </div>

                        <button type="submit" class="btn btn-primary" style="margin-left: 80%;">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/modernizr-2.6.2.min.js"></script>
<script src="../js/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<script>
    $(document).ready(function() {
        $("#sidebar ul li.active").removeClass();
        $("#clientLink").addClass('active');
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
                "zeroRecords": "Aucune Clients.",
                "processing": "En cours de recherche",
                "emptyTable": "Aucun Clients.",
                "info": "",
            },
        });

    });
</script>
@endsection