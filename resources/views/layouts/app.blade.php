<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.head')
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg bg-primary"></div>
            @include('admin.components.topbar')
            @include('admin.components.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('content-title')</h1>
                    </div>

                    @include('admin.components.message')
                    @yield('content-body')
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2021
                </div>
                <div class="footer-right">
                    Crafted with <i class="fas fa-heart text-danger"></i> By <a href="https://github.com/aliftrd">ALFTRI</a>
                </div>
            </footer>
        </div>
    </div>

    @include('admin.components.script')
</body>

</html>
