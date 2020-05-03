@extends('layouts.backend')


@section('content')
<!-- Page Content -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <h2 class="content-heading">Editar asiento "{{ $asiento->code}}"</h2>
            
            <div class="col-md-7">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Formulario Asiento</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="fa fa-money"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">
                        <form  action="{{ route('seats.update', $asiento->id)}}" method="post">
                        	@method('PUT')
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="codigo" name="codigo" value="{{$asiento->code}}">
                                        <label for="codigo">Código</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-hashtag"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material floating">
                                    	@php ($clases=['Económica', 'Ejecutiva', 'Primera'])
                                        <select class="form-control" id="clase" name="clase">
                                    		@foreach($clases as $clase)
                                    			<option value="{{ $clase }}"

                                    			@if ($asiento->class== $clase)
                                    				selected
                                    			@endif
                                    			>{{ $clase }}
                                    			</option>
                                    		@endforeach
                                        </select>
                                        <label for="clase">Clase</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material floating">
                                    	@php ($es=['D', 'O', 'R'])
                                    	@php ($estados=['Disponible', 'Ocupado', 'Reservado'])

                                        <select class="form-control" id="estado" name="estado">
                                    		

                                    		@if($asiento->status=='D')
                                    			<option value="D" selected="">Disponible</option>
                                    			<option value="O">Ocupado</option>
                                    			<option value="R">Reservado</option>
                                    		@elseif($asiento->status=='O')
                                    			<option value="D">Disponible</option>
                                    			<option value="O" selected="">Ocupado</option>
                                    			<option value="R">Reservado</option>
                                    		@else
                                    			<option value="D">Disponible</option>
                                    			<option value="O" selected="">Reservado</option>
                                    			<option value="R">Reservado</option>
                                    		@endif
                                            
                                            <!--
                                            <option value="D" selected="">Disponible</option>
                                            <option value="Ocupado">Ocupado</option>
                                            <option value="Reservado">Reservado</option>
                                            -->
                                        </select>
                                        <label for="estado">Estado</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material floating">
                                        <select class="form-control" id="avion" name="avion" >
                                            @foreach($airplanes as $airplane)
                                                <option value="{{ $airplane->id }}">{{ $airplane->model }}</option>
                                            @endforeach
                                        </select>
                                        <label for="avion">Avión</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-md-9">
                                
                                    <button type="submit" class="btn btn-square btn-outline-primary min-width-125 mb-10" data-toggle="click-ripple">Guardar</button>
                                    <a href="{{ route('cancelarAsiento')}}" type="button" class="btn btn-square btn-outline-danger min-width-125 mb-10">Cancelar</a>
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