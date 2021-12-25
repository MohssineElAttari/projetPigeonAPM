@extends('layouts.dashboard')
<!-- BEGIN: Navbar-->
@section('navbar')
    @include('layouts.navbar')
@endsection
<!-- END: Navbar-->
@section('content')

    @push('head')
        <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script defer src="{{ asset('js/dashboard/import.js') }}"></script>
    @endpush
 <!-- BEGIN: Content-->
 <div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Espace membre</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Espace membre
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">

            <!-- Table head options start -->
            <div class="row" id="table-head">
                <!-- BEGIN: Content-->
                <div class="container box">
                    <h3 align="center">Import les la liste des membre</h3><br />
                    <div class="panel panel-default">
                        <div class="panel-heading">Sample Data</div>
                        <div class="panel-body">
                            <div id="message"></div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>PRENOM</th>
                                            <th>NOM</th>
                                            <th>LONGITUDE</th>
                                            <th>LATITUDE</th>
                                            <th>EAMIL</th>
                                            <th>TÉLEPHON</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                {{ csrf_field() }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Content-->
            </div>
            <!-- Table head options end -->

        </div>
    </div>
 </div>







@endsection

<!-- BEGIN: Footer-->

@section('footer')
    @include('layouts.footer')
@endsection
<!-- END: Footer-->
