@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])


@section('content')
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo34@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-50 pb-20">
                    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                        data-class="animated fadeInUp">Eliminar</h1>
                    <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                        data-class="animated fadeInUp">"{{ $Destination->city }}"</h2>
                </div>
            </div>
        </div>
    </div>
<main id="main-container">
    <!-- Page Content -->
    <div class="content">

		<h2 class="content-heading">¿Desea eliminar el destino "{{ $Destination->city }}"?</h2>
		<div class="row">
			<div class="col-md-8">
				<div class="block">
			        <div class="block-header block-header-default">
			            <h3 class="block-title">Información Destino <small></small></h3>
			        </div>
			        <div class="block-content">
                        <form action="{{ route('destinations.destroy', $Destination->id)}}" method="post">
                        	@method('DELETE')
                        	@csrf
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $Destination->city }}" disabled="">
                                        <label for="ciudad">Ciudad</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="estado" name="estado" value="{{ $Destination->state }}" disabled>
                                        <label for="estado">Estado</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="pais" name="pais" value="{{ $Destination->country }}" disabled>
                                        <label for="pais">País</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $Destination->code }}" disabled>
                                        <label for="codigo">Código de Destino</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-material floating input-group">
                                        <input type="text" class="form-control" id="continente" name="continente" value="{{ $Destination->continent }}" disabled>
                                        <label for="codigo">Continente</label>

                                    </div>
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-md-9">

                                    <button type="submit" class="btn btn-square btn-outline-primary min-width-125 mb-10" data-toggle="click-ripple">Eliminar</button>
                                    <a href="{{ route('destinations.index')}}" type="button" class="btn btn-square btn-outline-danger min-width-125 mb-10">Cancelar</a>
                                </div>
                            </div>
                        </form>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</main>
@endsection
