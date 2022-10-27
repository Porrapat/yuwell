@extends('backend.layouts.main')
@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css"
rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
@endsection
@section('content')
<div class="page-header card">
    <div class="card-block front-icon-breadcrumb">
        <h5 class="m-b-10">About us</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="{{url('/about')}}">about us</a>
            </li>
            <li class="breadcrumb-item"><a href="#!"> Edit about us</a>
            </li>
        </ul>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-6">
                <h5>Edit about us</h5>
            </div>
            {{-- <div class="col-sm-6 text-right">
                <a href="{{url('local/public/'.$faq->faq_file)}}" class="btn btn-primary">PDF</a>
            </div> --}}
        </div>
    </div>
    <div class="card-block">
        <form action="{{ route('about.update',$about->about_us_id)}}" method="POST" id="update_blog"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PATCH')
           
            <h5 class="sub-title">language Thai</h5>

            <div class="col-md-12">
                <div class="form-group">
                    <strong>Content</strong>
                    <textarea class="form-control summernote" type="text" id="about_us_content_th"
                        name="about_us_content_th" rows="3" placeholder="Enter Content ">{{ $about->about_us_content_th }}</textarea>
                </div>
            </div>

            <h5 class="sub-title">language Eng</h5>

            <div class="col-md-12">
                <div class="form-group">
                    <strong>Content</strong>
                    <textarea class="form-control summernote" type="text" id="about_us_content_en"
                        name="about_us_content_en" rows="3" placeholder="Enter Content">{{ $about->about_us_content_en }}</textarea>
                </div>
            </div>
        <div class="form-group row">
            <div class="col-md-9">
            </div>
                <div class="col-md-3">
                        <a href="{{url('/admin/about')}}" class="btn btn-default waves-effect">Close</a>

                    <input type="submit" id="update_blog" class="btn btn-primary waves-effect" value="Submit">
                </div>
        </div> 
    </form>
    </div> 
</div> 
@endsection 
@section('script')
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
@endsection
