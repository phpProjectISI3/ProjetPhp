@extends('app')

@section('title','login')

@section('linkcss')
        <link rel="stylesheet" href="css/login.css">
@endsection

@section('body')
<div id="Containers">
        <div id="imgLeft">

        </div>
        <div id="containerright">
            <form action="">
                <div>
                    ISI3
                </div>
                <div>
                    <input type="text" name="Username" placeholder="Nom d'utilisateur" id="">
                </div>
                <div>
                    <input type="password" name="Password" placeholder="Mot de passe" id="">
                </div>
                    <input type="submit" value="Se Connecter">
            </form>
        </div>
    </div>
@endsection