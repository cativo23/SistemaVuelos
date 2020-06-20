@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Eliminar Avión</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">"{{ $airplane->model }}"</h2>
                </div>
            </div>
        </div>
    </div>
<!-- Page Content -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <h2 class="content-heading">¿Desea eliminar el avión "{{ $airplane->model }}"?</h2>

            <div class="col-md-11">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Información Avión</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="fa fa-plane"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">

                        <form action="{{ route('airplanes.destroy', $airplane->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $airplane->model }}" disabled="">
                                        <label for="modelo">Modelo</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-hashtag"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $airplane->type }}" disabled="">
                                        <label for="tipo">Tipo</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-usd"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="capacidad" name="capacidad" value="{{ $airplane->seat_capacity }}" disabled="">
                                        <label for="capacidad">Capacidad</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-users"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="fabricante" name="fabricante" value="{{ $airplane->manufacturer }}" disabled="">
                                        <label for="fabricante">Fabricante</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-wrench"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="fabricante" name="fabricante" value="{{ $airplane->airline_id }}" disabled="">
                                        <label for="fabricante">Aerolínea</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-plane"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-md-9">

                                    <button type="submit" class="btn btn-square btn-outline-primary min-width-125 mb-10" data-toggle="click-ripple">Eliminar</button>
                                    <a href="{{ route('airplanes.index')}}" type="button" class="btn btn-square btn-outline-danger min-width-125 mb-10">Cancelar</a>
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
