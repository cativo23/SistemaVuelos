@extends('layouts.buy', ['site'=>'index'])

@section('section', 'Buscar Boletos')

@section('content')
    <!-- Hero -->
    <div class="bg-white bg-pattern" style="background-image: url('{{asset('media/various/bg-pattern-inverse.png')}}');">
        <div class="d-flex align-items-center">
            <div class="content content-full">
                <div class="row no-gutters w-100 py-100 overflow-hidden">
                    <div class="col-md-5 py-30 d-flex align-items-center invisible" data-toggle="appear">
                        <div class="text-center text-md-left" style="width: 100%;">
                            <h1 class="font-w600 font-size-h2 mb-20">
                                Busque Vuelos.
                            </h1>
                                <div class="block block-themed">
                                    <div class="block-header bg-gd-sea">
                                        <h3 class="block-title">Ingrese los datos de su vuelo</h3>
                                    </div>
                                    <div class="block-content">
                                        <form action="{{route('search')}}" method="POST">@csrf
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <div class="form-material floating">
                                                        <input type="text" class="form-control" id="origin" name="origin">
                                                        <label for="origin">De</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <div class="form-material floating">
                                                        <input type="text" class="form-control" id="destination" name="destination">
                                                        <label for="destination">Hasta</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-6">
                                                    <div class="form-material floating">
                                                        <input type="text" class="form-control from" id="from" name="from">
                                                        <label for="from">Desde</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-material floating">
                                                        <input type="text" class="form-control to" id="to" name="to">
                                                        <label for="to">Hasta</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-4">
                                                    <label class="css-control css-control-sm css-control-primary css-switch">
                                                        <input type="checkbox" class="css-control-input" id="first_class" name="first_class">
                                                        <span class="css-control-indicator"></span>Primera
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label class="css-control css-control-sm css-control-primary css-switch">
                                                        <input type="checkbox" class="css-control-input" id="business" name="business">
                                                        <span class="css-control-indicator"></span>Ejecutiva
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label class="css-control css-control-sm css-control-primary css-switch">
                                                        <input type="checkbox" class="css-control-input" id="economy" name="economy">
                                                        <span class="css-control-indicator"></span>Turista
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-alt-primary">
                                                        <i class="fa fa-arrow-right mr-5"></i> Buscar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-7 py-30 d-none d-md-flex align-items-md-center justify-content-md-end invisible" data-toggle="appear" data-class="animated fadeInRight">
                        <img class="img-fluid" src="{{asset('media/photos/flight-1.png')}}" srcset="{{asset('media/photos/flight-1@2x.png')}}" alt="Hero">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
@endsection

@section('css_before')
    <link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/jquery-auto-complete/jquery.auto-complete.css')}}">
@endsection

@section('js_after')
    <script src="{{ asset('/js/codebase.core.min.js') }}"></script>
    <!--
      Codebase JS

      Custom functionality including Blocks/Layout API as well as other vital and optional helpers
      webpack is putting everything together at assets/_es6/main/app.js
  -->

    <script src="{{ asset('/js/codebase.app.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js') }}"></script>
    <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>

    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function () {
            Codebase.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2']);
        });</script>
    <script>
        jQuery(function () {
        $('#origin').autoComplete({
            delay: 200,
            minChars: 2,
            source:
                function (term, response) {
                    var settings = {
                        "url": "http://127.0.0.1:8000/api/destinations?term="+term,
                        "method": "GET",
                        "timeout": 0,
                        success: function (res) {
                            response(res);
                        }
                    };
                    try { xhr.abort(); } catch(e){}
                    $.ajax(settings).done(function (response) {
                    });
                },
            renderItem: function (item, search) {
                search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
                var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
                var show = item.city + ', '+item.state+', '+item.country;
                return '<div class="autocomplete-suggestion" data-val="' + item.city + '">' + show.replace(re, "<b>$1</b>") + '</div>';
            },
            onSelect: function (event, term, ui) {
                $("#origin").val(ui[0].getAttribute('data-val'));
                return false;
            },
        });
        $('#destination').autoComplete({
            delay: 200,
            minChars: 2,
                source:
                    function (term, response) {
                        var settings = {
                            "url": "http://127.0.0.1:8000/api/destinations?term="+term,
                            "method": "GET",
                            "timeout": 0,
                            success: function (res) {
                                response(res);
                            }
                        };
                        try { xhr.abort(); } catch(e){}
                        $.ajax(settings).done(function (response) {
                        });
                    },
            renderItem: function (item, search) {
                search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
                var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
                var show = item.city + ', '+item.state+', '+item.country;
                return '<div class="autocomplete-suggestion" data-val="' + item.city + '">' + show.replace(re, "<b>$1</b>") + '</div>';
            },
                onSelect: function (event, term, ui) {
                    $("#destination").val(ui[0].getAttribute('data-val'));
                    return false;
                },
            });
        let flat = document.querySelector(".from");
        let fp_arrival = flatpickr(flat, {});
        let today = new Date();
        fp_arrival.set('minDate', today);
        fp_arrival.setDate(today.setDate(today.getDate() + 5));
        let flat2 = document.querySelector(".to");
        let fp = flatpickr(flat2, {});
        let today2 = new Date();
        let today3 = new Date();
        fp.set('minDate', today2.setDate(today2.getDate() + 5));
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
        });});
    </script>
@endsection
