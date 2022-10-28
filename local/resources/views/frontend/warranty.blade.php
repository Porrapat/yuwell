<!doctype html>
<html>

<head>
    @include('frontend.inc_head')
    <?php $pageName = ""; ?>
</head>

<body>

    @include('frontend.inc_menu')

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-warranty">
                        <div class="header">
                            <div class="col-left">
                                <div class="topic-head">Warranty <span>registration</span></div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="col-right">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control" placeholder="Search serial number">
                                </div>
                            </div>
                        </div>
                        <form action="{{ url('warranty') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">ชื่อ <span>*</span></label>
                                        <input type="text" name="warranty_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">นามสกุล<span>*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">ที่อยู่<span>*</span></label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">เบอร์ <span>*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">สินค้า <span>*</span></label>
                                        <select class="form-select">
                                            <option selected></option>
                                            <option value="1"></option>
                                            <option value="2"></option>
                                            <option value="3"></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">รุ่น <span>*</span></label>
                                        <select class="form-select">
                                            <option selected></option>
                                            <option value="1"></option>
                                            <option value="2"></option>
                                            <option value="3"></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Serial no. <span>*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">LOT <span>*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">ร้านที่ซื้อ <span>*</span></label>
                                        <select class="form-select">
                                            <option selected></option>
                                            <option value="1"></option>
                                            <option value="2"></option>
                                            <option value="3"></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">วันที่ซื้อ <span>*</span></label>
                                        <div id="datepicker" class="installation input-group date" data-date-format="dd-mm-yyyy">
                                            <input class="form-control" type="text" />
                                            <span class="input-group-addon"><i class="bi bi-calendar3"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5>รู้จัก Yuwell ได้อย่างไร</h5>
                            <ul>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="repairCheckbox1" value="option1">
                                        <label class="form-check-label" for="repairCheckbox1">หนังสือพิมพ์</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="repairCheckbox2" value="option2">
                                        <label class="form-check-label" for="repairCheckbox2">นิตยสาร / จดหมายข่าว</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="repairCheckbox3" value="option3">
                                        <label class="form-check-label" for="repairCheckbox3">ทีวี</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="repairCheckbox4" value="option4">
                                        <label class="form-check-label" for="repairCheckbox4">เพื่อน / คนในครอบครัวแนะนำ</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="repairCheckbox5" value="option5">
                                        <label class="form-check-label" for="repairCheckbox5">หมอแนะนำ</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="repairCheckbox6" value="option6">
                                        <label class="form-check-label" for="repairCheckbox6">ร้านขายยา</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="repairCheckbox7" value="option7">
                                        <label class="form-check-label" for="repairCheckbox7">เว็ปไซต์</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="repairCheckbox8" value="option8">
                                        <label class="form-check-label" for="repairCheckbox8">โซเชียลมีเดีย (เช่น เฟชบุ๊ค, อินสตาแกรม, ทวิทเตอร์, ไลน์)</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="repairCheckbox9" value="option9">
                                        <label class="form-check-label" for="repairCheckbox9">การค้นหาผ่านอินเตอร์เน็ต</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="repairCheckbox10" value="option10">
                                        <label class="form-check-label" for="repairCheckbox10">อื่นๆ</label>
                                    </div>
                                </li>
                            </ul>
                            <h5>ตัดสินใจซื้อเพราะ (What influences your purchasing decision?)</h5>
                            <ul class="purchasing">
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="repairCheckbox11" value="option11">
                                        <label class="form-check-label" for="repairCheckbox11">แพทย์/พยาบาลแนะนำ ( Doctor/Nurse)</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="repairCheckbox12" value="option12">
                                        <label class="form-check-label" for="repairCheckbox12">นิตยสาร/หนังสือพิมพ์ (Magazine/Newspaper)</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="repairCheckbox13" value="option13">
                                        <label class="form-check-label" for="repairCheckbox13">ญาติ/เพื่อนแนะนำ (Family/Friends recommendation)</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="repairCheckbox14" value="option14">
                                        <label class="form-check-label" for="repairCheckbox14">พนักงานขาย (Sales/counterman)</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="repairCheckbox15" value="option15">
                                        <label class="form-check-label" for="repairCheckbox15">อินเตอร์เน็ต (Internet)</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="repairCheckbox16" value="option16">
                                        <label class="form-check-label" for="repairCheckbox16">เปลี่ยนเครื่องใหม่ (Want to change to a new device)</label>
                                    </div>
                                </li>
                            </ul>
                            <div class="text-center border-top p-3">
                                <button type="submit" class="btn-default btn-red">SUBMIT</button>
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
