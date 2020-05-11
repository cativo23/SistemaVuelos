@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])

@section('section', 'Editar usuario')

@section('content')
    <!-- Hero -->
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Usuarios</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Edite el usuario {{$user->name}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="bg-primary-darker text-body-color-light">
        <div class="content">
            <!-- Row #1 -->
            <div class="row invisible" data-toggle="appear">
                <div class="block-content">
                    <form action="{{ route('super.users.update', $user) }}" method="post">@csrf  @method('PUT')
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="name" value="{{ old('name', isset($user) ? $user->name : '') }}" name="name">
                                    <label for="name">Name</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="email" value="{{ old('email', isset($user) ? $user->email : '') }}" name="email">
                                    <label for="email">Email</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-at"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="username" value="{{ old('username', isset($user) ? $user->username : '') }}" name="username">
                                    <label for="username">Username</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-at"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="password" name="password">
                                    <label for="password">Password</label>
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-flag"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row {{ $errors->has('roles') ? 'has-error' : '' }}">
                                    <label for="roles" class="col-12">Roles *
                                        <span class="btn btn-info btn-xs select-all">Select All</span>
                                        <span class="btn btn-info btn-xs deselect-all">Deselect All</span></label>
                                    <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                                        @foreach($roles as $id => $roles)
                                            <option value="{{ $id }}" {{ in_array($id, old('roles', [])) || $user->roles()->pluck('name', 'name')->contains($roles) ? 'selected' : '' }}>{{ $roles }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('roles'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('roles') }}
                                        </em>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9">

                                <button type="submit"
                                        class="btn btn-square btn-outline-primary min-width-125 mb-10"
                                        data-toggle="click-ripple">Guardar
                                </button>
                                <a href="{{ route('destinations.index')}}" type="button"
                                   class="btn btn-square btn-outline-danger min-width-125 mb-10">Cancelar</a>
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
