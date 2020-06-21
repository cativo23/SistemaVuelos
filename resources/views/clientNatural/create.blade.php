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
                                    @error('nfrecuente2') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="nfrecuente2" name="nfrecuente2"
                                                   @error('nfrecuente2') value="{{ old('nfrecuente2') }}" @enderror
                                                   @error('primernombre') value="{{ old('nfrecuente2') }}" @enderror
                                                   @error('segundonombre') value="{{ old('nfrecuente2') }}" @enderror
                                                   @error('primerapellido') value="{{ old('nfrecuente2') }}" @enderror
                                                   @error('segundoapellido') value="{{ old('nfrecuente2') }}" @enderror
                                                   @error('genero') value="{{ old('nfrecuente2') }}" @enderror
                                                   @error('estadocivil') value="{{ old('nfrecuente2') }}" @enderror
                                                   @error('tipodocumento') value="{{ old('nfrecuente2') }}" @enderror
                                                   @error('ndocumento') value="{{ old('nfrecuente2') }}" @enderror
                                                   @error('cumple') value="{{ old('nfrecuente2') }}" @enderror
                                                   @error('telfijo') value="{{ old('nfrecuente2') }}" @enderror
                                                   @error('telmovil') value="{{ old('nfrecuente2') }}" @enderror
                                                   @error('descripcion') value="{{ old('nfrecuente2') }}" @enderror
                                                   >

                                            <label for="codigo">N° Cliente Frecuente</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-hashtag"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('nfrecuente2')
                                        <div id="nfrecuente2-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('nfrecuente2')  </div> @enderror
                                </div>

                                <div class="col-md-4">
                                    @error('primernombre') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="primernombre" name="primernombre"
                                                   @error('nfrecuente2') value="{{ old('primernombre') }}" @enderror
                                                   @error('primernombre') value="{{ old('primernombre') }}" @enderror
                                                   @error('segundonombre') value="{{ old('primernombre') }}" @enderror
                                                   @error('primerapellido') value="{{ old('primernombre') }}" @enderror
                                                   @error('segundoapellido') value="{{ old('primernombre') }}" @enderror
                                                   @error('genero') value="{{ old('primernombre') }}" @enderror
                                                   @error('estadocivil') value="{{ old('primernombre') }}" @enderror
                                                   @error('tipodocumento') value="{{ old('primernombre') }}" @enderror
                                                   @error('ndocumento') value="{{ old('primernombre') }}" @enderror
                                                   @error('cumple') value="{{ old('primernombre') }}" @enderror
                                                   @error('telfijo') value="{{ old('primernombre') }}" @enderror
                                                   @error('telmovil') value="{{ old('primernombre') }}" @enderror
                                                   @error('descripcion') value="{{ old('primernombre') }}" @enderror
                                                   value="{{ old('primernombre') }}">
                                            <label for="nombrecorto">Primer Nombre</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('primernombre')
                                        <div id="nombrecorto-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('primernombre') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('segundonombre') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="segundonombre" name="segundonombre"
                                                   @error('nfrecuente2') value="{{ old('segundonombre') }}" @enderror
                                                   @error('primernombre') value="{{ old('segundonombre') }}" @enderror
                                                   @error('segundonombre') value="{{ old('segundonombre') }}" @enderror
                                                   @error('primerapellido') value="{{ old('segundonombre') }}" @enderror
                                                   @error('segundoapellido') value="{{ old('segundonombre') }}" @enderror
                                                   @error('genero') value="{{ old('segundonombre') }}" @enderror
                                                   @error('estadocivil') value="{{ old('segundonombre') }}" @enderror
                                                   @error('tipodocumento') value="{{ old('segundonombre') }}" @enderror
                                                   @error('ndocumento') value="{{ old('segundonombre') }}" @enderror
                                                   @error('cumple') value="{{ old('segundonombre') }}" @enderror
                                                   @error('telfijo') value="{{ old('segundonombre') }}" @enderror
                                                   @error('telmovil') value="{{ old('segundonombre') }}" @enderror
                                                   @error('descripcion') value="{{ old('segundonombre') }}" @enderror
                                                   value="{{ old('segundonombre') }}">
                                            <label for="nombreoficial">Segundo Nombre</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('segundonombre')
                                        <div id="nombreoficial-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('segundonombre') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('primerapellido') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="primerapellido" name="primerapellido"
                                                   @error('nfrecuente2') value="{{ old('primerapellido') }}" @enderror
                                                   @error('primernombre') value="{{ old('primerapellido') }}" @enderror
                                                   @error('segundonombre') value="{{ old('primerapellido') }}" @enderror
                                                   @error('primerapellido') value="{{ old('primerapellido') }}" @enderror
                                                   @error('segundoapellido') value="{{ old('primerapellido') }}" @enderror
                                                   @error('genero') value="{{ old('primerapellido') }}" @enderror
                                                   @error('estadocivil') value="{{ old('primerapellido') }}" @enderror
                                                   @error('tipodocumento') value="{{ old('primerapellido') }}" @enderror
                                                   @error('ndocumento') value="{{ old('primerapellido') }}" @enderror
                                                   @error('cumple') value="{{ old('primerapellido') }}" @enderror
                                                   @error('telfijo') value="{{ old('primerapellido') }}" @enderror
                                                   @error('telmovil') value="{{ old('primerapellido') }}" @enderror
                                                   @error('descripcion') value="{{ old('primerapellido') }}" @enderror
                                                   value="{{ old('primerapellido') }}">
                                            <label for="paisorigen">Primer Apellido</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('primerapellido')
                                        <div id="paisorigen-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('primerapellido') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('segundoapellido') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="segundoapellido" name="segundoapellido"
                                                   @error('nfrecuente2') value="{{ old('segundoapellido') }}" @enderror
                                                   @error('primernombre') value="{{ old('segundoapellido') }}" @enderror
                                                   @error('segundonombre') value="{{ old('segundoapellido') }}" @enderror
                                                   @error('primerapellido') value="{{ old('segundoapellido') }}" @enderror
                                                   @error('segundoapellido') value="{{ old('segundoapellido') }}" @enderror
                                                   @error('genero') value="{{ old('segundoapellido') }}" @enderror
                                                   @error('estadocivil') value="{{ old('segundoapellido') }}" @enderror
                                                   @error('tipodocumento') value="{{ old('segundoapellido') }}" @enderror
                                                   @error('ndocumento') value="{{ old('segundoapellido') }}" @enderror
                                                   @error('cumple') value="{{ old('segundoapellido') }}" @enderror
                                                   @error('telfijo') value="{{ old('segundoapellido') }}" @enderror
                                                   @error('telmovil') value="{{ old('segundoapellido') }}" @enderror
                                                   @error('descripcion') value="{{ old('segundoapellido') }}" @enderror
                                                   value="{{ old('segundoapellido') }}">
                                            <label for="email">Segundo Apellido</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('segundoapellido')
                                        <div id="email-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('segundoapellido') </div> @enderror
                                </div>

                                <div class="col-md-4">
                                    @error('genero')<div class="form-group is-invalid">@enderror
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
                                    @error('estadocivil')<div class="form-group is-invalid">@enderror
                                        <div class="form-material floating">
                                            @php ($estados=['Casado/a', 'Comprometido/a', 'Divorciado/a','Noviazgo', 'Separado/a', 'Soltero/a', 'Viudo/a', 'Unión libre'])
                                            <select class="form-control" id="estadocivil" name="estadocivil">
                                                <option selected="selected" disabled></option>
                                                @foreach($estados as $estado)
                                                    <option value="{{ $estado }}"
                                                            @if ( old('estadocivil')  == $estado)
                                                            selected
                                                        @endif
                                                    >{{ $estado }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="estadocivil">Estado Civil</label>
                                        </div>
                                        @error('estadocivil')<div id="val-skill2-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                        @error('estadocivil')</div>@enderror
                                </div>

                                <div class="col-md-4">
                                    @error('tipodocumento')<div class="form-group is-invalid">@enderror
                                        <div class="form-material floating">
                                            @php ($documentos=['DUI', 'NIT', 'Pasaporte'])
                                            <select class="form-control" id="tipodocumento" name="tipodocumento">
                                                <option selected="selected" disabled></option>
                                                @foreach($documentos as $documento)
                                                    <option value="{{ $documento }}"
                                                        @if ( old('tipodocumento')  == $documento)
                                                            selected
                                                        @elseif ('DUI' == $documento))
                                                            selected
                                                        @endif
                                                    >{{ $documento }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="tipodocumento">Tipo de Documento</label>
                                        </div>
                                        @error('tipodocumento')<div id="val-skill2-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>@enderror
                                        @error('tipodocumento')</div>@enderror
                                </div>


                                <div id="formatodui" style="display: inline" class="col-md-4">
                                    @error('ndocumento') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="ndocumento2" name="ndocumento"
                                                   @error('nfrecuente2') value="{{ old('ndocumento') }}" @enderror
                                                   @error('primernombre') value="{{ old('ndocumento') }}" @enderror
                                                   @error('segundonombre') value="{{ old('ndocumento') }}" @enderror
                                                   @error('primerapellido') value="{{ old('ndocumento') }}" @enderror
                                                   @error('segundoapellido') value="{{ old('ndocumento') }}" @enderror
                                                   @error('genero') value="{{ old('ndocumento') }}" @enderror
                                                   @error('estadocivil') value="{{ old('ndocumento') }}" @enderror
                                                   @error('tipodocumento') value="{{ old('ndocumento') }}" @enderror
                                                   @error('ndocumento') value="{{ old('ndocumento') }}" @enderror
                                                   @error('cumple') value="{{ old('ndocumento') }}" @enderror
                                                   @error('telfijo') value="{{ old('ndocumento') }}" @enderror
                                                   @error('telmovil') value="{{ old('ndocumento') }}" @enderror
                                                   @error('descripcion') value="{{ old('ndocumento') }}" @enderror
                                                   value="{{ old('ndocumento') }}" data-mask="00000000-0" maxlength="10"
                                            minlength="10">
                                            <label for="facebook">N° Documento</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('ndocumento')
                                        <div id="facebook-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('ndocumento') </div> @enderror
                                </div>
                                <div id="formatonit" style="display: none" class="col-md-4">
                                    @error('ndocumento') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="ndocumento3" name="ndocumento3"
                                                   @error('nfrecuente2') value="{{ old('ndocumento') }}" @enderror
                                                   @error('primernombre') value="{{ old('ndocumento') }}" @enderror
                                                   @error('segundonombre') value="{{ old('ndocumento') }}" @enderror
                                                   @error('primerapellido') value="{{ old('ndocumento') }}" @enderror
                                                   @error('segundoapellido') value="{{ old('ndocumento') }}" @enderror
                                                   @error('genero') value="{{ old('ndocumento') }}" @enderror
                                                   @error('estadocivil') value="{{ old('ndocumento') }}" @enderror
                                                   @error('tipodocumento') value="{{ old('ndocumento') }}" @enderror
                                                   @error('ndocumento') value="{{ old('ndocumento') }}" @enderror
                                                   @error('cumple') value="{{ old('ndocumento') }}" @enderror
                                                   @error('telfijo') value="{{ old('ndocumento') }}" @enderror
                                                   @error('telmovil') value="{{ old('ndocumento') }}" @enderror
                                                   @error('descripcion') value="{{ old('ndocumento') }}" @enderror
                                                   value="{{ old('ndocumento') }}" data-mask="0000-000000-000-0">
                                            <label for="facebook">N° Documento</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('ndocumento')
                                        <div id="facebook-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('ndocumento') </div> @enderror
                                </div>

                                <div id="formatopasaporte" style="display: none" class="col-md-4" >
                                    @error('ndocumento') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="ndocumento4" name="ndocumento4"
                                                   @error('nfrecuente2') value="{{ old('ndocumento') }}" @enderror
                                                   @error('primernombre') value="{{ old('ndocumento') }}" @enderror
                                                   @error('segundonombre') value="{{ old('ndocumento') }}" @enderror
                                                   @error('primerapellido') value="{{ old('ndocumento') }}" @enderror
                                                   @error('segundoapellido') value="{{ old('ndocumento') }}" @enderror
                                                   @error('genero') value="{{ old('ndocumento') }}" @enderror
                                                   @error('estadocivil') value="{{ old('ndocumento') }}" @enderror
                                                   @error('tipodocumento') value="{{ old('ndocumento') }}" @enderror
                                                   @error('ndocumento') value="{{ old('ndocumento') }}" @enderror
                                                   @error('cumple') value="{{ old('ndocumento') }}" @enderror
                                                   @error('telfijo') value="{{ old('ndocumento') }}" @enderror
                                                   @error('telmovil') value="{{ old('ndocumento') }}" @enderror
                                                   @error('descripcion') value="{{ old('ndocumento') }}" @enderror
                                                   value="{{ old('ndocumento') }}" data-mask="A 00000000">
                                            <label for="facebook">N° Documento</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-id-card"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('ndocumento')
                                        <div id="facebook-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('ndocumento') </div> @enderror
                                </div>

                                <div class="col-md-4">
                                    @error('cumple') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input ttype="text" class="form-control"  data-allow-input="true" id="cumple" name="cumple"
                                                   @error('nfrecuente2') value="{{ old('cumple') }}" @enderror
                                                   @error('primernombre') value="{{ old('cumple') }}" @enderror
                                                   @error('segundonombre') value="{{ old('cumple') }}" @enderror
                                                   @error('primerapellido') value="{{ old('cumple') }}" @enderror
                                                   @error('segundoapellido') value="{{ old('cumple') }}" @enderror
                                                   @error('genero') value="{{ old('cumple') }}" @enderror
                                                   @error('estadocivil') value="{{ old('cumple') }}" @enderror
                                                   @error('tipodocumento') value="{{ old('cumple') }}" @enderror
                                                   @error('ndocumento') value="{{ old('cumple') }}" @enderror
                                                   @error('cumple') value="{{ old('cumple') }}" @enderror
                                                   @error('telfijo') value="{{ old('cumple') }}" @enderror
                                                   @error('telmovil') value="{{ old('cumple') }}" @enderror
                                                   @error('descripcion') value="{{ old('cumple') }}" @enderror
                                                   value="{{ old('cumple') }}">
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
                                <!--datepickers-->
                                <!--
                                <div class="col-md-4">

                                </div>
                                -->
                                <div class="col-md-4">
                                    @error('telfijo') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="telfijo" name="telfijo"
                                                   @error('nfrecuente2') value="{{ old('telfijo') }}" @enderror
                                                   @error('primernombre') value="{{ old('telfijo') }}" @enderror
                                                   @error('segundonombre') value="{{ old('telfijo') }}" @enderror
                                                   @error('primerapellido') value="{{ old('telfijo') }}" @enderror
                                                   @error('segundoapellido') value="{{ old('telfijo') }}" @enderror
                                                   @error('genero') value="{{ old('telfijo') }}" @enderror
                                                   @error('estadocivil') value="{{ old('telfijo') }}" @enderror
                                                   @error('tipodocumento') value="{{ old('telfijo') }}" @enderror
                                                   @error('ndocumento') value="{{ old('telfijo') }}" @enderror
                                                   @error('cumple') value="{{ old('telfijo') }}" @enderror
                                                   @error('telfijo') value="{{ old('telfijo') }}" @enderror
                                                   @error('telmovil') value="{{ old('telfijo') }}" @enderror
                                                   @error('descripcion') value="{{ old('telfijo') }}" @enderror
                                                   value="{{ old('telfijo') }}" data-mask="(000) 0000 0000">
                                            <label for="telfijo">Teléfono fijo</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('telfijo')
                                        <div id="twitter-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                        @error('telfijo') </div> @enderror
                                </div>
                                <div class="col-md-4">
                                    @error('telmovil') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="telmovil" name="telmovil"
                                                   @error('nfrecuente2') value="{{ old('telmovil') }}" @enderror
                                                   @error('primernombre') value="{{ old('telmovil') }}" @enderror
                                                   @error('segundonombre') value="{{ old('telmovil') }}" @enderror
                                                   @error('primerapellido') value="{{ old('telmovil') }}" @enderror
                                                   @error('segundoapellido') value="{{ old('telmovil') }}" @enderror
                                                   @error('genero') value="{{ old('telmovil') }}" @enderror
                                                   @error('estadocivil') value="{{ old('telmovil') }}" @enderror
                                                   @error('tipodocumento') value="{{ old('telmovil') }}" @enderror
                                                   @error('ndocumento') value="{{ old('telmovil') }}" @enderror
                                                   @error('cumple') value="{{ old('telmovil') }}" @enderror
                                                   @error('telfijo') value="{{ old('telmovil') }}" @enderror
                                                   @error('telmovil') value="{{ old('telmovil') }}" @enderror
                                                   @error('descripcion') value="{{ old('telmovil') }}" @enderror
                                                   value="{{ old('telmovil') }}" data-mask="(000) 0000 0000">
                                            <label for="whatsapp">Teléfono Móvil</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('telmovil')
                                        <div id="whatsapp-error" class="invalid-feedback animated fadeInDown">{{ $message }}</div>
                                        @enderror
                                    @error('telmovil') </div> @enderror
                                </div>

                                <div class="col-md-8">
                                    @error('direccion') <div class="form-group is-invalid"> @enderror
                                        <div class="form-material floating input-group">
                                            <input type="text" class="form-control" id="direccion" name="direccion"
                                                   @error('nfrecuente2') value="{{ old('direccion') }}" @enderror
                                                   @error('primernombre') value="{{ old('direccion') }}" @enderror
                                                   @error('segundonombre') value="{{ old('direccion') }}" @enderror
                                                   @error('primerapellido') value="{{ old('direccion') }}" @enderror
                                                   @error('segundoapellido') value="{{ old('direccion') }}" @enderror
                                                   @error('genero') value="{{ old('direccion') }}" @enderror
                                                   @error('estadocivil') value="{{ old('direccion') }}" @enderror
                                                   @error('tipodocumento') value="{{ old('direccion') }}" @enderror
                                                   @error('ndocumento') value="{{ old('direccion') }}" @enderror
                                                   @error('cumple') value="{{ old('direccion') }}" @enderror
                                                   @error('telfijo') value="{{ old('direccion') }}" @enderror
                                                   @error('telmovil') value="{{ old('direccion') }}" @enderror
                                                   @error('descripcion') value="{{ old('direccion') }}" @enderror
                                                   value="{{ old('direccion') }}">
                                            <label for="whatsapp">Dirección</label>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-map-o"></i>
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
