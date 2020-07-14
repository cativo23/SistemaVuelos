@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="bg-primary-darker text-body-color-light">
        <div class="content content-top">
            <div class="row" data-toggle="appear">
                <div class="col-12 col-md-12 col-xl-8">
                    <div class="block-content block-content-full block-rounded block-transparent bg-black-op text-body-color-light">

                        <div class="row py-10">
                            <div class="col-8 text-right border-white-op-r">
                                <div class="js-appear-enabled animated fadeInLeft" data-toggle="appear" data-class="animated fadeInLeft">
                                    <!--
                                    <div class="font-size-h3 font-w600 text-info">63250</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Accounts</div> -->
                                    <div class="col-12 col-sm-12 text-center text-sm-left">
                                        <div class="font-size-h4 font-w600">José Ricardo Sosa Hernández</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">
                                            <i class="fa fa-envelope"></i> email
                                        </div>
                                        <div class="font-w600 text-info">
                                            <i class="fa fa-users"></i> Cliente
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="js-appear-enabled animated fadeInRight" data-toggle="appear" data-class="animated fadeInRight">

                                    <div class="font-size-h3 font-w600 text-info">username</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Nombre de usuario</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-6 col-md-6 col-xl-2">
                    <a class="block block-rounded block-transparent bg-black-op text-body-color-light text-center" href="be_pages_generic_inbox.html">
                        <div class="block-content ribbon ribbon-bookmark ribbon-success ribbon-left">
                            <div class="ribbon-box">Vuelos</div>
                            <p class="mt-5">
                                <i class="si si-plane fa-3x text-muted"></i>
                            </p>
                            <p class="font-w600 text-uppercase">Comprar</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-6 col-xl-2">
                    <a class="block block-rounded block-transparent bg-black-op text-body-color-light text-center" href="be_pages_generic_inbox.html">
                        <div class="block-content ribbon ribbon-bookmark ribbon-warning ribbon-left">
                            <div class="ribbon-box">500</div>
                            <p class="mt-5">
                                <i class="si si-star fa-3x text-muted"></i>
                            </p>
                            <p class="font-w600 text-uppercase">Millas</p>
                        </div>
                    </a>
                </div>


            </div>
            <div class="row invisible" data-toggle="appear">
                <div class="col-12 col-md-12 col-xl-3">
                    <div class="row">
                        <!-- Row #1 -->
                        <div class="col-12 ">
                            <div class="row">
                                <div class="col-12 col-xl-12">
                                    <a class="block block-rounded block-transparent bg-black-op text-body-color-light text-right" href="javascript:void(0)">
                                        <div class="block-content block-content-full clearfix">
                                            <div class="float-left mt-10 d-none d-sm-block">
                                                <i class="si si-plane fa-3x text-muted"></i>
                                            </div>
                                            <div class="font-size-h3 font-w600"><span data-toggle="countTo" data-speed="1000" data-to="25">0</span></div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Viajes Realizados</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-xl-12">
                                    <a class="block block-rounded block-transparent bg-black-op text-body-color-light text-right" href="javascript:void(0)">
                                        <div class="block-content block-content-full clearfix">
                                            <div class="float-left mt-10 d-none d-sm-block">
                                                <i class="si si-clock fa-3x text-muted"></i>
                                            </div>
                                            <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="50">0</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Horas de vuelo</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-xl-12">
                                    <a class="block block-rounded block-transparent bg-black-op text-body-color-light text-right" href="javascript:void(0)">
                                        <div class="block-content block-content-full clearfix">
                                            <div class="float-left mt-10 d-none d-sm-block">
                                                <i class="si si-globe-alt fa-3x text-muted"></i>
                                            </div>
                                            <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="5068">0</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Millas recorridas</div>
                                        </div>
                                    </a>
                                </div>


                            </div>
                        </div>



                        <!-- END Row #1 -->
                    </div>
                </div>
                <div class="col-12 col-md-12 col-xl-9">
                    <div class="row">
                        <div class="col-12 col-md-5 col-xl-4">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-xl-12">
                                    <a class="block block-rounded block-transparent bg-black-op text-body-color-light text-right" href="javascript:void(0)">
                                        <div class="block-content block-content-full clearfix">
                                            <div class="float-left mt-10 d-none d-sm-block">
                                                <i class="fa fa-calendar fa-3x text-muted"></i>
                                            </div>
                                            <div class="font-size-h4 font-w600" >15-JUL-2020</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Próximo viaje</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-xl-12">
                                    <a class="block block-rounded block-transparent bg-black-op text-body-color-light text-right" href="javascript:void(0)">
                                        <div class="block-content block-content-full clearfix">
                                            <div class="float-left mt-10 d-none d-sm-block">
                                                <i class="fa fa-ticket fa-3x text-muted"></i>
                                            </div>
                                            <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="2">0</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Boletos</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-xl-12">
                                    <a class="block block-rounded block-transparent bg-black-op text-body-color-light text-right" href="javascript:void(0)">
                                        <div class="block-content block-content-full clearfix">
                                            <div class="float-left mt-10 d-none d-sm-block">
                                                <i class="fa fa-star fa-3x text-muted"></i>
                                            </div>
                                            <div class="font-size-h4 font-w600" >Primera Clase</div>
                                            <div class="font-size-sm font-w600 text-uppercase text-muted">Asientos</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-7 col-xl-8">

                            <div class="block">
                                <div class="block-content block-content-full text-center bg-gd-sea">
                                    <div class="p-1 mb-10">
                                        <i class="fa fa-3x fa-map text-white-op"></i>
                                    </div>
                                    <p class="font-size-lg font-w600 text-white mb-0">Itinerario
                                    </p>
                                    <p class="font-size-sm text-uppercase font-w600 text-white-op mb-0">
                                        Escalas 1
                                    </p>
                                </div>
                                <div class="block-content block-content-full">
                                    <table class="table table-borderless table-striped table-hover mb-0">
                                        <tbody>
                                        <tr>
                                            <td class="text-center">01</td>
                                            <td>
                                                <strong>San Luis Talpa, El Salvador</strong>
                                            </td>
                                            <td class="text-center">
                                                <strong class="text-success">4:00 AM</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">02</td>
                                            <td>
                                                <strong>Georgia, Estado Unidos</strong>
                                            </td>
                                            <td class="text-center">
                                                <strong class="text-success">1:30 PM</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">03</td>
                                            <td>
                                                <strong>Toronto, Canadá</strong>
                                            </td>
                                            <td class="text-center">
                                                <strong class="text-success">6:00 PM</strong>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            <div class="row">
                <!-- Row #2 -->
                <div class="col-md-6 col-xl-4">

                    <div class="block">
                        <div class="block-content block-content-full text-center bg-gd-earth">
                            <div class="p-1 mb-10">
                                <i class="fa fa-3x fa-dollar text-white-op"></i>
                            </div>
                            <p class="font-size-lg font-w600 text-white mb-0">Ofertas
                            </p>
                            <p class="font-size-sm text-uppercase font-w600 text-white-op mb-0">
                                Top 5
                            </p>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-borderless table-striped table-hover mb-0">
                                <tbody>
                                <tr>
                                    <td class="text-center" style="width: 40px;">01</td>
                                    <td>
                                        <strong>Half Life 2</strong>
                                    </td>
                                    <td class="text-center" style="width: 40px;">
                                        <strong class="text-success">9.6</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">02</td>
                                    <td>
                                        <strong>Grand Theft Auto V</strong>
                                    </td>
                                    <td class="text-center">
                                        <strong class="text-success">9.6</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">03</td>
                                    <td>
                                        <strong>The Orange Box</strong>
                                    </td>
                                    <td class="text-center">
                                        <strong class="text-success">9.6</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">04</td>
                                    <td>
                                        <strong>Half Life</strong>
                                    </td>
                                    <td class="text-center">
                                        <strong class="text-success">9.6</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">05</td>
                                    <td>
                                        <strong>BioShock</strong>
                                    </td>
                                    <td class="text-center">
                                        <strong class="text-success">9.6</strong>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="block-content block-content-full text-center bg-body-light">
                            <a class="btn btn-alt-secondary" href="javascript:void(0)">
                                <i class="fa fa-eye mr-5"></i> Ver más..
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="block">
                        <div class="block-content block-content-full text-center bg-gd-dusk">
                            <div class="p-1 mb-10">
                                <i class="fa fa-3x fa-paper-plane text-white-op"></i>
                            </div>
                            <p class="font-size-lg font-w600 text-white mb-0">
                                Más Frecuentados
                            </p>
                            <p class="font-size-sm text-uppercase font-w600 text-white-op mb-0">
                                Top 5
                            </p>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-borderless table-striped table-hover mb-0">
                                <tbody>
                                <tr>
                                    <td class="text-center" style="width: 40px;">01</td>
                                    <td>
                                        <strong>The Godfather</strong>
                                    </td>
                                    <td class="text-center" style="width: 40px;">
                                        <strong class="text-success">9.2</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">02</td>
                                    <td>
                                        <strong>The Shawshank Redemption</strong>
                                    </td>
                                    <td class="text-center">
                                        <strong class="text-success">9.3</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">03</td>
                                    <td>
                                        <strong>Schindler's List </strong>
                                    </td>
                                    <td class="text-center">
                                        <strong class="text-success">8.9</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">04</td>
                                    <td>
                                        <strong>Raging Bull</strong>
                                    </td>
                                    <td class="text-center">
                                        <strong class="text-success">8.2</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">05</td>
                                    <td>
                                        <strong>Casablanca</strong>
                                    </td>
                                    <td class="text-center">
                                        <strong class="text-success">8.5</strong>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="block-content block-content-full text-center bg-body-light">
                            <a class="btn btn-alt-secondary" href="javascript:void(0)">
                                <i class="fa fa-eye mr-5"></i> Ver más..
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="block">
                        <div class="block-content block-content-full text-center bg-gd-cherry">
                            <div class="p-1 mb-10">
                                <i class="fa fa-3x fa-user text-white-op"></i>
                            </div>
                            <p class="font-size-lg font-w600 text-white mb-0">
                                Mis Destinos
                            </p>
                            <p class="font-size-sm text-uppercase font-w600 text-white-op mb-0">
                                Top 5
                            </p>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-borderless table-striped table-hover mb-0">
                                <tbody>
                                <tr>
                                    <td class="text-center" style="width: 40px;">01</td>
                                    <td>
                                        <strong>Planet Earth II</strong>
                                    </td>
                                    <td class="text-center" style="width: 40px;">
                                        <strong class="text-success">9.5</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">02</td>
                                    <td>
                                        <strong>Band of Brothers</strong>
                                    </td>
                                    <td class="text-center">
                                        <strong class="text-success">9.5</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">03</td>
                                    <td>
                                        <strong>Planet Earth</strong>
                                    </td>
                                    <td class="text-center">
                                        <strong class="text-success">9.5</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">04</td>
                                    <td>
                                        <strong>Game of Thrones</strong>
                                    </td>
                                    <td class="text-center">
                                        <strong class="text-success">9.4</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">05</td>
                                    <td>
                                        <strong>Breaking Bad</strong>
                                    </td>
                                    <td class="text-center">
                                        <strong class="text-success">9.4</strong>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="block-content block-content-full text-center bg-body-light">
                            <a class="btn btn-alt-secondary" href="javascript:void(0)">
                                <i class="fa fa-eye mr-5"></i> Ver más..
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END Row #2 -->
            </div>

        </div>
    </div>
    <!-- END Page Content -->
@endsection
