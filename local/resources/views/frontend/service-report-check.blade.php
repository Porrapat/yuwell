<!doctype html>
<html>

<head>
    @include('frontend.inc_head')
    <?php $pageName = ""; ?>
</head>

<style>
    .table>:not(:first-child) {
        border-top-width: 1px;
    }
</style>

<body>

    @include('frontend.inc_menu')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (Session::get('success'))
    <script type="text/javascript">
        swal.fire({
            icon:'success',
            title:'Success!',
            text:"{{ Session::get('success') }}",
            timer:3000,
            type:'success'
        }).then((value) => {
        }).catch(swal.noop);
    </script>
    @endif

    @if (Session::get('error'))
    <script type="text/javascript">
        swal.fire({
            icon:'error',
            title:'Error!',
            text:"{{ Session::get('error') }}",
            timer:3000,
            type:'error'
        }).then((value) => {
        }).catch(swal.noop);
    </script>
    @endif

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div>
                        <div class="header">
                            <div class="col-left">
                                <div class="topic-head">Service <span>report</span></div>
                                <p>เช็คสถานะ</p>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-4">

                    <form id="my_form" action="{{ url('/service-report-check') }}" method="GET">
                        <div class="form-group has-search">
                            <input type="text" id="service_report_repair_code" name="service_report_repair_code" class="form-control" placeholder="Search Repair Code">
                            <br/>
                            <input type="text" id="service_report_status" name="service_report_status" class="form-control" readonly style="background:#ccc" value="{{ $result }}">
                            <br/>
                            <button type="submit" class="btn btn-primary">ค้นหา</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @include('frontend.inc_footer')
    @include('frontend.scriptjs')

</body>

</html>
