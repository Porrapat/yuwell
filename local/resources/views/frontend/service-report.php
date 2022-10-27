<!doctype html>
<html>

<head>
    <?php require('inc_head.php');
    $pageName = ""; ?>
</head>

<style>
    .table>:not(:first-child) {
        border-top-width: 1px;
    }
</style>

<body>

    <?php require('inc_menu.php'); ?>

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
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control" placeholder="Search serial number">
                                </div>
                            </div>
                        </div>
                        <form action="">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">ชื่อ-นามสกุล <span>*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">เบอร์โทร<span>*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">วันที่<span>*</span></label>
                                        <div id="datepicker" class="installation input-group date" data-date-format="dd-mm-yyyy">
                                            <input class="form-control" type="text" />
                                            <span class="input-group-addon"><i class="bi bi-calendar3"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">ที่อยู่ <span>*</span></label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h5>ลักษณะงานบริการ</h5>
                                    <ul style="margin-bottom: 0;">
                                        <li>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="repairCheckbox1" value="option1">
                                                <label class="form-check-label" for="repairCheckbox1">งานบริการ</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="repairCheckbox2" value="option2">
                                                <label class="form-check-label" for="repairCheckbox2">งานบํารุงรักษา</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="repairCheckbox3" value="option3">
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
                                        <input type="text" class="form-control">
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
                                                <td> <textarea class="form-control" rows="3"></textarea></td>
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
                                                <td> <input type="text" class="form-control"></td>
                                                <td> <input type="text" class="form-control"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">การแก้ไขปัญหา</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">หมายเหตุ</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h5>ผลการให้บริการ</h5>
                                    <div class="row">
                                        <div class="form-check form-check-inline col-12">
                                            <input class="form-check-input" type="checkbox" id="4" value="option4">
                                            <label class="form-check-label" for="repairCheckbox4">เรียบร้อยใชงานได้ปกติ</label>
                                        </div>
                                        <div class="form-check form-check-inline col-12">
                                            <input class="form-check-input" type="checkbox" id="5" value="option5">
                                            <label class="form-check-label" for="repairCheckbox5">ยังไม่เรียบร้อย</label>
                                            <textarea class="form-control" rows="3"></textarea>
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
                                                <input type="text" class="form-control">
                                            </div>
                                            <div id="datepicker" class="installation input-group date" data-date-format="dd-mm-yyyy">
                                                <input class="form-control" type="text" />
                                                <span class="input-group-addon"><i class="bi bi-calendar3"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">วิศวกร</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div id="datepicker" class="installation input-group date" data-date-format="dd-mm-yyyy">
                                                <input class="form-control" type="text" />
                                                <span class="input-group-addon"><i class="bi bi-calendar3"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="text-center border-top p-3">
                                <a href="" class="btn-default btn-red">SUBMIT</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc_footer.php'); ?>
    <?php require('scriptjs.php'); ?>

</body>

</html>