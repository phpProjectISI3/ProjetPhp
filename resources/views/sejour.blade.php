@extends('layout.app')

@section('title','Mes séjours')

@section('linkcss')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<style>
.MyInputs{
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
	    @foreach($logements as $logement)
            <tr>
            <th scope="row" style="font-weight: bold;text-decoration: underline;">11/juin/2020</th>
            <td><p style="max-width: 250px;overflow-wrap: anywhere;">Villa Authentique Medina</p></td>
            <td>11/juin/2020</td>
            <td>11/juin/2020</td>
            <td><span class="" style="color: dodgerblue;font-weight: bold;text-decoration: underline;">En attente</span></td>
            <td style="width: 30%;">
            <button type="button" class="btn btn-warning" style="border:0px;padding:0px;font-weight: bold;width: 120px;background-color: #ffc107;border-color: #ffc107;border-radius: 20px;">
            <img src="images/interdit.png" style="width:25px;" />
            Annuler
            </button>
            <a href="/Finalisation" class="btn btn-primary" style="border:0px;padding: 5px;font-weight: bold;width: 120px;background-color: #007bff;border-color: #007bff;border-radius: 20px;">
            <img src="images/money.png" style="width:30px;" />
            Payer !
            </a>
            </td>
            </tr>
        @endforeach

            <tr>
            <th scope="row" style="font-weight: bold;text-decoration: underline;">11/juin/2020</th>
            <td><p style="max-width: 250px;overflow-wrap: anywhere;">Appartement panoramique</p></td>
            <td>11/juin/2020</td>
            <td>11/juin/2020</td>
            <td><span style="color: yellowgreen;font-weight: bold;text-decoration: underline;">Acceptée</span></td>
            <td style="width: 30%;">
            <button type="button" class="btn btn-warning" style="border:0px;padding:0px;font-weight: bold;width: 120px;background-color: #ffc107;border-color: #ffc107;border-radius: 20px;">
            <img src="images/interdit.png" style="width:25px;" />
            Annuler
            </button>
            <button type="button" class="btn btn-primary" style="border:0px;padding: 5px;font-weight: bold;width: 120px;background-color: #007bff;border-color: #007bff;border-radius: 20px;">
            <img src="images/money.png" style="width:30px;" />
            Payer !
            </button>
            </td>
            </tr>

            <tr>
            <th scope="row" style="font-weight: bold;text-decoration: underline;">11/juin/2020</th>
            <td><p style="max-width: 250px;overflow-wrap: anywhere;">Studio charifa</p></td>
            <td>11/juin/2020</td>
            <td>11/juin/2020</td>
            <td><span class="" style="color: red;font-weight: bold;text-decoration: underline;">Refusée</span></td>
            <td style="width: 30%;">
            <button type="button" class="btn btn-warning" style="border:0px;padding:0px;font-weight: bold;width: 120px;background-color: #ffc107;border-color: #ffc107;border-radius: 20px;">
            <img src="images/interdit.png" style="width:25px;" />
            Annuler
            </button>
            <button type="button" class="btn btn-primary" style="border:0px;padding: 5px;font-weight: bold;width: 120px;background-color: #007bff;border-color: #007bff;border-radius: 20px;">
            <img src="images/money.png" style="width:30px;" />
            Payer !
            </button>
            </td>
            </tr>
           
        </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')

<script src="../js/jquery.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
 integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
 crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#fh5co-header-section').css('background-image', 'url("/images/2.jpg")');
        $("a.active").removeClass();
        // $.noConflict();
        $('#myTable').DataTable({
            "oLanguage": {
            "sSearch": "Rechercher"
            }
        });
        
        var div = document.getElementById("myTable_info" );
        var text = '<label>Afficher <select name="myTable_length" aria-controls="myTable" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> par pages.</label>';
        div.innerHTML = text;
        $("#myTable_length").remove();
        $("#myTable_paginate").remove();
        // $("#myTable_previous").text("Précedent");
        // $("#myTable_next").text("Suivant ..");
        // $(" .paginate_button").css("border","1px solid black");
        // $(" .paginate_button").css("background","navajowhite");
        // $(".paginate_button, .current").css("border-radius","14px");
        // $(" .current").css("background","deepskyblue");
        var label = $("#myTable_filter").children('label')[0];
        $("input[type='search']").addClass("MyInputs");
        $("input[type='search']").keyup(function() {
        var div = document.getElementById("myTable_info" );
        var text = '<label>Afficher <select name="myTable_length" aria-controls="myTable" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> par pages.</label>';
        div.innerHTML = text;
        });
        // label.empty();
        // label.innerHTML = ' Rechercher : <input type="search" class="" placeholder="" aria-controls="myTable">';
    });
</script>
@endsection
