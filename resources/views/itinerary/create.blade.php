@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Nuevo Itinerario</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Cree una nuevo Itinerario</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <div class="col-md-12">
                <form action="{{ route('itineraries.store') }}" method="post">@csrf
                    <div class="block block-themed">
                        <div class="block-header bg-gd-aqua">
                            <h3 class="block-title">Formulario Nuevo Itinerario</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <button type="submit" class="btn btn-sm btn-alt-primary">
                                        <i class="fa fa-check"></i> Guardar
                                    </button>
                                    <a href="{{ route('itineraries.index')}}" type="reset"
                                       class="btn btn-sm btn-alt-danger">
                                        <i class="fa fa-times"></i> Cancelar
                                    </a>
                                </button>
                            </div>
                        </div>

                        <div class="block-content">
                            <h4>Ingrese los Datos para este itinerario {{count($errors)}}
                            </h4>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-4">
                                    <div
                                        class="form-material floating input-group">
                                        <input type="text"
                                               class="form-control originapi2" name="origin_fake2">
                                        <input type="text" hidden
                                               class="form-control origin_real2" name="origin2">
                                        <label for="origin2">Origin</label>
                                        <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-paper-plane"></i>
                                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div
                                        class="form-material floating input-group">
                                        <input type="text" class="form-control destnapi2"
                                        name="destination_fake2">
                                        <input type="text" hidden class="form-control destination_real2"
                                        name="destination2">
                                        <label for="destination2">Destination</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-map-marker"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div
                                        class="form-material floating input-group">
                                        <select class="form-control" id="type" name="type">
                                            <option selected="selected" disabled></option>
                                                <option value="return">Ida y Vuelta</option>
                                            <option value="one-way">Ida</option>
                                        </select>
                                        <label for="type">Type</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-map-marker"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table id="flights-list-container" style="width:100%;">
                                <tr class="flights-list-item">
                                    <td>
                                        <h5 class="content-heading">Vuelo <span class="vuelo_num"></span></h5>
                                        <div class="form-group row justify-content-center">
                                            <div class="col-md-6">
                                                <div
                                                    class="form-material input-group">
                                                    <input type="hidden" name="vuelo[]">
                                                    <input  type="text"
                                                           class="js-flatpickr form-control departure_date"
                                                           name="departure_date[]" data-allow-input="true"
                                                           data-alt-input="true" data-date-format="Y-m-d"
                                                           data-alt-format="F j, Y">
                                                    <label for="departure_date">Departure Date</label>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-fw fa-calendar-check-o"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div
                                                    class="form-material input-group">
                                                    <input type="text"

                                                           class="js-flatpickr form-control arrival_date"
                                                           name="arrival_date[]" data-allow-input="true"
                                                           data-alt-input="true" data-date-format="Y-m-d"
                                                           data-alt-format="F j, Y">
                                                    <label for="arrival_date">Date Arrival</label>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-fw fa-calendar-check-o"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center">
                                            <div class="col-md-6 ">
                                                <div
                                                    class="form-material floating input-group">
                                                    <input type="text"
                                                           class="form-control originapi" name="origin_fake[]">
                                                    <input type="text" hidden
                                                           class="form-control origin_real" name="origin[]">
                                                    <label for="origin">Origin</label>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-paper-plane"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div
                                                    class="form-material floating input-group">
                                                    <input type="text" class="form-control destnapi"
                                                           name="destination_fake[]">
                                                    <input type="text" hidden class="form-control destination_real"
                                                           name="destination[]">
                                                    <label for="destination">Destination</label>
                                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-map-marker"></i>
                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center">
                                            <div class="col-md-6 ">
                                                <div
                                                    class="form-material floating input-group">
                                                    <input type="text" class="form-control money"
                                                           name="cost[]">
                                                    <label for="cost">Cost</label>
                                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-money"></i>
                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div
                                                    class="form-material floating input-group">
                                                    <input type="text" class="form-control money"
                                                           name="price[]">
                                                    <label for="price">Price</label>
                                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-dollar"></i>
                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center">
                                            <div class="col-md-6">
                                                <div
                                                    class="form-material floating input-group">
                                                    <input type="text" class="form-control distance"
                                                           name="flight_miles[]">
                                                    <label for="flight_miles">Flight Miles</label>
                                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-tachometer"></i>
                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div
                                                    class="form-material floating input-group">
                                                    <input type="text" class="form-control airlinenapi"
                                                           name="airline_id_fake[]">
                                                    <input type="text" hidden class="form-control airline_real"
                                                           name="airline_id[]">
                                                    <label for="airline_id">Aerolinea</label>
                                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-tachometer"></i>
                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <a href="#0" class="btn btn-alt-primary add-flights-list-item"><i
                                    class="fa fa-fw fa-plus-circle"></i>Agregar
                                Vuelo</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- jQuery Validation functionality is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js -->
            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->


        </div>
    </main>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="{{ asset('/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js') }}"></script>
    <script src="{{asset('js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>

    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function () {
            Codebase.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2']);
        });</script>
    <script>
        $("#codigo").mask('ZZ', {
            translation: {
                'Z': {
                    pattern: /[A-Z0-9]/
                }
            }
        });
        $('#whatsapp').mask('+(000) 0000 0000');
        jQuery(function () {
            $('.originapi').autoComplete({
                cache: true,
                minChars: 2,
                delay: 100,
                source:
                    function (term, response) {
                        var settings = {
                            "url": "http://127.0.0.1:8000/api/airports?term="+term,
                            "method": "GET",
                            "timeout": 0,
                            success: function (res) {
                                response(res);
                            }
                        };
                        $.ajax(settings).done(function (response) {
                        });
                    },
                renderItem: function (item, search) {
                    return '<div class="autocomplete-suggestion" data-label="'+item.label+'" data-val="'+item.value+'">"'+item.label+'"</div>'
                },
                onSelect: function (event, term, ui) {
                    $(".origin_real").val(ui[0].getAttribute('data-val'));
                    $(".originapi").val(ui[0].getAttribute('data-label'));
                    return false;
                },
            });
            $('.destnapi').autoComplete({
                minChars: 1,
                source:
                    function (term, response) {
                        var settings = {
                            "url": "http://127.0.0.1:8000/api/airports?term="+term,
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
                    return '<div class="autocomplete-suggestion" data-label="'+item.label+'" data-val="'+item.value+'">"'+item.label+'"</div>'
                },
                onSelect: function (event, term, ui) {
                    $(".destination_real").val(ui[0].getAttribute('data-val'));
                    $(".destnapi").val(ui[0].getAttribute('data-label'));
                    return false;
                },
            });
            $('.originapi2').autoComplete({
                minChars: 1,
                source:
                    function (term, response) {
                        var settings = {
                            "url": "http://127.0.0.1:8000/api/airports?term="+term,
                            "method": "GET",
                            "timeout": 0,
                            success: function (res) {
                                response(res);
                            }
                        };
                        $.ajax(settings).done(function (response) {
                        });
                    },
                renderItem: function (item, search) {
                    return '<div class="autocomplete-suggestion" data-label="'+item.label+'" data-val="'+item.value+'">"'+item.label+'"</div>'
                },
                onSelect: function (event, term, ui) {
                    $(".origin_real2").val(ui[0].getAttribute('data-val'));
                    $(".originapi2").val(ui[0].getAttribute('data-label'));
                    return false;
                },
            });
            $('.destnapi2').autoComplete({
                minChars: 1,
                source:
                    function (term, response) {
                        var settings = {
                            "url": "http://127.0.0.1:8000/api/airports?term="+term,
                            "method": "GET",
                            "timeout": 0,
                            success: function (res) {
                                response(res);
                            }
                        };
                        $.ajax(settings).done(function (response) {
                        });
                    },
                renderItem: function (item, search) {
                    return '<div class="autocomplete-suggestion" data-label="'+item.label+'" data-val="'+item.value+'">"'+item.label+'"</div>'
                },
                onSelect: function (event, term, ui) {
                    $(".destination_real2").val(ui[0].getAttribute('data-val'));
                    $(".destnapi2").val(ui[0].getAttribute('data-label'));
                    return false;
                },
            });
            $('.airlinenapi').autoComplete({
                minChars: 1,
                source:
                    function (term, response) {
                        var settings = {
                            "url": "http://127.0.0.1:8000/api/airlines?term="+term,
                            "method": "GET",
                            "timeout": 0,
                            success: function (res) {
                                response(res);
                            }
                        };
                        $.ajax(settings).done(function (response) {
                        });
                    },
                renderItem: function (item, search) {
                    return '<div class="autocomplete-suggestion" data-label="'+item.label+'" data-val="'+item.value+'">"'+item.label+'"</div>'
                },
                onSelect: function (event, term, ui) {
                    $(".airline_real").val(ui[0].getAttribute('data-val'));
                    $(".airlinenapi").val(ui[0].getAttribute('data-label'));
                    return false;
                },
            });
            $('.arrival_time').mask('00:00');
            $('.departure_time').mask('00:00');
            $('.money').mask('000,000,000,000,000.00', {reverse: true});
            $('.distance').mask('000,000,000,000,000.00', {reverse: true});
            var vuelos_num = 1;
            $('.vuelo_num').text(vuelos_num);

            const fp_arrival = document.querySelector(".departure_date")._flatpickr;
            let today = new Date();
            fp_arrival.set('minDate', today);
            fp_arrival.setDate(today.setDate(today.getDate() + 5));

            const fp = document.querySelector(".arrival_date")._flatpickr;
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
            });

            function initNew(element) {
                let flat = element.querySelector(".departure_date_new");
                let fp_arrival = flatpickr(flat, {});
                console.log(fp_arrival);
                let today = new Date();
                fp_arrival.set('minDate', today);
                fp_arrival.setDate(today.setDate(today.getDate() + 5));

                let flat2 = document.querySelector(".arrival_date_new");
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
                });
                $(element).find('.origin_api').autoComplete({
                    minChars: 1,
                    source:
                        function (term, response) {
                            var settings = {
                                "url": "http://127.0.0.1:8000/api/airports?term="+term,
                                "method": "GET",
                                "timeout": 0,
                                success: function (res) {
                                    response(res);
                                }
                            };
                            $.ajax(settings).done(function (response) {
                            });
                        },
                    renderItem: function (item, search) {
                        return '<div class="autocomplete-suggestion" data-label="'+item.label+'" data-val="'+item.value+'">"'+item.label+'"</div>'
                    },
                    onSelect: function (event, term, ui) {
                        $(element).find(".origin_real").val(ui[0].getAttribute('data-val'));
                        $(element).find(".origin_api").val(ui[0].getAttribute('data-label'));
                        return false;
                    },
                });
                $(element).find('.arrival_time_new').mask('00:00');
                $(element).find('.departure_time_new').mask('00:00');
                $(element).find('.destinationapi').autoComplete({
                    minChars: 1,
                    source:
                        function (term, response) {
                            var settings = {
                                "url": "http://127.0.0.1:8000/api/airports?term="+term,
                                "method": "GET",
                                "timeout": 0,
                                success: function (res) {
                                    response(res);
                                }
                            };
                            $.ajax(settings).done(function (response) {
                            });
                        },
                    renderItem: function (item, search) {
                        return '<div class="autocomplete-suggestion" data-label="'+item.label+'" data-val="'+item.value+'">"'+item.label+'"</div>'
                    },
                    onSelect: function (event, term, ui) {
                        $(element).find(".destination_real").val(ui[0].getAttribute('data-val'));
                        $(element).find(".destinationapi").val(ui[0].getAttribute('data-label'));
                        return false;
                    },
                });
                $(element).find('.airlinenapi').autoComplete({
                    minChars: 1,
                    source:
                        function (term, response) {
                            var settings = {
                                "url": "http://127.0.0.1:8000/api/airlines?term="+term,
                                "method": "GET",
                                "timeout": 0,
                                success: function (res) {
                                    response(res);
                                }
                            };
                            $.ajax(settings).done(function (response) {
                            });
                        },
                    renderItem: function (item, search) {
                        return '<div class="autocomplete-suggestion" data-label="'+item.label+'" data-val="'+item.value+'">"'+item.label+'"</div>'
                    },
                    onSelect: function (event, term, ui) {
                        $(element).find(".airline_real").val(ui[0].getAttribute('data-val'));
                        $(element).find(".airlinenapi").val(ui[0].getAttribute('data-label'));
                        return false;
                    },
                });
                $('.money').mask('000,000,000,000,000.00', {reverse: true});
                $('.distance').mask('000,000,000,000,000.00', {reverse: true});
            }

            function newMenuItem() {
                var newElem = '<tr class="flight-list-item"><td class="new_vuelo_:id"> <h5 class="content-heading">Vuelo <span class="vuelo_num"></span></h5> <div class="form-group row justify-content-center"> <div class="col-md-6"> <div class="form-material input-group "> <input type="hidden" name="vuelo[]"> <input type="hidden" value="2020-07-15" class="js-flatpickr form-control departure_date js-flatpickr-enabled flatpickr-input departure_date_new" name="departure_date[]" data-allow-input="true" data-alt-input="true" data-date-format="Y-m-d" data-alt-format="F j, Y"> <label for="departure_date">Departure Date</label> <div class="input-group-append"> <span class="input-group-text"> <i class="fa fa-fw fa-calendar-check-o"></i> </span> </div></div></div><div class="col-md-6"> <div class="form-material input-group "> <input type="hidden" value="2020-07-17" class="js-flatpickr form-control_new js-flatpickr-enabled arrival_date_new flatpickr-input " name="arrival_date[]" data-allow-input="true" data-alt-input="true" data-date-format="Y-m-d" data-alt-format="F j, Y"> <label for="arrival_date">Date Arrival</label> <div class="input-group-append"> <span class="input-group-text"> <i class="fa fa-fw fa-calendar-check-o"></i> </span> </div></div></div></div><div class="form-group row justify-content-center"> <div class="col-md-6"> <div class="form-material  input-group "> <input type="text" value="" class="form-control origin_api" name="origin_fake[]"> <input type="text" value="" hidden class="form-control origin_real" name="origin[]"> <label for="origin">Origin</label> <div class="input-group-append"> <span class="input-group-text"> <i class="fa fa-paper-plane"></i> </span> </div></div></div><div class="col-md-6"> <div class="form-material  input-group "> <input type="text" class="form-control destinationapi" value="" name="destination_fake[]"> <input type="text" hidden class="form-control destination_real" value="" name="destination[]"> <label for="destination">Destination</label> <div class="input-group-append"> <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span> </div></div></div></div><div class="form-group row justify-content-center"> <div class="col-md-6"> <div class="form-material  input-group "> <input type="text" class="form-control money" value="" name="cost[]"> <label for="cost">Cost</label> <div class="input-group-append"> <span class="input-group-text"> <i class="fa fa-money"></i> </span> </div></div></div><div class="col-md-6"> <div class="form-material  input-group "> <input type="text" class="form-control money" value="" name="price[]"> <label for="price">Price</label> <div class="input-group-append"> <span class="input-group-text"> <i class="fa fa-dollar"></i> </span> </div></div></div></div><div class="form-group row justify-content-center"> <div class="col-md-6"> <div class="form-material input-group "> <input type="text" class="form-control distance" value="" name="flight_miles[]"> <label for="flight_miles">Flight Miles</label> <div class="input-group-append"> <span class="input-group-text"> <i class="fa fa-tachometer"></i> </span> </div></div></div><div class="col-md-6"> <div class="form-material  input-group "> <input type="text" class="form-control airlinenapi" value="" name="airline_id_fake[]"> <input type="text" hidden class="form-control airline_real" value="" name="airline_id[]"><label for="airline_id">Aerolinea</label> <div class="input-group-append"> <span class="input-group-text"> <i class="fa fa-tachometer"></i> </span> </div></div></div></div><div class="form-group row justify-content-center"><a class="delete" href="#"><i class="fa fa-fw fa-remove"></i>Remover Vuelo</a></div></td></tr>';
                vuelos_num++;
                newElem = newElem.replace(':id', vuelos_num.toString());
                var selec = ".new_vuelo_" + vuelos_num;
                $('table#flights-list-container > tbody').append(newElem);
                $(selec).find('.vuelo_num').text(vuelos_num);
                var ele = document.querySelector(selec);
                initNew(ele);
            }


            if ($("table#flights-list-container").is('*')) {
                $('.add-flights-list-item').on('click', function (e) {
                    e.preventDefault();
                    newMenuItem();
                });
                $(document).on("click", "#flights-list-container .delete", function (e) {
                    e.preventDefault();
                    vuelos_num--;
                    $(this).parent().parent().parent().remove();
                });
            }
        });

    </script>

    <script src="{{asset('js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <script>jQuery(function () {
            Codebase.helpers('notify');
            @if(count($errors)>0)
            Codebase.helpers('notify', {
                align: 'right',             // 'right', 'left', 'center'
                from: 'top',                // 'top', 'bottom'
                type: 'warning',               // 'info', 'success', 'warning', 'danger'
                icon: 'fa fa-info mr-5',    // Icon class
                message: 'Error en Creación de Itinerario'
            });
            @endif
        });</script>

@endsection
