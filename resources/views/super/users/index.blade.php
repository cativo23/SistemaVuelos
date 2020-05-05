@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])

@section('content')
    <!-- Page Content -->
    <!-- Hero -->
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Usuarios</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Administre usuarios</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="bg-primary-darker text-body-color-light">
        <div class="content">
            <!-- Row #1 -->
            <div class="row invisible" data-toggle="appear">
                <!-- Dynamic Table Full -->
                <div class="block col-12">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Listado de Usuarios</h3>
                        <a class="btn btn-success" href="{{ route("super.users.create") }}">Add User</a>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 80px;">#</th>
                                <th style="width: 150px;">Nombre</th>
                                <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                                <th class="text-center" style="width: 25%;">Roles</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    <td class="text-center">{{ $user->id ?? '' }}</td>
                                    <td class="font-w600">
                                        <a href="{{ route('super.users.show', $user->id) }}">{{ $user->name ?? '' }}</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        {{ $user->email ?? '' }}
                                    </td>
                                    <td class="text-center d-none d-sm-table-cell">
                                        @if(count($user->roles)>0)
                                            @foreach($user->roles->pluck('name') as $role)
                                                <span class="badge badge-info">{{ $role }}</span>
                                            @endforeach
                                        @else
                                            No roles asignados
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('super.users.show', $user->id) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="Ver" data-original-title="Ver">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="{{ route('super.users.edit', $user->id) }}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="Editar" data-original-title="Editar">
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
            <!-- END Row #1 -->

        </div>
    </div>
    <!-- END Page Content -->
@endsection


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
