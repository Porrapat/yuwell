<!doctype html>
<html>

<head>
    @include('frontend.inc_head')

    <?php $pageName = "home"; ?>
</head>

<body>
    @include('frontend.inc_menu')


    <section class="wrap_banner wow fadeInDown">
        <div class="owl-bannerSlide owl-carousel owl-theme">
            @foreach ($ban as $item)
            <div class="items">
                <figure class="show-desktop"><img src="{{url('local/public/'.$item->home_banner_img)}}" alt=""></figure>
                <!-- <figure class="show-mobile"><img src="images/banner-mb.jpg" alt=""></figure> -->
            </div>
            @endforeach
          
            {{-- <div class="items">
                <figure class="show-desktop"><img src="{{ asset('frontend/yuwell/images/img-banner-01.jpg') }}" alt=""></figure>
            </div>
            <div class="items">
                <figure class="show-desktop"><img src="{{ asset('frontend/yuwell/images/img-banner-01.jpg') }}" alt=""></figure>
            </div> --}}
        </div>
    </section>
    <section class="warp_welcome">
        <div class="container">
            <div class="row">
                <div class="col-12 pad-bottom wow fadeInDown">
                    <div class="topic-head text-center">Yuwell<span>thailand</span></div>
                    <div class="topic-sub">
                        {!! Str::limit(strip_tags($about->about_us_content_en), 300) !!}
                        {{-- {!! Str::limit(strip_tags($about->about_us_content_th), 25) !!} --}}
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="warp_products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="topic-head text-center wow fadeInDown">Products <span>Solutions</span></div>
                    <div class="row">
                        @foreach ($producttype as $item)
                        <div class="col-12 col-md-3 wow fadeInDown">
                            <a href="{{ url('/product') }}" class="item">
                                <h2>{{ $item->type_name }}</h2>
                                <img src="{{url('local/public/'.$item->type_img_cover)}}">
                                <div class="caption">
                                    <p>view more</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                       

                        {{-- <div class="col-12 col-md-3 wow fadeInDown">
                            <a href="#" class="item">
                                <h2>BLOOD PRESSURE </h2>
                                <img src="{{ asset('frontend/yuwell/images/img-product-02.jpg') }}">
                                <div class="caption">
                                    <p>view more</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-3 wow fadeInDown">
                            <a href="#" class="item">
                                <h2>BLOOD GLUCOSE</h2>
                                <img src="{{ asset('frontend/yuwell/images/img-product-03.jpg') }}">
                                <div class="caption">
                                    <p>view more</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-3 wow fadeInDown">
                            <a href="#" class="item">
                                <h2>THERMOMETER</h2>
                                <img src="{{ asset('frontend/yuwell/images/img-product-04.jpg') }}">
                                <div class="caption">
                                    <p>view more</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-3 wow fadeInDown">
                            <a href="#" class="item">
                                <h2>OXIMETER</h2>
                                <img src="{{ asset('frontend/yuwell/images/img-product-05.jpg') }}">
                                <div class="caption">
                                    <p>view more</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-3 wow fadeInDown">
                            <a href="#" class="item">
                                <h2>REHABILITATION</h2>
                                <img src="{{ asset('frontend/yuwell/images/img-product-06.jpg') }}">
                                <div class="caption">
                                    <p>view more</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-3 wow fadeInDown">
                            <a href="#" class="item">
                                <h2>RESPIRATORY</h2>
                                <img src="{{ asset('frontend/yuwell/images/img-product-01.jpg') }}">
                                <div class="caption">
                                    <p>view more</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-3 wow fadeInDown">
                            <a href="#" class="item">
                                <h2>BLOOD PRESSURE</h2>
                                <img src="{{ asset('frontend/yuwell/images/img-product-02.jpg') }}">
                                <div class="caption">
                                    <p>view more</p>
                                </div>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="warp_news">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header wow fadeInDown">
                        <div class="topic-head">latest <span>news</span></div>
                        <div class="view-all"><a href="{{ url('/news') }}" class="btn-default btn-red">View All</a></div>
                    </div>
                    <div class="row wow fadeInDown">
                        @foreach ($news as $item)
                        <div class="col-12 col-md-4">
                            <div class="items">
                                <a href="#">
                                    <figure><img src="{{url('local/public/'.$item->news_img)}}" alt=""></figure>
                                </a>
                                <div class="item-dateShare">
                                    <div><i class="bi bi-calendar3"></i> {{ $item->news_date }}</div>
                                </div>
                                <div>
                                    <a href="#">
                                        <div class="latest two-line">
                                            {{ $item->news_title_en }}
                                            {{-- {{ $item->news_title_th }} --}}
                                        </div>
                                        <a href="{{ url('/news-detail',$item->news_id) }}" class="btn-readMore-line">read more</a>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                     
                        {{-- <div class="col-12 col-md-4">
                            <div class="items">
                                <a href="#">
                                    <figure><img src="{{ asset('frontend/yuwell/images/news-02.jpg') }}" alt=""></figure>
                                </a>
                                <div class="item-dateShare">
                                    <div><i class="bi bi-calendar3"></i> 04.03.2021</div>
                                </div>
                                <div>
                                    <a href="#">
                                        <div class="latest two-line">
                                            Yuwell Acquired the National L
                                            aboratory Certification
                                        </div>
                                        <a href="#" class="btn-readMore-line">read more</a>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="items">
                                <a href="#">
                                    <figure><img src="{{ asset('frontend/yuwell/images/news-03.jpg') }}" alt=""></figure>
                                </a>
                                <div class="item-dateShare">
                                    <div><i class="bi bi-calendar3"></i> 05.12.2020</div>
                                </div>
                                <div>
                                    <a href="#">
                                        <div class="latest two-line">
                                            New Product Release of Yuwell in
                                            2021
                                        </div>
                                        <a href="#" class="btn-readMore-line">read more</a>
                                    </a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.inc_footer')
    @include('frontend.scriptjs')

</body>

</html>