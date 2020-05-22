@extends('BackOfficeAdmin.AdminLayout')

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="/js/modernizr-2.6.2.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<!-- <div class="fh5co-parallax" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                <div class="fh5co-intro fh5co-table-cell">
                    <h1 class="text-center" style="margin-top: 5%;background-color:aqua;">Demandes Reservations</h1>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class='' style="margin-top: 5%;">
    <table class='table table-hover display' id="MyTable">
        <thead>
            <tr>
                <th scope="col">Client</th>
                <th scope="col">a demandé en</th>
                <th scope="col">Logement</th>
                <th scope="col">Pour le</th>
                <th scope="col">jusqu'à</th>
                <th scope="col">status</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($demandes as $row)
            <tr>
                <td>{{$row->nom_complet}}</td>
                <td>{{$row->date_demande}}</td>
                <td>{{$row->nom_logement}}</td>
                <td>{{$row->date_debut}}</td>
                <td>{{$row->date_fin}}</td>
                <td>
                    <span class="badge badge-primary">Primary</span>
                </td>
                <td></td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="../js/jquery.js"></script>
<!-- <script src="/js/jquery-2.1.4.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
crossorigin="anonymous"></script> -->


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<script>
    $(document).ready(function() {
        $("#sidebar ul li.active").removeClass();
        $("#demandeLink").addClass('active');
        $('#MyTable').DataTable({
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
    });
</script>

@endsection