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
            <a href="{{ url('/admin/warranty/print-excel') }}" class="btn btn-success waves-effect"><i class="fa fa-plus"> </i> Print Excel</a>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No.</th>
                            <th class="text-center">Serial No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Surname</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Telephone</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Type Name</th>
                            <th class="text-center">Lot</th>
                            <th class="text-center">Shop Name</th>
                            <th class="text-center">Buy Date</th>
                            <th class="text-center">รู้จัก Yuwell จาก</th>
                            <th class="text-center">ตัดสินใจซื้อเพราะ</th>
                            <th class="text-center">Picture</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center" width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warranty as $key => $item)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">{{$key+1}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_serial_number}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_name}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_surname}}</td>

                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_address}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_telephone}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_email}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_product_name}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_type_name}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_lot}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_shop_name}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_buy_date}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_why_know_yuwell}}</td>
                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_decision_buy_because}}</td>

                            @if ($item->warranty_bill_reciept_image)
                                <td style="text-align: center; vertical-align: middle;"> <img src="{{ url('local/public/img/warranty/'.$item->warranty_bill_reciept_image) }}" width="100" height="100" /></td>
                            @else
                                <td style="text-align: center; vertical-align: middle;"></td>
                            @endif

                            <td style="text-align: center; vertical-align: middle;"> {{$item->warranty_created_at}} </td>

                            <td style="text-align: center; vertical-align: middle;">
                                <div class="row">
                                    <a href="{{ url('/admin/warranty/print/' . $item->warranty_id) }}" class="btn btn-info waves-effect">Print</a>
                                    <a href="{{ route('warranty.edit',$item->warranty_id )}}" class="btn btn-warning waves-effect"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger" onclick="del({{$item->warranty_id }})"><i class="fa fa-trash-o"></i> </button>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <div class="mt-4">
                {{ $warranty->appends(\Request::except('page'))->render() }}
            </div>
        </div>
    </div>
    <!-- end panel -->
</div>

<form method="post" id="delete">
    @csrf
    @method('DELETE')
</form>

<script>
    function del(id) {
        var urlaction = '{{url('admin/warranty')}}' + '/' + id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'คุณแน่ใจหรือ?',
            text: "ข้อมูลจะไม่สามารถกู้กลับมาได้อีก!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $("#delete").attr('action', urlaction);
                $("#delete").submit();
                swalWithBootstrapButtons.fire(
                    'ลบข้อมูลสำเร็จ!',
                    'ข้อมูลถูกลบออกจากระบบแล้ว',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'ยกเลิก',
                    'ยกเลิกการลบข้อมูล',
                    'error'
                )
            }
        })
    }
</script>

@endsection
