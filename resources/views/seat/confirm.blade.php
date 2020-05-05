@extends('layouts.backend')


@section('content')
<!-- Page Content -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <h2 class="content-heading">¿Desea eliminar el asiento "{{ $asiento->code }}"?</h2>
            
            <div class="col-md-7">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Información Asiento</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="fa fa-money"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">
                        <form action="{{ route('seats.destroy', $asiento->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="modelo" name="modelo" disabled="" value="{{$asiento->code}}">
                                        <label for="modelo">Código</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-hashtag"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="tipo" name="tipo"  disabled="" value="{{$asiento->class}}">
                                        <label for="tipo">Clase</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-star-half-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="capacidad" name="capacidad"  disabled="" 

                                            @if($asiento->status=='D')
                                                value="Disponible"
                                            @elseif($asiento->status=='O')
                                                value="Ocupado"
                                            @else
                                               value="Reservado"                                               
                                            @endif

                                        >
                                        <label for="capacidad">Estado</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-check-square"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="fabricante" name="fabricante" disabled="" value="{{$asiento->airplane_id}}">
                                        <label for="fabricante">Avión</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-plane"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-md-9">
                                
                                    <button type="submit" class="btn btn-square btn-outline-primary min-width-125 mb-10" data-toggle="click-ripple">Eliminar</button>
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