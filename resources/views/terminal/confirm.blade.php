@extends('layouts.backend')



{{--INICIO CONTENIDO--}}
@section('content')
    <!-- Page Content -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <!--
            <div class="my-50 text-center">
                <h2 class="font-w700 text-black mb-10">Nuevo Destino</h2>
                <h3 class="h5 text-muted mb-0">Plugin Integration</h3>
            </div>
            -->
            <!-- Info -->
            <!--
         <div class="row justify-content-center">
             <div class="col-md-6">
                 <div class="block">
                     <div class="block-content">
                         <p class="text-muted">
                             This page showcases how easily you can add a plugin’s JS/CSS assets and init it using custom JS code.
                         </p>
                     </div>
                 </div>
             </div>
         </div>
         -->
            <!-- END Info -->


            <h2 class="content-heading">¿Desea eliminar la terminal <strong>{{$Terminal->code}}</strong>? </h2>

            <div class="col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Eliminar Terminal</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="si si-wrench"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">

                        <form action="{{ route('gateway.destroy', $Terminal->id) }}" method="post">@csrf

                            @method('DELETE')
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="code" name="code" value="{{$Terminal->code}}" disabled>
                                        <label for="ciudad">Codigo</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa  fa-align-justify "></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="code" name="code" value="{{$Terminal->Airport->name}}" disabled>
                                        <label for="ciudad">Codigo</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa  fa-align-justify "></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-md-9">

                                    <button type="submit" class="btn btn-square btn-outline-danger min-width-125 mb-10" data-toggle="click-ripple">Eliminar</button>
                                    <a href="#" type="button" class="btn btn-square btn-outline-primary min-width-125 mb-10">Cancelar</a>
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

{{--FIN DE CONTENIDO--}}

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>

@section('js_after')

    <script src="{{ asset('/js/codebase.core.min.js') }}"></script>
    <!--
      Codebase JS

      Custom functionality including Blocks/Layout API as well as other vital and optional helpers
      webpack is putting everything together at assets/_es6/main/app.js
  -->

    <script src="{{ asset('/js/codebase.app.min.js') }}"></script>

@endsection
