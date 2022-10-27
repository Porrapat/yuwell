@extends('backend.layouts.main')

@section('head')
<!-- sweet alert framework -->
<link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/sweetalert/css/sweetalert.css')}}">
<!-- Sortable -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection


@section('content')
<div class="page-header card">
    <div class="card-block front-icon-breadcrumb">
        <h5 class="m-b-10">Banner</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="index.html"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Banner</a>
            </li>
        </ul>
    </div>
</div>
<div class="page-body">
    <form action="{{url('/admin/banner')}}" method="POST" id="add_home_banner" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h5>Add Banner Home</h5>
            </div>
            {{-- <div class="col-md-12">
                <div class="form-group">
                    <strong>Title EN</strong>
                    <input type="text" name="home_banner_title" class="form-control" placeholder="Enter title" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Title TH</strong>
                    <input type="text" name="home_banner_title_en" class="form-control" placeholder="Enter title" required>
                </div>
            </div> --}}
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Show</strong>
                    <select class="default-select2 form-control" name="home_banner_show" required>
                        <option value="">select</option>
                        <option value="1">Show</option>
                        <option value="0">Off</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <strong>Choose Images</strong>
                <input class="form-control form-control-sm" type="file" name="home_banner_img" required>
                <i style="float:; color:red;">*ขนาดไฟล์ (1600*650 pixels)</i>
            </div>

            <div class="modal-footer">
                <input type="submit" form="add_home_banner" class="btn btn-primary waves-effect" value="Submit">
            </div>
        </div>
    </form>
</div>

<div class="card">
    <div class="card-header">
        <h5>Bannner</h5>
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table tbHover">
                <thead>
                    <tr>
                        <th class="text-center" width="10%">No</th>
                        <th class="text-center" width="25%">Image</th>
                        {{-- <th class="text-center" width="10%">Title</th> --}}
                        <th class="text-center" width="10%">Show</th>
                        <th class="text-center" width="10%">Sort</th>
                        <th class="text-center" width="20%">Action</th>
                    </tr>
                </thead>
                <tbody class="row_position">
                    @foreach ($sort_number as $key => $item)
                    <tr id="{{$item->home_banner_id}}">
                        <td style="text-align: center; vertical-align: middle;">{{$key+1}}</td>

                        <td style="text-align: center; vertical-align: middle;"><img src="{{url('local/public/'.$item->home_banner_img)}}" width="150px" alt="no image"></td>
                        {{-- <td style="text-align: center; vertical-align: middle;"> {{$item->home_banner_title}}</td> --}}
                        <td style="text-align: center; vertical-align: middle;">
                            <div class=" ">
                                <input class="border-checkbox" value="{{$item->home_banner_id}}" type="checkbox"
                                    id="show_{{$item->home_banner_id}}" onclick="show_(this.value)"
                                    {{$item->home_banner_show == 1 ? 'checked' : ''}}>
                                <label class="border-checkbox-label" for="checkbox1">Show</label>
                            </div>
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            <select name="home_banner_sort" id="" class="form-control"
                                onchange="sortnumber_({{$item->home_banner_id}},this.value)">

                                @for ($i = 1; $i <= $sort_count; $i++) @if ($item->home_banner_sort == $i)
                                    <option value="{{$i}}" selected>{{$i}}</option>
                                    @else
                                    <option value="{{$i}}">
                                        {{$i}}
                                    </option>
                                    @endif
                                    @endfor
                            </select>
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            <div class="row">
                                &nbsp;&nbsp;
                                {{-- button Edit --}}
                                <a href="{{ route('banner.edit',$item->home_banner_id)}}" class="btn btn-warning waves-effect"
                                    data-target="#Modalupdate"><i class="fa fa-edit"></i>Edit</a>
                                &nbsp;&nbsp;
                                {{-- button DELETE --}}
                                <form action="{{ route('banner.destroy', $item->home_banner_id)}}" method="post"
                                    id='delban_{{$item->home_banner_id}}'>
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="button" onclick="delban({{$item->home_banner_id}})"
                                        value="{{$item->home_banner_id}}" class="btn waves-effect btn-danger "><i
                                            class="fa fa-trash"></i>Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    function delban(id) {
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
                $("#delban_" + id).submit();
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
<script>
    function sortnumber_(id, number) {
       
        $.ajax({
            url: "{{url('sortnumber')}}",
            type: 'POST',
            dataType: "json",
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
                number: number
            },
            // success: function () {
            //     // window.location.reload(true);
            // }
        });
        alert('Sort Benner Success');
        window.location = 'banner';
        // window.location.reload(true);
    }

    $( ".row_position" ).sortable({
        delay: 0,
        stop: function() {
            var selectedData = new Array();
            $('.row_position tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            sort(selectedData);
        }
    });

    function show_(id) {
        // alert(id);
        var one = 0;
        if ($('#show_' + id).is(':checked')) {
            one = 1;
        } else {
            one = 0;
        }
        $.ajax({
            url: "{{url('show')}}",
            type: 'get',
            dataType: "json",
            data: {
                id: id,
                one: one
            },
            success: function () {
                alert('Banner Has Been Updated!');
                window.location.reload(true);
            }
        });
    }
</script>
@endsection
