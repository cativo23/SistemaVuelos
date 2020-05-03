@extends('layouts.backend')


@section('content')
<!-- Page Content -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <h2 class="content-heading">Detalles de aerolinea "{{ $airline->short_name }}"</h2>
            
            <div class="col-md-11">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Información Aerolinea</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="fa fa-plane"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">

                        <form action="{{ route('airlines.destroy',  $airline->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $airline->code }}" disabled>
                                        <label for="codigo">Código</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="nombrecorto" name="nombrecorto" value="{{ $airline->short_name }}" disabled>
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
                                        <input type="text" class="form-control" id="nombreoficial" name="nombreoficial" value="{{ $airline->official_name }}" disabled>
                                        <label for="nombreoficial">Nombre Oficial</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-institution"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="paisorigen" name="paisorigen" value="{{ $airline->origin_country }}" disabled="">
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
                                        <input type="text" class="form-control" id="email" name="email" value="{{ $airline->email }}" disabled="">
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
                                        <input type="text" class="form-control" id="representante" name="representante" value="{{ $airline->representative }}" disabled="">
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
                                        <input type="text" class="form-control" id="paginaweb" name="paginaweb" value="{{ $airline->web_page }}" disabled="">
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
                                        <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $airline->facebook }}" disabled="">
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
                                        <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $airline->instagram }}" disabled="">
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
                                        <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $airline->twitter }}" disabled="">
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
                                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ $airline->whatsapp }}" disabled="">
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

                                    <a href="{{ route('cancelarAerolinea')}}" type="button" class="btn btn-square btn-outline-danger min-width-125 mb-10">Atrás</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- END Page Content -->
@endsection