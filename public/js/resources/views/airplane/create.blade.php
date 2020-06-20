@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Agregar Avion</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Ingrese un nuevo avión</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">

    		<div class="col-md-9">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Formulario Avión</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="fa fa-plane"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">

                        <form action="{{ route('airplanes.store') }}" method="post">@csrf
                            <div class="form-group row">
                                <div class="col-md-4">
                                    @error('modelo') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="modelo" name="modelo"
                                                   value="{{ old('modelo') }}">
                                            <label for="modelo">Modelo</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-hashtag"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('modelo')
                                        <div id="nombrecorto-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('modelo') </div> @enderror
                                </div>

                                <div class="col-md-4">
                                    @error('tipo')<div class="form-group is-invalid">@enderror
                                        <div class="form-material floating">
                                            @php ($tipos=['Comercial', 'Carga', 'Militar'])

                                            <select class="form-control" id="tipo" name="tipo">
                                                <option selected="selected" disabled></option>
                                                @foreach($tipos as $tipo)
                                                    <option value="{{ $tipo }}"
                                                            @if ( old('tipo')  == $tipo)
                                                            selected
                                                        @endif
                                                    >{{ $tipo }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="tipo">Tipo</label>
                                        </div>
                                        @error('tipo')<div id="val-skill2-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                    @error('tipo')</div>@enderror
                                </div>



                                <div class="col-md-4">
                                    @error('capacidad') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="capacidad" name="capacidad"
                                                   value="{{ old('capacidad') }}">
                                            <label for="capacidad">Capacidad (Personas)</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-users"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('capacidad')<div id="val-skill2-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                    @error('capacidad')</div>@enderror
                                </div>
                                <div class="col-md-4">
                                    @error('fabricante') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="fabricante" name="fabricante"
                                                   value="{{ old('fabricante') }}">
                                            <label for="fabricante">Fabricante</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-wrench"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('fabricante')<div id="val-skill2-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                    @error('fabricante')</div>@enderror
                                </div>
                                <div class="col-md-4">
                                    @error('aerolinea') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating">
                                            <select class="form-control" id="aerolinea" name="aerolinea">
                                                <option selected="" disabled></option>
                                                @foreach($airlines as $airline)
                                                    <option value="{{ $airline->id }}"
                                                            @if ( old('aerolinea') == $airline->id)
                                                                selected
                                                            @endif
                                                            >{{ $airline->short_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="aerolinea">Aerolínea</label>
                                        </div>
                                        @error('aerolinea')<div id="val-skill2-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                    @error('aerolinea')</div>@enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-md-9">

                                    <button type="submit" class="btn btn-square btn-outline-primary min-width-125 mb-10" data-toggle="click-ripple">Guardar</button>
                                    <a href="{{ route('airplanes.index')}}" type="button" class="btn btn-square btn-outline-danger min-width-125 mb-10">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
