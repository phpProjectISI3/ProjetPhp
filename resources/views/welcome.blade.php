@extends('layout.app')

@section('title','100% Luxe et Confort')

@section('body')
<script src="https://kit.fontawesome.com/4f2d779e50.js" crossorigin="anonymous"></script>
<style>


</style>
<aside id="fh5co-hero" class="js-fullheight">
    <div class="flexslider  js-fullheight">
        <ul class="slides">
            <li style="background-image: url(/images/1.jpg);">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="col-md-12 col-md-offset-0 text-center slider-text">
                        <div class="slider-text-inner js-fullheight">
                            <div class="desc">
                                <p><span> Villa</span></p>
                                <h2>Réserver votre Villa</h2>
                                <p>
                                    <a href="{{url('about/1')}}" class="btn btn-primary btn-lg">Réserver Maintenant</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(/images/2.jpg);">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="col-md-12 col-md-offset-0 text-center slider-text">
                        <div class="slider-text-inner js-fullheight">
                            <div class="desc">
                                <p><span>Maison</span></p>
                                <h2>Profiter de votre Vacance </h2>
                                <p>
                                    <a href="{{url('about/3')}}" class="btn btn-primary btn-lg">Réserver Maintenant</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(/images/3.jpg);">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="col-md-12 col-md-offset-0 text-center slider-text">
                        <div class="slider-text-inner js-fullheight">
                            <div class="desc">
                                <p><span>Appartement</span></p>
                                <h2>Un meilleur endroit pour s'amuser</h2>
                                <p>
                                    <a href="{{url('about/2')}}" class="btn btn-primary btn-lg">Réserver Maintenant</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </div>
</aside>
<div class="wrap">
    <div class="container">
        <div class="row">
            <div id="availability" style="z-index: 80;">
                <form action="multipleabout" method="GET" autocomplete="off">
                    <!-- @csrf -->
                    <div class="a-col">
                        <section>
                            <select name="type" id="type" class="cs-select cs-skin-border">
                                @foreach($types as $type)
                                <option value="{{ $type->id_type_logement }}">{{ $type->libelle_type_logement }}
                                </option>
                                @endforeach
                                <!-- <option value="1">Villa</option>
									<option value="3">Maison</option>
									<option value="2">Appartement</option>
									<option value="4">Chambre Hotel Luxe</option>
									<option value="5">Chambre Hotel Sympa</option> -->
                            </select>

                        </section>
                    </div>
                    <div class="a-col alternate">
                        <div class="input-field">
                            <label for="date-start">Date Arrivée</label>
                            <input type="text" name="date-start"  class="form-control" placeholder="Mois/Jour/Année"
                                id="date-start" Required />
                        </div>
                    </div>
                    <div class="a-col alternate">
                        <div class="input-field">
                            <label for="date-end">Date Sortie</label>
                            <input type="text" name="date-end"  class="form-control" placeholder="Mois/Jour/Année" id="date-end" Required/>
                        </div>
                    </div>
                    <div class="a-col action">
                        <button class="sameAsa" type="submit">
                            <span>Vérifier</span>
                            Disponibilté
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="fh5co-counter-section" style="padding:2em 0;" class="fh5co-counters">
    <div class="container" style="padding-left: 13%;">
        <div class="row">
            <div class="col-md-3 text-center">
                <span class="fh5co-counter js-counter" data-from="0" data-to="20356" data-speed="5000"
                    data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Nombre Utilisateur</span>
            </div>
            <!-- <div class="col-md-3 text-center">
					<span class="fh5co-counter js-counter" data-from="0" data-to="15501" data-speed="5000" data-refresh-interval="50"></span>
					<span class="fh5co-counter-label">Hotels</span>
				</div> -->
            <div class="col-md-3 text-center">
                <span class="fh5co-counter js-counter" data-from="0" data-to="8200" data-speed="5000"
                    data-refresh-interval="50"></span>
                <span class="fh5co-counter-label">Transactions</span>
            </div>
            <div class="col-md-3 text-center">
                <span class="fh5co-counter js-counter" data-from="0" data-to="8763" data-speed="5000"
                    data-refresh-interval="50"></span>
                <span class="fh5co-counter-label"> Avis</span>
            </div>
        </div>
    </div>
</div>

<div id="featured-hotel" class="fh5co-bg-color">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Offres&nbsp; spéciales !</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="feature-full-1col">
                <div class="image" style="background-image: url(/images/imgFruit.jpg);">
                    <div class="descrip text-center">
                        <p><small>Pour aussi peu que</small><span>600 Dhs/nuit</span></p>
                    </div>
                </div>
                <div class="desc">
                    <h3> Villa </h3>
                    <p>Villa de luxe se démarque par sa clientèle, qui peut avoir des exigences particulières que chaque
                        Villa ayant
                        obtenu la dénomination « Villa de luxe » se doit de satisfaire </p>
                    <p><a href="{{url('about/-1')}}" class="btn btn-primary btn-luxe-primary">Réserver Maintenant<i
                                class="ti-angle-right"></i></a></p>
                </div>
            </div>

            <div class="feature-full-2col">
                <div class="f-hotel">
                    <div class="image" style="background-image: url(/images/imgFun.jpg);">
                        <div class="descrip text-center">
                            <p><small>Pour aussi peu que</small><span>450 Dhs/nuit</span></p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3>Maison</h3>
                        <p>Les Maisons sont décorées dans des tons chauds et raffinés et sont pourvues de la
                            climatisation et
                            d'équipements à la pointe de la technologie. <br>

                        </p>
                        <p><a href="{{url('about/-1')}}" class="btn btn-primary btn-luxe-primary">Réserver Maintenant <i
                                    class="ti-angle-right"></i></a></p>
                    </div>
                </div>
                <div class="f-hotel">
                    <div class="image" style="background-image: url(/images/1.jpg);">
                        <div class="descrip text-center">
                            <p><small>Pour aussi peu que</small><span>370 Dhs/nuit</span></p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3>Appartement</h3>
                        <p>Appartement ne peut être classé 5 étoiles que si des critères précis sont honorés. Ces
                            derniers sont divisés en trois
                            catégories : « équipements », « service au client » et « accessibilité et développement
                            durable ».</p>
                        <p><a href="{{url('about/-1')}}" class="btn btn-primary btn-luxe-primary">Réserver Maintenant <i
                                    class="ti-angle-right"></i></a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="hotel-facilities">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>OFFRES D'AMÉNAGEMENTS </h2>
                </div>
            </div>
        </div>

        <div id="tabs">
            <nav class="tabs-nav">
                <a href="#" class="active" data-tab="tab1">
                    <i class="flaticon-restaurant icon"></i>
                    <span>Restauration</span>
                </a>
                <a href="#" data-tab="tab2">

                    <i class="fas fa-umbrella-beach icon" style="line-height: unset;"></i>
                    <span>Confort</span>
                </a>
                <a href="#" data-tab="tab3">

                    <i class="flaticon-car icon"></i>
                    <span>Transport</span>
                </a>
                <a href="#" data-tab="tab4">

                    <i class="flaticon-swimming icon"></i>
                    <span>Piscine</span>
                </a>
                <a href="#" data-tab="tab5">

                    <i class="flaticon-massage icon"></i>
                    <span>Spa</span>
                </a>
                <a href="#" data-tab="tab6">

                    <i class="fas fa-tree icon" style="line-height: unset;"></i>
                    <span>Nature</span>
                </a>
            </nav>
            <div class="tab-content-container">
                <div class="tab-content active show" data-tab-content="tab1">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="/images/restaurant.jpg" class="img-responsive" alt="Image">
                            </div>
                            <div class="col-md-6">
                                <span class="super-heading-sm">World Class</span>
                                <h3 class="heading">Restaurant</h3>
                                <p>Les restaurants peuvent obtenir jusqu’à trois étoiles, ces restaurants étoilés ont
                                    une notoriété internationale qui leur permet de remplir leur salle peu importe les
                                    prix qu’ils fixeront. Mais pour parvenir à faire partie de ce cercle très fermé de
                                    restaurants étoilés, les étapes à franchir sont nombreuses. Que signifient donc ces
                                    astres décernés aux différents établissements?
                                    Une étoile signifie: une très bonne cuisine dans sa catégorie.
                                    Deux étoiles signifient: une cuisine excellente et une table méritant un détour.
                                    Trois étoiles signifient: une cuisine remarquable et une table valant le voyage.</p>

                                <p class="service-hour">
                                    <span>Heures de service</span>
                                    <strong>7:30 AM - 8:00 PM</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content" data-tab-content="tab2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="/images/confort.webp" class="img-responsive" alt="Image">
                            </div>
                            <div class="col-md-6">
                                <span class="super-heading-sm">World Class</span>
                                <h3 class="heading">Confort</h3>
                                <p>Profitez d’une sublime décoration de style marocain, vous allez surement apprécier
                                    pleinement le confort et l'élégance des lieux.
                                    APPARTEMENT DESTINÉ UNIQUEMENT À UNE CLIENTELE OU COUPLE.
                                    Les couples doivent être mariés. Les couples étrangers pas nécessairement.
                                    Les groupes d amis sont acceptés uniquement s’ils disposent tous de passeport
                                    étranger.</p>
                                <p class="service-hour">
                                    <span>Heures de service</span>
                                    <strong>7:30 AM - 8:00 PM</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content" data-tab-content="tab3">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="/images/pickup.jpg" class="img-responsive" alt="Image">
                            </div>
                            <div class="col-md-6">
                                <span class="super-heading-sm">World Class</span>
                                <h3 class="heading">Transport</h3>
                                <p>L'organisation du room service varie selon les hôtels, leur catégorie et le nombre de
                                    chambres. Obligatoire à partir des hôtels 3 étoiles sur la journée, et 24h sur 24
                                    dans les hôtels 4 étoiles et 4 étoiles luxe, il s'agit d'une activité indépendante
                                    ou partagée avec le service de restauration de l'hôtel. Selon les établissements, le
                                    room service dispose d'un emplacement défini dans la cuisine ou dans l'office du
                                    restaurant ou d'un local indépendant.</p>
                                <p class="service-hour">
                                    <span>Heures de service</span>
                                    <strong>7:30 AM - 8:00 PM</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content" data-tab-content="tab4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="/images/piscine.jpg" class="img-responsive" alt="Image">
                            </div>
                            <div class="col-md-6">
                                <span class="super-heading-sm">World Class</span>
                                <h3 class="heading">Piscine Haute Gamme</h3>
                                <p>“Propre, spacieux, spacieux avec un personnel très agréable, une piscine magnifique
                                    et une grande terrasse, et les
                                    chambres avec balcon donnant sur la piscine étaient parfaites.”</p>
                                <p class="service-hour">
                                    <span>Heures de service</span>
                                    <strong>7:30 AM - 8:00 PM</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content" data-tab-content="tab5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="/images/spa.png" class="img-responsive" alt="Image">
                            </div>
                            <div class="col-md-6">
                                <span class="super-heading-sm">World Class</span>
                                <h3 class="heading">Spa</h3>
                                <p>Conçu comme un sanctuaire entièrement dédié au plaisir des sens, le spa du Mandarin
                                    Oriental, Paris accueille chacun de nos hôtes dans son individualité. Avec ses 900
                                    mètres carrés, notre spa compte parmi les plus vastes de Paris.</p>
                                <p>Tout commence par un rituel oriental : nous vous invitons à ôter vos chaussures et à
                                    chausser nos sandales, afin de laisser symboliquement derrière vous vos soucis. Vous
                                    découvrirez alors votre suite spa personnelle où vous savourerez un moment de
                                    détente en toute intimité ou profiterez des équipements mis à votre disposition.
                                    Votre praticien vous proposera ensuite une consultation approfondie et vous
                                    recommandera les soins correspondants exactement à vos besoins.</p>
                                <p class="service-hour">
                                    <span>Heures de service</span>
                                    <strong>7:30 AM - 8:00 PM</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content" data-tab-content="tab6">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="/images/nature.webp" class="img-responsive" alt="Image">
                            </div>
                            <div class="col-md-6">
                                <span class="super-heading-sm">World Class</span>
                                <h3 class="heading">Nature exceptionnel !</h3>
                                <p>Pour répondre aux besoins de cette clientèle nomade et pressée, les Jardin details
                                    les cours se font de plus en plus modulables.
                                    On n'y court plus ventre à terre à la sortie de son bureau pour se donner bonne
                                    conscience. On s'y arrête. Sur son site, Montgolfière, un nouveau club branché de la
                                    capitale, se définit en toute modestie comme "un Social Club dédié au sport, à la
                                    culture et à toute forme de créativité. Bienvenue dans votre seconde maison de près
                                    de 2000 m2 fondée sur un nouvel art de vivre alliant convivialité, bien-être et
                                    ouverture d'esprit."</p>
                                <p class="service-hour">
                                    <span>Heures de service</span>
                                    <strong>7:30 AM - 8:00 PM</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Un client heureux dit...</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="testimony">
                    <blockquote>
                        &ldquo;Si vous cherchez un hôtel de qualité, ne cherchez pas plus loin. Nous avons été
                        surclassés gratuitement dans la Suite
                        Premium, merci beaucoup&rdquo;
                    </blockquote>
                    <p class="author"><cite>Nisrine Sqat</cite></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimony">
                    <blockquote>
                        &ldquo;Ma femme et moi avons passé un week-end agréable pour s'évader ici, le personnel était
                        très sympathique et attentionné.
                        Hautement recommandé&rdquo;
                    </blockquote>
                    <p class="author"><cite>Hicham O-Sfh</cite></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimony">
                    <blockquote>
                        &ldquo;Les logements correspondent tout à fait à l’annonce, les quartiers sont très sûr, les
                        riad étaientt extrêmement propres, très bonne qualité et communication avec le personnel…&rdquo;
                    </blockquote>
                    <p class="author"><cite>Anonyme</cite></p>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="fh5co-blog-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Notre Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="blog-grid" style="background-image: url(/images/expensive.jpg);">
                    <div class="date text-center">
                        <span>19</span>
                        <small>Aout</small>
                    </div>
                </div>
                <div class="desc">
                    <h3><a href="#">Offre la plus cher</a></h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-grid" style="background-image: url(/images/birthday.jpg);">
                    <div class="date text-center">
                        <span>05</span>
                        <small>Juillet</small>
                    </div>
                </div>
                <div class="desc">
                    <h3><a href="#">1er anniversaire d'une villa de Luxe</a></h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-grid" style="background-image: url(/images/aventure.jpg);">
                    <div class="date text-center">
                        <span>28</span>
                        <small>Mai</small>
                    </div>
                </div>
                <div class="desc">
                    <h3><a href="#">Découvrir une nouvelle Aventure</a></h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
    // var now = new Date();

    // var day = 01;
    // var month = 01;

    // var today = 2000 + month + day;

    $('#date-start').val(getdate());
    $('#date-end').val(getdate());

</script>


@endsection
