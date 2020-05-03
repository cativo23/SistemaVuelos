@extends('layouts.backend')

@section('content')
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <!--
            <div class="my-50 text-center">
                <h2 class="font-w700 text-black mb-10">Nuevo Destino</h2>
                <h3 class="h5 text-muted mb-0">Plugin Integration</h3>
            </div>
            -->
            <!-- Info -->
            <!--
         <div class="row justify-content-center">
             <div class="col-md-6">
                 <div class="block">
                     <div class="block-content">
                         <p class="text-muted">
                             This page showcases how easily you can add a plugin’s JS/CSS assets and init it using custom JS code.
                         </p>
                     </div>
                 </div>
             </div>
         </div>
         -->
            <!-- END Info -->


            <h2 class="content-heading">¿Desea eliminar el aeropuerto <strong>{{$Airport->name}}</strong>?</h2>

            <div class="col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Formulario Nuevo Aeropuerto</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">

                        <form action="{{ route('airport.update', $Airport->id) }}" method="post">
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
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="pais" name="pais" value="{{$Airport->country}}" >
                                        <label for="codigo">Pais</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-map-marker"></i>
                                            </span>
                                        </div>
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
