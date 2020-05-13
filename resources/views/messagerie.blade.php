@extends('layout.app')

@section('title','Messagerie')

@section('linkcss')
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
	<!-- [ Header ] start -->
	<!-- <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
	</header> -->
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
                                    <a href class="b-brand">
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
                                        <a href="contact" class="btn waves-effect waves-light btn-rounded btn-outline-primary">+ Compose</a>
                                    </div>
                                    <ul class="mb-2 nav nav-tab flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <li class="nav-item mail-section">
                                            <a class="nav-link text-left active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">
                                                <span><i class="feather icon-inbox"></i> Inbox</span>
                                                <span class="float-right">{{$totalMessage}}</span>
                                            </a>
                                        </li>
                                        <!--  -->
                                    </ul>
                                </div>
                                <!-- [ inbox-left section ] end -->
                                <!-- [ inbox-right section ] start -->
                                <div class="col-xl-10 col-md-9 inbox-right">
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
                                                                @if($rec->vu)
                                                                    <tr class="read">
                                                                        <td>
                                                                            <div class="check-star">
                                                                            </div>
                                                                        </td>
                                                                        <td><a href="{{route('Auth_Role_PersonneController.read_email',[ $rec->id_message])}}" class="email-name waves-effect">{{$rec->nom . ' ' . $rec->prenom }}</a></td>
                                                                        <td><a href="{{route('Auth_Role_PersonneController.read_email',[ $rec->id_message])}}" class="email-name waves-effect carte__description">{{$rec->message_ecrit}}</a>

                                                                        </td>
                                                                    </tr>
                                                                @else 
                                                                    <tr class="unread">
                                                                        <td>
                                                                            <div class="check-star">
                                                                            </div>
                                                                        </td>
                                                                        <td><a href="{{route('Auth_Role_PersonneController.read_email',[ $rec->id_message])}}" class="email-name waves-effect">{{$rec->nom . ' ' . $rec->prenom }}</a></td>
                                                                        <td><a href="{{route('Auth_Role_PersonneController.read_email',[ $rec->id_message])}}" class="email-name waves-effect carte__description">{{$rec->message_ecrit}}</a>
                                                                        </td>
                                                                    </tr>

                                                                @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
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
    <!-- Required Js -->
    <script src="/assets/js/vendor-all.min.js"></script>
    <script src="/assets/js/plugins/bootstrap.min.js"></script>
    <script src="/assets/js/ripple.js"></script>
    <script src="/assets/js/pcoded.min.js"></script>

<script>
    $(document).ready(function () {
        $('#fh5co-header-section').css('background-image', 'url("/images/2.jpg")');
        $("a.active").removeClass();
        $("#PageActuel").val(window.location);
        $("#InDateEntree").val($("#DateEntree").text());
        $("#InDateSortie").val($("#DateSortie").text());
        $("#v-pills-home-tab").click()
        $("#pills-primary-tab").click()

    });

     var divs = document.getElementsByClassName('carte__description');
    for (i = 0; i < divs.length; i++) {
        divs[i].innerHTML = divs[i].innerHTML.substring(0, 117) + '....';
    }
</script>
<script>
    document.getElementById('footer').style.display="none";
</script>
@endsection