@extends('backend.layouts.main')

@section('head')

@endsection

@section('content')

<div class="page-header card">
    <div class="card-block warning-breadcrumb">
        <h5 class="m-b-10">Edit timeline</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>

            <li class="breadcrumb-item"><a href="#!">Edit timeline</a>
            </li>
        </ul>
    </div>
</div>

<div id="content" class="content">
    <form action="{{ route('timeline.update',$timeline->timeline_id  )}}" method="POST" id="update_blog"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')
        <div>
            <div class="card">
                <div class="card-block">
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Year</strong>
                            <input type="text" name="timeline_date" class="form-control" value="{{ $timeline->timeline_date }}" placeholder="Enter Name">
                        </div>
                    </div>
                    <h5 class="sub-title">language Thai</h5>
                   
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Content</strong>
                            <textarea class="form-control summernote" type="text" id="timeline_content_th" name="timeline_content_th" 
                                rows="3" placeholder="Enter Content">{{ $timeline->timeline_content_th }}</textarea>
                        </div>
                    </div>

                    <h5 class="sub-title">language Eng</h5>
                  
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Content</strong>
                            <textarea class="form-control summernote" type="text" id="timeline_content_en" name="timeline_content_en"
                                rows="3" placeholder="Enter Content">{{ $timeline->timeline_content_en }}</textarea>
                        </div>
                    </div> 
                  
                  

                    <div class="col-md-12">
                            <a href="{{url('/admin/timeline')}}" class="btn btn-default waves-effect">Back</a>

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
@endsection
