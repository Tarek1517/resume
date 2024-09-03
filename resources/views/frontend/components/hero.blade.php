<section id="hero" style="background-image:url('{{ asset('/storage/img/' . $heroHome->bg_img) }}');">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
        <h1>{{ $heroHome->title }}</h1>
        <h2>{{ $heroHome->sub_title }}</h2>
        <a href="{{ url(asset('/storage/resume/' . $heroHome->resume)) }}" class="btn-get-started">Download
            Resume</a>
    </div>
</section>