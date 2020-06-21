
@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


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
                        data-class="animated fadeInUp">Clientes Naturales</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Client Naturals
                    </h2>
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
        href="{{ route('destinations.create') }}">Nueva</a><br><br><br>
   		-->
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Clientes Naturales<small></small></h3>


                <a type="button" class="btn btn-square btn-primary min-width-125 mb-10 float"
                   href="{{ route('clientNaturals.create') }}">Nueva</a>

            </div>


            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <!--<th class="text-center" style="width: 80px;">#</th>-->
                        <th style="width: 15%">N° Cliente Frec</th>
                        <th>Nombre</th>
                        <th>Millas</th>
                        <!--<th>Dirección</th>-->
                        <th>Tipo Doc.</th>
                        <th>N° Doc</th>
                        <th>Tel. Móvil</th>
                        <!--<th>Tel. Fijo</th>-->
                        <!--<th>Cumpleaños</th>-->
                        <!--<th>Género</th>-->
                        <!--<th class="text-center">Estado Civil</th>-->
                        <th style="width: 15%">Acciones</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $clientesn as $clienten)
                        <tr>

                            <td>{{ $clienten->client->frequent_customer_car_num }}</td>
                            <td>{{ $clienten->document_typ }}</td>
                            <td>{{ $clienten->document_num }}</td>

                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="Ver" data-original-title="Ver">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="Editar" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="Eliminar" data-original-title="Delete">
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

@section('js_after')

    <script src="{{ asset('/js/codebase.core.min.js') }}"></script>
    <!--
      Codebase JS

      Custom functionality including Blocks/Layout API as well as other vital and optional helpers
      webpack is putting everything together at assets/_es6/main/app.js
  -->

    <script src="{{ asset('/js/codebase.app.min.js') }}"></script>

@endsection
