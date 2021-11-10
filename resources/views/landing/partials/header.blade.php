<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        {{-- <a href="{{ url('/') }}" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
        --}}
        <!-- Uncomment below if you prefer to use text as a logo -->
        <h1 class="logo mr-auto"><a href="{{ url('/') }}">{{ $setting['title'] ?? config('app.name') }}</a></h1>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="#hero">Home</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                <li><a href="#gallery">Gallery</a></li>
                @auth
                <div class="ml-3 dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Console
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('home') }}">Dashboard</a>
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        class="dropdown-item text-danger">Log out</a>
                    </div>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @endauth
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->
