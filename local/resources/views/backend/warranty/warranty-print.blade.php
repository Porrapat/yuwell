@extends('backend.layouts.layoutprint', ['title' => 'Warranty'])
@section('content')
<style>
    #mytable {
        /* font-family: Arial, Helvetica, sans-serif; */
        border-collapse: collapse;
        width: 100%;
        font-size:14px;
    }

    #mytable td {
        /* border: 1px solid #ddd; */
        padding: 8px;
        padding-top: 24px;
        padding-bottom: 24px;
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

    .dotted {
        border: 2px dotted #000000;
        border-style: none none dotted;
        color: #fff;
        background-color: #fff;
        margin: 0px;
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
                            <div>ใบรับประกันสินค้า</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-table">
                <div class="card-block table-border-style">
                    <table id="mytable">
                        <tbody>
                            <tr>
                                <td><strong>ชื่อผลิตภัณฑ์</strong></td>

                                <td>{{  $warranty->warranty_product_name }}<hr class='dotted' /></td>
                                <td><strong>รุ่น</strong></td>
                                <td>{{  $warranty->warranty_type_name }}<hr class='dotted' /></td>
                            </tr>
                            <tr>

                            </tr>
                            <tr>
                                <td><strong>S/N</strong></td>
                                <td>{{  $warranty->warranty_serial_number }}<hr class='dotted' /></td>
                                <td><strong>Lot Number</strong></td>
                                <td>{{  $warranty->warranty_lot }}<hr class='dotted' /></td>
                            </tr>

                            <tr>
                                <td><strong>ร้านที่ซื้อ</strong></td>
                                <td>{{  $warranty->warranty_shop_name }}<hr class='dotted' /></td>
                            </tr>
                            <tr>
                                <td><strong>วันที่รับประกัน</strong></td>
                                <td>{{  $warranty->warranty_buy_date }}<hr class='dotted' /></td>
                                <td><strong>วันที่หมดประกัน</strong></td>
                                <td>{{  $warranty->warranty_buy_date }}<hr class='dotted' /></td>
                            </tr>
                            <tr>
                                <td><strong>ชื่อ - สกุล</strong></td>
                                <td>{{ $warranty->warranty_name }} {{  $warranty->warranty_surname }}<hr class='dotted' /></td>
                                <td><strong>เบอร์โทรศัพท์</strong></td>
                                <td>{{  $warranty->warranty_telephone }}<hr class='dotted' /></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="content-footer">
            <strong>บริษัท ยูเวล เมดิคอล (ไทยแลนด์) จำกัด</strong>
            <br/>
            ที่อยู่ : 33/4 อาคารเดอะไนน์ ทาวเวอร์ แกรนด์ พระราม 9 อาคาร บี ชั้น 28   ถนนพระราม 9 แขวงห้วยขวาง เขตห้วยขวาง กรุงเทพมหานคร 10310


            </div>
        </div>
    </section>


@endsection
