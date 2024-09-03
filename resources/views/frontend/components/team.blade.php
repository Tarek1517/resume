<section id="team">
    <div class="container" data-aos="fade-up">
        @foreach ($settings as $item)
            <div class="section-header">
                <h3 class="section-title">{{ $item->team_title }}</h3>
                <p class="section-description">{{ $item->team_SubTitle }}</p>
            </div>
        @endforeach
        <div class="row">
            @foreach ($TeamData as $item)
                <div class="col-lg-3 col-md-6">

                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="pic"><img src="{{ url('/storage/img/' . $item->person_img) }}"></div>
                        <h4>{{ $item->name }}</h4>
                        <span>{{ $item->designation }}</span>
                        <div class="social">
                            @if ($item->facebook_link)
                                <a href="{{ $item->facebook_link }}"><i class="bi bi-facebook"></i></a>
                            @endif
                            @if ($item->twitter_link)
                                <a href="{{ $item->twitter_link }}"><i class="bi bi-facebook bi bi-twitter"></i></a>
                            @endif
                            @if ($item->insta_link)
                                <a href="{{ $item->insta_link }}"><i class="bi bi-instagram"></i></a>
                            @endif
                            @if ($item->linkedin_link)
                                <a href="{{ $item->linkedin_link }}"><i class="bi bi-linkedin"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
