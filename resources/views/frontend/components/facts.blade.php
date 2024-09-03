<section id="facts">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h3 class="section-title">{{ $fact->title }}</h3>
            <p class="section-description">{{ $fact->sub_title }}</p>
        </div>
        <div class="row counters">
            @foreach ($fact->factFeatures as $CounterItem)
                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $CounterItem->count_title }}"
                        data-purecounter-duration="1" class="purecounter"></span>
                    <p>{{ $CounterItem->count_subTitle }}</p>
                </div>
            @endforeach

        </div>

    </div>
</section>
