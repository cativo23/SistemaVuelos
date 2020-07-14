@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])

@section('section', 'Crear Usuario')

@section('content')
    <!-- Hero -->
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Usuarios</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Cree un nuevo usuario</h2>
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
                    <form action="{{ route('super.users.store') }}" method="post">@csrf
                        <div class="block block-themed">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Crear Usuario</h3>
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
                                            <input type="text" class="form-control" id="name" value="{{ old('name', isset($user) ? $user->name : '') }}" name="name">
                                            <label for="name">Name</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            </div>
                                            @if($errors->has('name'))
                                                @foreach($errors->get('name') as $error)
                                                    <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 @if($errors->has('email')) is-invalid @endif">
                                        <div class="form-material form-group floating input-group">
                                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email', isset($user) ? $user->email : '') }}">
                                            <label for="email">Email</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-at"></i>
                                            </span>
                                            </div>
                                            @if($errors->has('email'))
                                                @foreach($errors->get('email') as $error)
                                                    <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6 @if($errors->has('username')) is-invalid @endif">
                                        <div class="form-material form-group  floating input-group">
                                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', isset($user) ? $user->username : '') }}">
                                            <label for="username">Username</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-at"></i>
                                            </span>
                                            </div>
                                            @if($errors->has('username'))
                                                @foreach($errors->get('username') as $error)
                                                    <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 @if($errors->has('password')) is-invalid @endif">
                                        <div class="form-material form-group  floating input-group">
                                            <input type="password" class="form-control" id="password" name="password">
                                            <label for="password">Password</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-flag"></i>
                                            </span>
                                            </div>
                                            @if($errors->has('password'))
                                                @foreach($errors->get('password') as $error)
                                                    <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 mt-5">
                                        <div class="form-group row {{ $errors->has('roles') ? 'is-invalid' : '' }}">
                                            <div class="col-lg-8">
                                                <div class="form-material">
                                                    <select data-placeholder="Elija varios..." name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                                                        @foreach($roles as $id => $roles)
                                                            <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="abilities">Roles * </label>
                                                    <span data-toggle="click-ripple" class="btn btn-alt-success btn-sm  select-all">Select All</span>
                                                    <span data-toggle="click-ripple" class="btn btn-alt-danger btn-sm deselect-all">Deselect All</span>
                                                    @if($errors->has('roles'))
                                                        @foreach($errors->get('roles') as $error)
                                                            <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
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
