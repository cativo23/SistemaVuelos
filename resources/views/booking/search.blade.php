@extends('layouts.buy')

@section('content')
    <!-- Hero -->
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo22@2x.jpg') }});">
        <div class="bg-corporate-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Vuelos de acuerdo a su busqueda</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">¡Elija el vuelo que mas le parezca!</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
                <!-- Overview -->
        <h2 class="h4 font-w300 mt-50">Refine su búsqueda</h2>
        <div class="row">
            <div class="block block-themed block-fx-pop" style="width: 100%">
                <div class="block-header bg-gd-sea">
                    <h3 class="block-title">Ingrese los datos de su vuelo</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    </div>
                </div>
                <div class="block-content">
                    <form action="{{route('search')}}" method="POST">@csrf
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material floating">
                                    <input type="text" class="form-control origin" id="origin" name="origin" value="{{$origin}}">
                                    <label for="origin">De</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material floating">
                                    <input type="text" class="form-control destination" id="destination" name="destination" value="{{$destination}}">
                                    <label for="destination">Hasta</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4">
                                <div class="form-material floating">
                                    <input type="text" class="form-control from" id="from" name="from" value="{{$from}}">
                                    <label for="from">Desde</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-material floating">
                                    <input type="text" class="form-control to" id="to" name="to" value="{{$to}}">
                                    <label for="to">Hasta</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-material">
                                    <select class="form-control" id="passengers" name="passengers" size="1">
                                        <option @if($passengers==1) selected @endif value="1">1</option>
                                        <option @if($passengers==2) selected @endif value="2">2</option>
                                        <option @if($passengers==3) selected @endif value="3">3</option>
                                        <option @if($passengers==4) selected @endif value="4">4</option>
                                        <option @if($passengers==5) selected @endif value="5">5</option>
                                        <option @if($passengers==6) selected @endif  value="6">6</option>
                                    </select>
                                    <label for="passengers">Pasajeros</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-3">
                                <label class="css-control css-control-sm css-control-primary css-switch">
                                    <input type="checkbox" class="css-control-input" id="first_class" name="first_class" @if($first_class) checked @endif>
                                    <span class="css-control-indicator"></span>Primera
                                </label>
                            </div>
                            <div class="col-3">
                                <label class="css-control css-control-sm css-control-primary css-switch">
                                    <input type="checkbox" class="css-control-input" id="business" name="business" @if($business) checked @endif>
                                    <span class="css-control-indicator"></span>Ejecutiva
                                </label>
                            </div>
                            <div class="col-3">
                                <label class="css-control css-control-sm css-control-primary css-switch">
                                    <input type="checkbox" class="css-control-input" id="economy" name="economy" @if($economy) checked @endif>
                                    <span class="css-control-indicator"></span>Turista
                                </label>
                            </div>
                            <div class="col-3">
                                <div class="form-material">
                                    <select class="form-control" id="type" name="type" size="1">
                                        <option value="return" @if($type=="return") selected @endif>Ida y Vuelta</option>
                                        <option value="one-way" @if($type=="one-way") selected @endif>Solo Ida</option>
                                    </select>
                                    <label for="type">Tipo</label>
                                </div>
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
        <!-- END Overview -->

        <!-- VPS -->
        <div class="d-flex justify-content-between align-items-center mt-50 mb-20">
            <h2 class="h4 font-w300 mb-0">Resultados</h2>
        </div>
        @if(count($itineraries_available)>0)
            @foreach($itineraries_available as $itinerary)
                <div class="block block-themed  block-fx-pop">
                    <div class="block-header bg-gd-aqua">
                        <h3 class="block-title">
                            {{$itinerary->airline->short_name}} <small> {{$itinerary->total_duration}} hrs</small>
                        </h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="row align-items-center">
                            <div class="col-sm-4 py-10">
                                <p class="font-size-sm font-w600 mb-20">
                                    <span class="font-w700">Desde:</span>
                                </p>
                                <p class="font-size-sm font-w600 mb-0">
                                    {{$itinerary->origin}}
                                </p>
                                <p class="font-size-sm font-w600 mb-0">
                                    <span class="font-w700">Saliendo :</span>{{date('d/m/Y', strtotime($itinerary->departure_date))}} a las  {{$itinerary->departure_time}}
                                </p>
                            </div>
                            <div class="col-sm-4 py-10">
                                <p class="font-size-sm font-w600 mb-20">
                                    <span class="font-w700">Hacia:</span>
                                </p>
                                <p class="font-size-sm font-w600 mb-0">
                                    {{$itinerary->destination}}
                                </p>
                                <p class="font-size-sm font-w600 mb-0">
                                    <span class="font-w700">Llegando :</span>{{date('d/m/Y', strtotime($itinerary->arrival_date))}}  a las  {{$itinerary->arrival_time}}
                                </p>
                            </div>
                            <div class="col-sm-2 py-10 text-md-right">
                                <p class="font-size-sm font-w600 mb-20">
                                    <span class="font-w700">Conexiones:</span> {{$itinerary->num_connections}}
                                </p>
                                <p class="font-size-xl font-w600 mb-20">
                                    <span class="font-w700">Precio:</span>$ {{$itinerary->total_price}}
                                </p>
                                <p class="font-size-xs text-muted">Por persona</p>
                            </div>
                            <div class="col-sm-2 py-10 text-md-right">
                                <a class="btn btn-alt-primary btn-rounded mr-5 my-5" href="{{route('check')}}?id={{$itinerary->id}}&first_class={{$first_class??''}}&business={{$business??''}}&economy={{$economy??''}}&passengers={{$passengers??''}}">
                                    <i class="fa fa-arrow-circle-right mr-5"></i> Seleccionar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
        @else
            <div class="block block-themed  block-fx-pop">
                <div class="block-header bg-gd-aqua">
                    <h3 class="block-title">
                        Lo sentimos no hay vuelos con estas especificaciones<small> :(</small>
                    </h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="row align-items-center">
                        <div class="col-sm-12 py-10">
                            <p class="font-size-xl font-w600 mb-20">
                               Vuelve a realizar la busqueda con otros datos!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- END VPS -->
    </div>
    <!-- END Page Content -->
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

    <!-- Page JS Plugins -->
    <script src="{{ asset('/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-validation/additional-methods.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js') }}"></script>
    <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>

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
                            "url": "/api/destinations?term="+term,
                            "method": "GET",
                            "timeout": 0,
                            success: function (res) {
                                response(res);
                            }
                        };
                        try { xhr.abort(); } catch(e){}
                        $.ajax(settings).done(function (response) {
                            console.log(response)
                        });
                    },
                renderItem: function (item, search) {
                    console.log('wtf');
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
                            "url": "/api/destinations?term="+term,
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
            fp_arrival.setDate( Date.parse('{{$from}}'));
            let flat2 = document.querySelector(".to");
            let fp = flatpickr(flat2, {});
            let today2 = new Date();
            fp.set('minDate', Date.parse('{{$from}}'));
            fp.setDate(new Date('{{$to}}'));

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

@endsection
