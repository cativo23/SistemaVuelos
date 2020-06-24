@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Editar Cliente de Empresa</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">"{{ $cliente->client->first_name }} {{ $cliente->client->second_name }} {{ $cliente->client->first_surname }} {{ $cliente->client->second_surname }}"</h2>
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
                        <form action="{{ route('clientCompanys.update', $cliente->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="n_frecuente" name="n_frecuente"
                                               value="{{ $cliente->client->frequent_customer_num }}" disabled>
                                        <label for="codigo">N° Cliente Frecuente</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-hashtag"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @error('primer_nombre') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="primer_nombre" name="primer_nombre"
                                                   @foreach ($errors->all() as $error)
                                                        value="{{ old('primer_nombre') }}"
                                                   @endforeach
                                                   value="{{ $cliente->client->first_name }}">
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
                                                   @foreach ($errors->all() as $error)
                                                        value="{{ old('segundo_nombre') }}"
                                                   @endforeach
                                                   value="{{ $cliente->client->second_name }}">
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
                                                   @foreach ($errors->all() as $error)
                                                        value="{{ old('primer_apellido') }}"
                                                   @endforeach
                                                   value="{{ $cliente->client->first_surname }}">
                                            <label for="primer_apellido">Primer Apellido</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('primer_apellido')
                                        <div id="primer_apellido-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('primer_apellido') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('segundo_apellido') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido"
                                                   @foreach ($errors->all() as $error)
                                                        value="{{ old('segundo_apellido') }}"
                                                   @endforeach
                                                   value="{{ $cliente->client->second_surname }}">
                                            <label for="segundo_apellido">Segundo Apellido</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('segundo_apellido')
                                        <div id="segundo_apellido-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('segundo_apellido') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="millas" name="millas"
                                               value="{{ $cliente->client->miles }}" disabled>
                                        <label for="millas">Millas</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @error('tel_fijo') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="tel_fijo" name="tel_fijo"
                                                   @foreach ($errors->all() as $error)
                                                        value="{{ old('tel_fijo') }}"
                                                   @endforeach
                                                   value="{{ $cliente->client->landline_phone }}" data-mask="(000) 0000 0000">
                                            <label for="telfijo">Teléfono Fijo del Cliente</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('tel_fijo')
                                        <div id="tel_fijo-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('tel_fijo') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('tel_movil') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="tel_movil" name="tel_movil"
                                                   @foreach ($errors->all() as $error)
                                                        value="{{ old('tel_movil') }}"
                                                   @endforeach
                                                   value="{{ $cliente->client->mobile_phone }}" data-mask="(000) 0000 0000">
                                            <label for="tel_movil">Teléfono Móvil del Cliente</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('tel_movil')
                                        <div id="tel_movil-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('tel_movil') </div> @enderror
                                </div>


                                <div class="col-md-4">
                                    @error('nombre_contacto') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto"
                                            @foreach ($errors->all() as $error)
                                                value="{{ old('nombre_contacto') }}"
                                            @endforeach
                                                  value="{{ $cliente->contact_name }}">
                                            <label for="nombre_contacto">Nombre del Contacto</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('nombre_contacto')
                                        <div id="nombre_contacto-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('nombre_contacto') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('nombre_empresa') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa"
                                                   @foreach ($errors->all() as $error)
                                                        value="{{ old('nombre_empresa') }}"
                                                   @endforeach
                                                   value="{{ $cliente->company_name }}">
                                            <label for="nombre_empresa">Nombre de Empresa</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-university"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('nombre_empresa')
                                        <div id="nombre_empresa-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('nombre_empresa') </div> @enderror
                                </div>

                                <div class="col-md-4">
                                    @error('nic') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="nic" name="nic"
                                                   @foreach ($errors->all() as $error)
                                                        value="{{ old('nic') }}"
                                                   @endforeach
                                                   value="{{ $cliente->nic }}"
                                                   data-mask="00000000-0">
                                            <label for="nic">NIC de Empresa</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('nic')
                                        <div id="nic-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('nic') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('nit') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="nit" name="nit"
                                                   @foreach ($errors->all() as $error)
                                                        value="{{ old('nit') }}"
                                                   @endforeach
                                                    value="{{ $cliente->nit }}"
                                                   data-mask="0000-000000-000-0">
                                            <label for="nit">NIT de Empresa</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('nit')
                                        <div id="nit-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
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



    <script src="{{ asset('/js/clientNatural/create.js') }}"></script>


    <script src="{{ asset('/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/flatpickr/flatpickr.min.js') }}"></script>

    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function(){ Codebase.helpers('select2','flatpickr','datepicker'); });</script>



@endsection
