@extends('layout.app')

@section('title','Messagerie')

@section('linkcss')
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
@endsection

@section('body')
<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
				
			
	</header>
	<!-- [ Header ] end -->
	
	

<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card email-card">
                    <div class="card-header">
                        <div class="mail-header">
                            <div class="row align-items-center">
                                <!-- [ inbox-left section ] start -->
                                <div class="col-xl-2 col-md-3">
                                    <a href="index.html" class="b-brand">
                                        <div class="b-bg">
                                            {{$firstLetter}}
                                        </div>
                                        <span class="b-title text-muted">{{session()->get('userObject')->nom . ' ' . session()->get('userObject')->prenom}}</span>
                                    </a>
                                </div>
                                <!-- [ inbox-left section ] end -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mail-body">
                            <div class="row">
                                <!-- [ inbox-left section ] start -->
                                <div class="col-xl-2 col-md-3">
                                    <div class="mb-3">
                                        <a href="email_compose.html" class="btn waves-effect waves-light btn-rounded btn-outline-primary">+ Compose</a>
                                    </div>
                                    <ul class="mb-2 nav nav-tab flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <li class="nav-item mail-section">
                                            <a class="nav-link text-left active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">
                                                <span><i class="feather icon-inbox"></i> Inbox</span>
                                                <span class="float-right">6</span>
                                            </a>
                                        </li>
                                        <li class="nav-item mail-section">
                                            <a class="nav-link text-left" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-mail" role="tab">
                                                <span><i class="feather icon-navigation"></i> Lu</span>
                                            </a>
                                        </li>
                                        <li class="nav-item mail-section">
                                            <a class="nav-link text-left" id="v-pills-Trash-tab" data-toggle="pill" href="#v-pills-Trash" role="tab">
                                                <span><i class="feather icon-valid"></i> Non Lu</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- [ inbox-left section ] end -->
                                <!-- [ inbox-right section ] start -->
                                <div class="col-xl-10 col-md-9 inbox-right">
                                    <div class="email-btn"> 
                                        <button type="button" class="btn waves-effect waves-light btn-icon btn-rounded btn-outline-secondary mb-2"><i class="feather icon-trash-2"></i></button>
                                    </div>
                                    <div class="tab-content p-0" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <ul class="nav nav-pills nav-fill mb-0" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-primary-tab" data-toggle="pill" href="#pills-primary" role="tab" aria-controls="pills-primary" aria-selected="true"><span><i class="feather icon-inbox"></i>
                                                            primary</span></a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-primary" role="tabpanel" aria-labelledby="pills-primary-tab">
                                                    <div class="mail-body-content table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                                @foreach($recepteur as $rec)
                                                                
                                                                <tr class="read">
                                                                    <td>
                                                                        <div class="check-star">
                                                                        </div>
                                                                    </td>
                                                                    <td><a href="email_read.html" class="email-name waves-effect">{{$rec->nom . ' ' . $rec->prenom }}</a></td>
                                                                    <td><a href="email_read.html" class="email-name waves-effect">{{$rec->message_ecrit}}</a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-mail" role="tabpanel">
                                            <div class="mail-body-content table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr class="unread">
                                                            <td>
                                                                <div class="check-star">
                                                                    <div class="form-group d-inline">
                                                                        <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                            <input type="checkbox" name="checkbox-s-in-49" id="checkbox-s-infill-49">
                                                                            <label for="checkbox-s-infill-49" class="cr"></label>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
                                                                </div>
                                                            </td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">Sara Soudein</a></td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">SVG new updates comes for you</a></td>
                                                            <td class="email-time">00:05 AM</td>
                                                        </tr>
                                                        <tr class="read">
                                                            <td>
                                                                <div class="check-star">
                                                                    <div class="form-group d-inline">
                                                                        <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                            <input type="checkbox" name="checkbox-s-in-50" id="checkbox-s-infill-50">
                                                                            <label for="checkbox-s-infill-50" class="cr"></label>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#"><i class="feather icon-star ml-2"></i></a>
                                                                </div>
                                                            </td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">Hanry Joseph</a></td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">SCSS current working for new updates</a></td>
                                                            <td class="email-time">12:01 PM</td>
                                                        </tr>
                                                        <tr class="unread">
                                                            <td>
                                                                <div class="check-star">
                                                                    <div class="form-group d-inline">
                                                                        <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                            <input type="checkbox" name="checkbox-s-in-51" id="checkbox-s-infill-51">
                                                                            <label for="checkbox-s-infill-51" class="cr"></label>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#"><i class="feather icon-star ml-2"></i></a>
                                                                </div>
                                                            </td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">John Doe</a></td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">Coming Up Next Week</a></td>
                                                            <td class="email-time">13:02 PM</td>
                                                        </tr>
                                                        <tr class="unread">
                                                            <td>
                                                                <div class="check-star">
                                                                    <div class="form-group d-inline">
                                                                        <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                            <input type="checkbox" name="checkbox-s-in-52" id="checkbox-s-infill-52">
                                                                            <label for="checkbox-s-infill-52" class="cr"></label>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
                                                                </div>
                                                            </td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
                                                            <td>
                                                                <a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer</a>
                                                                <div><a href="#!" class="mail-attach"><i class="feather icon-image mr-2"></i>user.png</a>
                                                                    <a href="#!" class="mail-attach ml-2"><i class="feather icon-file-text mr-2"></i>file.doc</a>
                                                                </div>
                                                            </td>

                                                            <td class="email-time">12:01 AM</td>
                                                        </tr>
                                                        <tr class="read">
                                                            <td>
                                                                <div class="check-star">
                                                                    <div class="form-group d-inline">
                                                                        <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                            <input type="checkbox" name="checkbox-s-in-53" id="checkbox-s-infill-53">
                                                                            <label for="checkbox-s-infill-53" class="cr"></label>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#"><i class="feather icon-star ml-2"></i></a>
                                                                </div>
                                                            </td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">Liu Koi Yan</a></td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">Charts waiting for you</a>
                                                                <div><a href="#!" class="mail-attach"><i class="feather icon-film mr-2"></i>video</a></div>
                                                            </td>
                                                            <td class="email-time">07:15 AM</td>
                                                        </tr>
                                                        <tr class="read">
                                                            <td>
                                                                <div class="check-star">
                                                                    <div class="form-group d-inline">
                                                                        <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                            <input type="checkbox" name="checkbox-s-in-54" id="checkbox-s-infill-54">
                                                                            <label for="checkbox-s-infill-54" class="cr"></label>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
                                                                </div>
                                                            </td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></td>
                                                            <td class="email-time">08:01 AM</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-Trash" role="tabpanel">
                                            <div class="mail-body-content table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr class="unread">
                                                            <td>
                                                                <div class="check-star">
                                                                    <div class="form-group d-inline">
                                                                        <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                            <input type="checkbox" name="checkbox-s-in-55" id="checkbox-s-infill-55">
                                                                            <label for="checkbox-s-infill-55" class="cr"></label>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#"><i class="feather icon-star ml-2"></i></a>
                                                                </div>
                                                            </td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">Liu Koi Yan</a></td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">Charts waiting for you</a>
                                                                <div><a href="#!" class="mail-attach"><i class="feather icon-film mr-2"></i>video</a></div>
                                                            </td>
                                                            <td class="email-time">07:15 AM</td>
                                                        </tr>
                                                        <tr class="unread">
                                                            <td>
                                                                <div class="check-star">
                                                                    <div class="form-group d-inline">
                                                                        <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                            <input type="checkbox" name="checkbox-s-in-56" id="checkbox-s-infill-56">
                                                                            <label for="checkbox-s-infill-56" class="cr"></label>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
                                                                </div>
                                                            </td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a></td>
                                                            <td class="email-time">08:01 AM</td>
                                                        </tr>
                                                        <tr class="unread">
                                                            <td>
                                                                <div class="check-star">
                                                                    <div class="form-group d-inline">
                                                                        <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                            <input type="checkbox" name="checkbox-s-in-57" id="checkbox-s-infill-57">
                                                                            <label for="checkbox-s-infill-57" class="cr"></label>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
                                                                </div>
                                                            </td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">Sara Soudein</a></td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">SVG new updates comes for you</a></td>
                                                            <td class="email-time">00:05 AM</td>
                                                        </tr>
                                                        <tr class="read">
                                                            <td>
                                                                <div class="check-star">
                                                                    <div class="form-group d-inline">
                                                                        <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                            <input type="checkbox" name="checkbox-s-in-58" id="checkbox-s-infill-58">
                                                                            <label for="checkbox-s-infill-58" class="cr"></label>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#"><i class="feather icon-star ml-2"></i></a>
                                                                </div>
                                                            </td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">Hanry Joseph</a></td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">SCSS current working for new updates</a></td>
                                                            <td class="email-time">12:01 PM</td>
                                                        </tr>
                                                        <tr class="read">
                                                            <td>
                                                                <div class="check-star">
                                                                    <div class="form-group d-inline">
                                                                        <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                            <input type="checkbox" name="checkbox-s-in-59" id="checkbox-s-infill-59">
                                                                            <label for="checkbox-s-infill-59" class="cr"></label>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#"><i class="feather icon-star ml-2"></i></a>
                                                                </div>
                                                            </td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">John Doe</a></td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">Coming Up Next Week</a></td>
                                                            <td class="email-time">13:02 PM</td>
                                                        </tr>
                                                        <tr class="read">
                                                            <td>
                                                                <div class="check-star">
                                                                    <div class="form-group d-inline">
                                                                        <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                            <input type="checkbox" name="checkbox-s-in-60" id="checkbox-s-infill-60">
                                                                            <label for="checkbox-s-infill-60" class="cr"></label>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
                                                                </div>
                                                            </td>
                                                            <td><a href="email_read.html" class="email-name waves-effect">Google Inc</a></td>
                                                            <td>
                                                                <a href="email_read.html" class="email-name waves-effect">Lorem ipsum dolor sit amet, consectetuer</a>
                                                                <div><a href="#!" class="mail-attach"><i class="feather icon-image mr-2"></i>user.png</a>
                                                                    <a href="#!" class="mail-attach ml-2"><i class="feather icon-file-text mr-2"></i>file.doc</a>
                                                                </div>
                                                            </td>
                                                            <td class="email-time">12:01 AM</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ inbox-right section ] end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->



@endsection

@section('scripts')
<script src="../js/jquery.js"></script>
<script src="../js/notification/notify.min.js"></script>
    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/ripple.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
	<script src="assets/js/menu-setting.min.js"></script>

<script>
    $(document).ready(function () {
        $('#fh5co-header-section').css('background-image', 'url("/images/2.jpg")');
        $("a.active").removeClass();
        $("#PageActuel").val(window.location);
        $("#InDateEntree").val($("#DateEntree").text());
        $("#InDateSortie").val($("#DateSortie").text());
    });

     var divs = document.getElementsByClassName('carte__description');
    for (i = 0; i < divs.length; i++) {
        divs[i].innerHTML = divs[i].innerHTML.substring(0, 110) + '....<a href="{{url('detailRecherche ')}}" style="color: orangered;">plus de détail !</a>';
    }
</script>
<script>
    document.getElementById('footer').style.display="none";
</script>
@endsection