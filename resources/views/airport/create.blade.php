@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Nuevo Aeropuerto</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Cree Un Nuevo Aeropuerto</h2>
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
                        <h3 class="block-title">Formulario Aeropuerto</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">

                        <form action="{{ route('airports.store') }}" method="post">@csrf
                            <div class="form-group row">

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-5">
                                            @error('codigo')
                                            <div class="form-group is-invalid"> @enderror
                                                <div class="form-material floating input-group">
                                                    <input type="text" class="form-control" id="codigo" name="codigo"
                                                           @foreach ($errors->all() as $error)
                                                           value="{{ old('codigo') }}"
                                                        @endforeach>
                                                    <label for="codigo">Código</label>
                                                    <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-hashtag"></i>
                                                    </span>
                                                    </div>
                                                </div>
                                                @error('codigo')
                                                <div id="modelo-error"
                                                     class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                                @enderror
                                                @error('codigo') </div> @enderror
                                        </div>
                                        <div class="col-md-7">
                                            @error('nombre')
                                            <div class="form-group is-invalid input-group"> @enderror
                                                <div class="form-material floating input-group">
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                           @foreach ($errors->all() as $error)
                                                           value="{{ old('nombre') }}"
                                                        @endforeach>
                                                    <label for="nombre">Nombre</label>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('nombre')
                                                <div id="nombre-error"
                                                     class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                                @error('nombre')</div>@enderror
                                        </div>
                                        <div class="col-md-6">
                                            @error('representante')
                                            <div class="form-group is-invalid input-group"> @enderror
                                                <div class="form-material floating input-group">
                                                    <input type="text" class="form-control" id="representante"
                                                           name="representante"
                                                           @foreach ($errors->all() as $error)
                                                           value="{{ old('representante') }}"
                                                        @endforeach>
                                                    <label for="representante">Representante</label>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('representante')
                                                <div id="representante-error"
                                                     class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                                @error('representante')</div>@enderror
                                        </div>
                                        <div class="col-md-6">
                                            @error('telefono')
                                            <div class="form-group is-invalid input-group"> @enderror
                                                <div class="form-material floating input-group">
                                                    <input type="text" class="form-control" id="telefono"
                                                           name="telefono"
                                                           @foreach ($errors->all() as $error)
                                                           value="{{ old('telefono') }}"
                                                           @endforeach
                                                           data-mask="(000) 0000 0000">
                                                    <label for="telefono">Teléfono</label>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-phone"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('telefono')
                                                <div id="representante-error"
                                                     class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                                @error('telefono')</div>@enderror
                                        </div>
                                        <div class="col-md-6">
                                            @error('pais')
                                            <div class="form-group is-invalid input-group"> @enderror
                                                <div class="form-material floating input-group">
                                                    <input type="text" class="form-control" id="pais" name="pais"
                                                           @foreach ($errors->all() as $error)
                                                           value="{{ old('pais') }}"
                                                        @endforeach>
                                                    <label for="pais">País</label>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-flag"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('pais')
                                                <div id="pais-error"
                                                     class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                                @error('pais')</div>@enderror
                                        </div>
                                        <div class="col-md-6">
                                            @error('ciudad')
                                            <div class="form-group is-invalid input-group"> @enderror
                                                <div class="form-material floating input-group">
                                                    <input type="text" class="form-control" id="ciudad" name="ciudad"
                                                           @foreach ($errors->all() as $error)
                                                           value="{{ old('ciudad') }}"
                                                        @endforeach>
                                                    <label for="ciudad">Cuidad</label>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-map-marker"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('ciudad')
                                                <div id="fabricante-error"
                                                     class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                                @error('ciudad')</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row  col-md-16 justify-content-center  text-center">
                                        <div class="col-md-12">
                                            <div class="d-flex align-items-center">
                                                <button type="button" id="boton_terminales_menos"
                                                        class="btn btn-sm btn-circle btn-outline-secondary mr-5 mb-5"
                                                        @error('terminales') style="margin-top: 0px;"
                                                        @enderror  style="margin-top: 40px;">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                @error('terminales')
                                                <div class="form-group input-group is-invalid"> @enderror
                                                    <div class="form-material input-group">
                                                        <input type="text" class="form-control" id="terminales"
                                                               name="terminales"
                                                               @if(old('terminales'))
                                                               value="{{ old('terminales') }}"
                                                               @else
                                                               value="1"
                                                            @endif>
                                                        <label for="terminales">Cantidad de Terminales</label>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-sitemap"></i>
                                                            </span>
                                                        </div>

                                                    </div>
                                                    @error('terminales')
                                                    <div id="fabricante-error"
                                                         class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                                    @error('terminales')</div>@enderror
                                                <button type="button" id="boton_terminales_mas"
                                                        class="btn btn-sm btn-circle btn-outline-secondary mr-5 mb-5"
                                                        @error('terminales') style="margin-top: 0px;"
                                                        @enderror  style="margin-top: 40px;">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-md-12">

                                    <button type="submit" class="btn btn-square btn-outline-primary min-width-125 mb-10"
                                            data-toggle="click-ripple">Guardar
                                    </button>
                                    <a href="{{ url('/airports') }}" type="button"
                                       class="btn btn-square btn-outline-danger min-width-125 mb-10">Cancelar</a>
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


@section('js_after')
    <script src="{{ asset('/js/codebase.core.min.js') }}"></script>
    <!--
      Codebase JS

      Custom functionality including Blocks/Layout API as well as other vital and optional helpers
      webpack is putting everything together at assets/_es6/main/app.js
  -->


    <!-- Page JS Plugins -->
    <script src="{{ asset('/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-validation/additional-methods.js') }}"></script>



    <!-- Page JS Code -->
    <script src="{{ asset('/js/pages/be_forms_validation.min.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>



    <script src="{{ asset('/js/airport/create.js') }}"></script>


    <script src="{{ asset('/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/flatpickr/flatpickr.min.js') }}"></script>

    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function () {
            Codebase.helpers('select2', 'flatpickr', 'datepicker');
        });</script>



@endsection
