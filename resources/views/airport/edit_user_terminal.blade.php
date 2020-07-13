{{--<h1>Hi</h1>--}}
{{--{{$fli}}--}}
@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])

@section('section', 'Editar usuario')

@section('content')
    <!-- Hero -->
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Vuelos</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Seleccione la terminal </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="bg-body text-body-color-dark">
    @if( session('datos'))
        <!-- Info -->
            <div id="notificacion" data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger animated fadeIn"
                 role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto;
                 position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px;
                 animation-iteration-count: 1;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position:
                    absolute; right: 10px; top: 5px; z-index: 1035;">×
                </button>
                <span data-notify="icon" class="fa fa-times"></span>
                <span data-notify="title"></span>
                <span data-notify="message">{{ session('datos') }}</span>
                <a href="#" target="_blank" data-notify="url"></a>
            </div>
            <!-- END Info -->
        @endif
    @if( session('datos2'))
        <!-- Info -->
            <div id="notificacion" data-notify="container" class="col-xs-11 col-sm-4 alert alert-success animated fadeIn"
                 role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto;
                 position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px;
                 animation-iteration-count: 1;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position:
                    absolute; right: 10px; top: 5px; z-index: 1035;">×
                </button>
                <span data-notify="icon" class="fa fa-check"></span>
                <span data-notify="title"></span>
                <span data-notify="message">{{ session('datos2') }}</span>
                <a href="#" target="_blank" data-notify="url"></a>
            </div>
            <!-- END Info -->
        @endif

        <div class="content">
            <!-- Row #1 -->
            <div class="row invisible" data-toggle="appear">
                <div class="col-md-12">
                    <form action="{{ route('airports.update_date_terminal') }}" method="post">@csrf

                        <div class="block block-themed">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Seleccione Terminal y fecha</h3>
                                <div class="block-options">
                                    <button type="submit" class="btn btn-sm btn-alt-primary">
                                        <i class="fa fa-check"></i> Guardar
                                    </button>
                                    <a href="{{ route('super.users.index')}}" type="reset" class="btn btn-sm btn-alt-danger">
                                        <i class="fa fa-times"></i> Cancelar
                                    </a>

                                </div>
                            </div>
                            <div class="block-content">
                                <div class="row form-group">
                                    <div class="col-md-2">
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="flight2" value="{{ $fli->id }}" name="flight2" disabled>
                                            <label for="name">Id Vuelo</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            </div>

                                        </div>
                                        <div class="form-material floating input-group" style="display: none;">
                                            <input type="text" class="form-control" id="flight" value="{{ $fli->id }}" name="flight" >
                                            <label for="name">Id Vuelo</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="name" value="{{ $fli->origin }}" name="name" disabled>
                                            <label for="name">Origen</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="name" value="{{ $fli->destination }}" name="name" disabled>
                                            <label for="name">Destino</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-6 @if($errors->has('name')) is-invalid @endif">
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="hour" value="{{$fli->departure_time}}" name="hour">
                                            <label for="name">Hora</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 @if($errors->has('email')) is-invalid @endif">

                                            <div class="form-material">
                                                <select class="form-control" id="terminal" name="terminal">
                                                    @foreach($gateways as $gae)
                                                        @if($fli->landing_terminal_id == $gae->id)
                                                        <option value="{{$gae->id}}" selected="true">{{$gae->id}}</option>
                                                        @else
                                                            <option value="{{$gae->id}}">{{$gae->id}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <label for="material-select">Seleccione la terminal</label>
                                            </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Row #1 -->

        </div>
    </div>
    <!-- END Page Content -->
@endsection

@section('css_before')
    <link rel="stylesheet" href="{{asset('/js/plugins/select2/css/select2.min.css')}}">
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
    <script src="{{asset('/js/plugins/select2/js/select2.full.min.js')}}"></script>

    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function () {
            Codebase.helpers('select2');

            $('.select-all').click(function () {
                let $select2 = $(this).parent().siblings('.select2')
                $select2.find('option').prop('selected', 'selected')
                $select2.trigger('change')
            })
            $('.deselect-all').click(function () {
                let $select2 = $(this).parent().siblings('.select2')
                $select2.find('option').prop('selected', '')
                $select2.trigger('change')
            })

            $('.select2').select2()
        });</script>

    <!-- Page JS Code -->
    <script src="{{ asset('/js/pages/be_forms_validation.min.js') }}"></script>
@endsection
