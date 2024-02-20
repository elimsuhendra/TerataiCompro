@extends('front.layouts.app')

@section('content')
    <style>
        .img-fluid{
            width: 100%;
        }
    </style>
     <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-12 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="{{ asset('storage/images/' . $data['data']->image) }}" onerror="if (this.src != '{{$data['image_url']}}/default/600x600.jpg') this.src = '{{$data['image_url']}}/default/600x600.jpg';" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html">{{$data["data"]->judul}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">{{$data['data']->name}}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{$data['data']->created_at}}</time></a></li>
                  {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li> --}}
                </ul>
              </div>

              <div class="entry-content">
                <?php
                echo $data['data']->content;
                ?>
              </div>
            </article><!-- End blog entry -->

          

          </div><!-- End blog entries list -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->
@endsection