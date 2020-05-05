@extends('layouts.backend')


@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection
{{--INICIO DE CONTENIDO--}}
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="my-50 text-center">
            <h2 class="font-w700 text-black mb-10">Aeropuertos</h2>
            <h3 class="h5 text-muted mb-0">Airports</h3><br>

            <a type="button" class="btn btn-square btn-primary min-width-125 mb-10 float"
               href="{{ route('airport.create') }}">Nuevo</a>
        </div>

    @if( session('datos'))
        <!-- Info -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="alert-heading font-size-h4 font-w400">¡Exito!</h3>
                        <p class="mb-0">{{ session('datos') }}</a></p>
                    </div>
                </div>

            </div>
            <!-- END Info -->
    @endif


    <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Aeropuertos <small></small></h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>

                        <th>Code</th>
                        <th>Nombre</th>
                        <th>TElefono</th>
                        <th>Representante</th>
                        <th>N. Terminales</th>
                        <th>Ciudad</th>
                        <th>Pais</th>
                        <th>Acciones</th>
                        <!--<th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>-->
                        <!--<th style="width: 15%;">Registered</th>-->
                    </tr>
                    </thead>
                    <tbody>

                    @foreach( $Airports as $Aipt)
                        <tr>
                            <td class="text-center">{{$Aipt->code}}</td>
                            <td class="text-center">{{$Aipt->name}}</td>
                            <td class="text-center">{{$Aipt->telephone}}</td>
                            <td class="text-center">{{$Aipt->representative}}</td>
                            <td class="text-center">{{$Aipt->num_gateways}}</td>
                            <td class="text-center">{{$Aipt->city}}</td>
                            <td class="text-center">{{$Aipt->country}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('airport.edit', $Aipt->id) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="Editar" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="{{ route('airport.confirm', $Aipt->id) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="Eliminar" data-original-title="Delete">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
@endsection
{{--FIN DE CONTENIDO--}}

@section('js_after')

    <script src="{{ asset('/js/codebase.core.min.js') }}"></script>
    <!--
      Codebase JS

      Custom functionality including Blocks/Layout API as well as other vital and optional helpers
      webpack is putting everything together at assets/_es6/main/app.js
  -->

    <script src="{{ asset('/js/codebase.app.min.js') }}"></script>

@endsection
