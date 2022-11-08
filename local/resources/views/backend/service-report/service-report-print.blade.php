@extends('backend.layouts.layoutprint_service_report', ['title' => 'Service-Report'])
@section('content')
<style>
    table.mytable
    {
        width: 100%;
        border-collapse: collapse;
    }
    table.mytable td
    {
        border: 1px solid;
        padding: 4px;
    }

    u.dotted-style-1 {
        border-bottom: 1px dashed #999;
        text-decoration: none; 
        width:200px;
        display: inline-block;
        text-align: center;
        color: #000;
    }

    u.dotted-style-name {
        border-bottom: 1px dashed #999;
        text-decoration: none; 
        width:250px;
        display: inline-block;
        text-align: center;
        color: #000;
    }

    u.dotted-style-telephone {
        border-bottom: 1px dashed #999;
        text-decoration: none; 
        width:100px;
        display: inline-block;
        text-align: center;
        color: #000;
    }

    u.dotted-style-date {
        border-bottom: 1px dashed #999;
        text-decoration: none; 
        width:100px;
        display: inline-block;
        text-align: center;
        color: #000;
    }

    u.dotted-style-address {
        border-bottom: 1px dashed #999;
        text-decoration: none; 
        width:700px;
        display: inline-block;
        text-align: left;
        color: #000;
    }

    u.dotted-style-serial-number {
        border-bottom: 1px dashed #999;
        text-decoration: none; 
        width:200px;
        display: inline-block;
        text-align: center;
        color: #000;
    }
    u.dotted-style-other {
        border-bottom: 1px dashed #999;
        text-decoration: none; 
        width:100px;
        display: inline-block;
        color: #000;
    }

    span.square {
        display: inline-block;
        height: 10px;
        width: 10px;
        border: 1px solid black;
        margin-right: 4px;
    }

</style>

    <section class="sheet">
        <div class="content">

            <div class="header-section">
                <div class="logo">
                    <img src="{{ url('/files/backend/image/yuwell-logo.jpg') }}" class="img-logo" alt="">
                </div>

                <div class="page-title">
                    <div>
                        <div>
                            <div><strong>บริษัท ยูเวล เมดิคอล (ไทยแลนด์) จำกัด</strong></div>
                            <div>ที่อยู่ : 33/4 อาคารเดอะไนน์ ทาวเวอร์ แกรนด์ พระราม 9 อาคาร บี ชั้น 28</div>
                            <div>ถนนพระราม 9 แขวงห้วยขวาง เขตห้วยขวาง กรุงเทพมหานคร 10310</div>
                            <div>เลขทะเบียนนิติบุคคล /  เลขประจำตัวผู้เสียภาษีอากร 0105564168789</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-table">
                <div class="text-right" style="margin-top:40px; margin-right:20px;">
                    เลขเคสอ้างอิง <u class="dotted-style-1">{{  $servicereport->service_report_repair_code }} </u>
                </div>

                <div class="text-center" style="font-size:20px;margin-top:40px; margin-bottom:40px;">
                    <strong>ใบรายงานผลการบริการ</strong>
                </div>

                <table class="mytable">
                    <tr>
                        <td>ชื่อลูกค้า <u class="dotted-style-name">{{ $servicereport->service_report_name }} {{  $servicereport->service_report_surname }}</u></td>
                        <td>เบอร์โทรศัพท์ <u class="dotted-style-telephone">{{  $servicereport->service_report_telephone }} </u></td>
                        <td>วันที่ <u class="dotted-style-date">{{  $servicereport->service_report_buy_date }} </u></td>
                    </tr>
                    <tr>
                        <td colspan="3">ที่อยู่ <u class="dotted-style-address text-left">{{ $servicereport->service_report_address }}</u></td>
                    </tr>
                    
                </table>

                <table class="mytable">
                    <tr>
                        <td class="text-center" colspan="2">ลักษณะงานบริการ</td>
                    </tr>
                    <tr>
                        <td><span class="square"></span>งานบริการ <span class="square"></span>งานบำรุงรักษา <span class="square"></span>อื่นๆ <u class="dotted-style-other"></u></td>
                        <td>หมายเลขเครื่อง <u class="dotted-style-serial-number">{{  $servicereport->service_report_serial_number }} </u></td>
                    </tr>
                    <tr>
                        <td class="text-center">ปัญหา/อาการเสีย</td>
                        <td class="text-center">อะไหล่ที่เปลี่ยน</td>
                    </tr>
                    <tr>
                        <td style="height: 100px; vertical-align:top">{{  $servicereport->service_report_problem }}</td>
                        <td style="height: 100px; vertical-align:top">{{  $servicereport->service_report_replacement_parts }}</td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="2">การแก้ไขปัญหา</td>
                    </tr>
                    <tr>
                        <td style="height: 100px; vertical-align:top" colspan="2">{{ $servicereport->service_report_how_to_fix_problem }}</td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="2">หมายเหตุ</td>
                    </tr>
                    <tr>
                        <td style="height: 100px; vertical-align:top" colspan="2">{{ $servicereport->service_report_note }}</td>
                    </tr>
                </table>
            </div>

            <div class="content-footer">
                <div style="margin-bottom:10px;"><u>ผลการให้บริการ</u></div>
                <div><span class="square"></span>เรียบร้อยใช้งานได้ปกติ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="square"></span>ยังไม่เรียบร้อย <u class="dotted-style-other"></u></div>

                <table style="width:100%; margin-top:40px;">
                    <tr>
                        <td>ลูกค้า <u class="dotted-style-serial-number"></u></td>
                        <td>วิศวกร <u class="dotted-style-serial-number"></u></td>
                    </tr>
                </table>

                <table style="width:100%; margin-top:40px;">
                    <tr style="padding-top:20px;">
                        <td>วันที่ <u class="dotted-style-serial-number"></u></td>
                        <td>วันที่ <u class="dotted-style-serial-number"></u></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>


@endsection
