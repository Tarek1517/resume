<section id="services">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h3 class="section-title">{{$service->title}}</h3>
        <p class="section-description">{{$service->sub_title}}</p>
      </div>
      <div class="row">

        
        @foreach ($service->serviceFeatures as $serviceItem)

        <div class="col-lg-4 col-md-6" data-aos="zoom-in">
          <div class="box">
            <div class="icon"><a href=""><i class="<?php echo $serviceItem->features_icon ?>"></i></a></div>
            <h4 class="title"><a href="">{{$serviceItem->features_title}}</a></h4>
            <p class="description">{{$serviceItem->features_description}}</p>
          </div>
        </div>
        @endforeach

      </div>

    </div>
  </section>