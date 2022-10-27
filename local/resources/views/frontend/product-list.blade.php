<!doctype html>
<html>

<head>
    @include('frontend.inc_head')

    <?php $pageName = "product"; ?>
</head>

<body>

    @include('frontend.inc_menu')

    <div class="bannerTop absolute">
        <img src="{{ asset('frontend/yuwell/images/banner-product-list.jpg') }}" alt="">
        <div class="text-banner">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInLeft">
                        <div class="topic-head">RESPIRATORY</div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="breadcrumb-head">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Respiratory</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.inc_menu_left')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="list-category wow fadeInLeft">
                    <ul>
                        <li><a href="#">BreathCare PAP <span><i class="bi bi-arrow-right-circle"></i></span></a></li>
                        <li><a href="#">Breathwear Mask Series <span><i class="bi bi-arrow-right-circle"></i></span></a></li>
                        <li><a href="#">Oxygen Concentrator <span><i class="bi bi-arrow-right-circle"></i></span></a></li>
                        <li><a href="#">Nebulizer <span><i class="bi bi-arrow-right-circle"></i></span></a></li>
                        <li><a href="#">Suction Apparatus <span><i class="bi bi-arrow-right-circle"></i></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="col-products">
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="box-pd wow fadeInDown">
                                <a href="{{ url('/product-detail') }}">
                                    <figure><img src="{{ asset('frontend/yuwell/images/item-pd-01.jpg') }}" alt=""></figure>
                                    <p class="model">YH-450</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="box-pd wow fadeInDown">
                                <a href="#">
                                    <figure><img src="{{ asset('frontend/yuwell/images/item-pd-02.jpg') }}" alt=""></figure>
                                    <p class="model">YH-550</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="box-pd wow fadeInDown">
                                <a href="#">
                                    <figure><img src="{{ asset('frontend/yuwell/images/item-pd-03.jpg') }}" alt=""></figure>
                                    <p class="model">YH-730</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="box-pd wow fadeInDown">
                                <a href="#">
                                    <figure><img src="{{ asset('frontend/yuwell/images/item-pd-01.jpg') }}" alt=""></figure>
                                    <p class="model">YH-825</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="box-pd wow fadeInDown">
                                <a href="#">
                                    <figure><img src="{{ asset('frontend/yuwell/images/item-pd-04.jpg') }}" alt=""></figure>
                                    <p class="model">HF-75A</p>
                                </a>
                            </div>
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