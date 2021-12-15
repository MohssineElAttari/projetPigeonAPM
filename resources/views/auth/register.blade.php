@extends('layouts.app')
{{--
@section('content')
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
</div>
@endsection --}}



@section('content')
    @push('head')
        <!-- Styles -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="{{asset('css/wizard/style.css')}}">
        <!-- Scripts -->

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
        <form id="form-register" method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
            @csrf
            <div id="wizard">
                <!-- SECTION 1 -->
                <div class="step step-1">
                    <h4>Information de <span class="type"></span></h4>
                    <ul class="tablist">
                        <li class="tablist__item tablist__item--colored"></li>
                        <li class="tablist__item"></li>
                    </ul>
                    <section>
                        <input type="hidden" name="type" id="type_reg">
                        <div class="form-row form-group">
                            <div class="form-holder">
                                <label for="logo">
                                    Logo *
                                </label>
                                <input type="file" id="logo" class="form-control @error('logo') is-invalid @enderror"
                                       name="logo" accept=".jpg, .jpeg, .png">
                            </div>
                            @error('logo')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="form-holder">
                                <label for="nom_asso">
                                    Nom de <span class="type"></span> *
                                </label>
                                <input type="text" class="form-control  @error('nom_asso') is-invalid @enderror" id="nom"
                                       name="nom_asso" value="{{ old('nom_asso') }}" required>
                            </div>
                            @error('nom_asso')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <label for="abreviation">
                                Abbreviation
                            </label>
                            <input type="text" class="form-control @error('abreviation') is-invalid @enderror" id="abreviation"
                                   name="abreviation" value="{{ old('abreviation') }}" required>
                        </div>
                        @error('abreviation')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="form-row form-group">
                            <div class="form-holder">
                                <label for="nom-res">
                                    Nom responsable *
                                </label>
                                <input type="text" class="form-control @error('nom-res') is-invalid @enderror"
                                       id='nom-res'
                                       name="nom_res" value="{{ old('nom-res') }}" required>
                            </div>
                            @error('nom-res')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="form-holder">
                                <label for="prenom_res">
                                    prénom responsable *
                                </label>
                                <input type="text" class="form-control @error('prenom_res') is-invalid @enderror"
                                       id='prenom_res'
                                       name="prenom_res" value="{{ old('prenom_res') }}" required>
                            </div>
                            @error('prenom_res')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </section>
                    <div class="justify-end">
                        <button type="button" class="button suivi">suivi</button>
                    </div>
                </div>
                <!-- SECTION 2 -->
                <div class="step step-2 hidden">
                    <h4>informations personnelles</h4>
                    <ul class="tablist">
                        <li class="tablist__item tablist__item--colored"></li>
                        <li class="tablist__item tablist__item--colored"></li>
                    </ul>
                    <section>
                        <div class="form-row">
                            <div class="form-row form-group">
                                <div class="form-holder">
                                    <label for="pays">
                                        Pays *
                                    </label>
                                    <input type="text" id="pays" name="pays"
                                           class="form-control @error('pays') is-invalid @enderror"
                                           value="{{ old('pays') }}" required>
                                </div>
                                @error('pays')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-holder">
                                    <label for="ville">
                                        Ville *
                                    </label>
                                    <input type="text" id="ville" name="ville"
                                           class="form-control @error('ville') is-invalid @enderror"
                                           value="{{ old('ville') }}" required>
                                </div>
                                @error('ville')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <label for="adresse">
                                    Adresse *
                                </label>
                                <input type="text" name="adresse" id="adresse"
                                       class="form-control @error('adresse') is-invalid @enderror"
                                       value="{{ old('adresse') }}" required>
                            </div>
                            @error('adresse')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="form-row form-group">
                                <div class="form-holder">
                                <label for="tel">
                                    Téléphone *
                                </label>
                                <input type="text" name="tel" id="tel"
                                       class="form-control @error('tel') is-invalid @enderror"
                                       value="{{ old('tel') }}" required>
                            </div>
                                @error('tel')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-holder">
                                    <label for="tel">
                                        fix *
                                    </label>
                                    <input type="text" name="fix" id="tel"
                                           class="form-control @error('fix') is-invalid @enderror"
                                           value="{{ old('fix') }}" required>
                                </div>
                                @error('fix')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-row">
                                <label for="email">
                                    Email *
                                </label>
                                <input type="text" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email" value="{{ old('email') }}" required>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="form-row">
                                <label for="pg-fb">
                                    Page facebook *
                                </label>
                                <input type="text" name="page" class="form-control @error('email') is-invalid @enderror"
                                       id="pg-fb" value="{{ old('email') }}" required>
                            </div>
                            @error('page')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="form-row form-group">
                                <div class="form-holder">
                                    <label for="password">
                                        password *
                                    </label>
                                    <input type="password" id="password" name="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           required>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-holder">
                                    <label for="password_confirmation">
                                        confirm password *
                                    </label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           required>
                                </div>
                            </div>
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
