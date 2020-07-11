@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Nueva Aerolínea</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Cree una nueva aerolinea</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <div class="col-md-12">


                <form action="{{ route('airlines.store') }}" method="post">@csrf
                    <div class="block block-themed">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Formulario Nueva Aerolinea</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <button type="submit" class="btn btn-sm btn-alt-primary">
                                        <i class="fa fa-check"></i> Guardar
                                    </button>
                                    <a href="{{ route('airlines.index')}}" type="reset"
                                       class="btn btn-sm btn-alt-danger">
                                        <i class="fa fa-times"></i> Cancelar
                                    </a>
                                </button>
                            </div>
                        </div>

                        <div class="block-content">
                            <div class="form-group row">
                                <div class="col-md-4 @if($errors->has('codigo')) is-invalid @endif">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="codigo" value="{{ old('codigo', isset($airline) ? $airline->codigo : '') }}" name="codigo">
                                        <label for="codigo">Código</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-hashtag"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('codigo'))
                                            @foreach($errors->get('codigo') as $error)
                                                <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="nombrecorto" name="nombrecorto">
                                        <label for="nombrecorto">Nombre Corto</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-compress"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="nombreoficial" name="nombreoficial">
                                        <label for="nombreoficial">Nombre Oficial</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-institution"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="paisorigen" name="paisorigen">
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
                                        <input type="text" class="form-control" id="email" name="email">
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
                                        <input type="text" class="form-control" id="representante" name="representante">
                                        <label for="representante">Representante</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" class="form-control" id="twitter" name="twitter">
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
                                        <input type="text" class="form-control" id="facebook" name="facebook">
                                        <label for="facebook">Facebook</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-facebook-square"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="text" class="form-control" id="instagram" name="instagram">
                                        <label for="instagram">Instagram</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-instagram"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">http://wwww.</span>
                                        </div>
                                        <input type="text" class="form-control" id="paginaweb" name="paginaweb">
                                        <label for="paginaweb">Página Web</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-mouse-pointer"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="whatsapp" name="whatsapp">
                                        <label for="whatsapp">Whatsapp</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-whatsapp"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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

    <script src="{{ asset('/js/codebase.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-validation/additional-methods.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="{{ asset('/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js') }}"></script>

    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function () {
            Codebase.helpers('select2');
        });</script>
    <script>
        $("#codigo").mask('ZZ', {
            translation:{
                'Z':{
                    pattern: /[A-Z0-9]/
                }
            }
        });
        $('#whatsapp').mask('+(000) 0000 0000');
    </script>

@endsection
