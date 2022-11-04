@extends('backend.layouts.layoutprint', ['title' => 'Warranty'])
@section('content')
<style>
    #mytable {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #mytable td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #mytable th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #000;
        color: white;
        border: 1px solid #ddd;
        padding: 8px;
    }
</style>


    <section class="sheet">
        <div class="content">

            <div class="header-section">
                <div class="logo">
                    <img src="{{ url('/files/backend/image/yuwell-logo.jpg') }}" class="img-logo" alt="">
                </div>

                <div class="page-title">
                    <div class="text-right">
                        <div>
                            <div>ใบรายงานผลการให้บริการ</div>
                            <div>เลขที่ {{ $warranty->warranty_id }} </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-table">
                <div class="card-block table-border-style">
                    <table id="mytable">
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $warranty->warranty_id }}</td>
                            </tr>
                            <tr>
                                <td>Serial Number</td>
                                <td>{{  $warranty->warranty_serial_number }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{  $warranty->warranty_name }}</td>
                            </tr>
                            <tr>
                                <td>Surname</td>
                                <td>{{  $warranty->warranty_surname }}</td>
                            </tr>
                            <tr>
                                <td>Telephone</td>
                                <td>{{  $warranty->warranty_telephone }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{  $warranty->warranty_email }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{  $warranty->warranty_address }}</td>
                            </tr>
                            <tr>
                                <td>วันที่รับบริการ</td>
                                <td>{{  $warranty->warranty_service_date }}</td>
                            </tr>
                            <tr>
                                <td>ร้านที่ซื้อ</td>
                                <td>{{  $warranty->warranty_shop_name }}</td>
                            </tr>
                            <tr>
                                <td>วันที่ซื้อ</td>
                                <td>{{  $warranty->warranty_buy_date }}</td>
                            </tr>
                            <tr>
                                <td>ชื่อสินค้า</td>
                                <td>{{  $warranty->warranty_product_name }}</td>
                            </tr>
                            <tr>
                                <td>ประเภทสินค้า</td>
                                <td>{{  $warranty->warranty_type_name }}</td>
                            </tr>
                            <tr>
                                <td>Lot</td>
                                <td>{{  $warranty->warranty_lot }}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>


@endsection
