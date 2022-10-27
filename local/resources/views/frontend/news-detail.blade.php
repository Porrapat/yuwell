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
                <div class="col-12 col-md-8">
                    <div class="warp_detail_news">
                        <div class="header">
                            <div class="topic-head">{{ $news->news_title_th }}
                                {{-- {{ $news_1->news_title_en }} --}}</div>
                            <div class="item-dateShare">
                                <div><i class="bi bi-calendar3"></i> {{ $news->news_date }}</div>
                            </div>
                        </div>
                        <div class="detail">
                            <div class="img"><img src="{{url('local/public/'.$news->news_img)}}" alt=""></div>
                            <p>{{ $news->news_content_th }}
                                {{-- {{ $news->news_content_en }} --}}</p>
                            <a href="{{ url('/news') }}" class="btn-default btn-red">Back to news</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="warp_ct_news mt">
                            @foreach ($news_recent as $item)
                            <div class="items mb-4">
                                <a href="{{ url('/news-detail',$item->news_id) }}">
                                    <figure><img src="{{url('local/public/'.$item->news_img)}}" alt=""></figure>
                                </a>
                                <div class="item-dateShare">
                                    <div><i class="bi bi-calendar3"></i> {{ $item->news_date }}</div>
                                </div>
                                <div>
                                    <a href="#">
                                        <div class="latest two-line">
                                            {{ $item->news_title_th }}
                                            {{-- {{ $news_1->news_title_en }} --}}
                                        </div>
                                        <a href="{{ url('/news-detail',$item->news_id) }}" class="btn-readMore-line">read more</a>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                       

                        {{-- <div class="items mb-4">
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
                        <div class="items mb-4">
                            <a href="#">
                                <figure><img src="{{ asset('frontend/yuwell/images/news-04.jpg') }}" alt=""></figure>
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
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.inc_footer')
    @include('frontend.scriptjs')
   
</body>

</html>