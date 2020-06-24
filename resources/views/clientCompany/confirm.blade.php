@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">¿Desea eliminar a cliente de empresa?</h1>
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
                        <h3 class="block-title">Información de Cliente de Empresa</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="fa fa-university"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">
                        <form action="{{ route('clientCompanys.destroy', $cliente->id) }}" method="post">@csrf
                            @method('DELETE')
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="n_frecuente" name="n_frecuente"
                                               value="{{ $cliente->client->frequent_customer_car_num }}" disabled>
                                        <label for="codigo">N° Cliente Frecuente</label>
                                        <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-hashtag"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="primer_nombre" name="primer_nombre"
                                               value="{{ $cliente->client->first_name }} {{ $cliente->client->second_name }} {{ $cliente->client->first_surname }} {{ $cliente->client->second_surname }}" disabled>
                                        <label for="nombrecorto">Cliente</label>
                                        <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                        </div>
                                    </div>
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
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="tel_fijo" name="tel_fijo"
                                               value="{{ $cliente->client->landline_phone }}" data-mask="(000) 0000 0000" disabled>
                                        <label for="telfijo">Teléfono Fijo del Cliente</label>
                                        <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="tel_movil" name="tel_movil"
                                               value="{{ $cliente->client->mobile_phone }}" data-mask="(000) 0000 0000" disabled>
                                        <label for="tel_movil">Teléfono Móvil del Cliente</label>
                                        <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto"
                                               value="{{ $cliente->contact_name }}" disabled>
                                        <label for="nombre_contacto">Nombre del Contacto</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa"
                                               value="{{ $cliente->company_name }}" disabled>
                                        <label for="nombre_empresa">Nombre de Empresa</label>
                                        <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-university"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="nit" name="nit"
                                               value="{{ $cliente->nit  }}" data-mask="0000-000000-000-0" disabled>
                                        <label for="nit">NIT de Empresa</label>
                                        <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="nic" name="nic"
                                               value="{{ $cliente->nic  }}" data-mask="00000000-0" disabled>
                                        <label for="nic">NIC de Empresa</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-id-card"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>



                            </div>


                            <br>
                            <div class="form-group row">
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-square btn-outline-primary min-width-125 mb-10" data-toggle="click-ripple">Eliminar</button>
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

    <script src="{{ asset('/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/flatpickr/flatpickr.min.js') }}"></script>

    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function(){ Codebase.helpers('select2','flatpickr','datepicker'); });</script>



@endsection
