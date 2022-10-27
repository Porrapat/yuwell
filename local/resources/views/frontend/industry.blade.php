<!doctype html>
<html>

<head>
@include('frontend.inc_head')
    <?php $pageName = "industry"; ?>
</head>

<body>

    @include('frontend.inc_menu')

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="warp_industry">
                        <div class="topic-head wow fadeInDown">INDUSTRY <span>SECTOR</span></div>
                        <div class="row">
                            @foreach ($sector as $item)
                            <div class="col-12 col-md-6">
                                <div class="item-sector wow fadeInLeft">
                                    <div class="image">
                                        <img src="{{url('local/public/'.$item->sector_img)}}" alt="">
                                        <div class="logo-in"><img src="{{url('local/public/'.$item->sector_logo)}}" alt=""></div>
                                    </div>
                                    <p>{{ $item->sector_content_en }}</p>
                                </div>
                            </div>
                            @endforeach
                          

                            {{-- <div class="col-12 col-md-6">
                                <div class="item-sector wow fadeInRight">
                                    <div class="image">
                                        <img src="{{ asset('frontend/yuwell/images/img-industry-02.jpg') }}" alt="">
                                        <div class="logo-in"><img src="{{ asset('frontend/yuwell/images/logo-industry-02.jpg') }}" alt=""></div>
                                    </div>
                                    <p>Established in 1982. A manufacturer of medical
                                        diagnostic equipment with internationally recognized
                                        dedicated magnetic resonance imaging (MRI)
                                        technology.</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="item-sector wow fadeInLeft">
                                    <div class="image">
                                        <img src="{{ asset('frontend/yuwell/images/img-industry-03.jpg') }}" alt="">
                                        <div class="logo-in"><img src="{{ asset('frontend/yuwell/images/logo-industry-03.jpg') }}" alt=""></div>
                                    </div>
                                    <p>Established in 1982. A manufacturer of medical
                                        diagnostic equipment with internationally recognized
                                        dedicated magnetic resonance imaging (MRI)
                                        technology.</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="item-sector wow fadeInRight">
                                    <div class="image">
                                        <img src="{{ asset('frontend/yuwell/images/img-industry-04.jpg') }}" alt="">
                                        <div class="logo-in"><img src="{{ asset('frontend/yuwell/images/logo-industry-04.jpg') }}" alt=""></div>
                                    </div>
                                    <p>Established in 1982. A manufacturer of medical
                                        diagnostic equipment with internationally recognized
                                        dedicated magnetic resonance imaging (MRI)
                                        technology.</p>
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