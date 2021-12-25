@extends('layouts.dashboard')
<!-- BEGIN: Navbar-->
@section('navbar')
    @include('layouts.navbar')
@endsection
<!-- END: Navbar-->
@section('content')

    @push('head')

    @endpush



    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Examples -->
                <section id="card-demo-example">
                    <div class="row match-height">
                        <div class="col-md-2 col-lg-2">
                            <a href="{{ route('membre') }}" class="card">
                                <img class="card-img-top" src="{{ asset('images/dashboard/slider/04.jpg') }}"
                                    alt="Card image cap" />
                                <div class="card-body">
                                    <h4 class="card-title">Espace Membre</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <a href="#" class="card">
                                <img class="card-img-top" src="{{ asset('images/dashboard/slider/04.jpg') }}"
                                    alt="Card image cap" />
                                <div class="card-body">
                                    <h4 class="card-title">Espace Councours</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <a href="#" class="card">
                                <img class="card-img-top" src="{{ asset('images/dashboard/slider/04.jpg') }}"
                                    alt="Card image cap" />
                                <div class="card-body">
                                    <h4 class="card-title">Espace Councours</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <a href="#" class="card">
                                <img class="card-img-top" src="{{ asset('images/dashboard/slider/04.jpg') }}"
                                    alt="Card image cap" />
                                <div class="card-body">
                                    <h4 class="card-title">Espace Membre</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <a href="#" class="card">
                                <img class="card-img-top" src="{{ asset('images/dashboard/slider/04.jpg') }}"
                                    alt="Card image cap" />
                                <div class="card-body">
                                    <h4 class="card-title">Espace Membre</h4>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <a href="#" class="card">
                                <img class="card-img-top" src="{{ asset('images/dashboard/slider/04.jpg') }}"
                                    alt="Card image cap" />
                                <div class="card-body">
                                    <h4 class="card-title">Espace Membre</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>
                <!-- Examples -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


@endsection

<!-- BEGIN: Footer-->


@section('footer')
    @include('layouts.footer')
@endsection
<!-- END: Footer-->
