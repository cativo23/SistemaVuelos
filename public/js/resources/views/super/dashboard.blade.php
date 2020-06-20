@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])
@section('section', 'Dashboard')
@section('content')
    <!-- Page Content -->
    <div class="bg-primary-darker text-body-color-light">
        <div class="content content-top">
            <div class="row invisible" data-toggle="appear">
                <!-- Row #1 -->
                Este es el dashboard de super administrador <br>
                {{Auth::user()->name}}, estás logeado!
                <!-- END Row #1 -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
