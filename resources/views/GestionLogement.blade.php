
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/items.css" />
    <link rel="stylesheet" href="css/searchBox.css" />
    <link rel="stylesheet" href="css/jumbotron.css" />
    <script src="https://kit.fontawesome.com/4f2d779e50.js" crossorigin="anonymous"></script>

</head>
<body>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet" />

    <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Dashboard</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a role="button" href="#">
                            <i class="fa fa-user-circle"></i> Admin : Hicham O-Sfh
                        </a>
                        <ul id="g-account-menu" class="dropdown-menu" role="menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-user-secret"></i> My Profile
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-sign-out"></i> Se déconnecter
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /container -->
    </div>

    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
        <ul class="nav nav-pills nav-stacked" style="border-right:1px solid black">
            <li>
                <a href="#">
                    <i class="fas fa-home"></i> Accueil
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-users"></i> Les clients
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-building"></i> Les logements
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-chart-pie"></i> Statistiques
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-file"></i> Demandes &amp; Réservations
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-history"></i> Historique
                </a>
            </li>
        </ul>
    </div>

    <div id="cover">
        <form method="get" action="">
            <div class="tb">
                <div class="td">
                    <input type="text" placeholder="Rechercher" required />
                </div>
                <div class="td" id="s-cover">
                    <button type="submit">
                        <div id="s-circle"></div>
                        <span></span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <button class="btn btn-success" style="top:100px; width:170px; height:40px">
        <i class="fas fa-plus-circle"></i>
        Nouveau Logement
    </button>

   <!-- <div class="jumbotron">
      

    </div>-->

</body>
</html>
