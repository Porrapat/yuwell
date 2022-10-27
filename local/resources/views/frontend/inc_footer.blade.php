@php
   
    $contacts = App\contacts::first();

@endphp
<footer>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5 info">
                <h3>YUWELL MEDICAL (THAILAND) CO., LTD.
                    {{-- บริษัท ยูเวล เมดิคอล (ไทยแลนด์) จำกัด --}}
                </h3>
                <p>{{ $contacts->contact_address_en }}
                    {{-- {{ $contacts->contact_address_th }} --}}
                </p>
                <p class="mb-1"><b>Working hours :</b> {{ $contacts->contact_work_time_en }}
                    {{-- {{ $contacts->contact_work_time_th }} --}}</p>
                <p>Tel : {{ $contacts->contact_phone }}</p>
            </div>
            <div class="col-12 col-md-5">
                <div class="row">
                    <div class="col-6">
                        <div class="link-page">
                            <h4>INTRODUCTION</h4>
                            <ul>
                                <li><a href="{{ url('/about') }}">Group Introduction</a></li>
                                <li><a href="{{ url('/about#honor') }}">Group Honor</a></li>
                            </ul>
                        </div>
                        <div class="link-page">
                            <h4>SECTOR</h4>
                            <ul>
                                <li><a href="{{ url('/industry') }}">Esaote, Italy</a></li>
                                <li><a href="{{ url('/industry') }}">Health industry ecology</a></li>
                                <li><a href="{{ url('/industry') }}">Health industry and finance center</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="link-page">
                            <h4>NEWS</h4>
                            <ul>
                                <li><a href="{{ url('/news') }}">News Focus</a></li>
                                <li><a href="{{ url('/video') }}">Video Center</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-2">
                <div class="qrCode"><img src="{{ asset('frontend/yuwell/images/qrCode.jpg') }}" alt=""></div>
            </div>
        </div>
    </div>
</footer>
<div class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="copyright">Copyright © 2022 Yuwell.thailand | All rights reserved.</div>
            </div>
            {{-- <div class="col-12 col-md-6 mobile-center">
                <ul class="social">
                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
            </div> --}}
        </div>
    </div>
</div>