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
        <div class="content">
            <!-- Row #1 -->
            <div class="row invisible" data-toggle="appear">
                <div class="col-md-12">
                    <form action="" method="post">@csrf
                        @method('PUT')
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
                                    <div class="col-md-6 @if($errors->has('name')) is-invalid @endif">
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="name" value="" name="name">
                                            <label for="name">Name</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6 @if($errors->has('email')) is-invalid @endif">

                                            <div class="form-material">
                                                <select class="form-control" id="term" name="terminal">
                                                    @foreach($gateways as $gae)
                                                        <option value="{{$gae->id}}">{{$gae->id}}</option>
                                                    @endforeach
                                                </select>
                                                <label for="material-select">Please Select</label>
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
