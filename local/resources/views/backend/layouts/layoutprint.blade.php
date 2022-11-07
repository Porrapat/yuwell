
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if(isset($title))
        <title>{{ $title }}</title>
    @else
        <title>Print Report</title>
    @endif
    <link href="{{ asset('css/print-report-paper-css.css') }}" rel="stylesheet">
    <style>
    @page { size: A5 }

    
    @font-face {
        font-family: 'THSarabunNew';
        font-style: normal;
        font-weight: normal;
        src: url(" {{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
    }
    .sheet {
        position:relative;
        font-family: 'THSarabunNew';
    }


    .img-logo {
      max-width: 170px;
      max-height: 64px;
    }

    .text-left {
        text-align: left;
    }

    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    .logo {
        margin-left: 25px;
        display: flex;
        align-items: center;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    .content {
        padding: 5mm;
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        padding-bottom: 12px;
        height: 85px;
    }

    .page-title {
        text-align: right;
        font-size: 28px;
        margin-top:20px;
        margin-right:16px;
    }

    .content-footer {
        margin-top:40px;
        font-size: 14px;
    }
    </style>

</head>

<body class="A5">
     @yield('content')
</body>

</html>
