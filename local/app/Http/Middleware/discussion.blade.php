@extends('backoffice.layouts.master')
@section('css')
<!-- sweet alert framework -->
{{-- <link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/sweetalert/css/sweetalert.css')}}">
--}}

@endsection
@section('content')

<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <i class="fa fa-drivers-license-o"></i>
            </div>
            <div class="d-inline-block">
                <h5>Managemant Discussion and Analysis</h5>
                <span> <span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="{{url('/backoffice/ir-financial-statements')}}">Managemant Discussion and Analysis</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header row">

        <div class="col-8"><button type="button" class="btn btn-mat btn-success" data-toggle="modal"
                data-target="#large-Modal"><i class="fa fa-plus"></i>Managemant Discussion and Analysis upload</button></div>

    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="example1" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th style="text-align: center;">Name Thai</th>
                        <th style="text-align: center;">Name Eng</th>
                        <th style="text-align: center;">Year </th>
                        <th style="text-align: center;">File Thai</th>
                        <th style="text-align: center;">File Eng</th>
                        <th style="text-align: center;">Management</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($discussion as $key => $item)

                    <tr>
                        <td style="text-align: center; vertical-align: middle;">{{$item->discussion_name}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{$item->discussion_name_en}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{$item->discussion_date}}</td>
                        <td style="text-align: center; vertical-align: middle;">
                                <a href="{{url('local/public/'.$item->discussion_file)}}" class="btn btn-primary">PDF </a>
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                                <a href="{{url('local/public/'.$item->discussion_file_en)}}" class="btn btn-primary">PDF </a>
                        </td>
                        <td style="text-align: center;">
                            
                            <a href="{{ route('ir-managemant-discussion.edit',$item->discussion_id)}}" class="btn btn-mat btn-warning">
                                <i class="fa fa-edit"></i>Edit</a>
                            <button type="button" onclick="dellicen({{$item->discussion_id}})" value=""
                                class="btn btn-mat btn-danger ">
                                <i class="fa fa-trash"></i>Delete</button>
                            {{-- <a class="col-9" href="{{ route('export',$item->discussion_id) }}">
                            <button type="button" value="" class="btn btn-info waves-effect">
                                <i class=""></i> Download</button>
                            </a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        {{-- <div class="text-center"><img src="{{asset('local\public\logo-login.png')}}" width="15%" alt="logo"></div>
    --}}
    <br>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Managemant Discussion and Analysis upload</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('ir-managemant-discussion.store')}}" method="POST" id="project" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">
                        <span class="mytooltip tooltip-effect-5">
                            <span class="tooltip-item">File Thai</span>
                            <span class="tooltip-content clearfix">
                                <span class="tooltip-text">Choose One.</span>
                            </span>
                        </span>
                    </label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-3">
                                <input type="file" name="discussion_file" class="imgcov" id="addimg"
                                    style="display: none;" accept=".pdf">
                                <button type="button" class="btn btn-success"
                                    onclick="document.getElementById('addimg').click();"><i class="fa fa-plus"></i>
                                    upload </button>

                            </div>
                            <div class="col-sm-9">
                                <br>
                                <div id="previewcov"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">
                        <span class="mytooltip tooltip-effect-5">
                            <span class="tooltip-item">File Eng</span>
                            <span class="tooltip-content clearfix">
                                <span class="tooltip-text">Choose One.</span>
                            </span>
                        </span>
                    </label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-3">
                                <input type="file" name="discussion_file_en" class="imgcov" id="addimg1"
                                    style="display: none;" accept=".pdf">
                                <button type="button" class="btn btn-success"
                                    onclick="document.getElementById('addimg1').click();"><i class="fa fa-plus"></i>
                                    upload </button>

                            </div>
                            <div class="col-sm-9">
                                <br>
                                <div id="previewcov1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name Thai</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="discussion_name" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Name Eng</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="discussion_name_en" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Date</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="discussion_date" placeholder="">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary waves-effect waves-light" form="project" value="Save">
            {{-- <button type="button" class="btn btn-primary waves-effect waves-light ">Save changes</button> --}}
        </div>
    </div>
</div>
</div>


<form action="" method="post" id="deleteuser">

    @csrf
    @method('DELETE')
</form>

@endsection

@section('js')
@include('flash-message')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
{{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}
<script>
    $('.datepicker')
        .datepicker({
            format: 'dd/mm/yyyy',
            todayHighlight: 'TRUE',
            autoclose: true,
        })
        .on('changeDate', function (e) {
            $(this).datepicker('hide');
        });

</script>
<script>
    function showdetail() {
        if ($('#creditor_type').val() == 'single') {
            $("#showdetail").show();
        } else {
            $("#showdetail").hide();
        }
        if ($('#creditor_type').val() == 'group') {
            $("#showdetail1").show();
        } else {
            $("#showdetail1").hide();
        };
    }

</script>
<script>
    $("#example1").DataTable(

    );

    function dellicen(id) {
        var urlaction = '{{ url('ir-managemant-discussion') }}' + '/' + id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $("#deleteuser").attr('action', urlaction);
                $("#deleteuser").submit();
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'ยกเลิกการลบข้อมูล',
                    'error'
                )
            }
        })
    }

</script>
<script>
    // โช์ชื่อไฟล์
    var fileInput = document.getElementById('addimg');
    var listFile = document.getElementById('previewcov');

    fileInput.onchange = function () {
        var files = Array.from(this.files);
        files = files.map(file => file.name);
        listFile.innerHTML = files.join('<br/>');
    }
 // โช์ชื่อไฟล์
 var fileInput1 = document.getElementById('addimg1');
    var listFile1 = document.getElementById('previewcov1');

    fileInput1.onchange = function () {
        var files = Array.from(this.files);
        files = files.map(file => file.name);
        listFile1.innerHTML = files.join('<br/>');
    }

    function delproject(id) {
        // var id =  $(this).attr('id');
        // alert(id);
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
                //   alert("ผ่าน");
                //   alert("#deluser_"+id );
                $("#delproject_" + id).submit();
                // $(this).closest('form').submit();

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
