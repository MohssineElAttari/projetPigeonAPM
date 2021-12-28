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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom p-1">
                                <div class="head-label">
                                    <h3 class="mb-0">Gerer les membre</h3>
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

                                            <form class="btn-outline-gradient-dark" action="{{ route('file-export') }}"
                                                method="GET" enctype="multipart/form-data">
                                                @csrf
                                                <button type="submit" class="btn btn-gradient-dark">
                                                    Exporte
                                                </button>
                                            </form>

                                            <!-- Modal -->
                                            <div class="modal fade text-left" id="test" tabindex="-1" role="dialog"
                                                aria-labelledby="myModalLabel33" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel33">Ajouter un
                                                                membre</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="card">

                                                            <div class="card-body">
                                                                <form class="form" method="POST"
                                                                    action="{{ route('membre.store') }}">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="first-name-column">Prénom</label>
                                                                                <input type="text" id="first-name-column"
                                                                                    required class="form-control"
                                                                                    placeholder="Entrer le péenom de membre"
                                                                                    name="prenom_francais" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label for="last-name-column">الإسم
                                                                                    الشخصي</label>
                                                                                <input type="text" id="last-name-column"
                                                                                    required class="form-control"
                                                                                    placeholder="أدخل الإسم الشحصي للعضو"
                                                                                    name="prenom_arabe" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label for="city-column">Nom</label>
                                                                                <input type="text" id="city-column" required
                                                                                    class="form-control"
                                                                                    placeholder="Entrer le nom de membre"
                                                                                    name="nom_francais" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label for="country-floating">الإسم
                                                                                    العائلي</label>
                                                                                <input type="text" id="country-floating"
                                                                                    required class="form-control"
                                                                                    name="nom_arabe"
                                                                                    placeholder="أدخل الإسم العائلي للعضو" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label for="company-column">Longitude
                                                                                </label>
                                                                                <input type="text" id="company-column"
                                                                                    required class="form-control"
                                                                                    name="longitude"
                                                                                    placeholder="Longitude" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label for="company-column">Latitude
                                                                                </label>
                                                                                <input type="text" id="company-column"
                                                                                    required class="form-control"
                                                                                    name="latitude"
                                                                                    placeholder="Latitude" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label for="email-id-column">Email</label>
                                                                                <input type="email" id="email-id-column"
                                                                                    required class="form-control"
                                                                                    name="email" placeholder="Email" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="email-id-column">Télephon</label>
                                                                                <input type="tel" id="email-id-column"
                                                                                    required class="form-control"
                                                                                    name="tel" placeholder="Télephone" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <button type="submit"
                                                                                class="btn btn-primary mr-1">Valider</button>
                                                                            <button type="rest" class="close"
                                                                                data-dismiss="modal"
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
                                            <th>Prenom</th>
                                            <th>Nom</th>
                                            <th>Longitude </th>
                                            <th>Latitude</th>
                                            <th>Eamil</th>
                                            <th>Télephon</th>
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
                                        @foreach ($membres as $membre)

                                            <tr>
                                                <td>{{ $membre->prenom_francais }}</td>
                                                <td>{{ $membre->nom_francais }}</td>
                                                <td>{{ $membre->longitude }}</td>
                                                <td>{{ $membre->latitude }}</td>
                                                <td>{{ $membre->email }}</td>
                                                <td>{{ $membre->tel }}</td>
                                                <td>
                                                    <div class="dt-buttons d-inline-flex">
                                                        <!-- Button trigger modal -->


                                                        <button type="button" class="btn btn-gradient-success"
                                                            data-toggle="modal" data-target="#Form-{{ $membre->id }}"
                                                            href="#">
                                                            <i data-feather="edit-2" class="mr-50"></i>
                                                        </button>

                                                        <form
                                                            action="{{ route('membre.delete', ['id' => $membre->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" onclick="return confirm('Are you sure?')"
                                                                class="btn btn-gradient-danger ml-1"
                                                                href="javascript:void(0);"
                                                                value="{{ $membre->id }} name=" delete">
                                                                <i data-feather="trash" class="mr-50"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal -->

                                            <div class="form-modal-ex">
                                                <form class="form" method="POST"
                                                    action="{{ route('membre.update', ['id' => $membre->id]) }}">
                                                    @csrf
                                                    <div class="modal modal fade text-left" id="Form-{{ $membre->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">update
                                                                        les
                                                                        info de
                                                                        membre</h4>
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
                                                                                        for="first-name-column">Prénom</label>
                                                                                    <input type="text"
                                                                                        id="first-name-column"
                                                                                        value="{{ $membre->prenom_francais }}"
                                                                                        required class="form-control"
                                                                                        placeholder="Entrer le péenom de membre"
                                                                                        name="prenom_francais" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="last-name-column">الإسم
                                                                                        الشخصي</label>
                                                                                    <input type="text" id="last-name-column"
                                                                                        required
                                                                                        value="{{ $membre->prenom_arabe }}"
                                                                                        class="form-control"
                                                                                        placeholder="أدخل الإسم الشحصي للعضو"
                                                                                        name="prenom_arabe" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="city-column">Nom</label>
                                                                                    <input type="text" id="city-column"
                                                                                        required
                                                                                        value="{{ $membre->nom_francais }}"
                                                                                        class="form-control"
                                                                                        placeholder="Entrer le nom de membre"
                                                                                        name="nom_francais" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="country-floating">الإسم
                                                                                        العائلي</label>
                                                                                    <input type="text" id="country-floating"
                                                                                        required
                                                                                        value="{{ $membre->nom_arabe }}"
                                                                                        class="form-control"
                                                                                        name="nom_arabe"
                                                                                        placeholder="أدخل الإسم العائلي للعضو" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="company-column">Longitude
                                                                                    </label>
                                                                                    <input type="text" id="company-column"
                                                                                        required
                                                                                        value="{{ $membre->longitude }}"
                                                                                        class="form-control"
                                                                                        name="longitude"
                                                                                        placeholder="Longitude" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="company-column">Latitude
                                                                                    </label>
                                                                                    <input type="text" id="company-column"
                                                                                        required
                                                                                        value="{{ $membre->latitude }}"
                                                                                        class="form-control"
                                                                                        name="latitude"
                                                                                        placeholder="Latitude" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="email-id-column">Email</label>

                                                                                    <input type="email" id="email-id-column"
                                                                                        required
                                                                                        value="{{ $membre->email }}"
                                                                                        class="form-control" name="email"
                                                                                        placeholder="Email" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-12">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="email-id-column">Télephon</label>
                                                                                    <input type="tel" id="email-id-column"
                                                                                        required
                                                                                        value="{{ $membre->tel }}"
                                                                                        class="form-control" name="tel"
                                                                                        placeholder="Télephone" />
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


