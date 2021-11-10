<!DOCTYPE html>
<html lang="en">

<head>
    @include('landing.components.head')
</head>

<body>

    @include('landing.partials.header')
    @include('landing.partials.hero')

    <main id="main">
        @include('landing.partials.sections.portfolio')
        @include('landing.partials.sections.testimonial')
        @include('landing.partials.sections.gallery')

        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="container py-4">
                <div class="copyright">
                    &copy; Copyright <strong><span>{{ $setting['title'] }}</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Crafted with <i class="icofont-heart text-danger"></i> by <a href="https://github.com/aliftrd">ALFTRI</a>
                </div>
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

        @include('landing.components.script')

</body>

</html>
