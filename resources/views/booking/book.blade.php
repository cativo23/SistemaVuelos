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
        <h2 class="h4 font-w300 mt-50">Información del viaje seleccionado {!! implode('', $errors->all('<div>:message</div>')) !!}</h2>
        <div class="block">
            <div class="block-header block-header-default">
                <h2 class="block-title">
                    <i class="fa fa-paper-plane fa-fw mr-5 text-muted"></i> {{$itinerary->airline->short_name}}
                </h2>
            </div>
            <div class="block-content">
                <div class="row items-push">
                    <div class="col-lg-2">
                        <p class="font-size-xl">Precio Total:</p>
                        <p class="font-size-h1">$ {{ ($itinerary->total_price * $passengers) }}</p>
                        <p class="text-muted">
                            Todos los precios son verificados antes de mostrartelos, tu satisfacción es nuestra
                            prioriad!
                        </p>
                    </div>
                    <div class="col-lg-9 offset-lg-1">
                        <div class="form-group row">
                            <div class="col-md-5">
                                <p class="font-size-default">Desde:</p>
                                <p><i class="fa fa-anchor fa-fw mr-5 text-muted"></i>{{$airport_dep->name}}</p>
                                <p><i class="fa fa-plane fa-fw mr-5 text-muted"></i>{{$airport_dep->city}}
                                    , {{$airport_dep->country}}</p>
                                <p><i class="fa fa-calendar fa-fw mr-5 text-muted"></i>{{$itinerary->departure_date}}
                                </p>
                                <p><i class="fa fa-clock-o fa-fw mr-5 text-muted"></i>{{$itinerary->departure_time}}</p>
                            </div>
                            <div class="col-md-2 d-none d-md-block text-xl-center font-size-h1 mt-30">
                                <i class="fa fa-arrow-right fa-fw mr-5"></i>
                                <p class="text-md-center font-size-default">Duration: {{$itinerary->total_duration}}
                                    hrs</p>
                            </div>
                            <div class="col-md-5">
                                <p class="font-size-default">Hacia:</p>
                                <p><i class="fa fa-anchor fa-fw mr-5 text-muted"></i>{{$airport_arr->name}}</p>
                                <p><i class="fa fa-plane fa-fw mr-5 text-muted"></i>{{$airport_arr->city}}
                                    , {{$airport_arr->country}}</p>
                                <p><i class="fa fa-calendar fa-fw mr-5 text-muted"></i>{{$itinerary->arrival_date}}</p>
                                <p><i class="fa fa-clock-o fa-fw mr-5 text-muted"></i>{{$itinerary->arrival_time}}</p>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="row">
                                <div class="block block-themed block-fx-pop" style="width: 100%">
                                    <div class="block-header bg-gd-elegance">
                                        <h3 class="block-title">Ingrese los datos para realizar el pago</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                                    data-action="content_toggle"></button>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#btabs-animated-slideright-home">Cliente
                                                Natural</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#btabs-animated-slideright-profile">Cliente
                                                Empresa</a>
                                        </li>
                                    </ul>
                                    <div class="block-content tab-content overflow-hidden">
                                        <div class="tab-pane fade fade-right show active"
                                             id="btabs-animated-slideright-home" role="tabpanel">
                                            <h4 class="font-w400">Datos del Cliente Natural</h4>
                                            <form action="{{route('completed')}}" method="POST">@csrf
                                                <input hidden value="{{$itinerary->id}}" name="id">
                                                <input hidden value="{{$passengers}}" name="passengers">
                                                <input hidden value="{{$first_class ??''}}" name="first_class">
                                                <input hidden value="{{$business ??''}}" name="business">
                                                <input hidden value="{{$economy ??''}}" name="economy">
                                                <input hidden value="natural" name="client">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="primer_nombre"
                                                                   name="primer_nombre"
                                                                   value="{{ old('primer_nombre') }}">
                                                            <label for="primer_nombre">Primer Nombre</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="segundo_nombre"
                                                                   name="segundo_nombre"
                                                                   value="{{ old('segundo_nombre') }}">
                                                            <label for="segundo_nombre">Segundo Nombre</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="primer_apellido"
                                                                   name="primer_apellido"
                                                                   value="{{ old('primer_apellido') }}">
                                                            <label for="primer_apellido">Primer Apellido</label>
                                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control"
                                                                   id="segundo_apellido" name="segundo_apellido"
                                                                   value="{{ old('segundo_apellido') }}">
                                                            <label for="segundo_apellido">Segundo Apellido</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-4">
                                                        <div class="form-material floating input-group">
                                                            <input ttype="text" class="form-control"
                                                                   data-allow-input="true" id="cumple" name="cumple"
                                                                   value="{{ old('cumple') }}" data-mask="00-00-0000">
                                                            <label for="cumple">Cumpleaños</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-birthday-cake"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-material floating input-group">
                                                            @php ($generos=['Femenino', 'Masculino', 'Otro'])
                                                            <select class="form-control" id="genero" name="genero">
                                                                <option selected="selected" disabled></option>
                                                                @foreach($generos as $genero)
                                                                    <option value="{{ $genero }}"
                                                                            @if ( old('genero')  == $genero)
                                                                            selected
                                                                        @endif
                                                                    >{{ $genero }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label for="genero">Género</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-material floating input-group">
                                                            @php ($estados=['Casado/a', 'Comprometido/a', 'Divorciado/a','Noviazgo', 'Separado/a', 'Soltero/a', 'Viudo/a', 'Unión libre'])
                                                            <select class="form-control" id="estado_civil"
                                                                    name="estado_civil">
                                                                <option selected="selected" disabled></option>
                                                                @foreach($estados as $estado)
                                                                    <option value="{{ $estado }}"
                                                                            @if ( old('estado_civil')  == $estado)
                                                                            selected
                                                                        @endif
                                                                    >{{ $estado }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label for="estado_civil">Estado Civil</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                        <div class="form-material floating input-group">
                                                            @php ($documentos=['DUI', 'NIT', 'Pasaporte'])
                                                            <select class="form-control" id="tipo_documento"
                                                                    name="tipo_documento">
                                                                <option selected="selected" disabled></option>
                                                                @foreach($documentos as $documento)
                                                                    <option value="{{ $documento }}"
                                                                            @if ( old('tipo_documento')  == $documento)
                                                                            selected
                                                                            @elseif ('DUI' == $documento))
                                                                            selected
                                                                        @endif
                                                                    >{{ $documento }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label for="tipo_documento">Tipo de Documento</label>
                                                        </div>
                                                    </div>
                                                    <div id="formatodui" style="display: inline" class="col-3">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="n_documento1"
                                                                   name="n_documento1"
                                                                   value="{{ old('n_documento') }}"
                                                                   data-mask="00000000-0" maxlength="10"
                                                                   minlength="10">
                                                            <label for="n_documento1">N° Documento</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-id-card"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3" id="formatonit" style="display: none">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="n_documento2"
                                                                   name="n_documento2"
                                                                   value="{{ old('n_documento') }}"
                                                                   data-mask="0000-000000-000-0">
                                                            <label for="n_documento2">N° Documento</label>
                                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3" id="formatopasaporte" style="display: none">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="n_documento3"
                                                                   name="n_documento3"
                                                                   value="{{ old('n_documento') }}"
                                                                   data-mask="A-00000000">
                                                            <label for="n_documento3">N° Documento</label>
                                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-4">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="tel_fijo" name="tel_fijo"
                                                                   value="{{ old('tel_fijo') }}" data-mask="(000) 0000 0000">
                                                            <label for="tel_fijo">Teléfono fijo</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-phone"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="tel_movil" name="tel_movil"
                                                                   value="{{ old('tel_movil') }}" data-mask="(000) 0000 0000">
                                                            <label for="tel_movil">Teléfono Móvil</label>
                                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="direccion" name="direccion"
                                                                   value="{{ old('direccion') }}">
                                                            <label for="direccion">Dirección</label>
                                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-map"></i>
                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5>Datos de Pago</h5>
                                                <div class="form-group row">
                                                    <div class="col-6">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="cc_name"
                                                                   name="cc_name"
                                                                   value="{{ old('cc_name') }}">
                                                            <label for="cc_name">Nombre*</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-material floating input-group">
                                                            <input type="email"  class="form-control" id="email"
                                                                   name="email"
                                                                   value="{{ old('email') }}">
                                                            <label for="email">Correo Electronico*</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-at"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-8">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="cc_number"
                                                                   name="cc_number"
                                                                   value="{{ old('cc_number') }}">
                                                            <label for="cc_number"># Tarjeta*</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-credit-card"></i>
                                                                </span>
                                                                <div class="form-text text-muted text-right"> <i class="fa fa-cc-visa"></i> <i class="fa fa-cc-mastercard"></i> <i class="fa fa-cc-amex"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="cvv"
                                                                   name="cvv"
                                                                   value="{{ old('cvv') }}">
                                                            <label for="cvv"># Verificación/ CVV *</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-shield"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-6">
                                                        <div class="form-material floating input-group">
                                                            <select class="form-control" id="exp_month" name="exp_month" size="1">
                                                                <option value="">Month</option>
                                                                <option value="01">January</option>
                                                                <option value="02">February</option>
                                                                <option value="03">March</option>
                                                                <option value="04">April</option>
                                                                <option value="05">May</option>
                                                                <option value="06">June</option>
                                                                <option value="07">July</option>
                                                                <option value="08">August</option>
                                                                <option value="09">September</option>
                                                                <option value="10">October</option>
                                                                <option value="11">November</option>
                                                                <option value="12">December</option>
                                                            </select>
                                                            <label for="exp_month">Mes de Expiración*</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-material floating input-group">
                                                            <select class="form-control" id="exp_year" name="exp_year" size="1">
                                                                <option value="">Year</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                                <option value="2026">2026</option>
                                                                <option value="2027">2027</option>
                                                                <option value="2028">2028</option>
                                                                <option value="2029">2029</option>
                                                                <option value="2030">2030</option>
                                                            </select>
                                                        <label for="exp_year">Año de Exporación*</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-4">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="direction"
                                                                   name="direction"
                                                                   value="{{ old('direction') }}">
                                                            <label for="direction"># Dirección *</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-map"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="city"
                                                                   name="city"
                                                                   value="{{ old('city') }}">
                                                            <label for="cvv">Cuidad *</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-map-marker"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="country"
                                                                   name="country"
                                                                   value="{{ old('country') }}">
                                                            <label for="country">Pais *</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-map-pin"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-6">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="state"
                                                                   name="state"
                                                                   value="{{ old('state') }}">
                                                            <label for="state">Estado/Región *</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-map-signs"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="postal"
                                                                   name="postal"
                                                                   value="{{ old('postal') }}">
                                                            <label for="postal">Codigo Postal *</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-mail-reply"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        @if($mensaje)
                                                            @if($mensaje['tipo'] == 'success')
                                                                <button type="submit" class="btn btn-alt-primary">
                                                                    <i class="fa fa-arrow-right mr-5"></i> Reservar
                                                                </button>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade fade-right" id="btabs-animated-slideright-profile"
                                             role="tabpanel">
                                            <h4 class="font-w400">Datos Cliente Empresa</h4>
                                            <form action="{{route('completed')}}" method="POST">@csrf
                                                <input hidden value="{{$itinerary->id}}" name="id">
                                                <input hidden value="{{$passengers}}" name="passengers">
                                                <input hidden value="{{$first_class ??''}}" name="first_class">
                                                <input hidden value="{{$business ??''}}" name="business">
                                                <input hidden value="{{$economy ??''}}" name="economy">
                                                <input hidden value="company" name="client">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="primer_nombre2"
                                                                   name="primer_nombre2"
                                                                   value="{{ old('primer_nombre2') }}">
                                                            <label for="primer_nombre2">Primer Nombre</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="segundo_nombre2"
                                                                   name="segundo_nombre2"
                                                                   value="{{ old('segundo_nombre2') }}">
                                                            <label for="segundo_nombre2">Segundo Nombre</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="primer_apellido2"
                                                                   name="primer_apellido2"
                                                                   value="{{ old('primer_apellido2') }}">
                                                            <label for="primer_apellido2">Primer Apellido</label>
                                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control"
                                                                   id="segundo_apellido2" name="segundo_apellido2"
                                                                   value="{{ old('segundo_apellido2') }}">
                                                            <label for="segundo_apellido2">Segundo Apellido</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="tel_fijo2" name="tel_fijo2"
                                                                   value="{{ old('tel_fijo2') }}" data-mask="(000) 0000 0000">
                                                            <label for="tel_fijo2">Teléfono Fijo del Cliente</label>
                                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="tel_movil2" name="tel_movil2"
                                                                   value="{{ old('tel_movil2') }}" data-mask="(000) 0000 0000">
                                                            <label for="tel_movil2">Teléfono Móvil del Cliente</label>
                                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto"
                                                                   value="{{ old('nombre_contacto') }}">
                                                            <label for="nombre_contacto">Nombre del Contacto</label>
                                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user-o"></i>
                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa"
                                                                   value="{{ old('nombre_empresa') }}">
                                                            <label for="nombre_empresa">Nombre Empresa</label>
                                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-university"></i>
                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-6">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="nic" name="nic"
                                                                   value="{{ old('nic') }}" data-mask="00000000-0">
                                                            <label for="nic">NIC de Empresa</label>
                                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="nit" name="nit"

                                                                   value="{{ old('nit') }}" data-mask="0000-000000-000-0">
                                                            <label for="nit">NIT de Empresa</label>
                                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5>Datos de Pago</h5>
                                                <div class="form-group row">
                                                    <div class="col-6">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="cc_name"
                                                                   name="cc_name"
                                                                   value="{{ old('cc_name') }}">
                                                            <label for="cc_name">Nombre*</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-user"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-material floating input-group">
                                                            <input type="email" class="form-control" id="email"
                                                                   name="email"
                                                                   value="{{ old('email') }}">
                                                            <label for="email">Correo Electronico*</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-at"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-8">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="cc_number"
                                                                   name="cc_number"
                                                                   value="{{ old('cc_number') }}">
                                                            <label for="cc_number"># Tarjeta*</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-credit-card"></i>
                                                                </span>
                                                                <div class="form-text text-muted text-right"> <i class="fa fa-cc-visa"></i> <i class="fa fa-cc-mastercard"></i> <i class="fa fa-cc-amex"></i></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="cvv"
                                                                   name="cvv"
                                                                   value="{{ old('cvv') }}">
                                                            <label for="cvv"># Verificación/ CVV *</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-shield"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-6">
                                                        <div class="form-material floating input-group">
                                                            <select class="form-control" id="exp_month" name="exp_month" size="1">
                                                                <option value="">Month</option>
                                                                <option value="01">January</option>
                                                                <option value="02">February</option>
                                                                <option value="03">March</option>
                                                                <option value="04">April</option>
                                                                <option value="05">May</option>
                                                                <option value="06">June</option>
                                                                <option value="07">July</option>
                                                                <option value="08">August</option>
                                                                <option value="09">September</option>
                                                                <option value="10">October</option>
                                                                <option value="11">November</option>
                                                                <option value="12">December</option>
                                                            </select>
                                                            <label for="exp_month">Mes de Expiración*</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-material floating input-group">
                                                            <select class="form-control" id="exp_year" name="exp_year" size="1">
                                                                <option value="">Year</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                                <option value="2025">2025</option>
                                                                <option value="2026">2026</option>
                                                                <option value="2027">2027</option>
                                                                <option value="2028">2028</option>
                                                                <option value="2029">2029</option>
                                                                <option value="2030">2030</option>
                                                            </select>
                                                            <label for="exp_year">Año de Exporación*</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-4">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="direction"
                                                                   name="direction"
                                                                   value="{{ old('direction') }}">
                                                            <label for="direction"># Dirección *</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-map"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="city"
                                                                   name="city"
                                                                   value="{{ old('city') }}">
                                                            <label for="cvv">Cuidad *</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-map-marker"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="country"
                                                                   name="country"
                                                                   value="{{ old('country') }}">
                                                            <label for="country">Pais *</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-map-pin"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-6">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="state"
                                                                   name="state"
                                                                   value="{{ old('state') }}">
                                                            <label for="state">Estado/Región *</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-map-signs"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-material floating input-group">
                                                            <input type="text" class="form-control" id="postal"
                                                                   name="postal"
                                                                   value="{{ old('postal') }}">
                                                            <label for="postal">Codigo Postal *</label>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-mail-reply"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        @if($mensaje)
                                                            @if($mensaje['tipo'] == 'success')
                                                                <button type="submit" class="btn btn-alt-primary">
                                                                    <i class="fa fa-arrow-right mr-5"></i> Reservar
                                                                </button>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="{{ asset('/js/clientNatural/create.js') }}"></script>

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
