@extends('backend.layouts.main')

@section('head')

<!-- sweet alert framework -->
<link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/sweetalert/css/sweetalert.css')}}">


@endsection
@section('content')

<div class="page-header card">
    <div class="card-block front-icon-breadcrumb">
        <h5 class="m-b-10">Serial Number</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item">
                edit serial number
            </a>
            </li>
        </ul>
    </div>
</div>


<div id="content" class="content">
    <!-- begin panel -->
    <div class="card">
        <div class="card-header">
            <h5>edit serial number</h5>
        </div>
        <div class="card-block table-border-style">
            <form method="post" action="{{ route('serial-number.update', $serialnumber->serial_number_id) }}" id="main-serial-number">
                <div class="row">
                    <div class="col-md-12">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Serial No</strong>
                                    <input type="text" name="serial_number_no" class="form-control" value="{{ $serialnumber->serial_number_no }}" style="background-color:#ccc" readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Product Name</strong>
                                    <input type="text" name="serial_number_product_name" class="form-control" value="{{ $serialnumber->serial_number_product_name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Type Name</strong>
                                    <input type="text" name="serial_number_type_name" class="form-control" value="{{ $serialnumber->serial_number_type_name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Lot</strong>
                                    <input type="text" name="serial_number_lot" class="form-control" value="{{ $serialnumber->serial_number_lot }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Year Warranty</strong>
                                    <input type="number" name="serial_number_year_from" class="form-control" value="{{ $serialnumber->serial_number_year_from }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('admin/serial-number') }}" class="btn btn-default waves-effect">ปิด</a>
                            <input type="submit" value="ยืนยัน" class="btn btn-primary waves-effect waves-light">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end panel -->
</div>

@endsection
