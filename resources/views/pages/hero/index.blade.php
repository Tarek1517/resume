<section id="hero" style="background-image:url('{{ asset('/storage/img/' . $list_info->bg_img) }}');">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
        <h1>{{ $list_info->title }}</h1>
        <h2>{{ $list_info->sub_title }}</h2>
        <a href="{{ url(asset('/storage/resume/' . $list_info->resume)) }}" class="btn-get-started">Download
            Resume</a>
    </div>
</section>