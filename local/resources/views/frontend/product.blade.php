<!doctype html>
<html>

<head>
    @include('frontend.inc_head')
    <?php $pageName = "product"; ?>
</head>

<body>

    @include('frontend.inc_menu')
    <div class="bannerTop">
        <img src="{{ asset('frontend/yuwell/images/banner-product.jpg') }}" alt="">
    </div>
    <section class="warp_products page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="topic-head text-center wow fadeInDown">Products <span>Solutions</span></div>
                    <div class="row">
                        @foreach ($producttype as $item)
                            
                      
                        <div class="col-12 col-md-3 p-2 wow fadeInDown">
                            <a href="{{ url('/product-list') }}" class="item">
                                <img src="{{url('local/public/'.$item->type_img_cover)}}">
                                <div class="caption">
                                    <h2>{{ $item->type_name }}</h2>
                                    <p>view product</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        {{-- <div class="col-12 col-md-3 p-2 wow fadeInDown">
                            <a href="#" class="item">
                                <img src="{{ asset('frontend/yuwell/images/img-product-02.jpg') }}">
                                <div class="caption">
                                    <h2>BLOOD PRESSURE </h2>
                                    <p>view product</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-3 p-2 wow fadeInDown">
                            <a href="#" class="item">
                                <img src="{{ asset('frontend/yuwell/images/img-product-03.jpg') }}">
                                <div class="caption">
                                <h2>BLOOD GLUCOSE</h2>
                                    <p>view product</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-3 p-2 wow fadeInDown">
                            <a href="#" class="item">
                                <img src="{{ asset('frontend/yuwell/images/img-product-04.jpg') }}">
                                <div class="caption">
                                <h2>THERMOMETER</h2>
                                    <p>view product</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-3 p-2 wow fadeInDown">
                            <a href="#" class="item">
                                <img src="{{ asset('frontend/yuwell/images/img-product-05.jpg') }}">
                                <div class="caption">
                                <h2>OXIMETER</h2>
                                    <p>view product</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-3 p-2 wow fadeInDown">
                            <a href="#" class="item">
                                <img src="{{ asset('frontend/yuwell/images/img-product-06.jpg') }}">
                                <div class="caption">
                                <h2>REHABILITATION</h2>
                                    <p>view product</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-3 p-2 wow fadeInDown">
                            <a href="#" class="item">
                                <img src="{{ asset('frontend/yuwell/images/img-product-01.jpg') }}">
                                <div class="caption">
                                <h2>RESPIRATORY</h2>
                                    <p>view product</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-3 p-2 wow fadeInDown">
                            <a href="#" class="item">
                                <img src="{{ asset('frontend/yuwell/images/img-product-02.jpg') }}">
                                <div class="caption">
                                <h2>BLOOD PRESSURE</h2>
                                    <p>view product</p>
                                </div>
                            </a>
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