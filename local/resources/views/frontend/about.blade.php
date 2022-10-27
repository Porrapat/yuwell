<!doctype html>
<html>

<head>
    @include('frontend.inc_head')
    <?php  $pageName = "about"; ?>
</head>

<body>
    @include('frontend.inc_menu')

    <div class="bannerTop">
        <img src="{{ asset('frontend/yuwell/images/banner-about.jpg') }}" alt="">
    </div>
    <section class="warp_history">
        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeInDown">
                    <div class="topic-head">Yuwell <span>thailand</span></div>
                    <p>Yuwell Group, has been devoted to the life and health industry. Industry and capital are dual-driven, both
                        international and local resources, medical and household markets are advancing together, and products and
                        services are combined to form a professional service platform covering the field of medical devices.</p>
                    <p>Yuwell Group has 1 listed company, Yuyue Medical (SZ:002223), and more than 80 participating holding companies.
                        After years of development, Yuwell Group owns famous brands such as Yuwell and Esaote from Italy. The group is
                        headquartered in Shanghai, China, and has 10 R&D centers and 7 manufacturing centers in Germany, Italy, Beijing,
                        etc., and has established 56 Subsidiaries around the world, forming a complete closed-loop link for R&D,
                        production, marketing and service. Integrate global health and professional medicine into continuous innovation
                        to better protect life and health.</p>
                    <p>Looking back, Yuwell has experienced two decades of development. </p>
                    <p>1998-2008, the first ten years, Live for survive;</p>
                    <p>2008-2018, the second ten years, Live for life;</p>
                    <p>2018-2028, Yuwell’s mission: Striving for more healthy lives - Live for lives.</p>
                    <p>We will adhere to the tenet of caring for health from the heart and promoting development with science and
                        technology. Full of enthusiasm and hope, we protect a healthy environment where enterprises, society and
                        people grow together.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="warp_distribution">
        <div class="container">
            <div class="row">
                <div class="col-12 slide-nav wow fadeInDown">
                    <div class="owl-distribution owl-carousel owl-theme">
                        @foreach ($country as $item)
                        <div class="items">
                            <img src="{{url('local/public/'.$item->country_img)}}" alt="">
                            <div class="title">{{$item->country_name_en}} </div>
                        </div>
                        @endforeach
                      

                        {{-- <div class="items">
                            <img src="{{ asset('frontend/yuwell/images/distribution-suzhou.jpg') }}" alt="">
                            <div class="title">Suzhou</div>
                        </div>
                        <div class="items">
                            <img src="{{ asset('frontend/yuwell/images/distribution-danyang.jpg') }}" alt="">
                            <div class="title">Danyang</div>
                        </div>
                        <div class="items">
                            <img src="{{ asset('frontend/yuwell/images/distribution-nanjing.jpg') }}" alt="">
                            <div class="title">Nanjing</div>
                        </div>
                        <div class="items">
                            <img src="{{ asset('frontend/yuwell/images/distribution-beijing.jpg') }}" alt="">
                            <div class="title">Beijing</div>
                        </div>
                        <div class="items">
                            <img src="{{ asset('frontend/yuwell/images/distribution-germany.jpg') }}" alt="">
                            <div class="title">Germany</div>
                        </div>
                        <div class="items">
                            <img src="{{ asset('frontend/yuwell/images/distribution-italy.jpg') }}" alt="">
                            <div class="title">Italy</div>
                        </div>
                        <div class="items">
                            <img src="{{ asset('frontend/yuwell/images/distribution-tibet.jpg') }}" alt="">
                            <div class="title">Tibet</div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="warp_group" id="honor">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center wow fadeInDown">
                        <div class="topic-head">GROUP HONOR</div>
                        <p>Leading the medical device industry for more than 20 years</p>
                    </div>
                    <img src="{{url('local/public/'.$overview->honor_img)}}" alt="" class="wow fadeInDown">
                </div>
            </div>
        </div>
    </section>
    <section class="warp_timeline">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-timeline owl-carousel owl-theme wow fadeInDown">
                        @foreach ($timeline as $item)
                        <div class="items">
                            <div class="content">
                                <div class="topic-head">{{ $item->timeline_date }}</div>
                                <ul>
                                    <li>{{ $item->timeline_content_en }}</li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                       

                        {{-- <div class="items">
                            <div class="content">
                                <div class="topic-head">2010</div>
                                <ul>
                                    <li>Yuwell blood pressure monitor,
                                        famous product of China</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items">
                            <div class="content">
                                <div class="topic-head">2011</div>
                                <ul>
                                    <li>Yuwell blood pressure monitor,
                                        famous product of China</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items">
                            <div class="content">
                                <div class="topic-head">2014</div>
                                <ul>
                                        Top 100 of the Chinese pharmaceutical industry
                                        Key high-tech enterprise of National Torch Plan 
                                        Listed company with investment value of China Top Finance Enterprises
                                        Listed company with investment value of China Top Finance Enterprises
                                        One of Top 10 listed SMEs
                                </ul>
                            </div>
                        </div>
                        <div class="items">
                            <div class="content">
                                <div class="topic-head">2015</div>
                                <ul>
                                    <li>Top 10 pharmaceutical companies with investment value in China</li>
                                    <li>Nationally recognized enterprise technology center</li>
                                    <li>National postdoctoral technological research station</li>
                                    <li>Chinese Domestic Medical Device Award</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items">
                            <div class="content">
                                <div class="topic-head">2016</div>
                                <ul>
                                    <li>A-share listed companies</li>
                                    <li>One of the Top 10 listed SMEs of China with the most value</li>
                                    <li>Yuwell oxygen concentrator won the China Industrial Design Award</li>
                                    <li>Brand recommended by Chinese pharmacy staff</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items">
                            <div class="content">
                                <div class="topic-head">2017</div>
                                <ul>
                                    <li>Yuwell oxygen concentrator won three IF design awards</li>
                                    <li>One of the Top 10 listed SMEs of China’s listed companies with the most value</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items">
                            <div class="content">
                                <div class="topic-head">2018</div>
                                <ul>
                                    <li>Growing listed company of the big health industry</li>
                                    <li>Annual Outstanding Public Welfare Contribution Award of CSAF</li>
                                    <li>Chinese Medical Device Award</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items">
                            <div class="content">
                                <div class="topic-head">2019</div>
                                <ul>
                                    <li>Chinese Domestic Medical Device Award</li>
                                    <li>Brand recommended by Chinese pharmacy staff</li>
                                    <li>Chinese National industrial design center</li>
                                    <li>Chinese Excellent national intellectual property enterprise</li>
                                    <li>Annual Responsibility Brand Award of China Public Welfare Festival</li>
                                </ul>
                            </div>
                        </div>
                        <div class="items">
                            <div class="content">
                                <div class="topic-head">2020</div>
                                <ul>
                                    <li>2020 Global Summit CRO</li>
                                    <li>The 11th Golden Mouse International Digital Marketing Impact Brand</li>
                                </ul>
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