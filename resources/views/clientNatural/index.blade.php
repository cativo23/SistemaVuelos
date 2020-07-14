@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])

@section('section', 'Clientes Natural')

@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Clientes</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Natural</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="bg-primary-darker text-body-color-light">
        <div class="content">
            <!-- Row #1 -->
            <div class="row invisible" data-toggle="appear">
                <!-- Dynamic Table Full -->
                <div class="block col-md-12">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Listado de Clientes Natural</h3>
                        <a class="btn btn-success" href="{{ route("clientNaturals.create") }}">Agregar Clientes</a>
                    </div>
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <table
                            class="table table-borderless table-striped table-vcenter js-dataTable-full datatable-Airlines col-md-12"
                            style="width:100%">
                            <thead>
                            <tr>
                            <td></td>
                            <th data-priority="1">N° Cliente Frec</td>
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
                            @foreach( $clientesn as $cliente)
                                <tr data-entry-id="{{$cliente->client->id}}">
                                    <td></td>
                                    <td>{{ $cliente->client->frequent_customer_num }}</td>
                                    <td>
                                        {{ $cliente->client->first_name }} {{ $cliente->client->second_name }}
                                        {{ $cliente->client->first_surname }} {{ $cliente->client->second_surname }}
                                    </td>
                                    <td> {{ $cliente->client->miles }}</td>
                                    <td>{{ $cliente->document_typ }}</td>
                                    <td>{{ $cliente->document_num }}</td>
                                    <td>{{ $cliente->client->mobile_phone }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('clientNaturals.show', $cliente->client->id) }}" type="button"
                                               class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip"
                                               title="Ver" data-original-title="Ver">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('clientNaturals.edit', $cliente->client->id) }}" type="button"
                                               class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip"
                                               title="Editar" data-original-title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled"
                                                    data-toggle="modal"
                                                    onclick="deleteData({{$cliente->client->id}}, '{{$cliente->client->code}}')"
                                                    data-target="#modal-fadein"><i class="fa fa-trash"></i></button>
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
    <div class="modal fade" id="modal-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-fadein"
         aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form action="" method="POST" id="deleteForm" onsubmit="return confirm('Estas seguro?');"
                  style="display: inline-block;">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Eliminar Cliente</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <p>Desea borrar el Cliente Natural: </p>
                            <p id="clientNatural_name"></p>
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-alt-success">
                            <i class="fa fa-check"></i> Si, borrar.
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet"/>
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{asset('js/plugins/datatables/buttons/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/plugins/datatables/buttons/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('js/plugins/datatables/buttons/buttons.flash.min.js')}}"></script>
    <script src="{{asset('js/plugins/datatables/buttons/buttons.print.min.js')}}"></script>
    <script src="{{asset('js/plugins/datatables/buttons/buttons.html5.min.js')}}"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <script>
        $(function () {
            let copyButtonTrans = 'Copiar';
            let csvButtonTrans = 'CSV';
            let excelButtonTrans = 'Excel';
            let pdfButtonTrans = 'PDF';
            let printButtonTrans = 'Imprimir';
            let colvisButtonTrans = 'Visibilidad de Columnas';

            let languages = {
                'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
            };

            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {className: 'btn'})
            $.extend(true, $.fn.dataTable.defaults, {
                language: {
                    url: languages['{{ app()->getLocale() }}']
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    responsivePriority: 2,
                    targets: -1,
                }],
                select: {
                    style: 'multi+shift',
                    selector: 'td:first-child'
                },
                order: [],
                scrollX: true,
                pageLength: 100,
                dom: 'lBfrtip<"actions">',
                buttons: [
                    {
                        extend: 'copy',
                        className: 'btn-default',
                        text: copyButtonTrans,
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn-default',
                        text: csvButtonTrans,
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'excel',
                        className: 'btn-default',
                        text: excelButtonTrans,
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-default',
                        text: pdfButtonTrans,
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn-default',
                        text: printButtonTrans,
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'colvis',
                        className: 'btn-default',
                        text: colvisButtonTrans,
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ]
            });

            $.fn.dataTable.ext.classes.sPageButton = '';
        });
    </script>
    <!-- Page JS Code -->
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
        function deleteData(id, clientNatural_name) {
            console.log(clientNatural_name);
            let id_n = id;
            var url = '{{ route("clientNaturals.destroy", ":id") }}';
            url = url.replace(':id', id_n);
            $("#deleteForm").attr('action', url);
            $('#clientNatural_name').append(clientNatural_name);
        }

        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
            let deleteButtonTrans = 'Borrar';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('clientNaturals.mass') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('No rows selected!')

                        return
                    }

                    if (confirm('Are you sure?')) {
                        var _token = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            };
            dtButtons.push(deleteButton);

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[1, 'desc']],
                pageLength: 100,
                responsive: true
            });
            $('.datatable-Airlines:not(.ajaxTable)').DataTable({buttons: dtButtons, responsive: true});
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });
        })
    </script>
@endsection
