@extends('layout.app')

@section('title','Nos Services')

@section('body')
<div class="fh5co-parallax" style="background-image: url(images/Service.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
                            <div class="fh5co-intro fh5co-table-cell">
                                <h1 class="text-center">Ne ratez pas nos offres &amp; Services !</h1>
                                <p>Des offres exceptionneles vous attendent à <a href="{{url('/about/-1')}}">Nos offres</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="fh5co-services-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="services">
                                <span><i class="ti-location-pin"></i></span>
                                <div class="desc">
                                    <h3>Emplacement idéal</h3>
                                    <p>Que vous soyez accompagné(e) ou seul(e), choisissez par vous m&ecirc;me le prix et l'emplacement qui vous conviennent. Rendez vous dans <a href="{{url('/about')}}">Nos offres</a> et faites votre choix vers votre destination de réves.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="services">
                                <span><i class="ti-alarm-clock"></i></span>
                                <div class="desc">
                                    <h3>Ouvert 24/7</h3>
                                    <p>Le soutien est disponible 24h et 7j, ainsi le personnel du site s'occupe de toutes les demandes de notres chéres clientel en se qui conserne la réservation, le payment et aussi la présentation des lieux disponibles.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="services">
                                <span><i class="ti-calendar"></i></span>
                                <div class="desc">
                                    <h3>Réservation</h3>
                                    <p>Tachez d'étre fidéle et prometteur quand vous tenez compte d'une réservation.Ainsi vous pourrez exceptionnelment jouir de nos promotions en haute saison en obtaignant le plus de points possibles.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="services">
                                <span><i class="ti-user"></i></span>
                                <div class="desc">
                                    <h3>&Aacute; votre &eacute;coute</h3>
                                    <p>Si jamais vous avez eu la flemme de vous deplassez jusqu'&aacute; nos locaux, notre site sera toujours disponible pous vous guider pour passer vos vacances de r&eacute;ves dans vos lieux désirés</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="services">
                                <span><i class="ti-signal"></i></span>
                                <div class="desc">
                                    <h3>Wifi Gratuit</h3>
                                    <p>La connexion internet fibre optique est toujours aussi disponible &aacute; votre demande, afin de vous assurez le maximum de confort pendant votre séjour, ainsi vous pourriez facilement utiliser votre Smartphone o&uacute; que vous soyez.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="services">
                                <span><i class="ti-ruler-alt-2"></i></span>
                                <div class="desc">
                                    <h3>Sur mesure</h3>
                                    <p>Il suffit de quelque Clicks pour nous précisez la marge de votre prix abordable et votre emplacement souhaité, ainsi nous pourrons donc vous suggérer les meilleurs résultats selon votre choix ou plut&ocirc;t votre recherches !</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
