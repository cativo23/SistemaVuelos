@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])

@section('section', 'Vuelos')

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

@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Vuelos</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Flights</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="content">

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

    <!--
        <a type="button" class="btn btn-square btn-primary min-width-125 mb-10 float-right"
        href="{{ route('flights.create') }}">Nueva</a><br><br><br>
        -->
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Vuelos<small></small></h3>
                <a type="button" class="btn btn-square btn-primary min-width-125 mb-10 float"
                   href="{{ route('flights.create') }}">Nuevo Vuelo</a>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Codigo</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Aerolinea</th>
                            <th>Distancia/Duración</th>
                            <th>Acciones</th>
                            <!--<th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>-->
                            <!--<th style="width: 15%;">Registered</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $flights as $airplane)
                            <tr>
                                <td class="text-center">{{ $airplane->id }}</td>
                                <td>{{ $airplane->code }}</td>
                                <td>{{ $airplane->origin }}</td>
                                <td>{{ $airplane->destination }}</td>
                                <td>{{ $airplane->airline->official_name }}</td>
                                <td>{{ $airplane->distance."/".$airplane->duration }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('flights.edit', $airplane->id) }}" type="button"
                                           class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip"
                                           title="Editar" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('flights.confirm', $airplane->id) }}" type="button"
                                           class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip"
                                           title="Eliminar" data-original-title="Delete">
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
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

    <script src="{{ asset('/js/codebase.core.min.js') }}"></script>
    <!--
      Codebase JS

      Custom functionality including Blocks/Layout API as well as other vital and optional helpers
      webpack is putting everything together at assets/_es6/main/app.js
  -->

    <script src="{{ asset('/js/codebase.app.min.js') }}"></script>

@endsection
