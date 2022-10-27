@extends('backend.layouts.main')

@section('head')

@endsection

@section('content')

<div class="page-header card">
    <div class="card-block front-icon-breadcrumb">
        <h5 class="m-b-10">Group Honor</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="{{url('/admin/honor')}}">Group Honor</a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Group Honor</a>
            </li>
        </ul>
    </div>
</div>


<div id="content" class="content">
   <!-- begin panel -->
   <div class="card">
    <div class="card-header">
        <h5>Group Honor</h5>
        <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#large-Modal"><i
                class="fa fa-plus">   </i></button>
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" width="5%">No.</th>
                        <th class="text-center" width="50%">Img</th>
                        <th class="text-center" width="25%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($overview as  $key => $item)
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">{{$key+1}}</td>
                        <td><img src="{{url('local/public/'.$item->honor_img)}}" width="100%" alt="no image"></td>

                     

                            {{-- <td style="text-align: center; vertical-align: middle;">
                                <div class=" ">
                                    <input class="border-checkbox" value="{{$item->milestone_id }}" type="checkbox"
                                        id="show_{{$item->milestone_id }}" onclick="show_(this.value)"
                                        {{$item->blog_popular == 1 ? 'checked' : ''}}>
                                </div>
                                @if ($item->blog_popular == 1 )
                                <span style="color: #4099ff" > Show </span>
                            @else
                                <span style="color: #FF5370"> Off </span>
                            @endif
                            </td> --}}

                        <td style="text-align: center; vertical-align: middle;">
                            <div class="row">
                                &nbsp;&nbsp;
                                {{-- button Edit --}}
                                <a href="{{ route('overview.edit',$item->honor_id  )}}" class="btn btn-warning waves-effect"
                                    data-target="#Modalupdate"><i class="fa fa-edit"></i></a>
                                &nbsp;&nbsp;
                                {{-- button DELETE --}}
                                <button type="button" class="btn btn-danger" onclick="del({{$item->honor_id  }})"><i class="fa fa-trash-o"></i> </button>
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
<!-- Modal ตารางป็อปอัพ -->
<div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Group Honor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('overview.store')}}" id="main-contractor" method="POST" enctype="multipart/form-data">
                    @csrf
                
                    <div class="col-lg-12">
                        <strong>Choose Images</strong>
                        <input class="form-control form-control-sm" type="file" name="honor_img">
                       
                    </div>

                  
                  
            
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">ปิด</button>
                <input type="submit" value="ยืนยัน" class="btn btn-primary waves-effect waves-light "
                    form="main-contractor">
            </div>
        </div>
    </div>
</div>
<form action="" method="post" id="delete">
    
    @csrf
    @method('DELETE')
</form>
@endsection
@section('script')
<script>
    $("#example1").DataTable(

    );

</script>
<script>
    function del(id) {
        var urlaction = '{{url('admin/overview')}}' + '/' + id;
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
            // alert(result.value);
            if (result.value) {
                //   alert("ผ่าน");
                //   alert("#deleteclass_"+id );
                $("#delete").attr('action', urlaction);
                $("#delete").submit();
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
