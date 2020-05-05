@extends('layouts.backend')


@section('content')
    <!-- Page Content -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
        	<!--
	        <div class="my-50 text-center">
	            <h2 class="font-w700 text-black mb-10">Nuevo Destino</h2>
	            <h3 class="h5 text-muted mb-0">Plugin Integration</h3>
	        </div>
			-->
	        <!-- Info -->
	       	<!--
	        <div class="row justify-content-center">
	            <div class="col-md-6">
	                <div class="block">
	                    <div class="block-content">
	                        <p class="text-muted">
	                            This page showcases how easily you can add a plugin’s JS/CSS assets and init it using custom JS code.
	                        </p>
	                    </div>
	                </div>
	            </div>
	        </div>
	    	-->
	        <!-- END Info -->


	    	<h2 class="content-heading">Nuevo Destino</h2>
	        
    		<div class="col-md-10">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Formulario Nuevo Destino</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="fa fa-map-o"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">

                        <form action="{{ route('destinations.store') }}" method="post">@csrf
                            <div class="form-group row">
                                                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="codigo" name="codigo">
                                        <label for="codigo">Código de Destino</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-hashtag"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="ciudad" name="ciudad">
                                        <label for="ciudad">Ciudad</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-location-arrow"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="estado" name="estado">
                                        <label for="estado">Estado</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-map-signs"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="pais" name="pais">
                                        <label for="pais">País</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-flag"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating">
                                        <select class="form-control" id="continente" name="continente">
                                            <option selected="selected" disabled></option>
                                            <option value="Asia">Asia</option>
                                            <option value="América">América</option>
                                            <option value="África">África</option>
                                            <option value="Antártida">Antártida</option>
                                            <option value="Europa">Europa</option>
                                            <option value="Oceanía">Oceanía</option>
                                        </select>
                                        <label for="continente">Continente</label>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-md-9">

                                    <button type="submit" class="btn btn-square btn-outline-primary min-width-125 mb-10" data-toggle="click-ripple">Guardar</button>
                                    <a href="{{ route('destinations.index')}}" type="button" class="btn btn-square btn-outline-danger min-width-125 mb-10">Cancelar</a>
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
