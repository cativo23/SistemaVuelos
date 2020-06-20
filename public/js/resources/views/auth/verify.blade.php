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
                            Please Verify.
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
                            <h1 class="h3 font-w700 mt-30 mb-10">{{ __('Verify Your Email Address') }}</h1>
                            <h2 class="h5 font-w400 text-muted mb-0">{{ __('A fresh verification link has been sent to your email address.') }}</h2>
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                        <!-- END Header -->
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
