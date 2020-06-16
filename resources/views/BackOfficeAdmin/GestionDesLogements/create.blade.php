@extends('BackOfficeAdmin.AdminLayout')

<!-- Font Icon -->
<!--<link rel="stylesheet" href="../vendor/mdi-font/css/material-design-iconic-font.min.css">-->

<!-- Main css -->
<link rel="stylesheet" href="../css/stylemainMultiStep.css">

<!-- Icons font CSS-->
<link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all" />
<link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all" />
<!-- Font special for pages-->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet" />

<!-- Vendor CSS-->
<link href="../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all" />

<!--Ajax-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<link href="../css/styleTogleIos.css" rel="stylesheet" media="all" />

<!-- Main CSS-->
<link href="../css/main.css" rel="stylesheet" media="all" />

<script src="https://kit.fontawesome.com/4f2d779e50.js" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('title','Création')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
<style>
    .actions {
        margin-bottom: 8%;
    }

    .form-label {
        font-size: 15px;
        text-decoration: underline;
    }

    .MonInput {
        border: solid 1px;
    }

    .box {
        width: 120px;
        height: 30px;
        border: 1px solid #999;
        font-size: 18px;
        color: #1c87c9;
        background-color: #eee;
        border-radius: 5px;
        box-shadow: 4px 4px #ccc;
    }

    .nbrInput {
        height: 40px;
        width: 20%;
    }

    .MonIcon {
        line-height: inherit;
    }

    #description {
        height: 140px;
        width: 750px;
    }
</style>
<script src="../js/notification/notify.min.js"></script>
@section('content')
<script>
    $.notify("Vous étes sur le point de créer un nouveau logement.", {
        className: "info",
        showDuration: 800,
        hideDuration: 800,
        autoHideDelay: 8000,
        position: "top center",
        arrowShow: true,
    });
</script>
<div class="MultiStep" style="height: 80%;margin-top: 3%;">
    <h2 class="H2Creation" style="text-transform:inherit">Cr&eacute;ation d'un nouveau logement</h2>
    <form method="POST" action="{{route('Logements.store') }}" id="signup-form" enctype="multipart/form-data" class="signup-form">
        <h3>
            <span class="title_text">Informations de base</span>
        </h3>
        <fieldset>
            <div class="fieldset-content">
                <div class="form-group" style="padding-left: 6%;">
                    <label for="nom" class="form-label">Nom du Logement</label>
                    <input type="text" class="MonInput nbrInput" name="nom" id="nom" placeholder="Superbe appartement panoramique" />
                    <span class="input-group-text fas fa-hotel" style="line-height: inherit;"></span>

                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" class="MonInput nbrInput" name="adresse" id="adresse" placeholder="Fes, environs de quartier El Mouahidine, Maroc" />
                    <span class="input-group-text fas fa-map-marked-alt" style="line-height: inherit;"></span>
                </div>
                <br />
                <br />
                <div class="form-group" style="padding-left: 6%;">
                    <label for="categorie" class="form-label">Categorie</label>
                    <select class="MonInput" id="MonSelectCategorie" name="categorie">
                        <option value="-1" selected>- Aucune Catégorie -</option>
                        @foreach($listeCategories as $categorie)
                        <option value="{{$categorie->id}}">{{ $categorie->libelle }}</option>
                        @endforeach
                    </select>
                    <small style="color:forestgreen; left:10px;margin-left: 10px;text-decoration: underline;">
                        Les autres champs se rempliront automatiquement<br />et deviendront non modifiables ..
                    </small>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="estCategorie" id="estCategorie" class="form-check-input" style="margin-left: -30%;" />
                    <i id="itemEnregistrement" style="margin-top: 10px; margin-left: 21%;">Enregistrer en tant que catégorie de logement.</i>
                </div>
                <div class="form-group">
                    <label for="images" class="form-label">images</label>
                    <div class="form-file">
                        <input type="file" name="images" id="images" class="custom-file-input" />
                        <span id='val'></span>
                        <span id='button'>Selectionnez</span>
                    </div>
                </div>
            </div>
        </fieldset>
        <h3>
            <span class="title_text">Détails</span>
        </h3>

        <fieldset>
            <div class="fieldset-content">
                <div class="form-group" style="padding-left: 4%;">
                    <label for="type" class="form-label">Type</label>
                    <select class="MonInput" name="typeLogement" id="typeLogement" style="width: 250px;">
                        <option disabled selected>-Choisissez un type-</option>
                        @foreach($listeTypes as $type)
                        <option value="{{ $type->id_type_logement }}">{{ $type->libelle_type_logement }}</option>
                        @endforeach
                    </select>
                    <span class="input-group-text far fa-building" style="line-height: inherit;"></span>
                    <span class="input-group-text fas fa-warehouse" style="line-height: inherit;"></span>
                    <span class="input-group-text fas fa-city" style="line-height: inherit;"></span>
                    <div class="form-group">
                        <label class="form-label" for="NbrReserv">Max de réservation</label>
                        <input type="number" class="MonInput nbrInput" id="NbrReserv" name="NbrReserv" placeholder="10" />
                        <span class="input-group-text fas fa-sliders-h" style="line-height: inherit;"></span>
                    </div>
                </div>

                <div class="form-select">
                    <div class="form-group">
                        <label class="form-label" for="superficie">Superficie</label>
                        <input type="number" style="padding:5px 15px;" class="MonInput nbrInput" id="superficie" name="superficie" placeholder="157" />
                        <span class="input-group-text">m&sup2;</span>
                    </div>

                    <div class="form-group">
                        <label for="nbrPiece" class="form-label">Piéces</label>
                        <input type="number" class="MonInput nbrInput" name="nbrPiece" id="nbrPiece" placeholder="3" />
                        <span class="input-group-text fas fa-door-open" style="line-height: inherit;"></span>
                    </div>

                    <div class="form-group">
                        <label for="NbrPersonne" class="form-label">Max de Personnes</label>
                        <input type="number" class="MonInput nbrInput" name="NbrPersonne" id="NbrPersonne" placeholder="4" />
                        <span class="input-group-text fas fa-users" style="line-height: inherit;"></span>
                    </div>
                </div>

                <div class="form-textarea">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="MonInput" placeholder="C'est une belle maison qui se constitue de .... Et qui se trouve dans ... Elle a une vue extremement magnifique sur le rivage .....">Faites une expérience hors du temps, dans cette magnifique maison marocaine traditionnelle avec sa piscine et ses jardins privatifs. Idéale pour une famille ou des amis, elle vous permettra de vous détendre dans un cadre élégant et épuré.</textarea>
                    <small>1500</small>
                </div>
            </div>
        </fieldset>

        <h3>
            <span class="title_text">Confort &amp; Tarifaction</span>
        </h3>

        <fieldset>
            <div class="fieldset-content">
                <div class="form-group" style="padding-left: 4%;">
                    <label class="form-label" for="massage">Massage/SPA</label>
                    <input type="checkbox" id="massage" name="massage" class="oval" style="margin-left: -50%;" />
                    <label class="toggler orange" for="massage"></label>

                    <label class="form-label" for="piscine">Piscine</label>
                    <input type="checkbox" id="piscine" name="piscine" class="oval" style="margin-left: -50%;" />
                    <label class="toggler orange" for="piscine"></label>

                    <label class="form-label" for="jardin">Jardins/Cours</label>
                    <input type="checkbox" id="jardin" name="jardin" class="oval" style="margin-left: -50%;" />
                    <label class="toggler orange" for="jardin"></label>

                    <label class="form-label" for="parking">Parking</label>
                    <input type="checkbox" id="parking" name="parking" class="oval" style="margin-left: -50%;" />
                    <label class="toggler orange" for="parking"></label>
                </div>
                <br />
                <br />
                <div class="form-select" style="padding-left: 9%;">
                    <div class="form-group">
                        <label class="form-label" for="margeAnnulation">Marge d'annulation</label>
                        <input type="number" class="MonInput nbrInput" style="width:20%;" id="margeAnnulation" name="margeAnnulation" placeholder="10 jours" />
                        <span class="input-group-text fas fa-calendar-alt" style="line-height: inherit;"></span>
                    </div>

                    <div class="form-group">
                        <label for="prixAnnulation" class="form-label">Prix d'annulation</label>
                        <input type="number" class="MonInput nbrInput" style="width:20%;" name="prixAnnulation" id="prixAnnulation" placeholder="4" />
                        <span class="input-group-text" style="line-height: inherit;">Dhs</span>
                        <i class="fas fa-minus-circle"></i>
                    </div>
                </div>

                <div class="form-select" style="padding-left: 9%;">
                    <div class="form-group">
                        <label class="form-label" for="prixHS">Haute saison</label>
                        <input type="number" class="MonInput nbrInput" style="width:20%;" id="prixHS" name="prixHS" placeholder="157" />
                        <span class="input-group-text">Dhs</span>
                        <i class="fas fa-umbrella-beach"></i>
                    </div>

                    <div class="form-group">
                        <label for="prixBS" class="form-label">Basse saison</label>
                        <input type="number" class="MonInput nbrInput" style="width:20%;" name="prixBS" id="prixBS" placeholder="4" />
                        <span class="input-group-text" style="line-height: inherit;">Dhs</span>
                        <i class="fas fa-snowflake"></i>
                    </div>
                </div>
            </div>
        </fieldset>
        {{ csrf_field() }}
    </form>
</div>
<!-- Jquery JS-->


<!-- Vendor JS-->
<script src="../vendor/select2/select2.min.js"></script>
<script src="../vendor/jquery-validate/jquery.validate.min.js"></script>
<script src="../vendor/bootstrap-wizard/bootstrap.min.js"></script>
<script src="../vendor/jquery-validate/jquery.validate.min.js"></script>
<script src="../vendor/jquery-validate/additional-methods.min.js"></script>
<script src="../vendor/jquery-steps/jquery.steps.min.js"></script>
<script src="../vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

<script src="../vendor/datepicker/moment.min.js"></script>
<script src="../vendor/datepicker/daterangepicker.js"></script>
<script src="../js/global.js"></script>
<script src="../vendor/minimalist-picker/dobpicker.js"></script>
<script src="../js/mainMultiStep.js"></script>
<script src="../js/jquery.js"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(
        function() {

            var divParent = document.getElementsByClassName('actions clearfix');
            var ulNode = $(divParent).children('ul')[0];
            var liNode = $(ulNode).children('li')[2];
            $(liNode).empty();
            liNode.innerHTML = '<a href="#finish" role="menuitem"><button style="z-index:1200;">Valider !</button></a>';

            $(document).on('change', '#MonSelectCategorie', function() {
                $("#MonSelectCategorie").css('font-weight', 'bold');
                $("#MonSelectCategorie").css('color', 'black');
                import_data(this.value);
            });

            function import_data(valeurSelectionne = '') {
                if (valeurSelectionne != -1) {
                    $('#itemEnregistrement').css('text-decoration', 'line-through');
                    $('#estCategorie').prop('disabled', true);
                    $("#estCategorie").css('background', 'darkgray');

                    let phrase = valeurSelectionne.split(' ');
                    let numero = phrase[phrase.length - 1];
                    $.ajax({
                        url: "{{ route('LogementController.import_categories') }}",
                        method: 'GET',
                        data: {
                            ID: numero
                        },
                        dataType: 'json',
                        success: function(MesDonneesJson) {
                            $('#superficie').val(MesDonneesJson.Superficie);
                            $("#superficie").prop("disabled", true);
                            $("#superficie").css('background', 'darkgray');

                            $('#nbrPiece').val(MesDonneesJson.NombrePiece);
                            $("#nbrPiece").prop("disabled", true);
                            $("#nbrPiece").css('background', 'darkgray');

                            $('#NbrPersonne').val(MesDonneesJson.MaxPersonne);
                            $("#NbrPersonne").prop("disabled", true);
                            $("#NbrPersonne").css('background', 'darkgray');

                            $('#NbrReserv').val(MesDonneesJson.MaxReservation);
                            $("#NbrReserv").prop("disabled", true);
                            $("#NbrReserv").css('background', 'darkgray');

                            $('#description').val(MesDonneesJson.Description);
                            $("#description").prop("disabled", true);
                            $("#description").css('background', 'darkgray');

                            $('#margeAnnulation').val(MesDonneesJson.MargeAnnulation);
                            $("#margeAnnulation").prop("disabled", true);
                            $("#margeAnnulation").css('background', 'darkgray');

                            $('#prixAnnulation').val(MesDonneesJson.PrixAnnulation);
                            $("#prixAnnulation").prop("disabled", true);
                            $("#prixAnnulation").css('background', 'darkgray');

                            $('#prixHS').val(MesDonneesJson.PrixHS);
                            $("#prixHS").prop("disabled", true);
                            $("#prixHS").css('background', 'darkgray');

                            $('#prixBS').val(MesDonneesJson.PrixBS);
                            $("#prixBS").prop("disabled", true);
                            $("#prixBS").css('background', 'darkgray');

                            $("#massage").prop("disabled", true);
                            $("#massage").prop("checked", MesDonneesJson.Massage);
                            $("#massage").css('background', 'darkgray');

                            $("#piscine").prop("disabled", true);
                            $("#piscine").prop("checked", MesDonneesJson.Piscine);
                            $("#piscine").css('background', 'darkgray');

                            $("#jardin").prop("disabled", true);
                            $("#jardin").prop("checked", MesDonneesJson.Jardin);
                            $("#jardin").css('background', 'darkgray');

                            $("#parking").prop("disabled", true);
                            $("#parking").prop("checked", MesDonneesJson.Parking);
                            $("#parking").css('background', 'darkgray');

                            $("#typeLogement").val("" + MesDonneesJson.TypeLogement + "").change();
                            $("#typeLogement").prop("disabled", true);
                            $("#typeLogement").css('background', 'darkgray');
                            $("#typeLogement").css('font-weight', 'bold');
                            $("#typeLogement").css('color', 'black');
                        }
                    });
                } else {
                    $('#itemEnregistrement').css('text-decoration', 'underline');
                    $('#estCategorie').prop('disabled', false);
                    $("#estCategorie").css('background', 'transparent');
                }
            }
        });
</script>
<!-- <script>
    document.querySelector('#images').addEventListener('change',function(){
        console.log(document.getElementById('images').value);
        let paths = document.getElementById('images').value;
        console.log(paths);
                console.log(paths.split('\\'));
            let path = paths.split('\\');
        let finalPATH = path[path.length - 1];
        console.log(finalPATH);
        $.ajax(
            url:"Logements.store",
            type: "GET",
            data: {path : finalPATH},
            dataType: 'json',
            success: function(){

            }
        )
    });
</script> -->
@endsection