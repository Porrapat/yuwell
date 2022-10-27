@extends('backend.layouts.main')

@section('head')

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
            <li class="breadcrumb-item"><a href="#!">about us</a>
            </li>
        </ul>
    </div>
</div>


<div id="content" class="content">
    <!-- begin panel -->

        {{-- <h5>About us</h5> --}}
        <div class="row">
            <div class="col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-block ">
                        <div class="text-center">
                            <i class="fa fa-low-vision text-c-blue d-block f-40"></i>
                            <h4 class="m-t-20"> {{ $about->about_us_title_th }} / {{ $about->about_us_title_en }}</h4>
                        </div>
                       
                        
                        <strong>TH</strong>
                        <p class="m-b-20">{!! $about->about_us_content_th !!}</p>
                        <strong>EN</strong>
                        <p class="m-b-20">{!! $about->about_us_content_en !!}</p>


                        <a href="{{ route('about.edit',$about->about_us_id)}}" class="btn btn-warning btn-sm waves-effect"
                            data-target="#Modalupdate">Edit</a>
                      
                        
                        {{-- <button type="button" class="btn btn-primary btn-sm waves-effect" data-toggle="modal"
                            data-target="#large-Modal">Add Vision</button> --}}
                    </div>
                </div>
            </div>
           
        </div>
        {{-- <button type="button" class="btn btn-success waves-effect" data-toggle="modal"
                data-target="#large-Modal1"><i class="fa fa-plus"> Add</i></button> --}}

    

<!-- end panel -->
</div>
<!-- Modal ตารางป็อปอัพ -->
<form action="{{route('about.store')}}" id="main-contractor" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">About us</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                    <h5 class="sub-title">language Thai</h5>

                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Content</strong>
                            <textarea class="form-control summernote" type="text" id="about_us_content_th"
                                name="about_us_content_th" rows="3" placeholder="Enter Content"></textarea>
                        </div>
                    </div>

                    <h5 class="sub-title">language Eng</h5>

                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Content</strong>
                            <textarea class="form-control summernote" type="text" id="about_us_content_en"
                                name="about_us_content_en" rows="3" placeholder="Enter Vision"></textarea>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">ปิด</button>
                    <input type="submit" value="ยืนยัน" class="btn btn-primary waves-effect waves-light "
                        form="main-contractor">
                </div>
            </div>
        </div>
    </div>

</form>
@endsection
@section('script')
<script>
    $("#example1").DataTable(

    );

</script>
@endsection
