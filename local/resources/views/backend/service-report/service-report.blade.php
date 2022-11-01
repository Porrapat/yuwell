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
            <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No.</th>
                            <th class="text-center">Repair No</th>
                            <th class="text-center">Serial No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center" width="30%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicereport as $key => $item)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">{{$key+1}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->service_report_serial_number}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->service_report_name}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->service_report_surname}}</td>

                            <td style="text-align: center; vertical-align: middle;">
                                <div class="row">
                                    <a href="{{ url('/admin/service-report/'.$item->service_report_id.'/edit-only-status' ) }}" class="btn btn-info waves-effect"
                                        data-target="#Modalupdate">เพิ่มเลขซ่อมและสถานะ</a>
                                    <a href="{{ route('service-report.edit',$item->service_report_id )}}" class="btn btn-warning waves-effect"
                                        data-target="#Modalupdate"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger" onclick="del({{$item->service_report_id }})"><i class="fa fa-trash-o"></i> </button>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <!-- end panel -->
</div>

@endsection
