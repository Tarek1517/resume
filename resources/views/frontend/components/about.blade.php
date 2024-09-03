<section id="about">
    <div class="container" data-aos="fade-up">
        <div class="row about-container gx-5">

            <div class="col-12 col-md-6">
                <h2 class="title">{{ $about->title }}</h2>
                <p>{{ $about->description }}</p>

                @foreach ($about->AboutFeatures as $featuresItem)
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="<?php echo $featuresItem->features_icon; ?>"></i></div>
                        <h4 class="title"><a href="">{{ $featuresItem->features_title }}</a></h4>
                        <p class="description">{{ $featuresItem->features_description }}</p>
                    </div>
                @endforeach

            </div>

            <div class="col-12 col-md-6">
                <img src="{{ asset('/storage/img/' . $about->image_path) }}" alt="Responsive image" class="rounded"
                    width="100%" height="auto" valign="center">
            </div>

        </div>

    </div>
</section>
