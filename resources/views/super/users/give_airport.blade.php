@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])

@section('section', 'Permiso Aeropuerto')

@section('content')
    <!-- Hero -->
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Dar Permiso de Aeropuerto</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">{{$user->name}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="bg-body text-body-color-dark">
        <div class="content">
            <!-- Row #1 -->
            <div class="row invisible" data-toggle="appear">
                <div class="col-md-12">
                    <form action="{{ route('super.give_airport', $user->id) }}" method="post">@csrf
                        @method('PUT')
                        <div class="block block-themed">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Dar Permiso de Aeropuerto</h3>
                                <div class="block-options">
                                    <button type="submit" class="btn btn-sm btn-alt-primary">
                                        <i class="fa fa-check"></i> Guardar
                                    </button>
                                    <a href="{{ route('super.users.index')}}" type="reset"
                                       class="btn btn-sm btn-alt-danger">
                                        <i class="fa fa-times"></i> Cancelar
                                    </a>
                                </div>
                            </div>
                            <div class="block-content">

                                <div class="row form-group">
                                    <div class="col-md-12 @if($errors->has('airport_id')) is-invalid @endif">
                                        <div class="form-material floating input-group">
                                            <input id="airport" type="text"
                                                   name="airport_id_fake"
                                                   class="form-control airportapi"
                                                   value="{{ old('airport_id_fake', '') }}">
                                            <label for="airport">Airport</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            </div>
                                            @if($errors->has('airport_id'))
                                                @foreach($errors->get('airport_id') as $error)
                                                    <div
                                                        class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <input hidden style="display: none;" name="airport_id" class="airport_id_real"
                                               value="{{ old('airport_id', '') }}">
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
    <link rel="stylesheet" href="{{asset('js/plugins/jquery-auto-complete/jquery.auto-complete.min.css')}}">
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
    <script src="{{asset('js/plugins/jquery-auto-complete/jquery.auto-complete.min.js')}}"></script>


    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function () {
            Codebase.helpers('select2');
        });</script>

    <!-- Page JS Code -->
    <script src="{{ asset('/js/pages/be_forms_validation.min.js') }}"></script>
    <script>
        $('.airportapi').autoComplete({
            minChars: 1,
            source:
                function (term, response) {
                    var settings = {
                        "url": "/api/airports?term="+term,
                        "method": "GET",
                        "timeout": 0,
                        success: function (res) {
                            response(res);
                        }
                    };
                    $.ajax(settings).done(function (response) {
                    });
                },
            renderItem: function (item, search) {
                return '<div class="autocomplete-suggestion" data-label="'+item.label+'" data-val="'+item.value+'">"'+item.label+'"</div>'
            },
            onSelect: function (event, term, ui) {
                $(".airport_id_real").val(ui[0].getAttribute('data-val'));
                $(".airportapi").val(ui[0].getAttribute('data-label'));
                return false;
            },
        });
    </script>
@endsection
