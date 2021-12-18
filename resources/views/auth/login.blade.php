
 
@extends('layouts.app')



@section('content')
    @push('head')
        <!-- Styles -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="{{asset('css/wizard/style.css')}}">
        <!-- Scripts -->
        {{-- <link href="{{ asset('css/dashboard/bootstrap.min.css') }}" rel="stylesheet"> --}}
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
                                <label for="email">
                                    Email *
                                </label>
                                <input type="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-row">
                                <label for="password">
                                    Password *
                                </label>
                                <input type="password" name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password" value="{{ old('password') }}" required>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="form-group mb-3" style="
                            margin-bottom: 20px;">
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
                            </div>
                            <div class="form-row form-group">
                                <div class="form-holder">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>

                                <div class="form-holder">
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __('Create a New Account') }}
                                    </a>
                                </div>

                            </div>
                    </section>
                    
                    <div class="justify-center">
                        <button type="submit" class="button"> {{ __('Login') }}</button>
                    </div>
                    @if(session()->has('notActive'))
                    <span class="invalid-feedback">
                        <strong>{{ session()->get('notActive') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection