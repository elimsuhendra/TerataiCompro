@extends('front.layouts.app')

@section('content')
    <style>
        .container .row{
            {{-- background: white; --}}
        }
    </style>
    <!-- ======= Contact Section ======= -->
    <div class="map-section">
        <iframe style="border:0; width: 100%; height: 500px;" src="{{$data['site_map_source']->value}}" frameborder="0" allowfullscreen></iframe>
    </div>

    <section id="contact" class="contact">
    <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">

        <div class="col-lg-12">

            <div class="info-wrap">
                <h4 style="text-align:center;">Kontak Unit Bisnis</h4><br><br><br>
                    <div class="row">
                        <div class="col-lg-3 info">
                            <div>{{$data['kontak_unit_bisnis_1']['name']}}</div>
                        </div>
                        <div class="col-lg-3 info mt-4 mt-lg-0">
                            <div>{{$data['kontak_unit_bisnis_1']['phone']}}</div>
                        </div>

                        <div class="col-lg-3 info mt-4 mt-lg-0">
                            <div>{{$data['kontak_unit_bisnis_1']['email']}}</div>
                        </div>

                        <div class="col-lg-3 info mt-4 mt-lg-0">
                            <div class="header-social-links d-flex">
                                <div><a target="_blank" href="{{$data['kontak_unit_bisnis_1']['facebook']}}" class="facebook"><i class="bu bi-facebook"></i></a></div>
                                <div><a target="_blank" href="{{$data['kontak_unit_bisnis_1']['instagram']}}" class="instagram"><i class="bu bi-instagram"></i></a></div>
                                <div><a target="_blank" href="{{$data['kontak_unit_bisnis_1']['tiktok']}}" class="tiktok"><i class="bu bi-tiktok"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 info">
                            <div>{{$data['kontak_unit_bisnis_2']['name']}}</div>
                        </div>
                        <div class="col-lg-3 info mt-4 mt-lg-0">
                            <div>{{$data['kontak_unit_bisnis_2']['phone']}}</div>
                        </div>

                        <div class="col-lg-3 info mt-4 mt-lg-0">
                            <div>{{$data['kontak_unit_bisnis_2']['email']}}</div>
                        </div>

                        <div class="col-lg-3 info mt-4 mt-lg-0">
                            <div class="header-social-links d-flex">
                                <div><a target="_blank" href="{{$data['kontak_unit_bisnis_2']['facebook']}}" class="facebook"><i class="bu bi-facebook"></i></a></div>
                                <div><a target="_blank" href="{{$data['kontak_unit_bisnis_2']['instagram']}}" class="instagram"><i class="bu bi-instagram"></i></a></div>
                                <div><a target="_blank" href="{{$data['kontak_unit_bisnis_2']['tiktok']}}" class="tiktok"><i class="bu bi-tiktok"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 info">
                            <div>{{$data['kontak_unit_bisnis_3']['name']}}</div>
                        </div>
                        <div class="col-lg-3 info mt-4 mt-lg-0">
                            <div>{{$data['kontak_unit_bisnis_3']['phone']}}</div>
                        </div>

                        <div class="col-lg-3 info mt-4 mt-lg-0">
                            <div>{{$data['kontak_unit_bisnis_3']['email']}}</div>
                        </div>

                        <div class="col-lg-3 info mt-4 mt-lg-0">
                            <div class="header-social-links d-flex">
                                <div><a target="_blank" href="{{$data['kontak_unit_bisnis_3']['facebook']}}" class="facebook"><i class="bu bi-facebook"></i></a></div>
                                <div><a target="_blank" href="{{$data['kontak_unit_bisnis_3']['instagram']}}" class="instagram"><i class="bu bi-instagram"></i></a></div>
                                <div><a target="_blank" href="{{$data['kontak_unit_bisnis_3']['tiktok']}}" class="tiktok"><i class="bu bi-tiktok"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 info">
                            <div>{{$data['kontak_unit_bisnis_4']['name']}}</div>
                        </div>
                        <div class="col-lg-3 info mt-4 mt-lg-0">
                            <div>{{$data['kontak_unit_bisnis_4']['phone']}}</div>
                        </div>

                        <div class="col-lg-3 info mt-4 mt-lg-0">
                            <div>{{$data['kontak_unit_bisnis_4']['email']}}</div>
                        </div>

                        <div class="col-lg-3 info mt-4 mt-lg-0">
                            <div class="header-social-links d-flex">
                                <div><a target="_blank" href="{{$data['kontak_unit_bisnis_4']['facebook']}}" class="facebook"><i class="bu bi-facebook"></i></a></div>
                                <div><a target="_blank" href="{{$data['kontak_unit_bisnis_4']['instagram']}}" class="instagram"><i class="bu bi-instagram"></i></a></div>
                                <div><a target="_blank" href="{{$data['kontak_unit_bisnis_4']['tiktok']}}" class="tiktok"><i class="bu bi-tiktok"></i></a></div>
                            </div>
                        </div>
                    </div>
            </div>

        </div>

        </div>

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
            <div class="col-lg-10">
                <form action="./contact_us/create" method="post" role="form" class="php-email-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="pesan" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>

        </div>

    </div>
    </section><!-- End Contact Section -->

@endsection
