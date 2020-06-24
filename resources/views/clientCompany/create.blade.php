@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Nuevo Cliente de Empresa</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Cree Un Nuevo Cliente de Empresa</h2>
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
                        <h3 class="block-title">Formulario Cliente de Empresa</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="fa fa-university"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">
                        <form action="{{ route('clientCompanys.store') }}" method="post">@csrf
                            <div class="form-group row">
                                <div class="col-md-4">
                                    @error('n_frecuente') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="n_frecuente2" name="n_frecuente2"
                                                   value="{{ $numero_cliente  }}" disabled>

                                            <label for="codigo">N° Cliente Frecuente</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-hashtag"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('n_frecuente')
                                        <div id="nfrecuente2-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('n_frecuente')  </div> @enderror
                                    <input style="display: none" type="text" class="form-control"
                                           id="n_frecuente" name="n_frecuente" value="{{ $numero_cliente  }}">
                                </div>
                                <div class="col-md-4">
                                    @error('primer_nombre') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="primer_nombre" name="primer_nombre"
                                                   value="{{ old('primer_nombre') }}">
                                            <label for="nombrecorto">Primer Nombre</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('primer_nombre')
                                        <div id="nombrecorto-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('primer_nombre') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('segundo_nombre') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre"
                                                   value="{{ old('segundo_nombre') }}">
                                            <label for="segundo_nombre">Segundo Nombre</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('segundo_nombre')
                                        <div id="nombreoficial-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('segundo_nombre') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('primer_apellido') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido"
                                                   value="{{ old('primer_apellido') }}">
                                            <label for="primer_apellido">Primer Apellido</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('primer_apellido')
                                        <div id="paisorigen-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('primer_apellido') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('segundo_apellido') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido"
                                                   value="{{ old('segundo_apellido') }}">
                                            <label for="segundo_apellido">Segundo Apellido</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('segundo_apellido')
                                        <div id="email-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('segundo_apellido') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('tel_fijo') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="tel_fijo" name="tel_fijo"
                                                   value="{{ old('tel_fijo') }}" data-mask="(000) 0000 0000">
                                            <label for="telfijo">Teléfono Fijo del Cliente</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('tel_fijo')
                                        <div id="twitter-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('tel_fijo') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('tel_movil') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="tel_movil" name="tel_movil"
                                                   value="{{ old('tel_movil') }}" data-mask="(000) 0000 0000">
                                            <label for="tel_movil">Teléfono Móvil del Cliente</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('tel_movil')
                                        <div id="whatsapp-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('tel_movil') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('nombre_contacto') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto"
                                                   value="{{ old('nombre_contacto') }}">
                                            <label for="nombre_contacto">Nombre del Contacto</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('nombre_contacto')
                                        <div id="email-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('nombre_contacto') </div> @enderror
                                </div>

                                <div class="col-md-4">
                                    @error('nombre_empresa') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa"
                                                   value="{{ old('nombre_empresa') }}">
                                            <label for="nombre_empresa">Nombre Empresa</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-university"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('nombre_empresa')
                                        <div id="nombrecorto-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('nombre_empresa') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('nic') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="nic" name="nic"
                                                   value="{{ old('nic') }}" data-mask="00000000-0">
                                            <label for="nic">NIC de Empresa</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('nic')
                                        <div id="facebook-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('nic') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('nit') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="nit" name="nit"

                                                   value="{{ old('nit') }}" data-mask="0000-000000-000-0">
                                            <label for="nit">NIT de Empresa</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('nit')
                                        <div id="facebook-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('nit') </div> @enderror
                                </div>



                            </div>


                            <br>
                            <div class="form-group row">
                                <div class="col-md-9">

                                    <button type="submit" class="btn btn-square btn-outline-primary min-width-125 mb-10" data-toggle="click-ripple">Guardar</button>
                                    <a href="{{ route('clientCompanys.index')}}" type="button" class="btn btn-square btn-outline-danger min-width-125 mb-10">Cancelar</a>
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


    <!-- Page JS Plugins -->
    <script src="{{ asset('/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-validation/additional-methods.js') }}"></script>



    <!-- Page JS Code -->
    <script src="{{ asset('/js/pages/be_forms_validation.min.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>



    <script src="{{ asset('/js/clientCompany/create.js') }}"></script>


    <script src="{{ asset('/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/flatpickr/flatpickr.min.js') }}"></script>

    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function(){ Codebase.helpers('select2','flatpickr','datepicker'); });</script>



@endsection
