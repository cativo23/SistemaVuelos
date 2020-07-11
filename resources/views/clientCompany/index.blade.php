
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

    <script src="{{ asset('/js/codebase.core.min.js') }}"></script>
    <!--
      Codebase JS

      Custom functionality including Blocks/Layout API as well as other vital and optional helpers
      webpack is putting everything together at assets/_es6/main/app.js
  -->

    <script src="{{ asset('/js/codebase.app.min.js') }}"></script>
    <script src="{{asset('js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <script>jQuery(function () {
            Codebase.helpers('notify');
            @if(session('datos'))
            Codebase.helpers('notify', {
                align: 'right',             // 'right', 'left', 'center'
                from: 'top',                // 'top', 'bottom'
                type: 'success',               // 'info', 'success', 'warning', 'danger'
                icon: 'fa fa-info mr-5',    // Icon class
                message: '{{session('datos')}}'
            });
            @endif
        });</script>
    <script>

@endsection

@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Clientes de Empresas</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Client Companies
                    </h2>
                </div>

            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="content">



    <!--
        <a type="button" class="btn btn-square btn-primary min-width-125 mb-10 float-right"
        href="{{ route('destinations.create') }}">Nueva</a><br><br><br>
   		-->
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Clientes de Empresas<small></small></h3>


                <a type="button" class="btn btn-square btn-primary min-width-125 mb-10 float"
                   href="{{ route('clientCompanys.create') }}">Nuevo</a>

            </div>


            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <!--<th class="text-center" style="width: 80px;">#</th>-->
                        <th style="width: 15%">N° Cliente Frec</th>
                        <th>Nombre</th>
                        <th>Compañia</th>
                        <th>Millas</th>

                        <!--<th>NIC</th>-->
                        <!--<th tyle="width: 15%">NIT</th>-->
                        <!--<th>Contacto</th>-->
                        <th>Tel. Móvil</th>
                        <!--<th>Tel. Fijo</th>-->
                        <!--<th>Cumpleaños</th>-->
                        <!--<th>Género</th>-->
                        <!--<th class="text-center">Estado Civil</th>-->
                        <th style="width: 15%">Acciones</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes_c as $cliente)
                            <tr>
                                <td>{{ $cliente->client->frequent_customer_num }}</td>
                                <td>{{ $cliente->client->first_name }} {{ $cliente->client->second_name }} {{ $cliente->client->first_surname }} {{ $cliente->client->second_surname }}</td>
                                <td>{{ $cliente->company_name }}</td>
                                <td>{{ $cliente->client->miles }}</td>
                                <td>{{ $cliente->client->mobile_phone }}</td>


                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('clientCompanys.show', $cliente->id) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="Ver" data-original-title="Ver">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('clientCompanys.edit', $cliente->id) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="Editar" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('clientCompanys.confirm', $cliente->id) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="Eliminar" data-original-title="Delete">
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



