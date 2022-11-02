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

        <!-- CREATE TABLE `tb_service_report` (
            `service_report_repair_status_id` int(11) DEFAULT NULL,
            PRIMARY KEY (`service_report_id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4; -->
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
                        <td>Address</td>
                        <td>{{  $servicereport->service_report_address }}</td>
                    </tr>
                    <tr>
                        <td>วันที่รับบริการ</td>
                        <td>{{  $servicereport->service_report_service_date }}</td>
                    </tr>
                    <tr>
                        <td>ประเภทบริการ</td>
                        <td>{{  $servicereport->service_report_service_type }}</td>
                    </tr>
                    <tr>
                        <td>ปัญหาที่พบ</td>
                        <td>{{  $servicereport->service_report_problem }}</td>
                    </tr>
                    <tr>
                        <td>อะไหล่ที่เบิก</td>
                        <td>{{  $servicereport->service_report_list_1 }}</td>
                    </tr>
                    <tr>
                        <td>ปริมาณอะไหล่ที่เบิก</td>
                        <td>{{ $servicereport->service_report_quantity_1 }}</td>
                    </tr>
                    <tr>
                        <td>วิธีแก้ปัญหา</td>
                        <td>{{ $servicereport->service_report_how_to_fix_problem }}</td>
                    </tr>
                    <tr>
                        <td>หมายเหตุ</td>
                        <td>{{ $servicereport->service_report_note }}</td>
                    </tr>
                    <tr>
                        <td>ผลลัพธ์</td>
                        <td>{{ $servicereport->service_report_result_type }}</td>
                    </tr>
                    <tr>
                        <td>ผลลัพธ์ (กรณีไม่เรียบร้อย)</td>
                        <td>{{ $servicereport->service_report_result_type_not_good }}</td>
                    </tr>
                    <tr>
                        <td>ลูกค้า</td>
                        <td>{{ $servicereport->service_report_customer_sign_name }}</td>
                    </tr>
                    <tr>
                        <td>ลูกค้าลงวันที่</td>
                        <td>{{ $servicereport->service_report_customer_sign_date }}</td>
                    </tr>
                    <tr>
                        <td>วิศวกร</td>
                        <td>{{ $servicereport->service_report_engineer_sign_name }}</td>
                    </tr>
                    <tr>
                        <td>วิศวกรลงวันที่</td>
                        <td>{{ $servicereport->service_report_engineer_sign_date }}</td>
                    </tr>
                </tbody>
            </table>

            <a href="{{ url('admin/service-report') }}" class="btn btn-default waves-effect">ปิด</a>
        </div>

    </div>
    <!-- end panel -->
</div>

@endsection
