@extends('backend.layouts.main')

@section('head')

@endsection

@section('content')

<div class="page-header card">
    <div class="card-block warning-breadcrumb">
        <h5 class="m-b-10">Edit Products Type</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>

            <li class="breadcrumb-item"><a href="#!">Edit Products Type</a>
            </li>
        </ul>
    </div>
</div>

<div id="content" class="content">
    <form action="{{ route('product-type.update',$producttype->type_id  )}}" method="POST" id="update_blog"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')
        <div>
            <div class="card">
                <div class="card-block">
                  
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Name TH</strong>
                            <input type="text" name="type_name" class="form-control" 
                            value="{{ $producttype->type_name }}" placeholder="Enter Title">
                        </div>
                    </div>
                  
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Name EN</strong>
                            <input type="text" name="type_name_th" class="form-control" 
                            value="{{ $producttype->type_name_th }}" placeholder=" Enter Title ">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">cover</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" id="type_img_cover" name="type_img_cover">
                            <br>
                            <img src="{{url('local/public/'.$producttype->type_img_cover.'')}}" width="20%" alt="">
                        </div>
                        <input type="hidden" name="type_img_cover" id="type_img_cover" value="{{ $producttype->type_img_cover}}">
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" id="type_img_icon" name="type_img_icon">
                            <br>
                            <img src="{{url('local/public/'.$producttype->type_img_icon.'')}}" width="20%" alt="">
                        </div>
                        <input type="hidden" name="type_img_icon" id="type_img_icon" value="{{ $producttype->type_img_icon}}">
                    </div>
                   
                    <div class="col-md-12">
                            <a href="{{url('/admin/product-type')}}" class="btn btn-default waves-effect">Back</a>

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
