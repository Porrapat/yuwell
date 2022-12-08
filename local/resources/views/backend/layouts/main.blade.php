
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Yuwell Thailand (Backoffice)</title>
    <!-- HTML5 Shim and Respond.js') }} IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js') }} doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js') }}/1.4.2/respond.min.js') }}"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
   

	@include('backend.layouts.main_css')
	@yield('head')
</head>

<body>
	
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @include('backend.layouts.main_navbar')

            {{-- @include('backend.layouts.main_sidebar')
            @include('backend.layouts.main_showchat') --}}
            
            
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

					@include('backend.layouts.main_manu')

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
									@yield('content')
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]><![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="{{ asset('files/backend/assets/images/browser/chrome.png') }}" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="{{ asset('files/backend/assets/images/browser/firefox.png') }}" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="{{ asset('files/backend/assets/images/browser/opera.png') }}" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="{{ asset('files/backend/assets/images/browser/safari.png') }}" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="{{ asset('files/backend/assets/images/browser/ie.png') }}" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
    <![endif]-->
    @include('backend.layouts.main_script')

    <script>
        $(document).ready(function () {
            $("#service_report_buy_date").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd/mm/yyyy',
            });
            $("#service_report_close_date").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd/mm/yyyy',
            });
            $("#service_report_return_date").datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd/mm/yyyy',
            });
        });


        $(document).ready(function(){
            $("#checkAll").change(function(){
                $('.serial_no_check').prop('checked', this.checked);
            });
            $('#delMultiple').click(function(){
                var new_array = new Array();
                $('.serial_no_check:checked').each(function() {
                    new_array.push(this.value);
                });
                $.ajax({
                    type:'POST',
                    url:'serial-number/delete-more',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:    { serial_no: new_array },
                    success:function(data) {
                        swal.fire({
                            icon:'success',
                            title:'Success!',
                            text:"You deleted",
                            type:'success'
                        }).then((value) => {
                            window.location.href = "serial-number";
                        }).catch(swal.noop);
                    }
                });
            });
        });
    </script>

	@yield('script')
</body>

</html>
