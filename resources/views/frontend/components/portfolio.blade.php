<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">
        @foreach ($settings as $item)
            <div class="section-header">
                <h3 class="section-title">{{ $item->Portfolio_title }}</h3>
                <p class="section-description">{{ $item->Portfolio_SubTitle }}</p>
            </div>
        @endforeach

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    @if ($categories->count() > 0)
                        @foreach ($categories as $category)
                            <li data-filter="{{ '.' . $category->Slug }}">{{ $category->name }}</li>
                        @endforeach
                    @endif
                    {{-- <li data-filter=".filter-card">Card</li>
                    <li data-filter=".filter-web">Web</li> --}}
                </ul>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @if ($portfolios->count() > 0)
                @foreach ($portfolios as $porfolio)
                    @php
                        $categoryNames = [];
                        $categorySlugs = [];
                        foreach ($porfolio->categories as $pcat) {
                            $categoryNames[] = $pcat->name;
                            $categorySlugs[] = $pcat->Slug;
                        }
                    @endphp

                    <div class="col-lg-4 col-md-6 portfolio-item {{ implode(' ', $categorySlugs) }}">
                        <img src="{{ asset('/storage/img/' . $porfolio->image) }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>{{ $porfolio->name }}</h4>
                            @foreach ($categoryNames as $pcat)
                                <p>{{ $pcat . ' ' }}</p>
                            @endforeach
                            <a href="{{ asset('/storage/img/' . $porfolio->image) }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>

                        </div>
                    </div>
                @endforeach
            @endif


        </div>

    </div>
</section>
