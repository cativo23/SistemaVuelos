@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])

@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Editar</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">"{{ $Airport->name }}"</h2>
                </div>
            </div>
        </div>
    </div>
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">

            <h2 class="content-heading">¿Desea editar el aeropuerto <strong>{{$Airport->name}}</strong>?</h2>

            <div class="col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Editar Aeropuerto</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">

                        <form action="{{ route('airport.update',$Airport->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="nombre" name="nombre"  value="{{$Airport->name}}" >
                                        <label for="ciudad">Nombre</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa  fa-align-justify "></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="codigo" name="codigo" value="{{$Airport->code}}" >
                                        <label for="estado">Codigo</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa ffa-barcode"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="representante" name="representante" value="{{$Airport->representative}}" >
                                        <label for="pais">Representante</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="terminales" name="terminales" value="{{$Airport->num_gateways}}" >
                                        <label for="codigo">N. Terminales</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-sitemap"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{$Airport->telephone}}" >
                                        <label for="codigo">Telefono</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{$Airport->city}}" >
                                        <label for="codigo">Ciudad</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-map-marker"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating">

                                        @php ($countryes=['Usa', 'Canada', 'El Salvador', 'Panama', 'Guatemala', 'Honduras'])
                                        <select class="form-control" id="pais" name="pais">
                                        <!--<option selected="selected" value="" >-->
                                            @foreach($countryes as $cont)
                                                <option value="{{ $cont }}"

                                                        @if ($Airport->country== $cont)
                                                        selected
                                                    @endif
                                                >{{ $cont }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <label for="continente">Continente</label>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-md-9">

                                    <button type="submit" class="btn btn-square btn-outline-success min-width-125 mb-10" data-toggle="click-ripple">Actualizar</button>
                                    <a href="{{ url('/airport') }}" type="button" class="btn btn-square btn-outline-primary min-width-125 mb-10">Cancelar</a>
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
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>

@section('js_after')

    <script src="{{ asset('/js/codebase.core.min.js') }}"></script>
    <!--
      Codebase JS

      Custom functionality including Blocks/Layout API as well as other vital and optional helpers
      webpack is putting everything together at assets/_es6/main/app.js
  -->

    <script src="{{ asset('/js/codebase.app.min.js') }}"></script>

@endsection

