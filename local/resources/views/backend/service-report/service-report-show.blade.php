@extends('backend.layouts.main')

@section('head')

<!-- sweet alert framework -->
<link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/sweetalert/css/sweetalert.css')}}">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
@section('content')

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

<div class="page-header card">
    <div class="card-block front-icon-breadcrumb">
        <h5 class="m-b-10">Service Report</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item">
                service report
            </a>
            </li>
        </ul>
    </div>
</div>


<div id="content" class="content">
    <!-- begin panel -->
    <div class="card">
        <div class="card-header">
            <h5>service report</h5>
        </div>

        <div class="card-block table-border-style">

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $servicereport->service_report_id }}</td>
                    </tr>
                    <tr>
                        <td>Repair Code</td>
                        <td>{{  $servicereport->service_report_repair_code }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{  $servicereport->repair_status->repair_status_name }}</td>
                    </tr>
                    <tr>
                        <td>Serial Number</td>
                        <td>{{  $servicereport->service_report_serial_number }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{  $servicereport->service_report_name }}</td>
                    </tr>
                    <tr>
                        <td>Surname</td>
                        <td>{{  $servicereport->service_report_surname }}</td>
                    </tr>
                    <tr>
                        <td>Telephone</td>
                        <td>{{  $servicereport->service_report_telephone }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{  $servicereport->service_report_email }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{  $servicereport->service_report_address }}</td>
                    </tr>
                    <tr>
                        <td>วันที่รับบริการ</td>
                        <td>{{  $servicereport->service_report_service_date }}</td>
                    </tr>
                    <tr>
                        <td>ร้านที่ซื้อ</td>
                        <td>{{  $servicereport->service_report_shop_name }}</td>
                    </tr>
                    <tr>
                        <td>วันที่ซื้อ</td>
                        <td>{{  $servicereport->service_report_buy_date }}</td>
                    </tr>
                    <tr>
                        <td>ชื่อสินค้า</td>
                        <td>{{  $servicereport->service_report_product_name }}</td>
                    </tr>
                    <tr>
                        <td>ประเภทสินค้า</td>
                        <td>{{  $servicereport->service_report_type_name }}</td>
                    </tr>
                    <tr>
                        <td>Lot</td>
                        <td>{{  $servicereport->service_report_lot }}</td>
                    </tr>
                    <tr>
                        <td>อาการเสีย</td>
                        <td>{{  $servicereport->service_report_problem }}</td>
                    </tr>
                    <tr>
                        <td>รูปภาพอาการเสีย</td>
                        <td>
                            @foreach($servicereport->service_report_images as $image)
                                <img src="{{ url('local/public/img/servicereport/'.$image->service_report_image_name) }}" width="150" height="150" />
                            @endforeach
                        </td>
                    </tr>

                </tbody>
            </table>

            <a href="{{ url('admin/service-report') }}" class="btn btn-default waves-effect">ปิด</a>
        </div>

    </div>
    <!-- end panel -->
</div>

@endsection
