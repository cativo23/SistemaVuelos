@extends('layouts.backend', ['sidebar'=>$sidebar??'layouts.sidebar', 'header'=>$header??'layouts.header', 'footer'=>$footer??'layouts.footer'])

@section('content')
    <!-- Page Content -->
    <!-- Hero -->
    <div class="bg-image bg-image-bottom" style="background-image: url({{ asset('/media/photos/photo13@2x.jpg') }});">
        <div class="bg-primary-dark-op py-30">
            <div class="content content-full text-center">
                <!-- Avatar -->
                <div class="mb-15">
                    <a class="img-link" href="#">
                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{asset('/media/avatars/avatar15.jpg')}}" alt="">
                    </a>
                </div>
                <!-- END Avatar -->

                <!-- Personal -->
                <h1 class="h3 text-white font-w700 mb-10">
                   {{$user->name}}
                </h1>
                <h2 class="h5 text-white-op">
                    {{ $user->username }}
                </h2>
                <!-- END Personal -->

                <!-- Actions -->
                <a class="btn btn-rounded btn-hero btn-alt-danger btn-sm btn-alt-secondary mb-5 px-20">
                    <i class="fa fa-close"></i>
                </a>
                <a class="btn btn-rounded btn-hero btn-sm btn-alt-secondary mb-5 px-20" href="{{route('super.users.edit', $user)}}">
                    <i class="fa fa-pencil"></i>
                </a>
                <!-- END Actions -->
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="bg-primary-darker text-body-color-light">
        <div class="content">
            <h2 class="content-heading text-white">
                <i class="si si-power text-white mr-5"></i> Roles
            </h2>
            <div class="row items-push">
                @if(count($user->roles)>0)
                    @foreach($user->roles as $role)
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-rounded text-center">
                                <div class="block-content block-content-full">
                                    <div class="item item-circle bg-danger text-danger-light mx-auto my-20">
                                        <i class="fa fa-superpowers"></i>
                                    </div>
                                </div>
                                <div class="block-content block-content-full block-content-sm bg-body-dark">
                                    <div class="font-w600 text-black mb-5">{{$role->name}}</div>
                                    <div class="font-size-sm text-muted">{{$role->title}}</div>
                                </div>
                                <div class="block-content block-content-full">
                                    <a class="btn btn-rounded btn-alt-secondary" href="javascript:void(0)">
                                        <i class="fa fa-pencil mr-5"></i>Edit Role
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">No Roles Asignados</div>
                @endif
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection


@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection
