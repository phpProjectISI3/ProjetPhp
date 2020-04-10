@extends('BackOfficeAdmin.AdminLayout')

<link rel="stylesheet" href="css/items.css" />
<link rel="stylesheet" href="css/jumbotron.css" />
<script src="https://kit.fontawesome.com/4f2d779e50.js" crossorigin="anonymous"></script>


@section('title','Accueil')

@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet" />

<a href="{{route('Logements.create')}}" class="btn btn-success">
    <i class="fa fa-plus" aria-hidden="true"></i>
    Nouveau Logement
</a>
<!--<table class="table table-hover mt-3">
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
    </tbody>-->

<div class="MonContainer">
    @foreach($logements as $logement)
    <article class="carte">
        <header class="carte__thumb">
            <a href="#">
                <img id="imgLogement" src="https://a0.muscache.com/im/pictures/e85d7dbf-ff50-42d6-8e61-dfb242813fd5.jpg?aki_policy=xx_large" />
            </a>
        </header>
        <div class="carte__date">
            <span class="carte__date__day">12</span>
            <span class="carte__date__month">Mai</span>
        </div>
        <div class="carte__body">
            <h2 class="carte__title">
                <a href="#">{{$logement->nom_logement}}</a>
            </h2>

            <div class="carte__subtitle">{{$logement->adress_logement}}</div>
            <p class="carte__description" id="description">
                {{DB::table('logement')->join('detail_logement', 'logement.detail_logement_', '=', 'detail_logement.id_detail')->select('detail_logement.description_logement')->where('logement.id_logement',$logement->id_logement)->value('description_logement') }}

            </p>
        </div>
        <footer class="carte__footer">
            <span class="fa fa-star"></span> 5
                &nbsp;&nbsp;&nbsp;
            <span class="fa fa-commenting-o"></span>
            <a href="#">39 comments</a>
        </footer>
    </article>
    @endforeach
    <script>
        var i;
        var divs = document.getElementsByClassName('carte__description');
        for (i = 0; i < divs.length; i++) {
            divs[i].innerHTML = divs[i].innerHTML.substring(0, 300) + '....<a href="#" style="color: blue;">plus de détail !</a>';
            console.log('test !');

        }
    </script>
</div>
@endsection
