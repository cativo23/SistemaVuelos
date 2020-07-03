@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Editar Aerolinea</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">"{{ $airline->official_name }}"</h2>
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
                        <h3 class="block-title">Información Aerolinea</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="fa fa-plane"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">

                        <form action="{{ route('airlines.update', $airline->id)}}" method="post">
                            @method('PUT')
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-4">
                                @error('codigo') <div class="form-group is-invalid"> @enderror
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="codigo2" name="codigo2"
                                               @foreach ($errors->all() as $error)
                                                    value="{{ old('codigo') }}"
                                               @endforeach
                                               value="{{ $airline->code }}" disabled>
                                        <input style="display: none" type="text" class="form-control" id="codigo" name="codigo"
                                               value="{{ $airline->id }}">
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
                                                   @error('codigo') value="{{ old('nombrecorto') }}" @enderror
                                                   @error('nombrecorto') value="{{ old('nombrecorto') }}" @enderror
                                                   @error('nombreoficial') value="{{ old('nombrecorto') }}" @enderror
                                                   @error('paisorigenñ') value="{{ old('nombrecorto') }}" @enderror
                                                   @error('email') value="{{ old('nombrecorto') }}" @enderror
                                                   @error('representante') value="{{ old('nombrecorto') }}" @enderror
                                                   @error('paginaweb') value="{{ old('nombrecorto') }}" @enderror
                                                   @error('facebook') value="{{ old('nombrecorto') }}" @enderror
                                                   @error('instagram') value="{{ old('nombrecorto') }}" @enderror
                                                   @error('twitter') value="{{ old('nombrecorto') }}" @enderror
                                                   @error('whatsapp') value="{{ old('nombrecorto') }}" @enderror
                                                   value="{{ $airline->short_name }}">
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
                                                   @error('codigo') value="{{ old('nombreoficial') }}" @enderror
                                                   @error('nombrecorto') value="{{ old('nombreoficial') }}" @enderror
                                                   @error('nombreoficial') value="{{ old('nombreoficial') }}" @enderror
                                                   @error('paisorigenñ') value="{{ old('nombreoficial') }}" @enderror
                                                   @error('email') value="{{ old('nombreoficial') }}" @enderror
                                                   @error('representante') value="{{ old('nombreoficial') }}" @enderror
                                                   @error('paginaweb') value="{{ old('nombreoficial') }}" @enderror
                                                   @error('facebook') value="{{ old('nombreoficial') }}" @enderror
                                                   @error('instagram') value="{{ old('nombreoficial') }}" @enderror
                                                   @error('twitter') value="{{ old('nombreoficial') }}" @enderror
                                                   @error('whatsapp') value="{{ old('nombreoficial') }}" @enderror
                                                   value="{{ $airline->official_name }}">
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
                                    @error('nombreoficial') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="paisorigen" name="paisorigen"
                                                   @error('codigo') value="{{ old('paisorigen') }}" @enderror
                                                   @error('nombrecorto') value="{{ old('paisorigen') }}" @enderror
                                                   @error('nombreoficial') value="{{ old('paisorigen') }}" @enderror
                                                   @error('paisorigenñ') value="{{ old('paisorigen') }}" @enderror
                                                   @error('email') value="{{ old('paisorigen') }}" @enderror
                                                   @error('representante') value="{{ old('paisorigen') }}" @enderror
                                                   @error('paginaweb') value="{{ old('paisorigen') }}" @enderror
                                                   @error('facebook') value="{{ old('paisorigen') }}" @enderror
                                                   @error('instagram') value="{{ old('paisorigen') }}" @enderror
                                                   @error('twitter') value="{{ old('paisorigen') }}" @enderror
                                                   @error('whatsapp') value="{{ old('paisorigen') }}" @enderror
                                                   value="{{ $airline->origin_country }}">
                                            <label for="paisorigen">País Origen</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-flag"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('nombreoficial')
                                        <div id="paisorigen-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('nombreoficial') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('email') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="email" name="email"
                                                   @error('codigo') value="{{ old('email') }}" @enderror
                                                   @error('nombrecorto') value="{{ old('email') }}" @enderror
                                                   @error('nombreoficial') value="{{ old('email') }}" @enderror
                                                   @error('paisorigenñ') value="{{ old('email') }}" @enderror
                                                   @error('email') value="{{ old('email') }}" @enderror
                                                   @error('representante') value="{{ old('email') }}" @enderror
                                                   @error('paginaweb') value="{{ old('email') }}" @enderror
                                                   @error('facebook') value="{{ old('email') }}" @enderror
                                                   @error('instagram') value="{{ old('email') }}" @enderror
                                                   @error('twitter') value="{{ old('email') }}" @enderror
                                                   @error('whatsapp') value="{{ old('email') }}" @enderror
                                                   value="{{ $airline->email }}">
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
                                                   @error('codigo') value="{{ old('representante') }}" @enderror
                                                   @error('nombrecorto') value="{{ old('representante') }}" @enderror
                                                   @error('nombreoficial') value="{{ old('representante') }}" @enderror
                                                   @error('paisorigenñ') value="{{ old('representante') }}" @enderror
                                                   @error('email') value="{{ old('representante') }}" @enderror
                                                   @error('representante') value="{{ old('representante') }}" @enderror
                                                   @error('paginaweb') value="{{ old('representante') }}" @enderror
                                                   @error('facebook') value="{{ old('representante') }}" @enderror
                                                   @error('instagram') value="{{ old('representante') }}" @enderror
                                                   @error('twitter') value="{{ old('representante') }}" @enderror
                                                   @error('whatsapp') value="{{ old('representante') }}" @enderror
                                                   value="{{ $airline->representative }}">
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
                                                   @error('codigo') value="{{ old('paginaweb') }}" @enderror
                                                   @error('nombrecorto') value="{{ old('paginaweb') }}" @enderror
                                                   @error('nombreoficial') value="{{ old('paginaweb') }}" @enderror
                                                   @error('paisorigenñ') value="{{ old('paginaweb') }}" @enderror
                                                   @error('email') value="{{ old('paginaweb') }}" @enderror
                                                   @error('representante') value="{{ old('paginaweb') }}" @enderror
                                                   @error('paginaweb') value="{{ old('paginaweb') }}" @enderror
                                                   @error('facebook') value="{{ old('paginaweb') }}" @enderror
                                                   @error('instagram') value="{{ old('paginaweb') }}" @enderror
                                                   @error('twitter') value="{{ old('paginaweb') }}" @enderror
                                                   @error('whatsapp') value="{{ old('paginaweb') }}" @enderror
                                                   value="{{ $airline->web_page }}">
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
                                                   @error('codigo') value="{{ old('facebook') }}" @enderror
                                                   @error('nombrecorto') value="{{ old('facebook') }}" @enderror
                                                   @error('nombreoficial') value="{{ old('facebook') }}" @enderror
                                                   @error('paisorigenñ') value="{{ old('facebook') }}" @enderror
                                                   @error('email') value="{{ old('facebook') }}" @enderror
                                                   @error('representante') value="{{ old('facebook') }}" @enderror
                                                   @error('paginaweb') value="{{ old('facebook') }}" @enderror
                                                   @error('facebook') value="{{ old('facebook') }}" @enderror
                                                   @error('instagram') value="{{ old('facebook') }}" @enderror
                                                   @error('twitter') value="{{ old('facebook') }}" @enderror
                                                   @error('whatsapp') value="{{ old('facebook') }}" @enderror
                                                   value="{{ $airline->facebook }}">
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
                                                   @error('codigo') value="{{ old('instagram') }}" @enderror
                                                   @error('nombrecorto') value="{{ old('instagram') }}" @enderror
                                                   @error('nombreoficial') value="{{ old('instagram') }}" @enderror
                                                   @error('paisorigenñ') value="{{ old('instagram') }}" @enderror
                                                   @error('email') value="{{ old('instagram') }}" @enderror
                                                   @error('representante') value="{{ old('instagram') }}" @enderror
                                                   @error('paginaweb') value="{{ old('instagram') }}" @enderror
                                                   @error('facebook') value="{{ old('instagram') }}" @enderror
                                                   @error('instagram') value="{{ old('instagram') }}" @enderror
                                                   @error('twitter') value="{{ old('instagram') }}" @enderror
                                                   @error('whatsapp') value="{{ old('instagram') }}" @enderror
                                                   value="{{ $airline->instagram }}">
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
                                                   @error('codigo') value="{{ old('twitter') }}" @enderror
                                                   @error('nombrecorto') value="{{ old('twitter') }}" @enderror
                                                   @error('nombreoficial') value="{{ old('twitter') }}" @enderror
                                                   @error('paisorigenñ') value="{{ old('twitter') }}" @enderror
                                                   @error('email') value="{{ old('twitter') }}" @enderror
                                                   @error('representante') value="{{ old('twitter') }}" @enderror
                                                   @error('paginaweb') value="{{ old('twitter') }}" @enderror
                                                   @error('facebook') value="{{ old('twitter') }}" @enderror
                                                   @error('instagram') value="{{ old('twitter') }}" @enderror
                                                   @error('twitter') value="{{ old('twitter') }}" @enderror
                                                   @error('whatsapp') value="{{ old('twitter') }}" @enderror
                                                   value="{{ $airline->twitter }}">
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
                                                   @error('codigo') value="{{ old('whatsapp') }}" @enderror
                                                   @error('nombrecorto') value="{{ old('whatsapp') }}" @enderror
                                                   @error('nombreoficial') value="{{ old('whatsapp') }}" @enderror
                                                   @error('paisorigenñ') value="{{ old('whatsapp') }}" @enderror
                                                   @error('email') value="{{ old('whatsapp') }}" @enderror
                                                   @error('representante') value="{{ old('whatsapp') }}" @enderror
                                                   @error('paginaweb') value="{{ old('whatsapp') }}" @enderror
                                                   @error('facebook') value="{{ old('whatsapp') }}" @enderror
                                                   @error('instagram') value="{{ old('whatsapp') }}" @enderror
                                                   @error('twitter') value="{{ old('whatsapp') }}" @enderror
                                                   @error('whatsapp') value="{{ old('whatsapp') }}" @enderror
                                                   value="{{ $airline->whatsapp }}" data-mask="(000) 0000 0000">
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
