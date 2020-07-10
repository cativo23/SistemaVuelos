@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Detalles de Cliente Natural</h1>
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
                        <h3 class="block-title">Información de Cliente Natural</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="fa fa-user"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">
                        <form action="" method="post">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="nfrecuente2" name="nfrecuente2"
                                               value="{{ $cliente->client->frequent_customer_num }}" disabled>
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
                                        <input type="text" class="form-control" id="primernombre" name="primernombre"
                                               value="{{ $cliente->client->first_name }} {{ $cliente->client->second_name }} {{ $cliente->client->first_surname }} {{ $cliente->client->second_surname }}"
                                        disabled>
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
                                        <input ttype="text" class="form-control"  data-allow-input="true" id="cumple" name="cumple"
                                               value="{{ $cliente->birthday }}" data-mask="0000-00-00" disabled>
                                        <label for="cumple">Cumpleaños</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-birthday-cake"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="genero" name="genero"
                                               value="{{ $cliente->gender }}" disabled>
                                        <label for="genero">Género</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-venus-mars"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="estado_civil" name="estado_civil"
                                               value="{{ $cliente->marital_status }}" disabled>
                                        <label for="estado_civil">Estado Civil</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-heart"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="tipo_documento" name="tipo_documento"
                                               value="Pasaporte" disabled>
                                        <label for="tipo_documento">Tipo de Documento</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-id-card"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="tipo_documento" name="tipo_documento"
                                               value="{{ $cliente->document_num }}" disabled>
                                        <label for="tipo_documento">N° Documento</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-id-card"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="telfijo" name="telfijo"
                                               value="{{ $cliente->client->landline_phone }}" disabled
                                               data-mask="(000) 0000 0000">
                                        <label for="telfijo">Teléfono fijo</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="telmovil" name="telmovil"
                                               value="{{ $cliente->client->mobile_phone }}" disabled
                                               data-mask="(000) 0000 0000">
                                        <label for="whatsapp">Teléfono Móvil</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-mobile-phone"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="direccion" name="direccion"
                                               value="{{ $cliente->direction }}" disabled>
                                        <label for="direccion">Dirección</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-map"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>


                            </div>


                            <br>
                            <div class="form-group row">
                                <div class="col-md-9">
                                    <a href="{{ route('clientNaturals.index')}}" type="button" class="btn btn-square btn-outline-danger min-width-125 mb-10">Atrás</a>
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

