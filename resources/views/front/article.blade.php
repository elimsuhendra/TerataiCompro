@extends('front.layouts.app')

@section('content')
    <style>
       .blog .blog-pagination li{
          margin: 0 !important;
        }

      .active>.page-link, .page-link.active{
        background: url();
        border-color: unset;
      }
      .blog .entry .entry-img{
        position: relative;
        overflow: hidden;
        height: 28vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }
    </style>

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-12 col-md-12 col-xs-12 entries">
            <div class="row">
                {{$data['data']}}
                @foreach($data['data'] as $datas)
                  <div class="col-lg-4 entries">
                      <article class="entry">

                      <div class="entry-img">
                          <img src="{{ asset('storage/images/' . $datas->image) }}" onerror="if (this.src != '{{$data['image_url']}}/default/600x600.jpg') this.src = '{{$data['image_url']}}/default/600x600.jpg';" alt="" class="img-fluid">
                      </div>

                      <h2 class="entry-title">
                          <a href="article_detail?serial=1">{{$datas->judul}}</a>
                      </h2>

                      <div class="entry-meta">
                          <ul>
                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="article_detail?id=1">{{$datas->name}}</a></li>
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="article_detail?id=1"><time datetime="2020-01-01">{{$datas->created_at}}</time></a></li>
                          </ul>
                      </div>

                      <div class="entry-content">
                          <p>
                            <?php
                              echo substr($datas->content,0,100);
                            ?>
                          </p>
                          <div class="read-more">
                          <a href="article_detail?serial={{$datas->serial}}">Read More</a>
                          </div>
                      </div>

                      </article><!-- End blog entry -->
                  </div>
                @endforeach
            </div>

            {{-- <div class="blog-pagination">
              <ul class="justify-content-center">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul>
            </div> --}}

            <div class="blog-pagination">
                {{$data['data']->Links('pagination::bootstrap-5')}}
            </div>

          </div><!-- End blog entries list -->

          {{-- <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="#">General <span>(25)</span></a></li>
                  <li><a href="#">Lifestyle <span>(12)</span></a></li>
                  <li><a href="#">Travel <span>(5)</span></a></li>
                  <li><a href="#">Design <span>(22)</span></a></li>
                  <li><a href="#">Creative <span>(8)</span></a></li>
                  <li><a href="#">Educaion <span>(14)</span></a></li>
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="assets/img/blog/blog-recent-1.jpg" alt="">
                  <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/blog/blog-recent-2.jpg" alt="">
                  <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/blog/blog-recent-3.jpg" alt="">
                  <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/blog/blog-recent-4.jpg" alt="">
                  <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/blog/blog-recent-5.jpg" alt="">
                  <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar --> --}}

        </div>

      </div>
    </section><!-- End Blog Section -->
<script>
  $(document).ready(function(){
    $("nav[aria-label='Pagination Navigation']").hide();
  })
</script>
@endsection