@extends('layouts.buy')

@section('content')
    <!-- Hero -->
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo22@2x.jpg') }});">
        <div class="bg-corporate-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Información</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">¡Revise la información antes de comprar!</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <h2 class="h4 font-w300 mt-50">Información del viaje seleccionado</h2>
        <div class="block">
            <div class="block-header block-header-default">
                <h2 class="block-title">
                    <i class="fa fa-paper-plane fa-fw mr-5 text-muted"></i> {{$itinerary->airline->short_name}}
                </h2>
                <div class="form-group">
                    @if($mensaje)
                        @if($mensaje['tipo'] == 'success')
                            <a class="btn btn-alt-primary btn-lg btn-rounded mr-5 my-5" href="{{route('booking')}}?id={{$itinerary->id}}&first_class={{$first_class??''}}&business={{$business??''}}&economy={{$economy??''}}&passengers={{$passengers??''}}">
                                <i class="fa fa-arrow-circle-right mr-5"></i> Reservar
                            </a>
                        @endif
                    @endif
                </div>
            </div>
            <div class="block-content">
                <div class="row items-push">
                    <div class="col-lg-2">
                        <p class="font-size-xl">Precio Total:</p>
                        <p class="font-size-h1">$ {{ ($itinerary->total_price * $passengers) }}</p>
                        <p class="text-muted">
                            Todos los precios son verificados antes de mostrartelos, tu satisfacción es nuestra prioriad!
                        </p>
                    </div>
                    <div class="col-lg-9 offset-lg-1">
                        <div class="form-group row">
                            <div class="col-md-5">
                                <p class="font-size-default">Desde:</p>
                                <p><i class="fa fa-anchor fa-fw mr-5 text-muted"></i>{{$airport_dep->name}}</p>
                                <p> <i class="fa fa-plane fa-fw mr-5 text-muted"></i>{{$airport_dep->city}}, {{$airport_dep->country}}</p>
                                <p><i class="fa fa-calendar fa-fw mr-5 text-muted"></i>{{$itinerary->departure_date}}</p>
                                <p><i class="fa fa-clock-o fa-fw mr-5 text-muted"></i>{{$itinerary->departure_time}}</p>
                            </div>
                            <div class="col-md-2 d-none d-md-block text-xl-center font-size-h1 mt-30">
                                <i class="fa fa-arrow-right fa-fw mr-5"></i>
                                <p class="text-md-center font-size-default">Duration: {{$itinerary->total_duration}} hrs</p>
                            </div>
                            <div class="col-md-5">
                                <p class="font-size-default">Hacia:</p>
                                <p><i class="fa fa-anchor fa-fw mr-5 text-muted"></i>{{$airport_arr->name}}</p>
                                <p><i class="fa fa-plane fa-fw mr-5 text-muted"></i>{{$airport_arr->city}}, {{$airport_arr->country}}</p>
                                <p><i class="fa fa-calendar fa-fw mr-5 text-muted"></i>{{$itinerary->arrival_date}}</p>
                                <p><i class="fa fa-clock-o fa-fw mr-5 text-muted"></i>{{$itinerary->arrival_time}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <h3>Detalle de vuelos</h3>
                            @foreach($itinerary->flights as $flight)
                                <div class="row">
                                    <div class="col-md-5">
                                        <p class="font-size-default">Desde:</p>
                                        <p><i class="fa fa-anchor fa-fw mr-5 text-muted"></i>{{$flight->origin}}</p>
                                        <p><i class="fa fa-calendar fa-fw mr-5 text-muted"></i>{{$flight->departure_date}}</p>
                                        <p><i class="fa fa-clock-o fa-fw mr-5 text-muted"></i>{{$flight->departure_time}}</p>
                                    </div>
                                    <div class="col-md-2 d-none d-md-block text-xl-center font-size-h1 mt-30">
                                        <i class="fa fa-arrow-right fa-fw mr-5"></i>
                                        <p class="text-md-center font-size-default">Duration: {{$flight->duration}} hrs</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="font-size-default">Hacia:</p>
                                        <p><i class="fa fa-anchor fa-fw mr-5 text-muted"></i>{{$flight->destination}}</p>
                                        <p><i class="fa fa-calendar fa-fw mr-5 text-muted"></i>{{$flight->arrival_date}}</p>
                                        <p><i class="fa fa-clock-o fa-fw mr-5 text-muted"></i>{{$flight->arrival_time}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="{{asset('js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

    <script>jQuery(function () {
            Codebase.helpers('notify');
            @if($mensaje)
            Codebase.helpers('notify', {
                align: 'right',             // 'right', 'left', 'center'
                from: 'top',                // 'top', 'bottom'
                type: '{{$mensaje['tipo']}}',               // 'info', 'success', 'warning', 'danger'
                icon: 'fa fa-info mr-5',    // Icon class
                message: '{{$mensaje['mess']}}'
            });
            @endif
        });</script>

@endsection
