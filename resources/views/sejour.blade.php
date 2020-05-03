@extends('layout.app')

@section('title','Mes séjours')

@section('linkcss')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection

@section('body')
<div id="fh5co-hotel-section">
    <div class="">
        <table id="myTable" class="" style="width: 90%;margin-left: 5%;">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Logement</th>
            <th scope="col">Demandé en</th>
            <th scope="col">Pour le</th>
            <th scope="col">jusqu'à</th>
            <th scope="col">statut</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td><p style="max-width: 250px;overflow-wrap: anywhere;">MarkMarkMarkMarkMarkMarkMarkMarkMarkMarkMarkMarkMark</p></td>
            <td>11/juin/2020</td>
            <td>11/juin/2020</td>
            <td>11/juin/2020</td>
            <td><span class="badge badge-primary">Primary</span></td>
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
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>@fat</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@twitter</td>
            </tr>
        </tbody>
        </table>
    </div>
</div>
<script src="../js/jquery.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
 integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
 crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
crossorigin="anonymous">
</script>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<!-- <script>
// $(document).ready( function () {
// } );
</script> -->

<script>
    $(document).ready(function () {
        $('#fh5co-header-section').css('background-image', 'url("/images/2.jpg")');
        $("a.active").removeClass();
        $('#myTable').DataTable();

    });
</script>
@endsection
