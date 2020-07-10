@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <!-- Hero -->
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Vuelos</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Cree un nuevo vuelo</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="bg-body text-body-color-dark">
        <div class="content">
            <!-- Row #1 -->
            <div class="row invisible" data-toggle="appear">
                <div class="col-md-12">
                    <form action="{{ route('flights.store') }}" method="post">
                        @csrf
                        <div class="block block-themed">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Crear Vuelo</h3>
                                <div class="block-options">
                                    <button type="submit" class="btn btn-sm btn-alt-primary">
                                        <i class="fa fa-check"></i> Guardar
                                    </button>
                                    <a href="{{ route('super.roles.index')}}" type="reset"
                                       class="btn btn-sm btn-alt-danger">
                                        <i class="fa fa-times"></i> Cancelar
                                    </a>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-3">
                                        <div class="form-material input-group {{ $errors->has('departure_date') ? 'has-error' : '' }}">
                                            <input type="text" value="{{ old('departure_date', isset($flight) ? $flight->departure_date : '') }}" class="js-flatpickr form-control" id="departure_date" name="departure_date" data-allow-input="true" data-alt-input="true"  data-date-format="Y-m-d" data-alt-format="F j, Y">
                                            <label for="departure_date">Departure Date</label>
                                            <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-fw fa-calendar-check-o"></i>
                                                        </span>
                                            </div>
                                        </div>
                                        @if($errors->has('departure_date'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('departure_date') }}
                                            </em>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-material floating input-group {{ $errors->has('departure_time') ? 'has-error' : '' }}">
                                            <input type="text" class="js-flatpickr form-control" value="{{ old('departure_time', isset($flight) ? $flight->departure_time : '') }}" id="departure_time" name="departure_time" data-allow-input="true" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" time_24hr="true">
                                            <label for="departure_time">Departure Time</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            </div>
                                        </div>
                                        @if($errors->has('departure_time'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('departure_time') }}
                                            </em>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-material input-group {{ $errors->has('arrival_date') ? 'has-error' : '' }}">
                                            <input type="text" value="{{ old('arrival_date', isset($flight) ? $flight->arrival_date : '') }}" class="js-flatpickr form-control" id="arrival_date" name="arrival_date" data-allow-input="true" data-alt-input="true"  data-date-format="Y-m-d" data-alt-format="F j, Y">
                                            <label for="arrival_date">Date Arrival</label>
                                            <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-fw fa-calendar-check-o"></i>
                                                        </span>
                                            </div>
                                        </div>
                                        @if($errors->has('arrival_date'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('arrival_date') }}
                                            </em>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-material floating input-group {{ $errors->has('arrival_time') ? 'has-error' : '' }}">
                                            <input type="text" value="{{ old('arrival_time', isset($flight) ? $flight->arrival_time : '') }}" class="js-flatpickr form-control" id="arrival_time" name="arrival_time" data-allow-input="true" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" time_24hr="true">
                                            <label for="arrival_time">Arrival Time</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                            </div>
                                        </div>
                                        @if($errors->has('departure_time'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('arrival_time') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-material floating input-group {{ $errors->has('origin') ? 'has-error' : '' }}">
                                            <input type="text" value="{{ old('origin', isset($flight) ? $flight->origin : '') }}" class="form-control" id="origin" name="departure_date">
                                            <label for="origin">Origin</label>
                                            <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-paper-plane"></i>
                                                        </span>
                                            </div>
                                        </div>
                                        @if($errors->has('origin'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('origin') }}
                                            </em>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-material floating input-group {{ $errors->has('destination') ? 'has-error' : '' }}">
                                            <input type="text" class="form-control" value="{{ old('destination', isset($flight) ? $flight->destination : '') }}" id="destination" name="destination">
                                            <label for="destination">Destination</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-map-marker"></i>
                                            </span>
                                            </div>
                                        </div>
                                        @if($errors->has('destination'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('destination') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-4">
                                        <div class="form-material floating input-group {{ $errors->has('code') ? 'has-error' : '' }}">
                                            <input type="text" value="{{ old('code', isset($flight) ? $flight->code : '') }}" class="form-control" id="code" name="code">
                                            <label for="code">Code</label>
                                            <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-code"></i>
                                                        </span>
                                            </div>
                                        </div>
                                        @if($errors->has('code'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('code') }}
                                            </em>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material floating input-group {{ $errors->has('cost') ? 'has-error' : '' }}">
                                            <input type="text" class="form-control" value="{{ old('cost', isset($flight) ? $flight->cost : '') }}" id="cost" name="cost">
                                            <label for="cost">Cost</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-money"></i>
                                            </span>
                                            </div>
                                        </div>
                                        @if($errors->has('cost'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('cost') }}
                                            </em>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-material floating input-group {{ $errors->has('price') ? 'has-error' : '' }}">
                                            <input type="text" class="form-control" value="{{ old('price', isset($flight) ? $flight->price : '') }}" id="price" name="price">
                                            <label for="price">Price</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-dollar"></i>
                                            </span>
                                            </div>
                                        </div>
                                        @if($errors->has('price'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('price') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-3">
                                        <div class="form-material floating input-group {{ $errors->has('distance_miles') ? 'has-error' : '' }}">
                                            <input type="text" value="{{ old('distance_miles', isset($flight) ? $flight->distance_miles : '') }}" class="form-control" id="distance_miles" name="distance_miles">
                                            <label for="distance_miles">Distance Miles</label>
                                            <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-road"></i>
                                                        </span>
                                            </div>
                                        </div>
                                        @if($errors->has('distance_miles'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('distance_miles') }}
                                            </em>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-material floating input-group {{ $errors->has('flight_miles') ? 'has-error' : '' }}">
                                            <input type="text" class="form-control" value="{{ old('flight_miles', isset($flight) ? $flight->flight_miles : '') }}" id="flight_miles" name="flight_miles">
                                            <label for="flight_miles">Flight Miles</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-tachometer"></i>
                                            </span>
                                            </div>
                                        </div>
                                        @if($errors->has('flight_miles'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('flight_miles') }}
                                            </em>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-material floating input-group {{ $errors->has('status') ? 'has-error' : '' }}">
                                            <input type="text" class="form-control" disabled value="{{ old('status', isset($flight) ? $flight->status : '') }}" id="status" name="status">
                                            <label for="status">Estado</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-tachometer"></i>
                                            </span>
                                            </div>
                                        </div>
                                        @if($errors->has('status'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('status') }}
                                            </em>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-material floating input-group {{ $errors->has('flight_miles') ? 'has-error' : '' }}">
                                            <input type="text" class="form-control" value="{{ old('flight_miles', isset($flight) ? $flight->flight_miles : '') }}" id="flight_miles" name="flight_miles">
                                            <label for="flight_miles">Flight Miles</label>
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-tachometer"></i>
                                            </span>
                                            </div>
                                        </div>
                                        @if($errors->has('flight_miles'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('flight_miles') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Row #1 -->

        </div>
    </div>
    <!-- END Page Content -->
@endsection

@section('css_before')
    <link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/jquery-auto-complete/jquery.auto-complete.css')}}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <script src="{{ asset('js/plugins/jquery-auto-complete/jquery.auto-complete.min.js')}}"></script>
    <script src="{{asset('js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>
    <!-- Page JS Code -->
    <script src="{{ asset('/js/pages/be_forms_validation.min.js') }}"></script>
    <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins) -->
    <script>jQuery(function(){ Codebase.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2']); });</script>

    <script>
        $(document).ready(function () {
            const fp_arrival = document.querySelector("#departure_date")._flatpickr;
            let today = new Date();
            fp_arrival.set('minDate', today);
            fp_arrival.setDate(today.setDate(today.getDate()+5));

            const fp = document.querySelector("#arrival_date")._flatpickr;
            let today2 = new Date();
            let today3 = new Date();
            fp.set('minDate', today2.setDate(today2.getDate()+5));
            fp.setDate(today3.setDate(today3.getDate()+7));

            fp_arrival.config.onChange.push(function (selectedDates, dateStr) {
                if(fp.selectedDates[0].getDate() <= selectedDates[0].getDate()){
                    fp.setDate(dateStr);
                }
                fp.set('minDate', dateStr);
            });

            fp.config.onChange.push(function (selectedDates, dateStr) {
                if(fp_arrival.selectedDates[0].getDate() >= selectedDates[0].getDate()){
                    fp_arrival.setDate(dateStr);
                }
                fp_arrival.set('maxDate', dateStr);
            });

        });
    </script>
@endsection
