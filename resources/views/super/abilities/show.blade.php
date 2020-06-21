@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])
@section('section', "Edit Role ".$ability->name)
@section('content')
    <!-- Page Content -->
    <!-- Hero -->
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo13@2x.jpg') }});">
        <div class="bg-primary-dark-op py-30">
            <div class="content content-full text-center">
                <!-- Avatar -->
                <div class="mb-15">
                    <a class="img-link" href="#">
                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{asset('/media/avatars/avatar0.jpg')}}" alt="">
                    </a>
                </div>
                <!-- END Avatar -->

                <!-- Personal -->
                <h1 class="h3 text-white font-w700 mb-10">
                   {{$ability->name}}
                </h1>
                <h2 class="h5 text-white-op">
                    {{ $ability->title }}
                </h2>
                <!-- END Personal -->

                <!-- Actions -->
                <a type="button" class="btn btn-rounded btn-hero btn-alt-danger btn-sm btn-alt-secondary mb-5 px-20"   data-toggle="modal" onclick="deleteData({{$ability->id}}, '{{$ability->Title}}')"
                        data-target="#modal-fadein"><i class="fa fa-close"></i></a>
                <a class="btn btn-rounded btn-hero btn-sm btn-alt-secondary mb-5 px-20" href="{{route('super.abilities.edit', $ability)}}">
                    <i class="fa fa-pencil"></i>
                </a>
                <!-- END Actions -->
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <!-- END Page Content -->
    <div class="modal fade" id="modal-fadein" tabindex="-1" role="dialog" aria-labelledby="modal-fadein"
         aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form action="" method="POST" id="deleteForm" onsubmit="return confirm('Estas seguro?');" style="display: inline-block;">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Eliminar usuario</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <p>Desea borrar el rol: <span class="font-weight-bold" id="role_name"></span> </p>
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-alt-success" data-dismiss="modal">
                            <i class="fa fa-check"></i> Si, borrar.
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('css_before')
@endsection

@section('js_after')
    <!-- Page JS Code -->
    <script>
        function deleteData(id, role_name)
        {
            console.log(role_name);
            let id_n = id;
            var url = '{{ route("super.abilities.destroy", ":id") }}';
            url = url.replace(':id', id_n);
            $("#deleteForm").attr('action', url);
            $('#role_name').append(role_name);
        }
    </script>
@endsection
