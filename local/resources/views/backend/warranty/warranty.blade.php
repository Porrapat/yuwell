@extends('backend.layouts.main')

@section('head')

<!-- sweet alert framework -->
<link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/sweetalert/css/sweetalert.css')}}">


@endsection
@section('content')

<div class="page-header card">
    <div class="card-block front-icon-breadcrumb">
        <h5 class="m-b-10">Warranty</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item">
                warranty
            </a>
            </li>
        </ul>
    </div>
</div>


<div id="content" class="content">
    <!-- begin panel -->
    <div class="card">
        <div class="card-header">
            <h5>warranty</h5>
            <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#large-Modal"><i
                    class="fa fa-plus"> </i> Add</button>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No.</th>
                            {{-- <th class="text-center" width="10%">Img</th> --}}
                            <th class="text-center" width="15%">Name TH</th>
                            <th class="text-center" width="15%">Name EN</th>
                            <th class="text-center" width="25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($video as  $key => $item)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">{{$key+1}}</td>
                            {{-- <td><img src="{{url('local/public/'.$item->video_img)}}" width="100%" alt="no image"></td> --}}
                            <td style="text-align: center; vertical-align: middle;"> {{$item->video_name_th}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->video_name_en}}</td>



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
                                    <a href="{{ route('video.edit',$item->video_id )}}" class="btn btn-warning waves-effect"
                                        data-target="#Modalupdate"><i class="fa fa-edit"></i></a>
                                    &nbsp;&nbsp;
                                    {{-- button DELETE --}}
                                    <button type="button" class="btn btn-danger" onclick="del({{$item->video_id }})"><i class="fa fa-trash-o"></i> </button>
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

@endsection
