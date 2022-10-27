@extends('backend.layouts.main')

@section('head')

@endsection

@section('content')

<div class="page-header card">
    <div class="card-block warning-breadcrumb">
        <h5 class="m-b-10">Edit news</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>

            <li class="breadcrumb-item"><a href="#!">Edit news</a>
            </li>
        </ul>
    </div>
</div>

<div id="content" class="content">
    <form action="{{ route('news.update',$news->news_id  )}}" method="POST" id="update_blog"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')
        <div>
            <div class="card">
                <div class="card-block">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">cover</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" id="news_img" name="news_img">
                            <br>
                            <img src="{{url('local/public/'.$news->news_img.'')}}" width="20%" alt="">
                        </div>
                        <input type="hidden" name="news_img" id="news_img" value="{{ $news->news_img}}">
                    </div>
                    <h5 class="sub-title">language Thai</h5>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Title</strong>
                            <input type="text" name="news_title_th" class="form-control" value="{{ $news->news_title_th }}" placeholder="Enter Title">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Content</strong>
                            <textarea class="form-control summernote" type="text" id="news_content_th" name="news_content_th" 
                                rows="3" placeholder="Enter Content">{{ $news->news_content_th }}</textarea>
                        </div>
                    </div>

                    <h5 class="sub-title">language Eng</h5>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Title</strong>
                            <input type="text" name="news_title_en" class="form-control" value="{{ $news->news_title_en }}" placeholder=" Enter Title ">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Content</strong>
                            <textarea class="form-control summernote" type="text" id="news_content_en" name="news_content_en"
                                rows="3" placeholder="Enter Content">{{ $news->news_content_en }}</textarea>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Date</strong>
                            <input type="date" name="news_date" class="form-control" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Show</label>
                        <div class="col-sm-10">
                            <select class="default-select2 form-control " name="news_show">
                                {{-- <option value="{{ $news_info->news_show }}">
                                    @if ($news_info->news_show == 1 )
                                    Show
                                    @else
                                    Off
                                    @endif
                                </option> --}}
                                <option value="1"> Show </option>
                                <option value="2"> Off </option>
                            </select>
                        </div>
                    </div>
                    <br>
                 
                  

                    <h4 class="sub-title">Image</h4>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label"><br>
                            <input type="file" class="form-control btn btn-primary" name="addimg[]" multiple="multiple" id="add" accept="image/*">
                        </label>
                        <div class="col-sm-11">
                            <div class="row">
                                @foreach ($newsimg as $item)
                                <div class="col-lg-2 col-sm-4">
                                    <div class="thumbnail">
                                        <div class="thumb">
                                            <a href="{{asset('local/storage/app/news_img/'.$item->img_news_img.'')}}"
                                                data-lightbox="1">
                                                <img src="{{asset('local/storage/app/news_img/'.$item->img_news_img.'')}}"
                                                    alt="" class="img-fluid img-thumbnail">
                                            </a>
                                        </div>
                                    </div>
                                </form>
                                    <input type="file" class="form-control btn btn-warning" name="fileimg[{{$item->img_news_id }}]" 
                                    multiple="multiple" id="" accept="image/*">
                                    <div class="text-center">
                                        <form action="{{url('admin/news/delgalleryimg',$item->img_news_id )}}" method="POST" 
                                            id="delnewsimg_{{$item->img_news_id }}">
                                            {{ method_field('delete') }}
                                            @csrf
                                            <button type="button" form="delnewsimg_{{$item->img_news_id }}" 
                                                onclick="delnewsimg({{$item->img_news_id }})" 
                                                value="{{$item->img_news_id }}" class="btn btn-mat btn-danger "><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>

                                </div>
                                @endforeach
                                <div class="col-lg-2 col-sm-4">
                                        {{-- <div id="preview">
                                            <br>
                                        </div> --}}
                                        <div id="list_file"><br><br></div>
                                    </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                            <a href="{{url('/admin/news')}}" class="btn btn-default waves-effect">Back</a>

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
