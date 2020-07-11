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
{{--INICIO DE CONTENIDO--}}
@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Aeropuertos</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">"Airports"</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="content">
    @if( session('datos'))
        <!-- Info -->
            <div id="notificacion" data-notify="container" class="col-xs-11 col-sm-4 alert alert-success animated fadeIn"
                 role="alert" data-notify-position="top-right" style="display: inline-block; margin: 0px auto;
                 position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1033; top: 20px; right: 20px;
                 animation-iteration-count: 1;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="position:
                    absolute; right: 10px; top: 5px; z-index: 1035;">×
                </button>
                <span data-notify="icon" class="fa fa-check"></span>
                <span data-notify="title"></span>
                <span data-notify="message">{{ session('datos') }}</span>
                <a href="#" target="_blank" data-notify="url"></a>
            </div>
            <!-- END Info -->
    @endif


    <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Aviones<small></small></h3>
                <a type="button" class="btn btn-square btn-primary min-width-125 mb-10 float"
                   href="{{ route('airports.create') }}">Nuevo</a>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">
                    <table class="table table-borderless table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th class="text-center" data-toggle="tooltip" data-placement="top" title="Terminales">
                                <i class="fa fa-sitemap"></i>
                            </th>
                            <!--<th>Ciudad</th>-->
                            <th>Pais</th>
                            <th>Representante</th>
                            <th>Teléfono</th>

                            <th  style="width: 15%">Acciones</th>
                            <!--<th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>-->
                            <!--<th style="width: 15%;">Registered</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $Airports as $Aipt)
                            <tr>
                                <td>{{$Aipt->code}}</td>
                                <td>{{$Aipt->name}}</td>
                                <td>{{$Aipt->num_gateways}}</td>
                                <!--<td>{{$Aipt->city}}</td>-->
                                <td>{{$Aipt->country}}</td>
                                <td>{{$Aipt->representative}}</td>
                                <td>{{$Aipt->telephone}}</td>



                                <td  class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('airports.edit', $Aipt->id) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="Editar" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('airports.confirm', $Aipt->id) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="Eliminar" data-original-title="Delete">
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

        <!-- END Page Content -->
@endsection
{{--FIN DE CONTENIDO--}}

@section('js_after')

    <script src="{{ asset('/js/codebase.core.min.js') }}"></script>
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
