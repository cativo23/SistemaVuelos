@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">¿Desea eliminar el aeropuerto?</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">"{{$airport->name}}"</h2>
                </div>
            </div>
        </div>
    </div>

    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <div class="col-md-11">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Formulario Aeropuerto</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">

                        <form action="{{ route('airports.destroy', $airport->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <div class="form-group row">

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-5">
                                                <div class="form-material floating input-group">
                                                    <input type="text" class="form-control" id="codigo" name="codigo"
                                                           value="{{$airport->code}}" disabled>
                                                    <label for="codigo">Código</label>
                                                    <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-hashtag"></i>
                                                    </span>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-7">
                                            @error('nombre') <div class="form-group is-invalid input-group"> @enderror
                                                <div class="form-material floating input-group">
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                           value="{{$airport->name}}" disabled>
                                                    <label for="nombre">Nombre</label>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-align-justify"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('nombre')<div id="nombre-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                                @error('nombre')</div>@enderror
                                        </div>
                                        <div class="col-md-6">
                                            @error('representante') <div class="form-group is-invalid input-group"> @enderror
                                                <div class="form-material floating input-group">
                                                    <input type="text" class="form-control" id="representante" name="representante"
                                                           value="{{$airport->representative}}" disabled>
                                                    <label for="representante">Representante</label>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('representante')<div id="representante-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                                @error('representante')</div>@enderror
                                        </div>
                                        <div class="col-md-6">
                                            @error('telefono') <div class="form-group is-invalid input-group"> @enderror
                                                <div class="form-material floating input-group">
                                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                                           value="{{$airport->telephone}}" disabled data-mask="(000) 0000 0000">
                                                    <label for="telefono">Teléfono</label>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-phone"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('telefono')<div id="representante-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                                @error('telefono')</div>@enderror
                                        </div>
                                        <div class="col-md-6">
                                            @error('pais') <div class="form-group is-invalid input-group"> @enderror
                                                <div class="form-material floating input-group">
                                                    <input type="text" class="form-control" id="pais" name="pais"
                                                           value="{{$airport->country}}" disabled>
                                                    <label for="pais">País</label>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-flag"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('pais')<div id="pais-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                                @error('pais')</div>@enderror
                                        </div>
                                        <div class="col-md-6">
                                            @error('ciudad') <div class="form-group is-invalid input-group"> @enderror
                                                <div class="form-material floating input-group">
                                                    <input type="text" class="form-control" id="ciudad" name="ciudad"
                                                           value="{{$airport->city}}" disabled>
                                                    <label for="ciudad">Cuidad</label>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-map-marker"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('ciudad')<div id="ciudad-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                                @error('ciudad')</div>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row  col-md-16 justify-content-center  text-center">
                                        <div class="col-md-9">
                                            <div class="d-flex align-items-center">

                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="codigo" name="codigo"
                                                                   value="{{$airport->num_gateways}}" disabled>
                                                            <label for="codigo">Terminales</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-sitemap"></i>
                                                                </span>
                                                            </div>
                                                        </div>


                                        </div>






                                    </div>
                                </div>

                            </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-md-12">

                                    <button type="submit" class="btn btn-square btn-outline-danger min-width-125 mb-10" data-toggle="click-ripple">Eliminar</button>
                                    <a href="{{ url('/airports') }}" type="button" class="btn btn-square btn-outline-primary min-width-125 mb-10">Cancelar</a>
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
