@extends('backend.layouts.main')

@section('head')

@endsection

@section('content')

<div class="page-header card">
    <div class="card-block warning-breadcrumb">
        <h5 class="m-b-10">Edit Industry Sector</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>

            <li class="breadcrumb-item"><a href="#!">Edit Industry Sector</a>
            </li>
        </ul>
    </div>
</div>

<div id="content" class="content">
    <form action="{{ route('sector.update',$sector->sector_id  )}}" method="POST" id="update_blog"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')
        <div>
            <div class="card">
                <div class="card-block">
                  

                    <h5 class="sub-title">language Eng</h5>
                  
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Content</strong>
                            <textarea class="form-control summernote" type="text" id="sector_content_en" name="sector_content_en"
                                rows="3" placeholder="Enter Content">{{ $sector->sector_content_en }}</textarea>
                        </div>
                    </div> 

                    <h5 class="sub-title">language Thai</h5>
                   
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Content</strong>
                            <textarea class="form-control summernote" type="text" id="sector_content_th" name="sector_content_th" 
                                rows="3" placeholder="Enter Content">{{ $sector->sector_content_th }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Logo</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" id="sector_logo" name="sector_logo">
                            <br>
                            <img src="{{url('local/public/'.$sector->sector_logo.'')}}" width="20%" alt="">
                        </div>
                        <input type="hidden" name="sector_logo" id="sector_logo" value="{{ $sector->sector_logo}}">
                    </div>
                 
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">cover</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" id="sector_img" name="sector_img">
                            <br>
                            <img src="{{url('local/public/'.$sector->sector_img.'')}}" width="20%" alt="">
                        </div>
                        <input type="hidden" name="sector_img" id="sector_img" value="{{ $sector->sector_img}}">
                    </div>
                 
                    <div class="col-md-12">
                            <a href="{{url('/admin/sector')}}" class="btn btn-default waves-effect">Back</a>

                        {{-- <button type="button" class="btn btn-default btn-round">Back</button> --}}
                        <input type="submit" id="update_blog" class="btn btn-primary waves-effect" value="Submit">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

</div>
@endsection
@section('script')
@include('flash-message')
<script>
    $("#example1").DataTable(

    );

    function delnewsimg(id) {
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
                $("#delnewsimg_" + id).submit();
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
