@extends('front.layouts.app')

@section('content')
 <!-- ======= Hero Section ======= -->
  <section id="hero">
     <style>
        .title_product{
            text-align: center;
            display: block !important;
            margin-bottom: 10px;
        }
        .row_center{
            align-items: center;
            justify-content: center;
        }
    </style>
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

        @foreach ($data['slide'] as $slide)
          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url({{ asset('storage/images/' . $slide->image) }});">
            <div class="carousel-container">
              <div class="carousel-content animate__animated animate__fadeInUp">
                <?php

                  echo $slide->description

                ?>
              </div>
            </div>
          </div>
        @endforeach

        <!-- Slide 2 -->
        {{-- <div class="carousel-item" style="background-image: url(front/assets/img/slide/slide-2.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Lorem Ipsum Dolor</h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div> --}}

        <!-- Slide 3 -->
        {{-- <div class="carousel-item" style="background-image: url(front/assets/img/slide/slide-3.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Sequi ea ut et est quaerat</h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div> --}}

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 col-md-12 align-items-stretch title_product"><h3>3 Top Produk Hidroponik</h3></div>
        </div>
           <div class="row row_center team">
              @foreach ($data['top_product_hidroponik'] as $top_product_hidroponik)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member aos-init aos-animate" data-aos="fade-up">
                    <div class="member-img">
                        <img src="{{ asset('storage/images/' . $top_product_hidroponik->image) }}" onerror="if (this.src != '{{$data['image_url']}}/default/600x600.jpg') this.src = '{{$data['image_url']}}/default/600x600.jpg';" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                        <h4>{{$top_product_hidroponik->nama}}</h4>
                        {{-- <span>Chief Executive Officer</span> --}}
                    </div>
                    </div>
                </div>
              @endforeach
          </div>

      </div>
    </section><!-- End Services Section -->

     <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 col-md-12 align-items-stretch title_product"><h3>3 Top Produk Cafe</h3></div>
        </div>

        <div class="row row_center team">
            @foreach ($data['top_product_cafe'] as $top_product_cafe)
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                  <div class="member aos-init aos-animate" data-aos="fade-up">
                  <div class="member-img"> 
                      <img src="{{ asset('storage/images/' . $top_product_cafe->image) }}" onerror="if (this.src != '{{$data['image_url']}}/default/600x600.jpg') this.src = '{{$data['image_url']}}/default/600x600.jpg';" class="img-fluid" alt="">
                  </div>
                  <div class="member-info">
                      <h4>{{$top_product_cafe->nama}}</h4>
                      {{-- <span>Chief Executive Officer</span> --}}
                  </div>
                  </div>
              </div>
            @endforeach
        </div>

      </div>
    </section><!-- End Services Section -->

     <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 col-md-12 align-items-stretch title_product"><h3>3 Top Produk Edu Farm</h3></div>
        </div>
        <div class="row row_center team">
            @foreach ($data['top_product_edufarm'] as $top_product_edufarm)
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                  <div class="member aos-init aos-animate" data-aos="fade-up">
                  <div class="member-img">
                      <img src="{{ asset('storage/images/' . $top_product_edufarm->image) }}" onerror="if (this.src != '{{$data['image_url']}}/default/600x600.jpg') this.src = '{{$data['image_url']}}/default/600x600.jpg';" class="img-fluid" alt="">
                  </div>
                  <div class="member-info">
                      <h4>{{$top_product_edufarm->nama}}</h4>
                      {{-- <span>Chief Executive Officer</span> --}}
                  </div>
                  </div>
              </div>
            @endforeach
        </div>
      </div>
    </section><!-- End Services Section -->
</main>
@endsection