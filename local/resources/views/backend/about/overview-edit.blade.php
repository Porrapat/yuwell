@extends('backend.layouts.main')
@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css"
rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
@endsection
@section('content')
<div class="page-header card">
    <div class="card-block front-icon-breadcrumb">
        <h5 class="m-b-10">Group Honor</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="{{url('/admin/overview')}}">Group Honor</a>
            </li>
            <li class="breadcrumb-item"><a href="#!"> Edit Group Honor</a>
            </li>
        </ul>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-6">
                <h5>Edit Group Honor</h5>
            </div>
            {{-- <div class="col-sm-6 text-right">
                <a href="{{url('local/public/'.$faq->faq_file)}}" class="btn btn-primary">PDF</a>
            </div> --}}
        </div>
    </div>
    <div class="card-block">
        <form action="{{ route('overview.update',$overview->honor_id )}}" method="POST" id="update_blog"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PATCH')
           
          
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">cover</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="honor_img" name="honor_img">
                    <br>
                    <img src="{{url('local/public/'.$overview->honor_img.'')}}" width="20%" alt="">
                </div>
                <input type="hidden" name="honor_img" id="honor_img" value="{{ $overview->honor_img}}">
            </div>
        <div class="form-group row">
            <div class="col-md-9">
            </div>
                <div class="col-md-3">
                        <a href="{{url('/admin/overview')}}" class="btn btn-default waves-effect">Back</a>

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
