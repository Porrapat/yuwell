<!doctype html>
<html>

<head>
    @include('frontend.inc_head')
    <?php $pageName = "news"; ?>
</head>

<body>
    @include('frontend.inc_menu')

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="warp_ct_news">
                        <div class="topic-head wow fadeInDown">NEWS <span>CENTER</span></div>
                        <div class="top-news">
                            <div class="items">
                                <a href="{{ url('/news-detail') }}" class="img">
                                    <figure><img src="{{url('local/public/'.$news_1->news_img)}}" alt=""></figure>
                                </a>
                                <div class="ct-right">
                                    <div class="item-dateShare">
                                        <div><i class="bi bi-calendar3"></i>{{ $news_1->news_date }}</div>
                                    </div>
                                    <div>
                                        <a href="#">
                                            <h4>{{ $news_1->news_title_th }}
                                                {{-- {{ $news_1->news_title_en }} --}}
                                            </h4>
                                            <div class="latest three-line">
                                                {{ $news_1->news_content_th }}
                                                {{-- {{ $news_1->news_content_en }} --}}
                                            </div>
                                            <a href="{{ url('/news-detail',$news_1->news_id) }}" class="btn-readMore-line">read more</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row wow fadeInDown">
                            @foreach ($news as $item)
                            <div class="col-12 col-md-4">
                                <div class="items">
                                    <a href="{{ url('/news-detail') }}">
                                        <figure><img src="{{url('local/public/'.$item->news_img)}}" alt=""></figure>
                                    </a>
                                    <div class="item-dateShare">
                                        <div><i class="bi bi-calendar3"></i> {{ $item->news_date }}</div>
                                    </div>
                                    <div>
                                        <a href="#">
                                            <div class="latest two-line">
                                                {{ $item->news_title_th }}
                                                {{-- {{ $item->news_title_en }} --}}

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
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="items">
                                    <a href="#">
                                        <figure><img src="{{ asset('frontend/yuwell/images/news-01.jpg') }}" alt=""></figure>
                                    </a>
                                    <div class="item-dateShare">
                                        <div><i class="bi bi-calendar3"></i> 18.05.2021</div>
                                    </div>
                                    <div>
                                        <a href="#">
                                            <div class="latest two-line">
                                                Oxygen concentrator has passed CE with zero defects
                                            </div>
                                            <a href="#" class="btn-readMore-line">read more</a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
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
        </div>
    </div>

    @include('frontend.inc_footer')
    @include('frontend.scriptjs')

</body>

</html>