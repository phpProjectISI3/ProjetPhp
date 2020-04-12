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
<link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all" />
<link href="../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all" />

<!-- Main CSS-->
<link href="../css/main.css" rel="stylesheet" media="all" />

<script src="https://kit.fontawesome.com/4f2d779e50.js" crossorigin="anonymous"></script>

@section('title','Logements')

@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
<style>
.actions {
margin-bottom:8%;
}
</style>
       <div class="MultiStep" style="height: 80%;margin-top: 6%;">
            <h2 style="text-transform:inherit">Cr&eacute;ation d'un nouveau logement</h2>
            <form method="POST" id="signup-form" class="signup-form">
                <h3>
                    <span class="title_text">Account Infomation</span>
                </h3>
                <fieldset>
                    <div class="fieldset-content">
                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" placeholder="User Name" />
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" placeholder="Your Email" />
                        </div>
                        <div class="form-group form-password">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" data-indicator="pwindicator" />
                            <div id="pwindicator">
                                <div class="bar-strength">
                                    <div class="bar-process">
                                        <div class="bar"></div>
                                    </div>
                                </div>
                                <div class="label"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="your_avatar" class="form-label">Select avatar</label>
                            <div class="form-file">
                                <input type="file" name="your_avatar" id="your_avatar" class="custom-file-input" />
                                <span id='val'></span>
                                <span id='button'>Select File</span>
                            </div>
                        </div>
                    </div>
                   <!-- <div class="fieldset-footer">
                        <span>Step 1 of 3</span>
                    </div>-->
                </fieldset>

                <h3>
                    <span class="title_text">Personal Information</span>
                </h3>
                <fieldset>

                    <div class="fieldset-content">
                        <div class="form-group">
                            <label for="full_name" class="form-label">Full name</label>
                            <input type="text" name="full_name" id="full_name" placeholder="Full Name" />
                        </div>
    
                        <div class="form-select">
                            <label for="country" class="form-label">Country</label>
                            <select name="country" id="country">
                                <option value="">Country</option>
                                <option value="Australia">Australia</option>
                                <option value="USA">America</option>
                            </select>
                        </div>
    
                        <div class="form-radio">
                            <label for="gender" class="form-label">Gender</label>
                            <div class="form-radio-item">
                                <input type="radio" name="gender" value="male" id="male" checked="checked" />
                                <label for="male">Male</label>
    
                                <input type="radio" name="gender" value="female" id="female" />
                                <label for="female">Female</label>
                            </div>
                        </div>
    
                        <div class="form-textarea">
                            <label for="about_us" class="form-label">About us</label>
                            <textarea name="about_us" id="about_us" placeholder="Who are you ..."></textarea>
                        </div>
                    </div>

                   <!-- <div class="fieldset-footer">
                        <span>Step 2 of 3</span>
                    </div>-->

                </fieldset>

                <h3>
                    <span class="title_text">Payment Details</span>
                </h3>
                <fieldset>
                    <div class="fieldset-content">
                        <div class="form-radio">
                            <label for="payment_type">Payment Type</label>
                            <div class="form-radio-flex">
                                <input type="radio" name="payment_type" id="payment_visa" value="payment_visa" checked="checked" />
                                <label for="payment_visa"><img src="../images/icon-visa.png" alt=""></label>
    
                                <input type="radio" name="payment_type" id="payment_master" value="payment_master" />
                                <label for="payment_master"><img src="../images/icon-master.png" alt=""></label>
    
                                <input type="radio" name="payment_type" id="payment_paypal" value="payment_paypal" />
                                <label for="payment_paypal"><img src="../images/icon-paypal.png" alt=""></label>
                            </div>
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

                   <!-- <div class="fieldset-footer">
                        <span>Step 3 of 3</span>
                    </div>-->
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
