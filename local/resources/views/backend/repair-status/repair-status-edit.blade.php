@extends('backend.layouts.main')

@section('head')

<!-- sweet alert framework -->
<link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/sweetalert/css/sweetalert.css')}}">


@endsection
@section('content')

<div class="page-header card">
    <div class="card-block front-icon-breadcrumb">
        <h5 class="m-b-10">Repair Status</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item">
                edit repair status
            </a>
            </li>
        </ul>
    </div>
</div>


<div id="content" class="content">
    <!-- begin panel -->
    <div class="card">
        <div class="card-header">
            <h5>edit repair status</h5>
        </div>
        <div class="card-block table-border-style">
            <form method="post" action="{{ route('repair-status.update', $repairstatus->repair_status_id) }}" id="main-repair-status">

                @csrf
                @method('PATCH')
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Repair Status Name</strong>
                        <input type="text" name="repair_status_name" class="form-control" value="{{ $repairstatus->repair_status_name }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ url('admin/repair-status') }}" class="btn btn-default waves-effect">ปิด</a>
                        <input type="submit" value="ยืนยัน" class="btn btn-primary waves-effect waves-light">
                    </div>
                </div>

            </form>
        </div>
    </div>
    <!-- end panel -->
</div>

@endsection