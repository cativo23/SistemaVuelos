@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Nuevo Cliente Natural</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Cree Un Nuevo Cliente Natural</h2>
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
                        <h3 class="block-title">Formulario Cliente Natural</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="fa fa-user"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">
                        <form action="{{ route('clientNaturals.store') }}" method="post">@csrf
                            <div class="form-group row">
                                <div class="col-md-4">
                                    @error('n_frecuente') <div class="form-group input-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="n_frecuente2" name="n_frecuente2"
                                                   value="{{ $numero_cliente }}" disabled>

                                            <label for="n_frecuente2">N° Cliente Frecuente</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-hashtag"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('n_frecuente')
                                        <div id="nfrecuente2-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('n_frecuente')  </div> @enderror
                                    <input style="display: none" type="text" class="form-control"
                                           id="n_frecuente" name="n_frecuente" value="{{ $numero_cliente }}">
                                </div>

                                <div class="col-md-4">
                                    @error('primer_nombre') <div class="form-group input-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="primer_nombre" name="primer_nombre"
                                                   value="{{ old('primer_nombre') }}">
                                            <label for="primer_nombre">Primer Nombre</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('primer_nombre')
                                        <div id="nombrecorto-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('primer_nombre') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('segundo_nombre') <div class="form-group input-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre"
                                                   value="{{ old('segundo_nombre') }}">
                                            <label for="segundo_nombre">Segundo Nombre</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('segundo_nombre')
                                        <div id="nombreoficial-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('segundo_nombre') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('primer_apellido') <div class="form-group input-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido"
                                                   value="{{ old('primer_apellido') }}">
                                            <label for="primer_apellido">Primer Apellido</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('primer_apellido')
                                        <div id="paisorigen-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('primer_apellido') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('segundo_apellido') <div class="form-group input-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido"
                                                   value="{{ old('segundo_apellido') }}">
                                            <label for="segundo_apellido">Segundo Apellido</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('segundo_apellido')
                                        <div id="email-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('segundo_apellido') </div> @enderror
                                </div>

                                <div class="col-md-4">
                                    @error('cumple') <div class="form-group input-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input ttype="text" class="form-control"  data-allow-input="true" id="cumple" name="cumple"
                                                   value="{{ old('cumple') }}" data-mask="00-00-0000">
                                            <label for="cumple">Cumpleaños</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-birthday-cake"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('cumple')
                                        <div id="instagram-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('cumple') </div> @enderror
                                </div>

                                <div class="col-md-4">
                                    @error('genero')<div class="form-group input-group is-invalid">@enderror
                                        <div class="form-material floating">
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
                                        @error('genero')<div id="val-skill2-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                        @error('genero')</div>@enderror
                                </div>




                                <div class="col-md-4">
                                    @error('estado_civil')<div class="form-group input-group is-invalid">@enderror
                                        <div class="form-material floating">
                                            @php ($estados=['Casado/a', 'Comprometido/a', 'Divorciado/a','Noviazgo', 'Separado/a', 'Soltero/a', 'Viudo/a', 'Unión libre'])
                                            <select class="form-control" id="estado_civil" name="estado_civil">
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
                                        @error('estado_civil')<div id="val-skill2-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                        @error('estado_civil')</div>@enderror
                                </div>

                                <div class="col-md-4">
                                    @error('tipo_documento')<div class="form-group input-group is-invalid">@enderror
                                        <div class="form-material floating">
                                            @php ($documentos=['DUI', 'NIT', 'Pasaporte'])
                                            <select class="form-control" id="tipo_documento" name="tipo_documento">
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
                                        @error('tipo_documento')<div id="val-skill2-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                        @error('tipo_documento')</div>@enderror
                                </div>


                                <div id="formatodui" style="display: inline" class="col-md-4">
                                    @error('n_documento') <div class="form-group input-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="n_documento1" name="n_documento1"
                                                   value="{{ old('n_documento') }}" data-mask="00000000-0" maxlength="10"
                                            minlength="10">
                                            <label for="n_documento1">N° Documento</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('n_documento')
                                        <div id="facebook-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('n_documento') </div> @enderror
                                </div>
                                <div id="formatonit" style="display: none" class="col-md-4">
                                    @error('n_documento') <div class="form-group input-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="n_documento2" name="n_documento2"
                                                   value="{{ old('n_documento') }}" data-mask="0000-000000-000-0">
                                            <label for="n_documento2">N° Documento</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('n_documento')
                                        <div id="facebook-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('n_documento') </div> @enderror
                                </div>

                                <div id="formatopasaporte" style="display: none" class="col-md-4" >
                                    @error('n_documento') <div class="form-group input-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="n_documento3" name="n_documento3"
                                                   value="{{ old('n_documento') }}" data-mask="A-00000000">
                                            <label for="n_documento3">N° Documento</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('n_documento')
                                        <div id="facebook-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('n_documento') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('tel_fijo') <div class="form-group input-group is-invalid"> @enderror
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
                                        @error('tel_fijo')
                                        <div id="twitter-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('tel_fijo') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('tel_movil') <div class="form-group input-group is-invalid"> @enderror
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
                                        @error('tel_movil')
                                        <div id="whatsapp-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('tel_movil') </div> @enderror
                                </div>

                                <div class="col-md-8">
                                    @error('direccion') <div class="form-group input-group is-invalid"> @enderror
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
                                        @error('direccion')
                                        <div id="whatsapp-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('direccion') </div> @enderror
                                </div>


                            </div>


                            <br>
                            <div class="form-group row">
                                <div class="col-md-9">

                                    <button type="submit" class="btn btn-square btn-outline-primary min-width-125 mb-10" data-toggle="click-ripple">Guardar</button>
                                    <a href="{{ route('clientNaturals.index')}}" type="button" class="btn btn-square btn-outline-danger min-width-125 mb-10">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- jQuery Validation functionality is initialized in js/pages/be_forms_validation.min.js which was auto compiled from _es6/pages/be_forms_validation.js -->
            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->









        </div>
    </main>
    <!-- END Page Content -->
@endsection

@section('css_before')
@endsection

@section('js_after')
    <script src="{{ asset('/js/codebase.core.min.js') }}"></script>
    <!--
      Codebase JS

      Custom functionality including Blocks/Layout API as well as other vital and optional helpers
      webpack is putting everything together at assets/_es6/main/app.js
  -->


    <!-- Page JS Plugins -->
    <script src="{{ asset('/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/jquery-validation/additional-methods.js') }}"></script>



    <!-- Page JS Code -->
    <script src="{{ asset('/js/pages/be_forms_validation.min.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>



    <script src="{{ asset('/js/clientNatural/create.js') }}"></script>


    <script src="{{ asset('/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/js/plugins/flatpickr/flatpickr.min.js') }}"></script>

    <!-- Page JS Helpers (Select2 plugin) -->
    <script>jQuery(function(){ Codebase.helpers('select2','flatpickr','datepicker'); });</script>



@endsection
