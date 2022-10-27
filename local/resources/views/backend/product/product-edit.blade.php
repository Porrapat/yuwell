@extends('backend.layouts.main')

@section('head')

@endsection

@section('content')

<div class="page-header card">
    <div class="card-block warning-breadcrumb">
        <h5 class="m-b-10">Edit</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>

            <li class="breadcrumb-item"><a href="#!">Edit </a>
            </li>
        </ul>
    </div>
</div>

<div id="content" class="content">
    <form action="{{ route('product.update',$product->product_id )}}" method="POST" id="update_blog"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')
        <div>
            <div class="card">
                <div class="card-block">
                  
                    
                    <h5 class="sub-title">language Thai</h5>
                      
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Name</strong>
                            <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Content</strong>
                            <textarea class="form-control summernote" type="text" name="product_content_th" rows="3"
                                placeholder="Enter Content">{{ $product->product_content_th }}</textarea>
                        </div>
                    </div>
                    <h5 class="sub-title">language Eng</h5>

                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Name</strong>
                            <input type="text" name="product_name_en" value="{{ $product->product_name_en }}" class="form-control" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Content</strong>
                            <textarea class="form-control summernote" type="text" name="product_content_en" rows="3"
                                placeholder="Enter Content">{{ $product->product_content_en }}</textarea>
                        </div>
                    </div>
                    <h5 class="sub-title">Manual EN</h5>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" name="product_manual_en"
                                 accept="application/pdf"  >
                               
                            </div>
                        </div>
                        <h5 class="sub-title">Manual TH</h5>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" name="product_manual_th"
                                 accept="application/pdf"  >
                               
                            </div>
                        </div>

                    <h4 class="sub-title">Image</h4>
                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label"><br>
                            <input type="file" class="form-control btn btn-primary" name="addimg[]" multiple="multiple" id="add" accept="image/*">
                        </label>
                        <div class="col-sm-11">
                            <div class="row">
                                @foreach ($productimg as $item)
                                <div class="col-lg-2 col-sm-4">
                                    <div class="thumbnail">
                                        <div class="thumb">
                                            <a href="{{asset('local/storage/app/product_img/'.$item->img_name.'')}}"
                                                data-lightbox="1">
                                                <img src="{{asset('local/storage/app/product_img/'.$item->img_name.'')}}"
                                                    alt="" class="img-fluid img-thumbnail">
                                            </a>
                                        </div>
                                    </div>
                                </form>
                                    <input type="file" class="form-control btn btn-warning" name="fileimg[{{$item->img_id  }}]" 
                                    multiple="multiple" id="" accept="image/*">
                                    <div class="text-center">
                                        <form action="{{url('admin/news/delgalleryimg',$item->img_id  )}}" method="POST" 
                                            id="delnewsimg_{{$item->img_id  }}">
                                            {{ method_field('delete') }}
                                            @csrf
                                            <button type="button" form="delnewsimg_{{$item->img_id  }}" 
                                                onclick="delnewsimg({{$item->img_id  }})" 
                                                value="{{$item->img_id  }}" class="btn btn-mat btn-danger "><i class="fa fa-trash"></i></button>
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
                            <a href="{{url('/admin/product',$product->product_id)}}" class="btn btn-default waves-effect">Back</a>

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
    
</script>
<script>
    $(document).ready(function () {

        $('.summernote').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            popover: {
                air: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']]
                ]
            }

        });
    });
</script>
@endsection
