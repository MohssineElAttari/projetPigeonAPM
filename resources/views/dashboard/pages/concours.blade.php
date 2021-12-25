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

    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


@endsection

<!-- BEGIN: Footer-->

@section('footer')
    @include('layouts.footer')
@endsection
<!-- END: Footer-->