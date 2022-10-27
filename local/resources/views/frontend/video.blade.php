<!doctype html>
<html>

<head>
    @include('frontend.inc_head')
    <?php $pageName = "vdo"; ?>
</head>

<body>
@include('frontend.inc_menu')

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="warp_vdo row">
                        <div class="topic-head col-6 wow fadeInDown">VIDEO <span>CENTER</span></div>
                        <div class="col-6">
                            <div class="btn-default btn-red">Product Video</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-thumbnail-slider">
                            <div class='slider'>
                                @foreach ($video as $item)
                                
                                <div class="top-vdo">
                                    <iframe width="100%" height="450" src="https://www.youtube.com/embed/{{ $item->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <div class="topic_head">{{ $item->video_name_en }}</div>
                                </div>
                                @endforeach
                                
                                {{-- <div class="top-vdo">
                                    <iframe width="560" height="450" src="https://www.youtube.com/embed/GDhUXTqH018" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <div class="topic_head">HKIM Interview | Marketers to Marketers | Guardforce’s innovation journey</div>
                                </div>
                                <div class="top-vdo">
                                    <iframe width="560" height="450" src="https://www.youtube.com/embed/E_GbOkDiNZ8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <div class="topic_head">Guardforce 40th Anniversary customer event</div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="item-thumbnail">
                        <div class='slider-nav'>
                            @foreach ($video as $item)
                                
                            <div class="item">
                                <img src="{{url('local/public/'.$item->video_img)}}" alt="">
                                <div class="txt-vdo">
                                    <p>{{ $item->video_name_en }}</p>
                                </div>
                            </div>
                            @endforeach
                            {{-- <div class="item">
                                <img src="{{ asset('frontend/yuwell/images/photo-vdo-02.jpg') }}" alt="">
                                <div class="txt-vdo">
                                    <p>Oxygen Concentrator 7F-3NW</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontend/yuwell/images/photo-vdo-03.jpg') }}" alt="">
                                <div class="txt-vdo">
                                    <p>Oxygen Concentrator or Cylinder ?</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontend/yuwell/images/photo-vdo-04.jpg') }}" alt="">
                                <div class="txt-vdo">
                                    <p>Blood Pressure Monitor YE680B</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontend/yuwell/images/photo-vdo-05.jpg') }}" alt="">
                                <div class="txt-vdo">
                                    <p>Blood Pressure Monitor YE620B</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="{{ asset('frontend/yuwell/images/photo-vdo-06.jpg') }}" alt="">
                                <div class="txt-vdo">
                                    <p>Blood Pressure Monitor YE660E</p>
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