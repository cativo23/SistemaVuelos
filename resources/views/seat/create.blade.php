@extends('layouts.backend')


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Nuevo Asiento</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp"></h2>
                </div>
            </div>
        </div>
    </div>
<!-- Page Content -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <h2 class="content-heading">Nuevo Asiento</h2>

            <div class="col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Formulario Asiento</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="fa fa-money"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">
                        <form  action="{{ route('seats.store')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="codigo" name="codigo" >
                                        <label for="codigo">Código</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-hashtag"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material floating">
                                        <select class="form-control" id="clase" name="clase">
                                            <option selected="selected" disabled></option>
                                            <option value="Economica">Económica</option>
                                            <option value="Ejecutiva">Ejecutiva</option>
                                            <option value="Primera">Primera</option>
                                        </select>
                                        <label for="clase">Clase</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material floating">
                                        <select class="form-control" id="estado" name="estado" >

                                            <option value="D" selected="">Disponible</option>
                                            <option value="O">Ocupado</option>
                                            <option value="R">Reservado</option>

                                        </select>
                                        <label for="estado">Estado</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material floating">
                                        <select class="form-control" id="avion" name="avion" >
                                            @foreach($airplanes as $airplane)
                                                <option value="{{ $airplane->id }}">{{ $airplane->model }}</option>
                                            @endforeach
                                        </select>
                                        <label for="avion">Avión</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-md-9">

                                    <button type="submit" class="btn btn-square btn-outline-primary min-width-125 mb-10" data-toggle="click-ripple">Guardar</button>
                                    <a href="{{ redirect('seats.index')}}" type="button" class="btn btn-square btn-outline-danger min-width-125 mb-10">Cancelar</a>
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
