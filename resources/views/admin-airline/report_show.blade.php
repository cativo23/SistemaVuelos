@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Reporte de Ganancias</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">{{$airline->official_name}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">

            <div class="col-md-11">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Seleccione las fechas correspondientes al reporte de ganancias</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="fa fa-plane"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">

                        <form action="{{ route('admin.airline.report_get', $airline) }}" method="post">@csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    @error('from')
                                    <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control from" id="from" name="from"
                                                   value="{{ old('from') }}">
                                            <label for="from">Desde:</label>
                                            <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                            </div>
                                        </div>
                                        @error('from')
                                        <div id="modelo-error"
                                             class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('from') </div> @enderror
                                </div>
                                <div class="col-md-6">
                                    @error('to')
                                    <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control to" id="from" name="to"
                                                   value="{{ old('to') }}">
                                            <label for="to">Hacia:</label>
                                            <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                            </div>
                                        </div>
                                        @error('to')
                                        <div id="modelo-error"
                                             class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('to') </div> @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-md-12">

                                    <button type="submit" class="btn btn-square btn-outline-primary min-width-125 mb-10"
                                            data-toggle="click-ripple" id="guardar">Generar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="block-content">
                        <p>Gastos: $ {{$cost_tot}}</p>
                        <p>Ganancia $ {{$datos['total_paid']}}</p>
                        <p>Ganancia Neta: $ {{ ($datos['total_paid']-$cost_tot) }}</p>
                    </div>

                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <table class="table table-borderless table-striped table-vcenter js-dataTable-full datatable-Itineraries col-md-12" style="width:100%">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 80px;">#</th>
                                <th data-priority="1">Pagos Realizado</th>
                                <th>Total</th>
                                <th style="width: 15%">Precio Itinerario</th>
                                <th>Costo Itinerario</th>
                                <th># Pasajeros</th>
                                <th>Ganancia</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $pagos as $airplane)
                                <tr>
                                    <td class="text-center">{{ $airplane->id }}</td>
                                    <td>{{ date('d/m/Y', strtotime($airplane->created_at)) }}</td>
                                    <td>$ {{ $airplane->total_price }}</td>
                                    <td>$ {{ $airplane->reservation->itinerary->total_price }}</td>
                                    <td>$ {{ $airplane->reservation->itinerary->cost()  }}</td>
                                    <td>{{$airplane->reservation->passengers}}</td>
                                    <td>$ {{ ($airplane->total_price- ($airplane->reservation->itinerary->cost()*$airplane->reservation->passengers)) }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- END Page Content -->
@endsection

@section('css_before')
    <link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
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
    <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>
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

    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function () {
            Codebase.helpers('select2', 'flatpickr');
        });</script>

    <!-- Page JS Code -->
    <script src="{{ asset('/js/pages/be_forms_validation.min.js') }}"></script>

    <script src="{{ asset('/js/airplane/create.js') }}"></script>

    <script>
        jQuery(function () {
            const flat = document.querySelector(".from");
            let fp_arrival = flatpickr(flat, {});
            let today = new Date();
            fp_arrival.setDate(today.setDate(today.getDate()));

            const flat2= document.querySelector(".to");
            let fp = flatpickr(flat2, {});
            let today2 = new Date();
            let today3 = new Date();
            fp.set('minDate', today2.setDate(today2.getDate()));
            fp.setDate(today3.setDate(today3.getDate() + 7));

            fp_arrival.config.onChange.push(function (selectedDates, dateStr) {
                if (fp.selectedDates[0].getDate() <= selectedDates[0].getDate()) {
                    fp.setDate(dateStr);
                }
                fp.set('minDate', dateStr);
            });

            fp.config.onChange.push(function (selectedDates, dateStr) {
                if (fp_arrival.selectedDates[0].getDate() >= selectedDates[0].getDate()) {
                    fp_arrival.setDate(dateStr);
                }
                fp_arrival.set('maxDate', dateStr);
            });
        });
    </script>
    <script>
        $(function() {
            let copyButtonTrans = 'Copiar';
            let csvButtonTrans = 'CSV';
            let excelButtonTrans = 'Excel';
            let pdfButtonTrans = 'PDF';
            let printButtonTrans = 'Imprimir';
            let colvisButtonTrans = 'Visibilidad de Columnas';

            let languages = {
                'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
            };

            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
            $.extend(true, $.fn.dataTable.defaults, {
                language: {
                    url: languages['{{ app()->getLocale() }}']
                },
                columnDefs: [{
                    orderable: false,
                    searchable: false,
                    responsivePriority: 2,
                    targets: -1,
                }],
                select: {
                    style:    'multi+shift',
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
                            columns: [0,1,2,3,4,5,6]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn-default',
                        text: csvButtonTrans,
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6]
                        }
                    },
                    {
                        extend: 'excel',
                        className: 'btn-default',
                        text: excelButtonTrans,
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-default',
                        text: pdfButtonTrans,
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6]
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn-default',
                        text: printButtonTrans,
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6]
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
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[1, 'desc']],
                pageLength: 100,
                responsive:true
            });
            $('.datatable-Itineraries:not(.ajaxTable)').DataTable({buttons: dtButtons, responsive: true});
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
            });
        })
    </script>
@endsection
