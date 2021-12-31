@extends('layouts.dashboard')
<!-- BEGIN: Navbar-->
@section('navbar')
    @include('layouts.navbar')
@endsection
<!-- END: Navbar-->
@section('content')

    @push('head')
        <style>
            input[type="file"] {
                display: none;
            }

            .custom-file-upload {
                border: 1px solid #ccc;
                border-radius: 0.358rem;
                display: inline-block;
                padding: 9px 12px;
                cursor: pointer;
            }

        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script>
            var addLinke = "{{ route('membre.add_data') }}";
            var deleteLinke = "{{ route('membre.delete_data') }}";
            var updateLinke = "{{ route('membre.update_data') }}";
            var importLinke = "{{ route('file-import') }}";
            var members = @json($members);
            var analiseData = "{{ route('analise_data') }}";
            // alert(members);
        </script>
        {{-- <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}
        <script defer src="{{ asset('js/dashboard/import.js') }}"></script>
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

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
                <!-- Relief Buttons start -->
                <div id="messageImport"></div>

                <section id="relief-buttons" class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Import la liste des membres</h4>
                                </div>
                                <div class="card-body">
                                    <div class="demo-inline-spacing">
                                        <label for="file-upload" class="custom-file-upload">
                                            <i class="fa fa-cloud-upload"></i> Selectionner votre fichier le fichier excel
                                        </label>
                                        <form class="btn-outline-gradient-dark" action="{{ route('file-import') }}"
                                            method="Post" enctype="multipart/form-data">
                                            @csrf
                                            <input id="file-upload" name="file" type="file" />

                                            <button type="submit" class="btn btn-relief-info">Importer</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Relief Buttons end -->
                <!-- Table head options start -->
                <div class="row" id="table-head">
                    <!-- BEGIN: Content-->
                    <div class="container box">
                        {{-- <h3 align="center">la liste des membre</h3><br /> --}}
                        <hr>
                        <button type="button" id="analiser" class="btn btn-relief-warning mb-2">Analiser</button>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div id="message"></div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>PRENOM</th>
                                                <th>الإسم</th>
                                                <th>NOM</th>
                                                <th>النسب</th>
                                                <th>LONGITUDE</th>
                                                <th>LATITUDE</th>
                                                <th>EAMIL</th>
                                                <th>TÉLEPHON</th>
                                                <th>Association</th>
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


{{-- <script>
    @if (Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif
  
    @if (Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif
  
    @if (Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif
  
    @if (Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
  </script> --}}
