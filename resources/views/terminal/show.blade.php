@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Detalles de Terminal</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">"{{ $gateway->code }}"</h2>
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
                        <h3 class="block-title">Información de Terminal</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="fa fa-plane"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="Aeropuerto" name="Aeropuerto"
                                           value="{{ $gateway->airport->name }}" disabled>
                                    <label for="Aeropuerto">Aeropuerto</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-align-justify" disabled></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="Pais" name="Pais"
                                           value="{{ $gateway->airport->country }}" disabled>
                                    <label for="Pais">Pais</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-flag" disabled></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="Ciudad" name="Ciudad"
                                           value="{{ $gateway->airport->city }}" disabled>
                                    <label for="Ciudad">Ciudad</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-map-marker"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-md-9">

                                <a href="{{ route('gateways.index')}}" type="button"
                                   class="btn btn-square btn-outline-danger min-width-125 mb-10">Atrás</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- END Page Content -->
@endsection
