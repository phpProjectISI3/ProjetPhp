@extends('layout.app')

@section('title','Blog')

@section('body')
<div class="fh5co-parallax" style="background-image: url(/images/expensive.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                <div class="fh5co-intro fh5co-table-cell">
                    <h1 class="text-center">S'informer plus &aacute; propos de nous !</h1>
                    <p>Des offres exceptionneles vous attendent à <a href="{{url('/about/-1')}}">Nos offres</a></p>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="fh5co-blog-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="blog-grid" style="background-image: url(/images/chambre.jpg);">
                    <div class="date text-center">
                        <span>09</span>
                        <small>Aout</small>
                    </div>
                </div>
                <div class="desc">
                    <h3>Hotel luxueux</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-grid" style="background-image: url('https://birthdaycake24.com/uploads/worigin/2019/06/18/bd-gif5d0840a2bdea0_503e82571271c49db4e4f645e4cacdae.gif')">
                    <div class="date text-center">
                        <span>01</span>
                        <small>Juillet</small>
                    </div>
                </div>
                <div class="desc">
                    <h3>Organisation d'anniversaires</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-grid" style="background-image: url(/images/jardin.jpg);">
                    <div class="date text-center">
                        <span>17</span>
                        <small>Mars</small>
                    </div>
                </div>
                <div class="desc">
                    <h3>Paysage magnifiques</h3>
                </div>
            </div>
            <div class="col-md-4">

                <div class="blog-grid" style="background-image: url('https://media.giphy.com/media/SsaWuR3owjU7a0G8z1/giphy.gif')">
                    <div class="date text-center">
                        <span>14</span>
                        <small>Avril</small>
                    </div>
                </div>
                <div class="desc">
                    <h3>Chambres formidales</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-grid" style="background-image: url(/images/pickup.jpg);">
                    <div class="date text-center">
                        <span>05</span>
                        <small>Juin</small>
                    </div>
                </div>
                <div class="desc">
                    <h3>Transport &aacute; votre diposition</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-grid" style="background-image: url('https://media.giphy.com/media/5SCQo4wceBlpbjC1o5/giphy.gif');">
                    <div class="date text-center">
                        <span>29</span>
                        <small>Sept</small>
                    </div>
                </div>
                <div class="desc">
                    <h3>Restauration haute gamme</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection