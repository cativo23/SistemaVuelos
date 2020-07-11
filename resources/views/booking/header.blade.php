<header id="page-header" class="invisible" data-toggle="appear" data-class="animated fadeInDown">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="content-header-section">
            <!-- Logo -->
            <div class="content-header-item">
                <a class="link-effect font-w700 mr-5" href="/">
                    <span class="font-size-xl text-dual-primary-dark">voyarge</span>
                    <img style="height: 90%" src="{{ asset('media/favicons/voyarge_logo.png') }}" alt="">
                    <span class="font-size-xl text-primary"></span>
                </a>
            </div>
            <!-- END Logo -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="content-header-section">
            @if(!$user)
                <a class="btn btn-sm btn-hero btn-noborder btn-alt-primary px-20" href="/login">
                    <i class="si si-login"></i> <span class="ml-5 d-none d-sm-inline-block">Login</span>
                </a>
            @endif
            @if($user)
                <a class="btn btn-sm btn-hero btn-noborder btn-alt-success px-20" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                               document.getElementById('logout-form2').submit();">
                    <i class="si si-logout"></i> <span class="ml-5 d-none d-sm-inline-block">Log Out</span>
                </a>
                    <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            @endif
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->
</header>
