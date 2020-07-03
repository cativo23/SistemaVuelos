@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <!-- Hero -->
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Vuelos</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Cree un nuevo vuelo</h2>
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
                    <form action="{{ route('super.roles.store') }}" method="post">
                        @csrf
                        <div class="block block-themed">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Crear Vuelo</h3>
                                <div class="block-options">
                                    <button type="submit" class="btn btn-sm btn-alt-primary">
                                        <i class="fa fa-check"></i> Guardar
                                    </button>
                                    <a href="{{ route('super.roles.index')}}" type="reset"
                                       class="btn btn-sm btn-alt-danger">
                                        <i class="fa fa-times"></i> Cancelar
                                    </a>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-material input-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                            <input type="text" value="{{ old('name', isset($role) ? $role->name : '') }}" class="js-flatpickr form-control" id="arrival_date" name="arrival_date" data-allow-input="true" data-alt-input="true" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y">
                                            <label for="arrival_date">Date Arrival</label>
                                            <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-fw fa-user"></i>
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
                                            <input type="text" class="form-control" id="title" name="tile"
                                                   value="{{ old('title', isset($role) ? $role->title : '') }}"
                                                   required>
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
                                    <div class="col-md-12 mt-5">
                                        <div class="form-group row {{ $errors->has('abilities') ? 'has-error' : '' }}">
                                            <div class="col-lg-8">
                                                <div class="form-material">
                                                    <select data-placeholder="Elija varios..." name="abilities[]"
                                                            id="abilities" class="form-control select2"
                                                            multiple="multiple" required>

                                                    </select>
                                                    <label for="abilities">Permissions * </label>
                                                    <span data-toggle="click-ripple"
                                                          class="btn btn-alt-success btn-sm  select-all">Select All</span>
                                                    <span data-toggle="click-ripple"
                                                          class="btn btn-alt-danger btn-sm deselect-all">Deselect All</span>
                                                    @if($errors->has('roles'))
                                                        <em class="invalid-feedback">
                                                            {{ $errors->first('abilities') }}
                                                        </em>
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
    <link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/jquery-auto-complete/jquery.auto-complete.css')}}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-validation/additional-methodtyript>
    <script src="{{asset('js/plugins/jquery-auto-complete/jquery.auto-complete.min.js')}}"></script>
    <script src="{{asset('js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js')}}"></script>

    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function () {
            Codebase.helpers('select2');
        });</script>

    <!-- Page JS Code -->
    <script src="{{ asset('/js/pages/be_forms_validation.min.js') }}"></script>
    <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins) -->
    <script>jQuery(function(){ Codebase.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2']); });</script>

    <script>
        $(document).ready(function () {
            const fp = document.querySelector("#arrival_date")._flatpickr;
            let today = new Date();
            fp.set('minDate', today);
            fp.setDate(today.setDate(today.getDate()+5));
        });
    </script>
@endsection
