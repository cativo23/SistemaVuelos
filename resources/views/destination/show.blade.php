@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Detalles de Destino</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">"{{ $destination->code }}"</h2>
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
                        <h3 class="block-title">Información Destino</h3>
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
                                    <input type="text" class="form-control" id="id" name="id"
                                           value="{{ $destination->id }}" disabled>
                                    <label for="id">Id</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="ciudad" name="ciudad"
                                           value="{{ $destination->city }}" disabled>
                                    <label for="ciudad">Ciudad</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-location-arrow" disabled></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="estado" name="estado"
                                           value="{{ $destination->state }}" disabled>
                                    <label for="estado">Estado</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-location-arrow"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="pais" name="pais"
                                           value="{{ $destination->country }}" disabled>
                                    <label for="pais">País</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-flag"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="continente" name="continente"
                                           value="{{ $destination->continent }}" disabled="">
                                    <label for="continente">Continente</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-flag"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="code" name="code"
                                           value="{{ $destination->code }}" disabled="">
                                    <label for="code">Código</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-hashtag"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-md-9">

                                <a href="{{ route('destinations.index')}}" type="button"
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
