<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
    <div class="container">

        <div class="owl-carousel testimonials-carousel">
            @forelse ($testimonies as $testimony)
            <div class="testimonial-item">
                <img src="{{ asset('storage/' . $testimony->images) }}" class="testimonial-img" alt="images" style="width: 100px;height: 100px;object-fit: cover">
                <h3>{{ $testimony->name }}</h3>
                <h4>{{ $testimony->profession }}</h4>
                <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    {{ $testimony->message }}
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
            </div>
            @empty
            <div class="testimonial-item">
                <img src="{{ asset('landing/img/testimonials/testimonials-1.jpg') }}" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus.
                    Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
            </div>
            @endforelse
        </div>

    </div>
</section><!-- End Testimonials Section -->
