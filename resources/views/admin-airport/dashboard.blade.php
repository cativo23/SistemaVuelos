@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer',  'airport'=> $airport])

@section('content')
    <!-- Page Content -->
    <div class="bg-primary-darker text-body-color-light">
        <div class="content content-top">

            <!-- Row #1 -->


            <div class="row">
                <div class="col-md-8">

                    <div class="block-content block-content-full block-rounded block-transparent bg-black-op text-body-color-light">

                        <div class="row py-20">
                            <div class="col-8 text-right border-white-op-r">
                                <div class="js-appear-enabled animated fadeInLeft" data-toggle="appear" data-class="animated fadeInLeft">
                                    <!--
                                    <div class="font-size-h3 font-w600 text-info">63250</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Accounts</div> -->
                                    <div class="col-12 col-sm-12 text-center text-sm-left">
                                        <div class="font-size-h4 font-w600">{{$user->name}}</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">
                                            <i class="fa fa-envelope"></i> {{$user->email}}
                                        </div>
                                        <div class="font-w600 text-info">
                                            <i class="fa fa-user"></i>Administrador del Aeropuerto {{$aeropuerto->name}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="js-appear-enabled animated fadeInRight" data-toggle="appear" data-class="animated fadeInRight">

                                    <div class="font-size-h3 font-w600 text-info">{{$user->username}}</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Nombre de usuario</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <!-- Row #5 -->
                        <div class="col-6 col-sm-6 col-md-4 col-xl-4">
                            <a class="block block-rounded block-transparent bg-black-op text-body-color-light text-center" href="be_pages_generic_inbox.html">
                                <div class="block-content ribbon ribbon-bookmark ribbon-success ribbon-left">
                                    <div class="ribbon-box">{{count($salientes)}}</div>
                                    <p class="mt-5">
                                        <i class="si si-call-out fa-2x text-muted"></i>
                                    </p>
                                    <p class="font-w600 text-uppercase">Vuelos Salientes</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-xl-4">
                            <a class="block block-rounded block-transparent bg-black-op text-body-color-light text-center" href="be_pages_forum_categories.html">
                                <div class="block-content ribbon ribbon-bookmark ribbon-info ribbon-left">
                                    <div class="ribbon-box">{{count($salientes)}}</div>
                                    <p class="mt-5">
                                        <i class="si si-call-in fa-2x text-muted"></i>
                                    </p>
                                    <p class="font-w600 text-uppercase">Vuelos Entrantes</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-xl-4">
                            <a class="block block-rounded block-transparent bg-black-op text-body-color-light text-center" href="be_pages_forum_categories.html">
                                <div class="block-content ribbon ribbon-bookmark ribbon-warning ribbon-left">
                                    <div class="ribbon-box">{{count($terminal)}}</div>
                                    <p class="mt-5">
                                        <i class="si si-chart fa-2x text-muted"></i>
                                    </p>
                                    <p class="font-w600 text-uppercase">Terminales</p>
                                </div>
                            </a>
                        </div>

                        <!-- END Row #5 -->
                        <div class="col-6 col-xl-6">
                            <a class="block block-rounded block-transparent bg-black-op text-body-color-light text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-arrow-up fa-3x text-muted"></i>
                                    </div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Asignar terminales salientes</div>
                                </div>
                            </a>
                        </div>

                        <div class="col-6 col-xl-6">
                            <a class="block block-rounded block-transparent bg-black-op text-body-color-light text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-arrow-down fa-3x text-muted"></i>
                                    </div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Asignar terminales entrantes</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="block">
                        <div class="block-content block-content-full text-center bg-gd-sea">
                            <div class="p-1 mb-10">
                                <i class="fa fa-3x fa-user-plus text-white-op"></i>
                            </div>
                            <p class="font-size-lg font-w600 text-white mb-0">
                                Últimos Vuelos
                            </p>
                            <p class="font-size-sm text-uppercase font-w600 text-white-op mb-0">
                                Top 5
                            </p>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped table-hover mb-0">
                                    <tbody>
                                    @if (count($vuelos_ultimos) === 0)
                                        <tr>
                                            <td class="text-center"></td>
                                            <td>
                                                <strong>Aún no se registran vuelos</strong>
                                            </td>
                                            <td class="text-center">
                                                <strong class="text-success"></strong>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach( $vuelos_ultimos as $user)
                                            <tr>
                                                <td class="text-center">{{ $user->airline->short_name }}</td>
                                                <td style="white-space: nowrap;text-overflow: ellipsis;">
                                                    <strong class="text-success">{{ $user->destination }}</strong>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                                </div>
                        </div>
                        <div class="block-content block-content-full text-center bg-body-light">

                            <a class="btn btn-alt-secondary" href="javascript:void(0)">
                                <i class="fa fa-eye mr-5"></i> Ver más..
                            </a>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-12 col-md-4 col-xl-4 d-flex align-items-stretch">
                    <div class="block block-transparent bg-primary-dark d-flex align-items-center w-100">

                        <div class="block-content block-content-full">
                            <div class="py-15 px-20 clearfix border-black-op-b">
                                <div class="float-right mt-15 d-none d-sm-block">
                                    <i class="si si-pointer fa-2x text-info"></i>
                                </div>
                                <div class="font-size-h3 font-w600 text-info js-count-to-enabled" data-toggle="countTo"
                                     data-speed="1000" data-to="260">{{count($vuelos)}}</div>
                                <div class="font-size-sm font-w600 text-uppercase text-info-light">Vuelos asignados</div>
                            </div>

                            <div class="py-15 px-20 clearfix border-black-op-b">
                                <div class="float-right mt-15 d-none d-sm-block">
                                    <i class="si si-plane fa-2x text-success"></i>
                                </div>
                                <div class="font-size-h3 font-w600 text-success">
                                    <span data-toggle="countTo" data-speed="1000" data-to="980"
                                          class="js-count-to-enabled">{{$vuelos_done}}
                                    </span>
                                </div>
                                <div class="font-size-sm font-w600 text-uppercase text-danger-light">Vuelos realizados</div>
                            </div>

                            <div class="py-15 px-20 clearfix border-black-op-b">
                                <div class="float-right mt-15 d-none d-sm-block">
                                    <i class="si si-pencil fa-2x text-warning"></i>
                                </div>
                                <div class="font-size-h3 font-w600 text-warning js-count-to-enabled"
                                     data-toggle="countTo" data-speed="1000" data-to="38">{{$vuelos_gestionar}}
                                </div>
                                <div class="font-size-sm font-w600 text-uppercase text-warning-light">Vuelos por gestionar</div>
                            </div>

                            <div class="py-15 px-20 clearfix">
                                <div class="float-right mt-15 d-none d-sm-block">
                                    <i class="si si-ban fa-2x text-danger"></i>
                                </div>
                                <div class="font-size-h3 font-w600 text-danger js-count-to-enabled"
                                     data-toggle="countTo" data-speed="1000" data-to="59">{{$vuelos_cancelled}}</div>
                                <div class="font-size-sm font-w600 text-uppercase text-danger-light">Vuelos cancelados</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8">


                    <div class="block block-rounded block-themed block-transparent bg-black-op">
                        <div class="block-header bg-transparent">
                            <h3 class="block-title">
                                Vuelvos <small>Estadísticas</small>
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="row items-push">
                                <div class="col-6 col-sm-3 col-md-3 text-center text-sm-left">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Este Año</div>
                                    <div class="font-size-h4 font-w600">25</div>
                                    <div class="font-w600 text-success">
                                        <i class="fa fa-caret-up"></i> +25%
                                    </div>

                                </div>
                                <div class="col-6 col-sm-3 col-md-3 text-center text-sm-left">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Este Mes</div>
                                    <div class="font-size-h4 font-w600">5</div>
                                    <div class="font-w600 text-success">
                                        <i class="fa fa-caret-up"></i> +15%
                                    </div>

                                </div>

                                <div class="col-6 col-sm-3 col-md-3 text-center text-sm-left">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Prom Mensual</div>
                                    <div class="font-size-h4 font-w600">15.6</div>
                                    <!--
                                    <div class="font-w600 text-success">
                                        <i class="fa fa-caret-up"></i> +9%
                                    </div>
                                    -->
                                </div>
                                <div class="col-6 col-sm-3 col-md-3 text-center text-sm-left">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Prom Semanal</div>
                                    <div class="font-size-h4 font-w600">3</div>
                                    <!--
                                    <div class="font-w600 text-danger">
                                        <i class="fa fa-caret-down"></i> -3%
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="pull-all"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <!-- Lines Chart Container functionality is initialized in js/pages/db_dark.min.js which was auto compiled from _es6/pages/db_dark.js -->
                                <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                                <canvas class="js-chartjs-dark-lines chartjs-render-monitor" style="display: block;
                                width: 519px; height: 160px;" width="519" height="160"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Row #1 -->

        </div>
    </div>
    <!-- END Page Content -->

@endsection


@section('js_after')
    <script src="{{ asset('/js/plugins/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/pages/db_dark.min.js') }}"></script>




@endsection
