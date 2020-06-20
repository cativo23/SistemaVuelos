@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Nueva Aerolinea</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Cree una nueva aerolinea</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
    		<div class="col-md-11">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Formulario Aerolinea</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="fa fa-plane"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">

                        <form action="{{ route('airlines.store') }}" method="post">@csrf
                            <div class="form-group row">
                                <div class="col-md-4">
                                    @error('codigo') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="codigo2" name="codigo2"
                                                   @error('codigo') value="{{ old('codigo') }}" @enderror
                                                   @error('nombrecorto') value="{{ old('codigo') }}" @enderror
                                                   @error('nomreoficial') value="{{ old('codigo') }}" @enderror
                                                   @error('email') value="{{ old('codigo') }}" @enderror
                                                   @error('representante') value="{{ old('codigo') }}" @enderror
                                                   @error('paginaweb') value="{{ old('codigo') }}" @enderror
                                                   @error('facebook') value="{{ old('codigo') }}" @enderror
                                                   @error('instagram') value="{{ old('codigo') }}" @enderror
                                                   @error('twitter') value="{{ old('codigo') }}" @enderror
                                                   @error('whatsapp') value="{{ old('codigo') }}" @enderror
                                                   value="{{ $idcode }}" disabled>
                                            <input style="display: none" type="text" class="form-control" id="codigo" name="codigo"
                                                   value="{{ $idcode }}">
                                            <label for="codigo">Código</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-hashtag"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('codigo')
                                        <div id="codigo-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('codigo')  </div> @enderror
                                </div>

                                <div class="col-md-4">
                                    @error('nombrecorto') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="nombrecorto" name="nombrecorto"
                                                    value="{{ old('nombrecorto') }}">
                                            <label for="nombrecorto">Nombre Corto</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-compress"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('nombrecorto')
                                        <div id="nombrecorto-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('nombrecorto') </div> @enderror
                                </div>

                                <div class="col-md-4">
                                    @error('nombreoficial') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="nombreoficial" name="nombreoficial"
                                                   value="{{ old('nombreoficial') }}">
                                            <label for="nombreoficial">Nombre Oficial</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-institution"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('nombreoficial')
                                        <div id="nombreoficial-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('nombreoficial') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('paisorigen') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="paisorigen" name="paisorigen"
                                                   value="{{ old('paisorigen') }}">
                                            <label for="paisorigen">País Origen</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-flag"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('paisorigen')
                                        <div id="paisorigen-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('paisorigen') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('email') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="email" name="email"
                                                   value="{{ old('email') }}">
                                            <label for="email">Correo Electrónico</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('email')
                                        <div id="email-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('email') </div> @enderror
                                </div>

                                <div class="col-md-4">
                                    @error('representante') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="representante" name="representante"
                                                   value="{{ old('representante') }}">
                                            <label for="representante">Representante</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('representante')
                                        <div id="representante-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('representante') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('paginaweb') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="paginaweb" name="paginaweb"
                                                   @error('paginaweb') 'http://' value="{{ old('paginaweb') }}" @enderror value="http://">
                                            <label for="paginaweb">Página Web</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-mouse-pointer"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('paginaweb')
                                        <div id="paginaweb-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('paginaweb') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('facebook') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="facebook" name="facebook"
                                                   value="{{ old('facebook') }}">
                                            <label for="facebook">Facebook</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-facebook-square"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('facebook')
                                        <div id="facebook-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('facebook') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('instagram') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="instagram" name="instagram"
                                                   value="{{ old('instagram') }}">
                                            <label for="instagram">Instagram</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-instagram"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('instagram')
                                        <div id="instagram-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('instagram') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('twitter') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="twitter" name="twitter"
                                                   value="{{ old('twitter') }}">
                                            <label for="twitter">Twitter</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-twitter"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('twitter')
                                        <div id="twitter-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('twitter') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('whatsapp') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                            value="{{ old('whatsapp') }}" data-mask="(000) 0000 0000">
                                            <label for="whatsapp">Whatsapp</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-whatsapp"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('whatsapp')
                                        <div id="whatsapp-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('whatsapp') </div> @enderror
                                </div>
                            </div>


                            <br>
                            <div class="form-group row">
                                <div class="col-md-9">

                                    <button type="submit" class="btn btn-square btn-outline-primary min-width-125 mb-10" data-toggle="click-ripple">Guardar</button>
                                    <a href="{{ route('airlines.index')}}" type="button" class="btn btn-square btn-outline-danger min-width-125 mb-10">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
	                        <!-- jQuery Validation functionality is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js -->
	                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->









    	</div>
    </main>
    <!-- END Page Content -->
@endsection

@section('css_before')
@endsection

@section('js_after')
		<script src="{{ asset('/js/codebase.core.min.js') }}"></script>
          <!--
            Codebase JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->

        <script src="{{ asset('/js/codebase.app.min.js') }}"></script>

        <!-- Page JS Plugins -->
        <script src="{{ asset('/js/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('/js/plugins/jquery-validation/additional-methods.js') }}"></script>

        <!-- Page JS Helpers (Select2 plugin) -->
        <script>jQuery(function(){ Codebase.helpers('select2'); });</script>

        <!-- Page JS Code -->
        <script src="{{ asset('/js/pages/be_forms_validation.min.js') }}"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

        <script src="{{ asset('/js/airline/create.js') }}"></script>

@endsection
