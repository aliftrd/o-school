<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title">
            <h2>Portfolio</h2>
            <p>{{ $setting['portfolio_text_description'] }}</p>
        </div>

        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach ($categories as $category)
                    <li data-filter=".filter-{{ $category->slug }}">{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row portfolio-container">
            @forelse ($projects as $project)
            <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $project->category->slug }}">
                <div class="portfolio-wrap">
                    <img src="{{ asset('storage/' . $project->images) }}" class="img-fluid" alt="" style="width: 100%;height: 300px;object-fit: cover;">
                    <div class="portfolio-info">
                        <h4>{{ $project->title }}</h4>
                        <p>{{ $project->description }}</p>
                        <div class="portfolio-links">
                            <a href="{{ asset('storage/' . $project->images) }}" data-gall="portfolioGallery" class="venobox"
                                title="{{ $project->title }}"><i class="bx bx-fullscreen"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-lg-4 col-md-6 portfolio-item filter-*">
                <div class="portfolio-wrap">
                    <img src="{{ asset('landing/img/portfolio/portfolio-1.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Lorem</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <div class="portfolio-links">
                            <a href="{{ asset('landing/img/portfolio/portfolio-1.jpg') }}" data-gall="portfolioGallery" class="venobox"
                                title="Lorem"><i class="bx bx-fullscreen"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-*">
                <div class="portfolio-wrap">
                    <img src="{{ asset('landing/img/portfolio/portfolio-2.jpg') }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>Lorem</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                        <div class="portfolio-links">
                            <a href="{{ asset('landing/img/portfolio/portfolio-2.jpg') }}" data-gall="portfolioGallery" class="venobox"
                                title="Lorem"><i class="bx bx-fullscreen"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

    </div>
</section><!-- End Portfolio Section -->
