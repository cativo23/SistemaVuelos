@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')

    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Editar</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">"{{ $destino->city }}"</h2>
                </div>
            </div>
        </div>
    </div>


    <main id="main-container">
    <!-- Page Content -->
    <div class="content">
		<div class="row">
			<div class="col-md-8">
				<div class="block">
			        <div class="block-header block-header-default">
			            <h3 class="block-title">Información Destino <small></small></h3>
			        </div>
			        <div class="block-content">
                        <form action="{{ route('destinations.update', $destino->id)}}" method="post">
                        	@method('PUT')
                        	@csrf
                            <div class="form-group row">
                            <div class="col-md-4 @if($errors->has('ciudad')) is-invalid @endif">
                                    <div class="form-material floating input-group">
                                    <input type="text" class="form-control" id="ciudad" value="{{ $destino->city }}" name="ciudad">
                                        <label for="ciudad">Ciudad</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-location-arrow"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('ciudad'))
                                            @foreach($errors->get('ciudad') as $error)
                                                <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 @if($errors->has('estado')) is-invalid @endif">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="estado" name="estado" value="{{ $destino->state }}">
                                        <label for="estado">Estado</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-location-arrow"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('estado'))
                                            @foreach($errors->get('estado') as $error)
                                                <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 @if($errors->has('pais')) is-invalid @endif">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="pais" name="pais" value="{{ $destino->country }}">
                                        <label for="pais">País</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-flag"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('pais'))
                                            @foreach($errors->get('pais') as $error)
                                                <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 @if($errors->has('codigo')) is-invalid @endif">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="codigo" value="{{ $destino->code }}" name="codigo">

                                        <label for="codigo">Código de Destino</label>
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
                                <div class="col-md-4 @if($errors->has('continente')) is-invalid @endif">
                                    <div class="form-material floating">

                                    	@php ($continentes=['Asia', 'América', 'África', 'Antártida', 'Europa', 'Oceanía'])
                                        <select class="form-control" id="continente" name="continente">
                                            <!--<option selected="selected" value="{{ $destino->continent }}" >-->
                                    		@foreach($continentes as $cont)
                                    			<option value="{{ $cont }}"

                                    			@if ($destino->continent== $cont)
                                    				selected
                                    			@endif
                                    			>{{ $cont }}
                                    			</option>
                                    		@endforeach

                                        </select>
                                        <label for="continente">Continente</label>
                                    </div>
                                    @if($errors->has('continente'))
                                            @foreach($errors->get('continente') as $error)
                                                <div class="invalid-feedback animated fadeInDown">{{$error}}</div>
                                            @endforeach
                                        @endif
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
		</div>
	</div>
</main>
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
