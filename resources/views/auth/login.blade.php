
 
@extends('layouts.app')



@section('content')
    @push('head')
        <!-- Styles -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="{{asset('css/wizard/style.css')}}">
        <!-- Scripts -->

    @endpush

    <div class="wrapper">
        <div class="image-holder">
            <img src="{{asset('images/wizard/background.jpg')}}" alt="">
        </div>
        <form id="form-register" method="POST" action="{{ route('login') }}"  enctype="multipart/form-data">
            @csrf
            <div id="wizard">
                <!-- SECTION  -->
                <div class="step step-1">
                    <h4 style="padding: 0px 0px 20px 0px; text-align: center">Login</h4>
                    <section>
                        <div class="form-row">


                            <div class="form-row">
                                <label for="email">
                                    Email *
                                </label>
                                <input type="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email" value="{{ old('email') }}" required>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <div class="form-row">
                                <label for="password">
                                    Password *
                                </label>
                                <input type="password" name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password" value="{{ old('password') }}" required>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
   
                            </div>
                    </section>
                    <div class="justify-between">
                        <button type="button" class="button retour">retour</button>
                        <button type="submit" class="button fini">Fini</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection







@section('content')
@push('head')
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('vendors/base/vendor.bundle.base.css')}}">
        <link rel="stylesheet" href="{{asset('css/dashboard/style.css')}}">
        <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
        <!-- Scripts -->
        <script src="{{asset('vendors/base/vendor.bundle.base.js')}}"></script>
        <script src="{{asset('js/off-canvas.js')}}"></script>
        <script src="{{asset('js/hoverable-collapse.js')}}."></script>
        <script src="{{asset('js/template.js')}}"></script>
        @endpush

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  @endsection