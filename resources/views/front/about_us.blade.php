@extends('front.layouts.app')

@section('content')

        <!-- ======= About us Section ======= -->

        {{-- <section id="about_us" class="about_us">
            <div class="container">

                <div class="row justify-content-center" data-aos="fade-up">

                <div class="col-lg-12">

                    <div class="info-wrap">
                        <div class="row">
                            <div class="col-lg-12 info">
                                <h4 style="text-align:center;">Visi</h4>
                                <div class="visi" style="text-align:center;">TERATAI HYDROFARM</div>
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-lg-12 info">
                                <h4 style="text-align:center;">Misi</h4>
                                <div class="misi" style="text-align:center;">TERATAI HYDROFARM</div>
                            </div>
                        </div>
                    </div>

                </div>

                </div>

                <div class="row mt-5 justify-content-center" data-aos="fade-up">
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up">
                        <div class="member-img">
                            <img src="front/assets/img/team/team-1.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>Walter White</h4>
                            <span>Chief Executive Officer</span>
                        </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <img src="front/assets/img/team/team-1.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>Sarah Jhonson</h4>
                            <span>Product Manager</span>
                        </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="200">
                        <div class="member-img">
                            <img src="front/assets/img/team/team-1.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>William Anderson</h4>
                            <span>CTO</span>
                        </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="300">
                        <div class="member-img">
                            <img src="front/assets/img/team/team-1.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>Amanda Jepson</h4>
                            <span>Accountant</span>
                        </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section --> --}}

        <!-- ======= Our Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2><strong>Visi</strong></h2>
          <p class="tim_kami_desc">{{$data['visi']->description}}</p>
        </div>

        <div class="section-title" data-aos="fade-up">
          <h2><strong>Misi</strong></h2>
          <p class="tim_kami_desc">{{$data['misi']->description}}</p>
        </div>
        <br><br>
        <div class="section-title" data-aos="fade-up">
          <h2><strong>Tim Kami</strong></h2>
        </div>

        <div class="row">
          @foreach($data['tim_kami'] as $tk)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member" data-aos="fade-up">
                <div class="member-img">
                  {{-- <img src="front/assets/img/team/team-1.jpg" class="img-fluid" alt=""> --}}
                  <img src="{{ asset('storage/images/' . $tk->image) }}" onerror="if (this.src != '{{$data['image_url']}}/default/600x600.jpg') this.src = '{{$data['image_url']}}/default/600x600.jpg';" alt="" class="img-fluid">
                </div>
                <div class="member-info">
                  <h4>{{$tk->nama}}</h4>
                  <span>{{$tk->description}}</span>
                </div>
              </div>
            </div>
          @endforeach

          {{-- <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="front/assets/img/team/team-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="front/assets/img/team/team-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="front/assets/img/team/team-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
              </div>
            </div>
          </div> --}}

        </div>

      </div>
    </section><!-- End Our Team Section -->
@endsection
