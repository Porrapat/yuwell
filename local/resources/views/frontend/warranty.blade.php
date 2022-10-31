<!doctype html>
<html>

<head>
    @include('frontend.inc_head')
    <?php $pageName = ""; ?>
</head>

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
                                <div class="topic-head">Warranty <span>registration</span></div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                            <div class="col-right">
                                <form id="my_form" action="{{ url('/warranty') }}" method="GET">
                                    <div class="form-group has-search">
                                        <a href="javascript:{}" onclick="document.getElementById('my_form').submit();"><span class="fa fa-search form-control-feedback" style="color:#ccc"></span></a>
                                        <input type="text" id="serial_number" name="serial_number" class="form-control" placeholder="Search serial number">
                                        @if ($param == true && $found_serial == null)
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

                        <form action="{{ url('warranty') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">ชื่อ <span>*</span></label>
                                        @if($disabled)
                                            <input type="text" name="warranty_name" class="form-control" readonly style="background-color:#ccc">
                                        @else
                                            <input type="text" name="warranty_name" class="form-control" >
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">นามสกุล<span>*</span></label>
                                        @if($disabled)
                                            <input type="text" name="warranty_surname" class="form-control" readonly style="background-color:#ccc">
                                        @else
                                            <input type="text" name="warranty_surname" class="form-control" >
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">ที่อยู่<span>*</span></label>
                                        @if($disabled)
                                            <textarea class="form-control" name="warranty_address" rows="3" readonly style="background-color:#ccc"></textarea>
                                        @else
                                            <textarea class="form-control" name="warranty_address" rows="3"></textarea>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">เบอร์ <span>*</span></label>
                                        @if($disabled)
                                            <input type="text" name="warranty_telephone" class="form-control" readonly style="background-color:#ccc">
                                        @else
                                            <input type="text" name="warranty_telephone" class="form-control" >
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email <span>*</span></label>
                                        @if($disabled)
                                            <input type="text" name="warranty_email" class="form-control" readonly style="background-color:#ccc">
                                        @else
                                            <input type="text" name="warranty_email" class="form-control" >
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label">สินค้า <span>*</span></label>
                                            @if($disabled)
                                                <input type="text" class="form-control" name="warranty_product_name" readonly style="background-color:#ccc" />
                                            @else
                                                <input type="text" class="form-control" name="warranty_product_name" readonly style="background-color:#ccc" value="{{ $found_serial->serial_number_product_name }}" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label">รุ่น <span>*</span></label>
                                            @if($disabled)
                                                <input type="text" class="form-control" name="warranty_type_name" readonly style="background-color:#ccc" />
                                            @else
                                                <input type="text" class="form-control" name="warranty_type_name" readonly style="background-color:#ccc" value="{{ $found_serial->serial_number_type_name }}" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Serial no. <span>*</span></label>
                                        @if($disabled)
                                            <input type="text" name="warranty_serial_number" class="form-control" readonly style="background-color:#ccc" >
                                        @else
                                            <input type="text" name="warranty_serial_number" class="form-control" readonly style="background-color:#ccc" value="{{ $found_serial->serial_number_no }}" >
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">LOT <span>*</span></label>
                                        @if($disabled)
                                            <input type="text" name="warranty_lot" class="form-control" readonly style="background-color:#ccc" >
                                        @else
                                            <input type="text" name="warranty_lot" class="form-control" readonly style="background-color:#ccc" value="{{ $found_serial->serial_number_lot }}" >
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label">ร้านที่ซื้อ <span>*</span></label>
                                            @if($disabled)
                                                <input type="text" class="form-control" name="warranty_shop_name" value="" readonly style="background: #ccc" />
                                            @else
                                                <input type="text" class="form-control" name="warranty_shop_name" value="" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">วันที่ซื้อ <span>*</span></label>
                                        <div id="datepicker" class="installation input-group date" data-date-format="dd-mm-yyyy">
                                            @if($disabled)
                                                <input class="form-control" name="warranty_buy_date" type="text" readonly style="background: #ccc" />
                                            @else
                                                <input class="form-control" name="warranty_buy_date" type="text" />
                                            @endif
                                            <span class="input-group-addon"><i class="bi bi-calendar3"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5>รู้จัก Yuwell ได้อย่างไร</h5>
                            <ul>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="warranty_why_know_yuwell[]" id="repairCheckbox1" value="หนังสือพิมพ์">
                                        <label class="form-check-label" for="repairCheckbox1">หนังสือพิมพ์</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="warranty_why_know_yuwell[]" id="repairCheckbox2" value="นิตยสาร / จดหมายข่าว">
                                        <label class="form-check-label" for="repairCheckbox2">นิตยสาร / จดหมายข่าว</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="warranty_why_know_yuwell[]" id="repairCheckbox3" value="ทีวี">
                                        <label class="form-check-label" for="repairCheckbox3">ทีวี</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="warranty_why_know_yuwell[]" id="repairCheckbox4" value="เพื่อน / คนในครอบครัวแนะนำ">
                                        <label class="form-check-label" for="repairCheckbox4">เพื่อน / คนในครอบครัวแนะนำ</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="warranty_why_know_yuwell[]" id="repairCheckbox5" value="หมอแนะนำ">
                                        <label class="form-check-label" for="repairCheckbox5">หมอแนะนำ</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="warranty_why_know_yuwell[]" id="repairCheckbox6" value="ร้านขายยา">
                                        <label class="form-check-label" for="repairCheckbox6">ร้านขายยา</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="warranty_why_know_yuwell[]" id="repairCheckbox7" value="เว็ปไซต์">
                                        <label class="form-check-label" for="repairCheckbox7">เว็ปไซต์</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="warranty_why_know_yuwell[]" id="repairCheckbox8" value="โซเชียลมีเดีย (เช่น เฟชบุ๊ค, อินสตาแกรม, ทวิทเตอร์, ไลน์)">
                                        <label class="form-check-label" for="repairCheckbox8">โซเชียลมีเดีย (เช่น เฟชบุ๊ค, อินสตาแกรม, ทวิทเตอร์, ไลน์)</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="warranty_why_know_yuwell[]" id="repairCheckbox9" value="การค้นหาผ่านอินเตอร์เน็ต">
                                        <label class="form-check-label" for="repairCheckbox9">การค้นหาผ่านอินเตอร์เน็ต</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="warranty_why_know_yuwell[]" id="repairCheckbox10" value="อื่นๆ">
                                        <label class="form-check-label" for="repairCheckbox10">อื่นๆ</label>
                                    </div>
                                </li>
                            </ul>
                            <h5>ตัดสินใจซื้อเพราะ (What influences your purchasing decision?)</h5>
                            <ul class="purchasing">
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="warranty_decision_buy_because[]" id="repairCheckbox11" value="แพทย์/พยาบาลแนะนำ (Doctor/Nurse)">
                                        <label class="form-check-label" for="repairCheckbox11">แพทย์/พยาบาลแนะนำ (Doctor/Nurse)</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="warranty_decision_buy_because[]" id="repairCheckbox12" value="นิตยสาร/หนังสือพิมพ์ (Magazine/Newspaper)">
                                        <label class="form-check-label" for="repairCheckbox12">นิตยสาร/หนังสือพิมพ์ (Magazine/Newspaper)</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="warranty_decision_buy_because[]" id="repairCheckbox13" value="ญาติ/เพื่อนแนะนำ (Family/Friends recommendation)">
                                        <label class="form-check-label" for="repairCheckbox13">ญาติ/เพื่อนแนะนำ (Family/Friends recommendation)</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="warranty_decision_buy_because[]" id="repairCheckbox14" value="พนักงานขาย (Sales/counterman)">
                                        <label class="form-check-label" for="repairCheckbox14">พนักงานขาย (Sales/counterman)</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="warranty_decision_buy_because[]" id="repairCheckbox15" value="อินเตอร์เน็ต (Internet)">
                                        <label class="form-check-label" for="repairCheckbox15">อินเตอร์เน็ต (Internet)</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="warranty_decision_buy_because[]" id="repairCheckbox16" value="เปลี่ยนเครื่องใหม่ (Want to change to a new device)">
                                        <label class="form-check-label" for="repairCheckbox16">เปลี่ยนเครื่องใหม่ (Want to change to a new device)</label>
                                    </div>
                                </li>
                            </ul>
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
