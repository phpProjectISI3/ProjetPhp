@extends('BackOfficeAdmin.AdminLayout')

@section('title','Facturation')
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


@section('content')

<div style="margin-top: 5%;">
    <table class='table table-hover display' id="MyTable">
        <thead>
            <tr>
                <th scope="col">Client</th>
                <th scope="col">Demande</th>
                <th scope="col">Le logement</th>
                <th scope="col">Pour le</th>
                <th scope="col">jusqu'à</th>
                <th scope="col">status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($demandes_payees as $row)
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
                    <div class="alert alert-primary" role="alert">
                        <img src="{{url('images/money_blue.png')}}" style="width: 25px;" />
                        Séjour passé et payé.
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="/js/modernizr-2.6.2.min.js"></script>
<script src="../js/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<script>
    $(document).ready(function() {
        $("#sidebar ul li.active").removeClass();
        $("#FacturationLink").addClass('active');
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
                "zeroRecords": "Aucune Paiement.",
                "processing": "En cours de recherche",
                "emptyTable": "Aucun Paiement",
                "info": "",
            },
        });

    });
</script>


@endsection