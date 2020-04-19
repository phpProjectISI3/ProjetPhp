@extends('layout.app')


@section('linkcss')
     <link rel="stylesheet" href="css/detailrecherche.css">
     <link rel="stylesheet" href="css/review.css">
     <link rel="stylesheet" href="css/information.css">
     <link rel="stylesheet" href="css/pagedemandeR.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection
@section('body')
<div class="fh5co-parallax" style="background-image: url(images/1.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                <div class="fh5co-intro fh5co-table-cell">
                    <h1 class="text-center">Demandes Reservation</h1>
                </div>
            </div>
        </div>
    </div>
</div>

 <div class='table-responsive' >   
     <div class='table'>
         <table class='table table-bordered' >
            <thead> <tr>
                 <th>Id demande</th>
                 <th>Date demande</th>
                 <th>Client Id</th>
                 <th >Logement Id</th>
                 <th>Date Debut</th>
                 <th>Date Fin</th>
                 <th>Annuler</th>
                 <th>date annulation</th>
             </tr>
            </thead>
            <tbody>
             @foreach ($demande_reservation as $row)
             <tr>
                 <td>{{$row['id_demande']}}</td>
                 <td>{{$row['date_demande']}}</td>
                 <td>{{$row['personne_']}}</td>
                 <td>{{$row['logement_']}}</td>
                 <td>{{$row['date_debut']}}</td>
             </tr>
             @endforeach
            </tbody>
         </table>
     </div>
 </div>
@endsection