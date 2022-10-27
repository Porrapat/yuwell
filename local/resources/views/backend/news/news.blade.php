@extends('backend.layouts.main')

@section('head')

@endsection

@section('content')

<div class="page-header card">
    <div class="card-block front-icon-breadcrumb">
        <h5 class="m-b-10">news</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>
           
            <li class="breadcrumb-item"><a href="#!">news</a>
            </li>
        </ul>
    </div>
</div>
<div id="content" class="content">
    <!-- begin panel -->
    <div class="card">
        <div class="card-header">
            <h5>news</h5>
            <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#large-Modal"><i
                    class="fa fa-plus">   </i></button>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">Date</th>
                            {{-- <th class="text-center" width="10%">Img</th> --}}
                            <th class="text-center" width="15%">Title TH</th>
                            <th class="text-center" width="15%">Title EN</th>
                            <th class="text-center" width="15%">Content TH</th>
                            <th class="text-center" width="15%">Content EN</th>
                            <th class="text-center" width="25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as  $key => $item)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">{{$item->news_date}}</td>
                            {{-- <td><img src="{{url('local/public/'.$item->news_img)}}" width="100%" alt="no image"></td> --}}
                            <td style="text-align: center; vertical-align: middle;"> {{$item->news_title_th}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->news_title_en}}</td>

                            <td style="text-align: center; vertical-align: middle;">
                                	{!! Str::limit(strip_tags($item->news_content_th), 25) !!}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                        {!! Str::limit(strip_tags($item->news_content_en), 25) !!}</td>
    
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
                                    <a href="{{ route('news.edit',$item->news_id )}}" class="btn btn-warning waves-effect"
                                        data-target="#Modalupdate"><i class="fa fa-edit"></i></a>
                                    &nbsp;&nbsp;
                                    {{-- button DELETE --}}
                                    <button type="button" class="btn btn-danger" onclick="del({{$item->news_id }})"><i class="fa fa-trash-o"></i> </button>
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
                <h4 class="modal-title">news</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('news.store')}}" id="main-contractor" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h5 class="sub-title">language Thai</h5>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Title</strong>
                            <input type="text" name="news_title_th" class="form-control" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Content</strong>
                            <textarea class="form-control summernote" type="text" id="news_content_th" name="news_content_th" 
                                rows="3" placeholder="Enter Content"></textarea>
                        </div>
                    </div>

                    <h5 class="sub-title">language Eng</h5>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Title</strong>
                            <input type="text" name="news_title_en" class="form-control" placeholder=" Enter Title ">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Content</strong>
                            <textarea class="form-control summernote" type="text" id="news_content_en" name="news_content_en"
                                rows="3" placeholder="Enter Content"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Date</strong>
                            <input type="date" name="news_date" class="form-control" placeholder="Enter Title">
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <strong>Choose Images</strong>
                        <input class="form-control form-control-sm" type="file" name="news_img">
                       
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Show</strong>
                            <select class="default-select2 form-control" name="news_show">
                                <option value="1">Show</option>
                                <option value="0">Off</option>
                            </select>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <input type="submit" value="Save" class="btn btn-primary waves-effect waves-light "
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
@include('flash-message')
<script>
    $("#example1").DataTable(

    );

</script>
<script>
    function del(id) {
        var urlaction = '{{url('admin/news')}}' + '/' + id;
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
