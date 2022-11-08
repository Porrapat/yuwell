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
            <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No.</th>
                            <th class="text-center">เลขซ่อม</th>
                            <th class="text-center">สถานะ</th>
                            <th class="text-center">Repair No</th>
                            <th class="text-center">Serial No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center" width="1%">View</th>
                            <th class="text-center" width="30%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicereport as $key => $item)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">{{$key+1}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->service_report_repair_code}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->repair_status->repair_status_name}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->service_report_serial_number}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->service_report_name}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->service_report_surname}}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                <div class="row">
                                    <a href="{{ route('service-report.show',$item->service_report_id )}}" class="btn btn-info waves-effect"><i class="fa fa-search"></i></a>
                                </div>
                            </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <div class="row">

                                    <a href="{{ url('/admin/service-report/print/'.$item->service_report_id) }}" class="btn btn-info waves-effect">Print</a>
                                    <a href="{{ url('/admin/service-report/'.$item->service_report_id.'/edit-only-status' ) }}" class="btn btn-info waves-effect"
                                        data-target="#Modalupdate">เปลี่ยนสถานะ</a>
                                    <!-- <a href="{{ route('service-report.edit',$item->service_report_id )}}" class="btn btn-warning waves-effect"
                                        data-target="#Modalupdate"><i class="fa fa-edit"></i></a> -->
                                    <button type="button" class="btn btn-danger" onclick="del({{$item->service_report_id }})"><i class="fa fa-trash-o"></i> </button>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <div class="mt-4">
                {{ $servicereport->appends(\Request::except('page'))->render() }}
            </div>
        </div>
    </div>
    <!-- end panel -->
</div>


<form method="post" id="delete">
    @csrf
    @method('DELETE')
</form>

<script>
    function del(id) {
        var urlaction = '{{url('admin/service-report')}}' + '/' + id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'คุณแน่ใจหรือ?',
            text: "ข้อมูลจะไม่สามารถกู้กลับมาได้อีก!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $("#delete").attr('action', urlaction);
                $("#delete").submit();
                swalWithBootstrapButtons.fire(
                    'ลบข้อมูลสำเร็จ!',
                    'ข้อมูลถูกลบออกจากระบบแล้ว',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'ยกเลิก',
                    'ยกเลิกการลบข้อมูล',
                    'error'
                )
            }
        })
    }
</script>

@endsection
