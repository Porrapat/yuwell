@extends('backend.layouts.main')

@section('head')

<!-- sweet alert framework -->
<link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/sweetalert/css/sweetalert.css')}}">


@endsection
@section('content')

<div class="page-header card">
    <div class="card-block front-icon-breadcrumb">
        <h5 class="m-b-10">Service Report</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item">
                edit service report
            </a>
            </li>
        </ul>
    </div>
</div>


<div id="content" class="content">
    <!-- begin panel -->
    <div class="card">
        <div class="card-header">
            <h5>edit service report</h5>
        </div>
        <div class="card-block table-border-style">
            <form method="post" action="{{ url('admin/service-report/'.$servicereport->service_report_id.'/update-only-status') }}" id="main-service-report">
                <div class="row">
                    <div class="col-md-12">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Serial No</strong>
                                    <input type="text" name="service_report_serial_number" class="form-control" value="{{ $servicereport->service_report_serial_number }}" style="background-color:#ccc" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Name</strong>
                                    <input type="text" name="service_report_name" class="form-control" value="{{ $servicereport->service_report_name }}" style="background-color:#ccc" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Surname</strong>
                                    <input type="text" name="service_report_surname" class="form-control" value="{{ $servicereport->service_report_surname }}" style="background-color:#ccc" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Repair Code</strong>
                                    <input type="text" name="service_report_repair_code" class="form-control" value="{{ $servicereport->service_report_repair_code }}" style="background-color:#ccc" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Service Status</strong>
                                    <select id="service_report_repair_status_id" name="service_report_repair_status_id" class="form-control custom-select">

                                        @foreach($repairstatus as $rs)
                                            <option value="{{ $rs->repair_status_id }}"
                                            @if($rs->repair_status_id == $servicereport->service_report_repair_status_id)
                                                selected
                                            @endif
                                            >{{ $rs->repair_status_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('admin/service-report') }}" class="btn btn-default waves-effect">ปิด</a>
                            <input type="submit" value="ยืนยัน" class="btn btn-primary waves-effect waves-light">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end panel -->
</div>

@endsection
