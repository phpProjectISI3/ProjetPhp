<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>ISI3 &mdash; @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />

    <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="../favicon.ico" />
    <!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,900,700,900italic' rel='stylesheet' type='text/css'> -->

    <!-- Stylesheets -->
    <!-- Dropdown Menu -->
    <link rel="stylesheet" href="/css/superfish.css" />
    <!-- Owl Slider -->
    <!-- <link rel="stylesheet" href="css/owl.carousel.css"> -->
    <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
    <!-- Date Picker -->
    <link rel="stylesheet" href="/css/bootstrap-datepicker.min.css" />
    <!-- CS Select -->
    <link rel="stylesheet" href="/css/cs-select.css" />
    <link rel="stylesheet" href="/css/cs-skin-border.css" />

    <!-- Themify Icons -->
    <link rel="stylesheet" href="/css/themify-icons.css" />
    <!-- Flat Icon -->
    <link rel="stylesheet" href="/css/flaticon.css" />
    <!-- Icomoon -->
    <link rel="stylesheet" href="/css/icomoon.css" />
    <!-- Flexslider  -->
    <link rel="stylesheet" href="/css/flexslider.css" />
    @section('linkcss')
    @show
    <!-- Style -->
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/modalLogin.css" />
    {{-- <link rel="stylesheet" href="../css/detailrecherche.css" /> --}}
    <script src="https://kit.fontawesome.com/4f2d779e50.js" crossorigin="anonymous"></script>


    <!-- Modernizr JS -->
    <script src="/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    <style>
        #linkLogin {
            font-weight: bold;
            color: orange;
            cursor: pointer;
            animation: blink 2s linear infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0;
            }
        }

        .modal-backdrop {
            z-index: 81;
        }

        input[type="submit"] {
            width: 100%;
            height: 3.5em;
            outline: none;
            background: orangered;
            color: white;
            border: none;
            border-radius: 8px;
            box-shadow: 0 0 5px rgb(107, 99, 92);
        }

    </style>
</head>

<body>
    <div id="fh5co-wrapper">
        <div id="fh5co-page">
            <div id="fh5co-header">

                <header id="fh5co-header-section">
                    <div class="container" id="MonHeader">
                        <div class="nav-header">
                            <a href="{{url('/')}}" class="js-fh5co-nav-toggle fh5co-nav-toggle">
                                <i></i>
                            </a>
                            <h1 id="fh5co-logo">
                                <a href="{{url('/')}}">ISI3</a>
                            </h1>
                            <nav id="fh5co-menu-wrap" role="navigation">
                                <ul class="sf-menu" id="fh5co-primary-menu">
                                    <li>
                                        <strong>
                                            <a id="linkAccueil" href="{{url('/')}}">Accueil</a>
                                        </strong>
                                    </li>
                                    <li>
                                        <a id="linkNosOffres" href="{{url('/about/-1') }}">Nos Offres</a>
                                    </li>
                                    <li>
                                        <a id="linkService" href="{{url('/service')}}">Nos services</a>
                                    </li>
                                    <li>
                                        <a id="linkBlog" href="{{url('/blog')}}">Blog</a>
                                    </li>
                                    <li>
                                        <a id="linkContact" href="{{url('/contact')}}">Contactez nous !</a>
                                    </li>
                                    <li>

                                        @if(App\Http\Controllers\Auth_Role_PersonneController::IsAuthentificated())
                                        {{-- si authentifié  --}}
                                        <strong>
                                            <a class="" style="cursor: default;" id="mesInfos">Mes infos &nbsp;</a>
                                        </strong>
                                        <ul class="fh5co-sub-menu" style="margin-top: -20px;min-width: 0px;">
                                            <li><a href="{{ route('profil') }}"><i class="far fa-user"></i> &nbsp;
                                                    Profil</a></li>
                                            <li><a href="#"><i class="fas fa-umbrella-beach"></i> &nbsp; Séjours</a>
                                            </li>
                                            <li><a href="#"><i class="far fa-envelope"></i> &nbsp; Messagerie</a>
                                            </li>
                                            <li><a href="#"><i class="far fa-heart"></i> &nbsp; Favoris</a></li>
                                            <li><a href="{{route('logout')}}"><i class="fas fa-power-off"></i> &nbsp; Se
                                                    déconncter</a>
                                            </li>
                                        </ul>
                                        @else {{-- non authentifié  --}}
                                        <strong>
                                            <a class="fh5co-sub-ddown" id="linkLogin" data-toggle="modal"
                                                data-target="#login-modal">Login &nbsp;</a>
                                        </strong>
                                        @endif
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </header>
                <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="loginmodal-container">
                            <h1>Se connecter pour réserver</h1>
                            <br />
                            <form action="/loginAndRedirectProfil" method="POST">
                                @csrf
                                <input type="text" name="email" placeholder="Pseudo" value="mail1@gmail.com" />
                                <input type="password" name="motdepasse" placeholder="Mot de passe"
                                    value="MotDePasse1" />
                                <input type="submit" class="login loginmodal-submit" value="Login" />
                            </form>
                            <div class="login-help">
                                <a href="#">Mot de passe oublié ?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end:fh5co-header -->
            @section('body')
            @show

            <footer id="footer" class="fh5co-bg-color">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="copyright">
                                <p>
                                    <small>
                                        &copy; 2020 Site officiel de réservation.
                                        <br /> Tous droits réservés.
                                        <br />
                                        <a href="{{url('/')}}">Luxe</a> demeure votre site officelement idéal pour le
                                        Booking Sur
                                        Mesure !
                                    </small>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3">
                                    <h3 style="font-size: 14px;">Pourquoi nous :</h3>
                                    <ul class="link">
                                        <li>
                                            <a>Wifi gratuit</a>
                                        </li>
                                        <li>
                                            <a>Service client</a>
                                        </li>
                                        <li>
                                            <a>réservation à l'avance</a>
                                        </li>
                                        <li>
                                            <a>24h/7j</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <h3>Nos facilités</h3>
                                    <ul class="link">
                                        <li>
                                            <a href="#">Resturation</a>
                                        </li>
                                        <li>
                                            <a href="#">Air de jeux</a>
                                        </li>
                                        <li>
                                            <a href="#">Piscine*</a>
                                        </li>
                                        <li>
                                            <a href="#">Massage &amp; Spa</a>
                                        </li>
                                        <li>
                                            <a href="#">Gym</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h3>Abbonés vous !</h3>
                                    <p>Recevez toutes nos nouveautés et promotions par email.</p>
                                    <form action="#" id="form-subscribe">
                                        <div class="form-field">
                                            <input type="email" placeholder="Email@mail.com" id="email" />
                                            <input type="submit" id="submit" value="Envoyer !" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <ul class="social-icons">
                                <li>
                                    <a href="https://twitter.com/login?lang=fr">
                                        <i class="icon-twitter-with-circle"></i>
                                    </a>
                                    <a href="https://m.facebook.com/login">
                                        <i class="icon-facebook-with-circle"></i>
                                    </a>
                                    <a href="https://www.instagram.com/?hl=fr">
                                        <i class="icon-instagram-with-circle"></i>
                                    </a>
                                    <a href="https://fr.linkedin.com/">
                                        <i class="icon-linkedin-with-circle"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- END fh5co-page -->

    </div>
    <!-- END fh5co-wrapper -->

    <!-- Javascripts -->
    @section('scripts')
    @show
    <script src="/js/main.js"></script>
    <script src="/js/jquery-2.1.4.min.js"></script>
    <!-- Dropdown Menu -->
    <script src="/js/hoverIntent.js"></script>
    <script src="/js/superfish.js"></script>
    <!-- Bootstrap -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="/js/jquery.waypoints.min.js"></script>
    <!-- Counters -->
    <script src="/js/jquery.countTo.js"></script>
    <!-- Stellar Parallax -->
    <script src="/js/jquery.stellar.min.js"></script>
    <!-- Owl Slider -->
    <!-- // <script src="js/owl.carousel.min.js"></script> -->
    <!-- Date Picker -->
    <script src="/js/bootstrap-datepicker.min.js"></script>
    <!-- CS Select -->
    <script src="/js/classie.js"></script>
    <script src="/js/selectFx.js"></script>
    <!-- Flexslider -->
    <script src="/js/jquery.flexslider-min.js"></script>

    <script src="/js/custom.js"></script>
</body>

</html>
