@extends('backend.layouts.main')

@section('head')

<!-- sweet alert framework -->
<link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/sweetalert/css/sweetalert.css')}}">


@endsection
@section('content')

<div class="page-header card">
    <div class="card-block front-icon-breadcrumb">
        <h5 class="m-b-10">Service Report</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item">
                service report
            </a>
            </li>
        </ul>
    </div>
</div>


<div id="content" class="content">
    <!-- begin panel -->
    <div class="card">
        <div class="card-header">
            <h5>service report</h5>
            <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#large-Modal"><i
                    class="fa fa-plus"> </i> Add</button>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No.</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Surname</th>
                            <th class="text-center">Serial No</th>
                            <th class="text-center" width="25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warranty as $key => $item)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">{{$key+1}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_name}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_surname}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_serial_number}}</td>

                            <td style="text-align: center; vertical-align: middle;">
                                <div class="row">
                                    &nbsp;&nbsp;
                                    <a href="{{ route('video.edit',$item->warranty_id )}}" class="btn btn-warning waves-effect"
                                        data-target="#Modalupdate"><i class="fa fa-edit"></i></a>
                                    &nbsp;&nbsp;
                                    <button type="button" class="btn btn-danger" onclick="del({{$item->warranty_id }})"><i class="fa fa-trash-o"></i> </button>
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
