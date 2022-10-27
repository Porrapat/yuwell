<!doctype html>
<html>

<head>
    @include('frontend.inc_head')
    <?php $pageName = "product"; ?>
</head>

<body>
    @include('frontend.inc_menu')

    <div class="detail-product">
        @include('frontend.inc_menu_left')
        <img src="{{ asset('frontend/yuwell/images/detail-pd-01.jpg') }}" alt="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content-pd wow fadeInLeft">
                        <div class="topic-head">BreathCareII Auto CPAP / Bi-Level</div>
                        <p class="model">YH-450</p>
                        <div class="specification">
                            <h5>Specification</h5>
                            <p>Mode: CPAP / Auto CPAP</p>
                            <p>Pressure: 4 - 20cm H2O</p>
                            <p>Efficient humidifier / Smart Start / Stop / FPS-Tech /</p>
                            <p>Leak Reminder / Altitude Adjustment / Leak Compensation /</p>
                            <p>Data Management / Central Apnea Detection / Smart Humidification</p>
                            <div class="download">
                                <a href="#"><i class="bi bi-download"></i> Breathcare Management System</a>
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