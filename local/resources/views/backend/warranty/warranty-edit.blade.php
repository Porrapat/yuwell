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
                warranty status
            </a>
            </li>
        </ul>
    </div>
</div>


<div id="content" class="content">
    <!-- begin panel -->
    <div class="card">
        <div class="card-header">
            <h5>warranty status</h5>
        </div>
        <div class="card-block table-border-style">
            <form method="post" action="{{ route('warranty.update', $warranty->warranty_id) }}" id="main-warranty">

                @csrf
                @method('PATCH')

                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Warranty ID</strong>
                        <input type="text" name="warranty_id" class="form-control" value="{{ $warranty->warranty_id }}" readonly style="background:#ccc">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Warranty Serial Number</strong>
                        <input type="text" name="warranty_serial_number" class="form-control" value="{{ $warranty->warranty_serial_number }}" readonly style="background:#ccc">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Warranty Name</strong>
                        <input type="text" name="warranty_name" class="form-control" value="{{ $warranty->warranty_name }}">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Warranty Surname</strong>
                        <input type="text" name="warranty_surname" class="form-control" value="{{ $warranty->warranty_surname }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Warranty Address</strong>
                        <input type="text" name="warranty_address" class="form-control" value="{{ $warranty->warranty_address }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Warranty Telephone</strong>
                        <input type="text" name="warranty_telephone" class="form-control" value="{{ $warranty->warranty_telephone }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Warranty Email</strong>
                        <input type="text" name="warranty_email" class="form-control" value="{{ $warranty->warranty_email }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ url('admin/warranty') }}" class="btn btn-default waves-effect">ปิด</a>
                        <input type="submit" value="ยืนยัน" class="btn btn-primary waves-effect waves-light">
                    </div>
                </div>

            </form>
        </div>
    </div>
    <!-- end panel -->
</div>

@endsection
