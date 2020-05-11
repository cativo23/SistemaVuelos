@extends('auth.main',  ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])

@section('section', 'Login')

@section('content')
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image" style="background-image: url({{asset('/media/photos/photo34@2x.jpg')}});">
            <div class="row mx-0 bg-black-op">
                <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                    <div class="p-30 invisible" data-toggle="appear">
                        <p class="font-size-h3 font-w600 text-white">
                            Get Inspired and Create.
                        </p>
                        <p class="font-italic text-white-op">
                            Copyright &copy; <span class="js-year-copy"></span>
                        </p>
                    </div>
                </div>
                <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                    <div class="content content-full">
                        <!-- Header -->
                        <div class="px-30 py-10">
                            <a class="link-effect font-w700" href="/">
                                <span class="font-size-xl">Voyarge</span>
                                <img style="height: 15%; width:15%; margin-bottom: 5px" src="{{ asset('media/favicons/voyarge_logo.png') }}" alt="">
                            </a>
                            <h1 class="h3 font-w700 mt-30 mb-10">Welcome to Your Dashboard</h1>
                            <h2 class="h5 font-w400 text-muted mb-0">Please sign in</h2>
                        </div>
                        <!-- END Header -->

                        <!-- Sign In Form -->
                        <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-signin px-30" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        <input type="text" class="form-control {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" id="login" name="login">
                                        <label for="login">{{ __('Username or Email') }}</label>
                                    </div>
                                    @if ($errors->has('username') || $errors->has('email'))
                                        <span class="invalid-feedback">
                                                <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="login-password">
                                        <label for="password">{{ __('Password') }}</label>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                                    <i class="si si-login mr-10"></i> {{ __('Login') }}
                                </button>
                                <div class="mt-30">
                                    <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{route('register')}}">
                                        <i class="fa fa-plus mr-5"></i> Create Account
                                    </a>
                                    @if (Route::has('password.request'))
                                        <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('password.request') }}">
                                            <i class="fa fa-warning mr-5"></i> {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <!-- END Sign In Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
@endsection

@section('js_after')
    <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/pages/op_auth_signin.min.js')}}"></script>
@endsection
