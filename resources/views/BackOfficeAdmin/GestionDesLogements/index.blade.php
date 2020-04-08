@extends('BackOfficeAdmin.AdminLayout')

@section('title','Accueil')

@section('content')

<a href="{{route('Logements.create')}}" class="btn btn-success">Nouveau Logement !</a>

<table class="table table-hover mt-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">Détail</th>
        </tr>
    </thead>
    <tbody>
        @foreach($logements as $logement)
        <tr>
        <td></td>
            <th scope="row">{{$logement->id_logement}}</th>
            <td>{{$logement->nom_logement}}</td>
            <td>{{$logement->detail_logement_}}</td>
            <td class="table-buttons">
                <a href="{{route('Logements.show', $logement->id_logement)}}" class="btn btn-success">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
                <a href="{{route('Logements.edit', $logement->id_logement)}}" class="btn btn-primary">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
                <form action="" method="post">
                    <button type="submit" href="" class="btn btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
