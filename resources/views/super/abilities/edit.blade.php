@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <!-- Hero -->
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Permissions</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Actualizando permiso {{$ability->title}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="bg-body text-body-color-dark">
        <div class="content">
            <!-- Row #1 -->
            <div class="row invisible" data-toggle="appear">
                <div class="block-content">
                    <form action="{{ route('super.abilities.update', [$ability->id]) }}" method="POST">@csrf @method('PUT')
                        <div class="form-group row ">
                            <div class="col-md-6">
                                <div
                                    class="form-material floating input-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" id="name"
                                           value="{{ old('name', isset($ability) ? $ability->name : '') }}" required
                                           name="name">
                                    <label for="name">Name *</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                    </div>
                                </div>
                                @if($errors->has('name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </em>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div
                                    class="form-material floating input-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" id="title" name="title"
                                           value="{{ old('title', isset($ability) ? $ability->title : '') }}" required>
                                    <label for="title">Title</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-at"></i>
                                            </span>
                                    </div>
                                </div>
                                @if($errors->has('name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </em>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9">
                                <button type="submit"
                                        class="btn btn-square btn-success min-width-125 mb-10"
                                        data-toggle="click-ripple">Guardar
                                </button>
                                <a href="{{ route('super.roles.index')}}" type="button"
                                   class="btn btn-square btn-danger min-width-125 mb-10">Cancelar</a>
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
                let $select2 = $(this).siblings('.select2')
                $select2.find('option').prop('selected', 'selected')
                $select2.trigger('change')
            })
            $('.deselect-all').click(function () {
                let $select2 = $(this).siblings('.select2')
                $select2.find('option').prop('selected', '')
                $select2.trigger('change')
            })

            $('.select2').select2()
        });</script>

    <!-- Page JS Code -->
    <script src="{{ asset('/js/pages/be_forms_validation.min.js') }}"></script>
@endsection
