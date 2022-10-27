@extends('backend.layouts.main')

@section('head')

@endsection


@section('content')

<div class="page-header card">
    <div class="card-block warning-breadcrumb">
        <h5 class="m-b-10">Edit Banner</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>
           
            <li class="breadcrumb-item"><a href="#!">Edit Banner</a>
            </li>
        </ul>
    </div>
</div>

<div id="content" class="content">
    <form action="{{url('/admin/banner',$banner_info->home_banner_id)}}" method="POST" id="update_home_banner"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')
        <div>
            <div class="card">
                <div class="card-header">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Show</label>
                        <div class="col-sm-10">
                            <select class="default-select2 form-control " name="home_banner_show">
                                {{-- <option value="{{ $banner_info->home_banner_show }}">
                                    @if ($banner_info->home_banner_show == 1 )
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
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="home_banner_title" class="form-control" placeholder="Enter title "
                                value="{{ $banner_info->home_banner_title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Edit Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file" id="home_banner_img" name="home_banner_img">
                            <br>
                            <img src="{{url('local/public/'.$banner_info->home_banner_img.'')}}" width="20%" alt="">
                        </div>
                        <input type="hidden" name="img" id="img" value="{{ $banner_info->home_banner_img }}">
                    </div>
                    <div class="col-md-12">
                            <a href="{{url('/backoffice/homebanner')}}" class="btn btn-default waves-effect">Back</a>
                        {{-- <button type="button" class="btn btn-default btn-round">Close</button> --}}
                        <input type="submit" id="update_home_banner" class="btn btn-primary waves-effect" value="Submit">
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
</div>
@endsection

@section('script')

@endsection
