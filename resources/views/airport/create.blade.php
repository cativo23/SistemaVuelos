@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <style>
        /***
	TYPEAHEAD for MDB
	by djibe
***/

        .typeahead {
            z-index: 1051;
        }


        /*If using icon span before input, like <i class="fa fa-asterisk prefix"></i>*/

        span.twitter-typeahead {
            width: calc(100% - 3rem);
            margin-left: 3rem;
        }


        /* Aspect of the dropdown of results*/

        .typeahead.dropdown-menu,
        span.twitter-typeahead .tt-menu {
            min-width: 100%;
            background: white;
            /*as large as input*/
            border: none;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .16), 0 2px 10px 0 rgba(0, 0, 0, .12);
            border-radius: 0;
            font-size: 1.2rem;
        }


        /*Aspect of results, done*/

        span.twitter-typeahead .tt-suggestion {
            color: #4285F4;
            cursor: pointer;
            padding: 1rem;
            text-transform: capitalize;
            font-weight: 400;
        }


        /*Hover a result, done*/

        span.twitter-typeahead .active.tt-suggestion,
        span.twitter-typeahead .tt-suggestion.tt-cursor,
        span.twitter-typeahead .active.tt-suggestion:focus,
        span.twitter-typeahead .tt-suggestion.tt-cursor:focus,
        span.twitter-typeahead .active.tt-suggestion:hover,
        span.twitter-typeahead .tt-suggestion.tt-cursor:hover {
            background-color: #EEEEEE;
            color: #4285F4;
        }

        label.active {
            color: #4285F4 !important;
        }

    </style>
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
    <script src="{{asset('js/plugins/typeahead/typeahead.bundle.min.js')}}"></script>
    <script>

        $('#pais').on('focus', function() {
            $(this).parent().siblings().addClass('active');
        }).on('blur', function() {
            if (!$(this).val()) {
                $(this).parent().siblings().removeClass('active');
            }
        });

        const countries = new Bloodhound({
            datumTokenizer: datum => Bloodhound.tokenizers.whitespace(datum.value),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                wildcard: '%QUERY',
                url: 'https://wft-geo-db.p.rapidapi.com/v1/geo/countries?namePrefix=%QUERY',
                // Map the remote source JSON array to a JavaScript objct array
                transform: response => $.map(response.data, country => ({
                    value: country.name
                })),
                prepare: function (query, settings) {
                    settings.url = settings.url.replace('%QUERY', query);
                    settings.headers = {
                        "x-rapidapi-host": "wft-geo-db.p.rapidapi.com",
                        "x-rapidapi-key":"68c27db63bmsh025c862d9e8289dp1d894ajsn8bc66ab37e1d"
                    };
                    return settings;
                },
                templates: {
                    empty: '<div class="empty-message">No results found</div>',
                }
            }
        });

        // Instantiate the Typeahead UI
        $('#pais').typeahead(null, {
            display: 'value',
            source: countries
        });
    </script>
@endsection
{{--INICIO CONTENIDO--}}
@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Nuevo Aeropuerto</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">""</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <div class="col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Formulario Nuevo Aeropuerto</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">

                        <form action="{{ route('airports.store') }}" method="post">@csrf
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="nombre" name="nombre">
                                        <label for="ciudad">Nombre</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa  fa-align-justify "></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="codigo" name="codigo">
                                        <label for="estado">Codigo</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa ffa-barcode"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="representante" name="representante">
                                        <label for="pais">Representante</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="terminales" name="terminales">
                                        <label for="codigo">N. Terminales</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-sitemap"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="telefono" name="telefono">
                                        <label for="codigo">Telefono</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="ciudad" name="ciudad">
                                        <label for="codigo">Ciudad</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-map-marker"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating">
                                        <input type="text" class="form-control" id="pais" name="pais">
                                        <label for="pais">Pais</label>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-md-9">

                                    <button type="submit" class="btn btn-square btn-outline-primary min-width-125 mb-10" data-toggle="click-ripple">Guardar</button>
                                    <a href="{{ url('/airport') }}" type="button" class="btn btn-square btn-outline-danger min-width-125 mb-10">Cancelar</a>
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

