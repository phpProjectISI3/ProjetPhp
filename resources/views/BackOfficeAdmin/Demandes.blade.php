@extends('BackOfficeAdmin.AdminLayout')

@section('title','Facturation')
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link href="{{ url('css/main.css') }}" rel="stylesheet" media="all" />


@section('content')
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
                $("#demande-" + id).fadeOut(2000);
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
                    if (id_dmd.id_demande != demande_refusees.dmd_exception) {
                        $("#demande-" + id_dmd.id_demande).fadeOut(2000);
                    }
                });

                demande_refusees.deuxieme_tableau.forEach(function(id_dmd) {
                    if (id_dmd.id_demande != demande_refusees.dmd_exception) {
                        $("#demande-" + id_dmd.id_demande).fadeOut(2000);
                    }
                });

                $("#demande-" + demande_refusees.dmd_exception).fadeOut(2000);
            }
        });
    }
</script>
Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus porro iste earum, sequi aliquid aut cumque voluptatem perspiciatis qui debitis.
<a href="" style="color: white;margin-left: 2%;" class="testt">
    <button class="monbtn" style="width: 95%;background-color : #20bf55;background-image : linear-gradient(315deg, #20bf55 0%, #01baef 74%);">
        <strong>selectionner automatiquement ! (B&ecirc;ta) </strong>
    </button>
</a>

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
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($demandes_enAttentes as $row)
            <tr id="demande-{{$row->id_demande}}">
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
                    <span class="" style="color: dodgerblue;font-weight: bold;text-decoration: underline;">En attente</span>
                </td>
                <td>
                    <div>
                        <a class="btn btn-danger" onclick='Refuser({{$row->id_demande}})'>
                            <i class="fas fa-user-slash"></i>
                            Refuser
                        </a>
                        <a class="btn btn-success" onclick='Accepter({{$row->id_demande}})'>
                            <i class="fas fa-clipboard-check"></i>
                            Accorder
                        </a>
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
        $("#demandeLink").addClass('active');
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