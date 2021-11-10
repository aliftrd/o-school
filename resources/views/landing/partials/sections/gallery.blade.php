<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">
    <div class="container">

        <div class="section-title">
            <h2>Gallery</h2>
            <p>{{ $setting['gallery_text_description'] }}</p>
        </div>

        <div class="row no-gutters">
            @forelse ($galleries as $gallery)
            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="{{ asset('storage/' . $gallery->images) }}" class="venobox" data-gall="gallery-item">
                        <img src="{{ asset('storage/' . $gallery->images) }}" alt="Image" class="img-fluid" style="width: 100%;height: 300px;object-fit: cover;">
                    </a>
                </div>
            </div>
            @empty
            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="{{ asset('landing/img/gallery/gallery-1.jpg') }}" class="venobox" data-gall="gallery-item">
                        <img src="{{ asset('landing/img/gallery/gallery-1.jpg') }}" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="{{ asset('landing/img/gallery/gallery-2.jpg') }}" class="venobox" data-gall="gallery-item">
                        <img src="{{ asset('landing/img/gallery/gallery-2.jpg') }}" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="{{ asset('landing/img/gallery/gallery-3.jpg') }}" class="venobox" data-gall="gallery-item">
                        <img src="{{ asset('landing/img/gallery/gallery-3.jpg') }}" alt="" class="img-fluid">
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                    <a href="{{ asset('landing/img/gallery/gallery-4.jpg') }}" class="venobox" data-gall="gallery-item">
                        <img src="{{ asset('landing/img/gallery/gallery-4.jpg') }}" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
            @endforelse

        </div>

    </div>
</section><!-- End Gallery Section -->
