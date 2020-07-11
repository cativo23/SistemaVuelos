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
                                <div class="col-md-4 @if($errors->has('codigo')) is-invalid @endif">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="codigo" value="{{ old('codigo', isset($airline) ? $airline->codigo : '') }}" name="codigo">
                                        <label for="codigo">Código</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-hashtag"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('codigo'))
                                            @foreach($errors->get('codigo') as $error)
                                                <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 @if($errors->has('nombrecorto')) is-invalid @endif"">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="nombrecorto" value="{{ old('nombrecorto', isset($airline) ? $airline->codnombrecortoigo : '') }}" name="nombrecorto">
                                        <label for="nombrecorto">Nombre Corto</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-compress"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('nombrecorto'))
                                            @foreach($errors->get('nombrecorto') as $error)
                                                <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4  @if($errors->has('nombreoficial')) is-invalid @endif">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="nombreoficial" value="{{ old('nombreoficial', isset($airline) ? $airline->nombreoficial : '') }}" name="nombreoficial">
                                        <label for="nombreoficial">Nombre Oficial</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-institution"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('nombreoficial'))
                                            @foreach($errors->get('nombreoficial') as $error)
                                                <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4 @if($errors->has('paisorigen')) is-invalid @endif">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="paisorigen" value="{{ old('paisorigen', isset($airline) ? $airline->paisorigen : '') }}" name="paisorigen">
                                        <label for="paisorigen">País Origen</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-flag"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('paisorigen'))
                                            @foreach($errors->get('paisorigen') as $error)
                                                <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 @if($errors->has('email')) is-invalid @endif">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="email" value="{{ old('email', isset($airline) ? $airline->email : '') }}" name="email">
                                        <label for="email">Correo Electrónico</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('email'))
                                            @foreach($errors->get('email') as $error)
                                                <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 @if($errors->has('representante')) is-invalid @endif">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="representante" value="{{ old('representante', isset($airline) ? $airline->representante : '') }}" name="representante">
                                        <label for="representante">Representante</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('representante'))
                                            @foreach($errors->get('representante') as $error)
                                                <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4 @if($errors->has('twitter')) is-invalid @endif">
                                    <div class="form-material input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" class="form-control" id="twitter" value="{{ old('twitter', isset($airline) ? $airline->twitter : '') }}" name="twitter">
                                        <label for="twitter">Twitter</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-twitter"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('twitter'))
                                            @foreach($errors->get('twitter') as $error)
                                                <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 @if($errors->has('facebook')) is-invalid @endif">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="facebook" value="{{ old('facebook', isset($airline) ? $airline->facebook : '') }}"name="facebook">
                                        <label for="facebook">Facebook</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-facebook-square"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('Facebook'))
                                            @foreach($errors->get('facebook') as $error)
                                                <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 @if($errors->has('instagram')) is-invalid @endif">
                                    <div class="form-material input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" class="form-control" id="instagram" value="{{ old('instagram', isset($airline) ? $airline->instagram : '') }}" name="instagram">
                                        <label for="instagram">Instagram</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-instagram"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('instagram'))
                                            @foreach($errors->get('instagram') as $error)
                                                <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 @if($errors->has('paginaweb')) is-invalid @endif">
                                    <div class="form-material input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">http://wwww.</span>
                                        </div>
                                        <input type="text" class="form-control" id="paginaweb" value="{{ old('paginaweb', isset($airline) ? $airline->paginaweb : '') }}" name="paginaweb">
                                        <label for="paginaweb">Página Web</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-mouse-pointer"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('paginaweb'))
                                            @foreach($errors->get('paginaweb') as $error)
                                                <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 @if($errors->has('whatsapp')) is-invalid @endif">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="whatsapp" value="{{ old('whatsapp', isset($airline) ? $airline->whatsapp : '') }}" name="whatsapp">
                                        <label for="whatsapp">Whatsapp</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-whatsapp"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('whatsapp'))
                                            @foreach($errors->get('whatsapp') as $error)
                                                <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $airline->twitter }}">
                                        <label for="twitter">Twitter</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-twitter"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ $airline->whatsapp }}">
                                        <label for="whatsapp">Whatsapp</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-whatsapp"></i>
                                            </span>
                                        </div>
                                    </div>
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
@endsection
