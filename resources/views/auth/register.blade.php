@extends('layouts.app')

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


@section('content')
@push('head')
<!-- Styles -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="{{asset('css/wizard/style.css')}}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
<!-- Scripts -->

<script defer src="{{asset('jquery/jquery.min.js')}}"></script>
<script defer src="{{asset('jquery/jquery.steps.js')}}"></script>
<script defer src="{{asset('js/wizard/main.js')}}"></script>
@endpush
<div class="model">
    <div class="box">
        <button>Association</button>
        <button>Groupment</button>
    </div>
</div>
<div class="wrapper">
    <div class="image-holder">
        <img src="{{asset('images/wizard/background.jpg')}}" alt="">
    </div>
    <form id="form-register"  method="POST" action="{{ route('register') }}">
        @csrf
        <div id="wizard">
            <!-- SECTION 1 -->
            <h4></h4>
            <section>
                <input type="hidden" name="type" id="type_reg">
                <div class="form-row form-group">
                    <div class="form-holder">
                        <label for="logo">
                            Logo *
                        </label>
                        <input type="file" id="logo" name="logo" class="form-control required">
                    </div>
                    <div class="form-holder">
                        <label for="nom">
                            Nom de <span>l’association</span> *
                        </label>
                        <input type="text" class="form-control required" name="nomAssociation" id="nom">
                    </div>
                </div>	
                <div class="form-row">
                    <label for="abbr">
                        Abréviation
                    </label>
                    <input type="text" name="abrevation" class="form-control required" id="abbr">
                </div>	
                <div class="form-row form-group">
                    <div class="form-holder">
                        <label for="nom-res">
                            Nom responsable *
                        </label>
                        <input type="text" class="form-control required" name="nom-res" id='nom-res'>
                    </div>
                    <div class="form-holder">
                        <label for="pre-res">
                            prénom responsable *
                        </label>
                        <input type="text" class="form-control required" name="pre-res"  id='pre-res'>
                    </div>
                </div>	
            </section>
            
            <!-- SECTION 2 -->
            <h4></h4>
            <section>
                <div class="form-row">
                    <div class="form-row form-group">
                        <div class="form-holder">
                            <label for="pays">
                                Pays *
                            </label>
                            <input type="text" id="pays" name="pays" class="form-control required">
                        </div>
                        <div class="form-holder">
                            <label for="ville">
                                Ville *
                            </label>
                            <input type="text" id="ville" name="ville" class="form-control required">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="adresse">
                            Adresse *
                        </label>
                        <input type="text" name="adresse" id="adresse" class="form-control required">
                    </div>	
                    <label for="tel">
                        Téléphone *
                    </label>
                    <input type="text" name="tel" id="tel" class="form-control required">
                </div>
                <div class="form-row">
                    <label for="email">
                        Email *
                    </label>
                    <input type="email" name="email" class="form-control required" id="email">
                </div>
                <div class="form-row">
                    <label for="pg-fb">
                        Page facebook *
                    </label>
                    <input type="text" name="page" class="form-control required" id="pg-fb">
                </div>
                <div class="form-row">
                    <label for="email">
                        Password *
                    </label>
                    <input type="password" name="password" class="form-control required" id="email">
                </div>
            </section>
        </div>
    </form>
</div>
@endsection
