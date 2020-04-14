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

<link href="../css/styleTogleIos.css" rel="stylesheet" media="all" />

<!-- Main CSS-->
<link href="../css/main.css" rel="stylesheet" media="all" />

<script src="https://kit.fontawesome.com/4f2d779e50.js" crossorigin="anonymous"></script>

@section('title','Création')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
<style>
 .actions {
margin-bottom:8%;
}
 .form-label{
font-size:15px;
text-decoration:underline;
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
 .nbrInput{
height: 40px;
width:20%;
 }
 .MonIcon{
 line-height: inherit;
 }
 #description{
 height: 140px;
 width: 750px;
 }

 
</style>
@section('content')
 <div class="MultiStep" style="height: 80%;margin-top: 6%;">
            <h2 style="text-transform:inherit">Cr&eacute;ation d'un nouveau logement</h2>
            <form method="POST" id="signup-form" class="signup-form">
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

                        <div class="form-group" >
                            <label for="categorie" class="form-label">Categorie</label>
                            <select class="MonInput" name="categorie">
                                <option value="value">text</option>
                                <option value="value">text</option>
                                <option value="value" selected>text</option>
                            </select>
                         <small style="color:forestgreen; left:10px;margin-left: 10px;text-decoration: underline;">
                            Si ce logement ne fait partie d'aucune catégorie :<br />selectionnez -Aucune Catégories-
                         </small>
                       </div>
                        <div class="form-group">
                            <label for="images"  class="form-label">images</label>
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
                             <select class="MonInput" name="type" style="width: 250px;">
                                <option value="value">text</option>
                                <option value="value">text</option>
                                <option value="value" selected>text</option>
                            </select>
                                <span class="input-group-text far fa-building" style="line-height: inherit;"></span>
                                <span class="input-group-text fas fa-warehouse" style="line-height: inherit;"></span>
                                <span class="input-group-text fas fa-city" style="line-height: inherit;"></span>
                             <div class="form-group">
                                <label class="form-label" for="NbrReserv">Max de réservation</label>
                                <input type="number" class="MonInput nbrInput" id="NbrReserv" name="NbrReserv" placeholder="10"/>
                                 <span class="input-group-text fas fa-sliders-h" style="line-height: inherit;"></span>
                             </div>
                        </div>
    
                        <div class="form-select">
                             <div class="form-group">
                                <label class="form-label" for="superficie">Superficie</label>
                                <input type="number" class="MonInput nbrInput" id="superficie" name="superficie" placeholder="157"/>
                                 <span class="input-group-text">m&sup2;</span>
                             </div>

                             <div class="form-group">
                                <label for="nbrPiece" class="form-label">Piéces</label>
                                <input type="number" class="MonInput nbrInput" name="nbrPiece" id="nbrPiece" placeholder="3" />
                                 <span class="input-group-text fas fa-door-open" style="line-height: inherit;"></span>
                             </div>

                             <div class="form-group">
                                <label for="NbrPersonne" class="form-label">Max de Personnes</label>
                                <input type="number" class="MonInput nbrInput"  name="NbrPersonne" id="NbrPersonne" placeholder="4" />
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
                                <input type="checkbox" id="massage" class="oval" style="margin-left: -50%;"/>
                                <label class="toggler orange" for="massage"></label>

                                 <label class="form-label" for="piscine">Piscine</label>
                                <input type="checkbox" id="piscine" class="oval" style="margin-left: -50%;"  />
                                <label class="toggler orange" for="piscine"></label>

                                <label class="form-label" for="jardin">Jardins/Cours</label>
                                <input type="checkbox" id="jardin" class="oval" style="margin-left: -50%;" />
                                <label class="toggler orange" for="jardin"></label>

                                 <label class="form-label" for="parking">Parking</label>
                                <input type="checkbox" id="parking" class="oval" style="margin-left: -50%;" />
                                <label class="toggler orange" for="parking"></label>
                         </div>
                            
                        <div class="form-row">
                            <div class="form-group">
                                <label for="credit_card" class="form-label">Credit Card</label>
                                <input type="text" name="credit_card" id="credit_card" />
                            </div>
                            <div class="form-group">
                                <label for="cvc" class="form-label">CVC</label>
                                <input type="text" name="cvc" id="cvc" />
                            </div>
                        </div>
                        <div class="form-date">
                            <label for="expiry_date">Expiration Date</label>
                            <div class="form-flex">
                                <div class="form-date-item">
                                    <select id="expiry_date" name="expiry_date"></select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                                <div class="form-date-item">
                                    <select id="expiry_year" name="expiry_year"></select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name_of_card" class="form-label">Name of card</label>
                            <input type="text" name="name_of_card" id="name_of_card" />
                        </div>

                    </div>
                </fieldset>

            </form>
</div>
<!-- Jquery JS-->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Vendor JS-->
<script src="../vendor/select2/select2.min.js"></script>
<script src="../vendor/jquery-validate/jquery.validate.min.js"></script>
<script src="../vendor/bootstrap-wizard/bootstrap.min.js"></script>
<script src="../vendor/jquery-validate/jquery.validate.min.js"></script>
<script src="../vendor/jquery-validate/additional-methods.min.js"></script>
<script src="../vendor/jquery-steps/jquery.steps.min.js"></script>
<script src="../vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="../vendor/jquery.pwstrength/jquery.pwstrength.js"></script>

<script src="../vendor/datepicker/moment.min.js"></script>
<script src="../vendor/datepicker/daterangepicker.js"></script>
<script src="../js/global.js"></script>
<script src="../vendor/minimalist-picker/dobpicker.js"></script>
<script src="../js/mainMultiStep.js"></script>

@endsection
