<!doctype html>
<html>

<head>
    @include('frontend.inc_head')
    <?php $pageName = "contact"; ?>
</head>

<body>
@include('frontend.inc_menu')

    <div class="bannerTop">
        <img src="{{ asset('frontend/yuwell/images/banner-about.jpg') }}" alt="">
    </div>
    <section class="warp_contact">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="topic-head">Yuwell <span>thailand</span></div>
                    <p>
                        {{ $contact->contact_content_en }}
                        {{-- {{ $contact->contact_content_th }} --}}

                    </p>

                    <p><i class="fa-solid fa-location-dot"></i> {{ $contact->contact_address_en }}
                        {{-- {{ $contact->contact_address_th }} --}}
                    </p>
                    <p><i class="fa-solid fa-phone"></i>Tel:  {{ $contact->contact_phone }}</p>
                    <p><i class="fa-solid fa-envelope"></i>E-mail:<a href="#">  {{ $contact->contact_email }} </a>
                        {{-- <a href="#">sales@yuyue.com.cn</a> --}}
                    </p>

                    <ul class="followUs">
                        <li><a href="#"><img src="{{ asset('frontend/yuwell/images/facebook.svg') }}" alt=""></a></li>
                        <li><a href="#"><img src="{{ asset('frontend/yuwell/images/twitter.svg') }}" alt=""></a></li>
                        <li><a href="#"><img src="{{ asset('frontend/yuwell/images/linkedin.svg') }}" alt=""></a></li>
                        <li><a href="#"><img src="{{ asset('frontend/yuwell/images/instagram.svg') }}" alt=""></a></li>
                        <li><a href="#"><img src="{{ asset('frontend/yuwell/images/youtube.svg') }}" alt=""></a></li>
                    </ul>

                    <div class="shopping">
                        <ul>
                            <li><a href="#"><img src="{{ asset('frontend/yuwell/images/lg_lazada.png') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('frontend/yuwell/images/lg_shopee.png') }}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset('frontend/yuwell/images/lg_jd.png') }}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.inc_footer')
    @include('frontend.scriptjs')

</body>