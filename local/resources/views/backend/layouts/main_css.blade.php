<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description"
    content="Gradient Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
<meta name="keywords"
    content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
<meta name="author" content="codedthemes" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Favicon icon -->
<link rel="icon" href="{{asset('/files/backend/assets/images/fav-icon.png')}}" type="image/x-icon">
<!-- ion icon css -->
<link rel="stylesheet" type="text/css" href="{{asset('/files/backend/assets/icon/ion-icon/css/ionicons.min.css')}}">
<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
<!-- Required Fremwork -->
<link rel="stylesheet" type="text/css"
    href="{{asset('/files/backend/bower_components/bootstrap/css/bootstrap.min.css')}}">
<!-- ico font -->
<link rel="stylesheet" type="text/css" href="{{asset('/files/backend/assets/icon/icofont/css/icofont.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" type="text/css"
    href="{{asset('/files/backend/assets/icon/font-awesome/css/font-awesome.min.css')}}">
<!-- simple line icon -->
<link rel="stylesheet" type="text/css"
    href="{{asset('/files/backend/assets/icon/simple-line-icons/css/simple-line-icons.css')}}">
<!-- themify-icons line icon -->
<link rel="stylesheet" type="text/css"
    href="{{asset('/files/backend/assets/icon/themify-icons/themify-icons.css')}}">
<!-- Switch component css -->
<link rel="stylesheet" type="text/css"
    href="{{asset('/files/backend/bower_components/switchery/css/switchery.min.css')}}">
<!-- Tags css -->
<link rel="stylesheet" type="text/css"
    href="{{asset('/files/backend/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" />
<!-- typicon icon -->
<link rel="stylesheet" type="text/css"
    href="{{asset('/files/backend/assets/icon/typicons-icons/css/typicons.min.css')}}">
<!-- Style.css -->
<link rel="stylesheet" type="text/css" href="{{asset('/files/backend/assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/files/backend/assets/css/jquery.mCustomScrollbar.css')}}">

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">


<!-- Data Table Css -->
<link rel="stylesheet" type="text/css"
    href="{{asset('/files/backend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('/files/backend/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('/files/backend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">

<!-- light-box css -->
<link rel="stylesheet" type="text/css"
    href="{{asset('/files/backend/bower_components/ekko-lightbox/css/ekko-lightbox.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('/files/backend/bower_components/lightbox2/css/lightbox.css')}}">
    {{-- custom css --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">

<!-- Data Table Css -->
<link rel="stylesheet" type="text/css" href="{{asset('/files/backend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/files/backend/assets/pages/data-table/css/buttons.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/files/backend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">

<!-- Color Picker css -->
<link rel="stylesheet" type="text/css" href="{{ asset('/files/backend/bower_components/spectrum/css/spectrum.css') }}" />
 <!-- Mini-color css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('/files/backend/bower_components/jquery-minicolors/css/jquery.minicolors.css') }}" />

 <!-- Select 2 css -->
 <link rel="stylesheet" href="{{asset('/files/backend/bower_components/select2/css/select2.min.css')}}" />
 <!-- Multi Select css -->
 <link rel="stylesheet" type="text/css"
     href="{{asset('/files/backend/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" />
 <link rel="stylesheet" type="text/css" href="{{asset('/files/backend/bower_components/multiselect/css/multi-select.css')}}" />
{{-- @yield('head') --}}
<style>
    .modal {
        overflow-y: scroll;
    }
</style>

{{-- @include('layout_backoffice.style') --}}

{{-- </head> --}}

{{-- <body>
<!-- Pre-loader start -->
<div class="theme-loader">
<div class="loader-track">
    <div class="loader-bar"></div>
</div>
</div> --}}
<!-- Pre-loader end -->
{{-- <div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">
    @include('layout_backoffice.top_menu')
    @include('layout_backoffice.inc_chat')
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            @include('layout_backoffice.left_menu')
            <div class="pcoded-content">
                @yield('content')
                @include('layout_backoffice.option_template')
            </div>
        </div>
    </div>
</div>
</div> --}}


{{-- @if(Session::has('success'))
{!! alertSuccess(Session::get("success"),'success') !!}
@endif
@if(Session::has('error'))
{!! alertError(Session::get("error"),'error') !!}
@endif
@if(Session::has('info'))
{!! alertInfo(Session::get("info"),'info') !!}
@endif --}}