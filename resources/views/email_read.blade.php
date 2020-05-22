@extends('layout.app')

@section('title','email read')

@section('linkcss')
    <!-- vendor css -->
    <link rel="stylesheet" href="/assets/css/style.css">
    
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
	
	

<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
    <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                </div>
            </div>
        </div>
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card email-card">
                    <div class="card-header">
                        <div class="mail-header">
                            <div class="row align-items-center">
                                <!-- [ email-left section ] start -->
                                <div class="col-xl-2 col-md-3">
                                    <a href class="b-brand">
                                        <div class="b-bg">
                                            {{$firstLetter}}
                                        </div>
                                        <span class="b-title text-muted">{{	session()->get('userObject')->nom . ' ' . session()->get('userObject')->prenom}}</span>
                                    </a>
                                </div>
                                <!-- [ email-left section ] end -->
                                <!-- [ email-right section ] start -->
                                <div class="col-xl-10 col-md-9">
                                    <div class="input-group mb-0">
                                    </div>
                                </div>
                                <!-- [ email-right section ] end -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mail-body">
                            <div class="row">
                                <!-- [ email-left section ] start -->
                                <div class="col-xl-2 col-md-3">
                                    <div class="mb-3">
                                        <a href="{{url('contact')}}" class="btn waves-effect waves-light btn-rounded btn-outline-primary">+ Compose</a>
                                    </div>
                                    <ul class="mb-2 nav nav-tab flex-column nav-pills">
                                        <li class="nav-item mail-section">
                                            <a class="nav-link text-left active" href="{{url('messagerie')}}">
                                                <span><i class="feather icon-inbox"></i>Index</span>
                                                <span class="float-right">{{$totalMessage}}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- [ email-left section ] end -->
                                <!-- [ email-right section ] start -->
                                <div class="col-xl-10 col-md-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="email-read">
                                                <div class="photo-table m-r-10">
                                                </div>
                                                <div style="margin-left:3.2em;">
                                                    <a>
                                                        <p class="user-name text-dark mb-1"><strong>De la part de : {{$recepteur[0]->nom . ' ' . $recepteur[0]->prenom}}</strong></p>
                                                    </a>
                                                    <a class="user-mail txt-muted" >
                                                        <p class="user-name text-dark mb-1"><strong>&lt; {{$recepteur[0]->username_email}} &gt; </strong></p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="m-b-20 m-l-50 p-l-10 email-contant">
                                                <div class="photo-contant">
                                                    <div>
                                                        <div class="email-content">
															{{$recepteur[0]->message_ecrit}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ email-right section ] start -->
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
    $(document).ready(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    });
    
</script>
<script>
    $(document).ready(function () {
        $('#fh5co-header-section').css('background-image', 'url("/images/2.jpg")');
        $("a.active").removeClass();
        $("#PageActuel").val(window.location);
        $("#InDateEntree").val($("#DateEntree").text());
        $("#InDateSortie").val($("#DateSortie").text());
    });
</script>
<script>
    document.getElementById('footer').style.display="none";
</script>

@endsection