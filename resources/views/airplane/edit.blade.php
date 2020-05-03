@extends('layouts.backend')


@section('content')
    <!-- Page Content -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
        	<h2 class="content-heading">Editar Avión "{{ $airplane->model}}"</h2>
	        
    		<div class="col-md-9">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Información Avión</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="fa fa-plane"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">

                        <form action="{{ route('airplanes.update', $airplane->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $airplane->model}}">
                                        <label for="modelo">Modelo</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-hashtag"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $airplane->type}}">
                                        <label for="tipo">Tipo</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-usd"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="capacidad" name="capacidad" value="{{ $airplane->seat_capacity }}">
                                        <label for="capacidad">Capacidad</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-users"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="fabricante" name="fabricante" value="{{ $airplane->manufacturer }}">
                                        <label for="fabricante">Fabricante</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-wrench"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating">
                                        <select class="form-control" id="aerolinea" name="aerolinea">
                                            <option selected disabled></option>
                                            @foreach($airlines as $airline)
                                                <option value="{{ $airline->id }}"

                                                @if ($airplane->airline_id== $airline->id)
                                                    selected
                                                @endif
                                                >{{ $airline->short_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="aerolinea">Aerolínea</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-md-9">
                                
                                    <button type="submit" class="btn btn-square btn-outline-primary min-width-125 mb-10" data-toggle="click-ripple">Guardar</button>
                                    <a href="{{ route('cancelarAvion')}}" type="button" class="btn btn-square btn-outline-danger min-width-125 mb-10">Cancelar</a>
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

        <!-- Page JS Helpers (Select2 plugin) -->
        <script>jQuery(function(){ Codebase.helpers('select2'); });</script>

        <!-- Page JS Code -->
        <script src="{{ asset('/js/pages/be_forms_validation.min.js') }}"></script>
@endsection
