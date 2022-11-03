@extends('backend.layouts.main')

@section('head')

<!-- sweet alert framework -->
<link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/sweetalert/css/sweetalert.css')}}">


@endsection
@section('content')

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

<div class="page-header card">
    <div class="card-block front-icon-breadcrumb">
        <h5 class="m-b-10">Serial Number</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item">
                serial number
            </a>
            </li>
        </ul>
    </div>
</div>


<div id="content" class="content">
    <!-- begin panel -->
    <div class="card">
        <div class="card-header">
            <h5>serial number</h5>
            <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#large-Modal"><i
                    class="fa fa-plus"> </i> Add</button>

            <br/>
            <br/>

            <form action="{{ url('/admin/serial-number/import-excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" id="serial_number_import_excel" name="serial_number_import_excel" type="file" />
                <button type="submit" class="btn btn-success waves-effect"><i class="fa fa-plus"> </i> Import Data using Excel</button>
            </form>
        </div>

        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No.</th>
                            <th class="text-center">Serial No</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Type Name</th>
                            <th class="text-center">Lot</th>
                            <th class="text-center" width="25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($serialnumber as $key => $item)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">{{$key+1}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->serial_number_no}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->serial_number_product_name}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->serial_number_type_name}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->serial_number_lot}}</td>

                            <td style="text-align: center; vertical-align: middle;">
                                <div class="row">
                                    &nbsp;&nbsp;
                                    <a href="{{ route('serial-number.edit',$item->serial_number_id )}}" class="btn btn-warning waves-effect"
                                        data-target="#Modalupdate"><i class="fa fa-edit"></i></a>
                                    &nbsp;&nbsp;
                                    <button type="button" class="btn btn-danger" onclick="del({{$item->serial_number_id }})"><i class="fa fa-trash-o"></i> </button>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <div class="mt-4">
                {{ $serialnumber->appends(\Request::except('page'))->render() }}
            </div>
        </div>
    </div>
    <!-- end panel -->
</div>

<!-- Modal ตารางป็อปอัพ -->
<div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Serial Number</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('serial-number.store')}}" id="main-serial-number" method="POST"
                    enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Serial No</strong>
                                <input type="text" name="serial_number_no" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Product Name</strong>
                                <input type="text" name="serial_number_product_name" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Type Name</strong>
                                <input type="text" name="serial_number_type_name" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Lot</strong>
                                <input type="text" name="serial_number_lot" class="form-control" >
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">ปิด</button>
                <input type="submit" value="ยืนยัน" class="btn btn-primary waves-effect waves-light "
                    form="main-serial-number">
            </div>
        </div>
    </div>
</div>

<form method="post" id="delete">
    @csrf
    @method('DELETE')
</form>

<script>
    function del(id) {
        var urlaction = '{{url('admin/serial-number')}}' + '/' + id;
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
