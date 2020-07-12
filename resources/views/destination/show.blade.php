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
                        <h3 class="block-title">Información Destinp</h3>
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
                                    <input type="text" class="form-control" id="codigo" name="codigo"
                                           value="{{ $destination->code }}" disabled>
                                    <label for="codigo">Código</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="nombrecorto" name="nombrecorto"
                                           value="{{ $destination->short_name }}" disabled>
                                    <label for="nombrecorto">Nombre Corto</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-compress" disabled></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="nombreoficial" name="nombreoficial"
                                           value="{{ $destination->official_name }}" disabled>
                                    <label for="nombreoficial">Nombre Oficial</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-steam"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="paisorigen" name="paisorigen"
                                           value="{{ $destination->origin_country }}" disabled="">
                                    <label for="paisorigen">País Origen</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-flag"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="email" name="email"
                                           value="{{ $destination->email }}" disabled="">
                                    <label for="email">Correo Electrónico</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="representante" name="representante"
                                           value="{{ $destination->representative }}" disabled="">
                                    <label for="representante">Representante</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="paginaweb" name="paginaweb"
                                           value="{{ $destination->web_page }}" disabled="">
                                    <label for="paginaweb">Página Web</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-mouse-pointer"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="facebook" name="facebook"
                                           value="{{ $destination->facebook }}" disabled="">
                                    <label for="facebook">Facebook</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-facebook-square"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="instagram" name="instagram"
                                           value="{{ $destination->instagram }}" disabled="">
                                    <label for="instagram">Instagram</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-instagram"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="twitter" name="twitter"
                                           value="{{ $destination->twitter }}" disabled="">
                                    <label for="twitter">Twitter</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-twitter"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                           value="{{ $destination->whatsapp }}" disabled="">
                                    <label for="whatsapp">Whatsapp</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-whatsapp"></i>
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
