<!doctype html>
<html>

<head>
    @include('frontend.inc_head')
    <?php $pageName = ""; ?>
</head>

<style>
    .table>:not(:first-child) {
        border-top-width: 1px;
    }
</style>

<body>

    @include('frontend.inc_menu')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (Session::get('success'))
    <script type="text/javascript">
        swal.fire({
            icon:'success',
            title:'Success!',
            text:"{{ Session::get('success') }}",
            timer:3000,
            type:'success'
        }).then((value) => {
        }).catch(swal.noop);
    </script>
    @endif

    @if (Session::get('error'))
    <script type="text/javascript">
        swal.fire({
            icon:'error',
            title:'Error!',
            text:"{{ Session::get('error') }}",
            timer:3000,
            type:'error'
        }).then((value) => {
        }).catch(swal.noop);
    </script>
    @endif

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-warranty">
                        <div class="header">
                            <div class="col-left">
                                <div class="topic-head">Service <span>report</span></div>
                                <p>ใบรายงานผลการบริการ</p>
                            </div>
                            <div class="col-right">
                                <form id="my_form" action="{{ url('/service-report') }}" method="GET">
                                    <div class="form-group has-search">
                                        <a href="javascript:{}" onclick="document.getElementById('my_form').submit();"><span class="fa fa-search form-control-feedback" style="color:#ccc"></span></a>
                                        <input type="text" id="serial_number" name="serial_number" class="form-control" placeholder="Search serial number">
                                        @if ($param == true && $found_warranty == null)
                                            <div style="font-size:10px; color:red">Cannot found this serial number</div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ url('service-report') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">ชื่อ <span>*</span></label>
                                        @if($disabled)
                                            <input type="text" name="service_report_name" class="form-control" readonly style="background-color:#ccc">
                                        @else
                                            <input type="text" name="service_report_name" class="form-control" readonly style="background-color:#ccc" value="{{ $found_warranty->warranty_name }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">นามสกุล <span>*</span></label>
                                        @if($disabled)
                                            <input type="text" name="service_report_surname" class="form-control" readonly style="background-color:#ccc">
                                        @else
                                            <input type="text" name="service_report_surname" class="form-control" readonly style="background-color:#ccc" value="{{ $found_warranty->warranty_surname }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">เบอร์โทร<span>*</span></label>
                                        @if($disabled)
                                            <input type="text" name="service_report_telephone" class="form-control" readonly style="background-color:#ccc">
                                        @else
                                            <input type="text" name="service_report_telephone" class="form-control" readonly style="background-color:#ccc" value="{{ $found_warranty->warranty_telephone }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">วันที่<span>*</span></label>
                                        <div id="datepicker" class="installation input-group date" data-date-format="dd-mm-yyyy">
                                            <input class="form-control" type="text" name="service_report_service_date" />
                                            <span class="input-group-addon"><i class="bi bi-calendar3"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">ที่อยู่ <span>*</span></label>
                                        @if($disabled)
                                            <textarea class="form-control" rows="3" name="service_report_address" readonly style="background-color:#ccc"></textarea>
                                        @else
                                            <textarea class="form-control" rows="3" name="service_report_address" readonly style="background-color:#ccc">{{ $found_warranty->warranty_address }}</textarea>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h5>ลักษณะงานบริการ</h5>
                                    <ul style="margin-bottom: 0;">
                                        <li>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="service_report_service_type[]" type="checkbox" id="repairCheckbox1" value="งานบริการ">
                                                <label class="form-check-label" for="repairCheckbox1">งานบริการ</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="service_report_service_type[]" type="checkbox" id="repairCheckbox2" value="งานบํารุงรักษา">
                                                <label class="form-check-label" for="repairCheckbox2">งานบํารุงรักษา</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="service_report_service_type[]" type="checkbox" id="repairCheckbox3" value="อื่นๆ">
                                                <label class="form-check-label" for="repairCheckbox3">อื่นๆ</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">หมายเลขเครื่อง<span>*</span></label>
                                        @if($disabled)
                                            <input type="text" name="service_report_serial_number" class="form-control" readonly style="background-color:#ccc">
                                        @else
                                            <input type="text" name="service_report_serial_number" class="form-control" readonly style="background-color:#ccc" value="{{ $found_warranty->warranty_serial_number }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-7">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" rowspan="2" class="text-center">ปัญหา/อาการเสีย</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><textarea class="form-control" rows="3" name="service_report_problem"></textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12 col-md-5">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col" colspan="2" class="text-center">อะไหล่ที่เปลี่ยน</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" style="width: 70%;" class="text-center">รายการ</th>
                                                <th scope="col" style="width: 30%;" class="text-center">จํานวน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> <input type="text" name="service_report_list_1" class="form-control"></td>
                                                <td> <input type="text" name="service_report_quantity_1" class="form-control"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">การแก้ไขปัญหา</label>
                                        <textarea class="form-control" rows="3" name="service_report_how_to_fix_problem"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">หมายเหตุ</label>
                                        <textarea class="form-control" rows="3" name="service_report_note"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h5>ผลการให้บริการ</h5>
                                    <div class="row">
                                        <div class="form-check form-check-inline col-12">
                                            <input class="form-radio-input" name="service_report_result_type" type="radio" id="4" value="option4">
                                            <label class="form-check-label" for="repairCheckbox4">เรียบร้อยใชงานได้ปกติ</label>
                                        </div>
                                        <div class="form-check form-check-inline col-12">
                                            <input class="form-radio-input" name="service_report_result_type" type="radio" id="5" value="option5">
                                            <label class="form-check-label" for="repairCheckbox5">ยังไม่เรียบร้อย</label>

                                            <textarea class="form-control" rows="3" name="service_report_result_type_not_good"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-start mb-5">
                                <div class="col-12 col-md-8">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">ลูกค้า</label>
                                                <input type="text" class="form-control" name="service_report_customer_sign_name">
                                            </div>
                                            <div id="datepicker" class="installation input-group date" data-date-format="dd-mm-yyyy">
                                                <input class="form-control" type="text" name="service_report_customer_sign_date" />
                                                <span class="input-group-addon"><i class="bi bi-calendar3"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">วิศวกร</label>
                                                <input type="text" class="form-control" name="service_report_engineer_sign_name">
                                            </div>
                                            <div id="datepicker" class="installation input-group date" data-date-format="dd-mm-yyyy">
                                                <input class="form-control" type="text" name="service_report_engineer_sign_date" />
                                                <span class="input-group-addon"><i class="bi bi-calendar3"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="text-center border-top p-3">
                                @if($disabled)
                                @else
                                    <button type="submit" class="btn-default btn-red">SUBMIT</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.inc_footer')
    @include('frontend.scriptjs')

</body>

</html>
