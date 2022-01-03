@extends('layouts/dashboard')
<!-- BEGIN: Navbar-->
@section('navbar')
    @include('layouts.navbar')
@endsection
<!-- END: Navbar-->
@section('content')
    @push('head')
        {{-- <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}

        {{-- <script src="{{asset('vendors/dashboard/js/ui/jquery.sticky.js')}}"></script> --}}
        {{-- <script defer src="{{ asset('vendors/dashboard/js/forms/validation/jquery.validate.min.js') }}"></script> --}}
        {{-- <script defer src="{{ asset('vendors/dashboard/js/forms/validation/jquery.validate.min.js') }}"></script> --}}

        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/dashboard/forms/select/select2.min.css') }}"> --}}
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/plugins/forms/form-validation.css') }}"> --}}
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
                            <h2 class="content-header-title float-left mb-0">Espace concour</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Espace concour
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom p-1">
                                <div class="head-label">
                                    <h3 class="mb-0">Gerer les concour</h3>
                                </div>
                                <div class="dt-action-buttons text-right">
                                    <div class="dt-buttons d-inline-flex">
                                        <div class="form-modal-ex">
                                            <!-- Button trigger modal -->
                                            <div class="btn-outline-gradient-info">
                                                <button type="button" class="btn btn-gradient-info" data-toggle="modal"
                                                    data-target="#test">
                                                    Ajouter
                                                </button>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade text-left" id="test" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel33" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel33">Ajouter un
                                                                concour</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="card">

                                                            <div class="card-body">
                                                                <form class="form" method="POST"
                                                                    action="{{ route('concour.store') }}">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="first-name-column">Designation</label>
                                                                                <input type="text" id="designation-column"
                                                                                    required class="form-control"
                                                                                    placeholder="Entrer designation du concour"
                                                                                    name="designation" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label for="type-column">Type</label>
                                                                                <input type="text" id="type-column" required
                                                                                    class="form-control"
                                                                                    placeholder="entrer le type de concour"
                                                                                    name="type" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label for="etap-floating">Etap du
                                                                                    concour</label>
                                                                                <input type="text" id="etap-floating"
                                                                                    required class="form-control"
                                                                                    name="etap"
                                                                                    placeholder="entrer l'étap du concour" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label for="pourcentage-floating">Pourcentage du
                                                                                    concour</label>
                                                                                <input type="number" id="pourcentage-floating"
                                                                                    required class="form-control"
                                                                                    name="pourcentage"
                                                                                    placeholder="entrer le pourcentage du concour" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label for="heure-column">Heure
                                                                                </label>
                                                                                <input type="time" id="heure-column"
                                                                                    required class="form-control"
                                                                                    name="heure"
                                                                                    placeholder="heure départ concour" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label for="date-column">date
                                                                                </label>
                                                                                <input type="date" id="date-column" required
                                                                                    class="form-control" name="date"
                                                                                    placeholder="entrer la date départ du concour" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="latitude-id-column">Latitude</label>
                                                                                <input type="number" id="latitude-id-column"
                                                                                    required class="form-control"
                                                                                    name="latitude"
                                                                                    placeholder="Latitude" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="email-id-column">Longitude</label>
                                                                                <input type="number"
                                                                                    id="Longitude-id-column" required
                                                                                    class="form-control" name="longitude"
                                                                                    placeholder="Longitude" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <button type="submit"
                                                                                class="btn btn-primary mr-1">Valider</button>
                                                                            <button type="rest" data-dismiss="modal"
                                                                                class="btn btn-outline-secondary">Annuler</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Designation</th>
                                            <th>Type</th>
                                            <th>Etap</th>
                                            <th>Pourcentage</th>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (\Session::has('success'))
                                            <div class="alert alert-success">
                                                <ul>
                                                    <li>{!! \Session::get('success') !!}</li>
                                                </ul>
                                            </div>
                                        @endif
                                        @foreach ($concours as $concour)

                                            <tr>
                                                <td>{{ $concour->designation }}</td>
                                                <td>{{ $concour->type }}</td>
                                                <td>{{ $concour->etap }}</td>
                                                <td>{{ $concour->pourcentage }}</td>
                                                <td>{{ $concour->date }}</td>
                                                <td>{{ $concour->heur }}</td>
                                                <td>{{ $concour->latitude }}</td>
                                                <td>{{ $concour->longitude }}</td>
                                                <td>
                                                    <div class="dt-buttons d-inline-flex">
                                                        <!-- Button trigger modal -->


                                                        <button type="button" class="btn btn-gradient-success"
                                                            data-toggle="modal" data-target="#Form-{{ $concour->id }}"
                                                            href="#">
                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                        </button>

                                                        <form
                                                            action="{{ route('concour.delete', ['id' => $concour->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" onclick="return confirm('Are you sure?')"
                                                                class="btn btn-gradient-danger ml-1"
                                                                href="javascript:void(0);"
                                                                value="{{ $concour->id }} name=" delete">
                                                                <i data-feather="trash" class="mr-50"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal -->

                                            <div class="form-modal-ex">
                                                <form class="form" method="POST"
                                                    action="{{ route('concour.update', ['id' => $concour->id]) }}">
                                                    @csrf
                                                    <div class="modal modal fade text-left" id="Form-{{ $concour->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">update
                                                                        les
                                                                        info de
                                                                        concour</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="designation-column">Designation</label>
                                                                                    <input type="text"
                                                                                        id="designation-column"
                                                                                        value="{{ $concour->designation }}"
                                                                                        required class="form-control"
                                                                                        placeholder="Entrer la designation du concour"
                                                                                        name="designation" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="type-column">type</label>
                                                                                    <input type="text" id="type-column"
                                                                                        required
                                                                                        value="{{ $concour->type }}"
                                                                                        class="form-control"
                                                                                        placeholder="entre le type de concour"
                                                                                        name="type" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="etap-column">Etap</label>
                                                                                    <input type="text" id="etap-column"
                                                                                        required
                                                                                        value="{{ $concour->etap }}"
                                                                                        class="form-control"
                                                                                        placeholder="Entrer l'étap du concour"
                                                                                        name="etap" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="pourcentage-column">pourcentage</label>
                                                                                    <input type="number" id="pourcentage-column"
                                                                                        required
                                                                                        value="{{ $concour->pourcentage }}"
                                                                                        class="form-control"
                                                                                        placeholder="Entrer Pourcentage du concour"
                                                                                        name="pourcentage" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="country-floating">Date
                                                                                        concour</label>
                                                                                    <input type="date" id="date-floating"
                                                                                        required
                                                                                        value="{{ $concour->date }}"
                                                                                        class="form-control" name="date"
                                                                                        placeholder="entrer la date du concour" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="email-id-column">Heure</label>

                                                                                    <input type="time" id="heure-id-column"
                                                                                        required
                                                                                        value="{{ $concour->heure }}"
                                                                                        class="form-control" name="heure"
                                                                                        placeholder="Heure" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="company-column">Longitude
                                                                                    </label>
                                                                                    <input type="number" id="company-column"
                                                                                        required
                                                                                        value="{{ $concour->longitude }}"
                                                                                        class="form-control"
                                                                                        name="longitude"
                                                                                        placeholder="Longitude" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="company-column">Latitude
                                                                                    </label>
                                                                                    <input type="number" id="company-column"
                                                                                        required
                                                                                        value="{{ $concour->latitude }}"
                                                                                        class="form-control"
                                                                                        name="latitude"
                                                                                        placeholder="Latitude" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">

                                                                                <button type="submit"
                                                                                    onclick="return confirm('Are you sure?')"
                                                                                    class="btn btn-primary mr-1">Valider</button>
                                                                                <button type="reset"
                                                                                    class="btn btn-outline-secondary">Annuler</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- End Modal -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table head options end -->

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
