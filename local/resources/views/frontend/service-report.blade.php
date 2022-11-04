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
    @inject('carbon', 'Carbon\Carbon')

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

    <style>
        .form-search-serial
        {
            width:80%;
            display: inline-block;
        }

        .my-button-search
        {
            display: inline-block;
            margin-top:-6px;
        }

        .not-found-detail
        {
            font-size:10px;
            color:red;
        }

        .imageThumb {
            max-height: 150px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }
        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }
        .remove {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
        }
        .remove:hover {
            background: white;
            color: black;
        }
    </style>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="form-warranty">
                        <div class="header">
                            <div class="col-left">
                                <div class="topic-head">Service <span>report</span></div>
                                <p>ใบแจ้งเข้ารับบริการ</p>
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

                        <div class="header">
                            <div class="col-md-6">
                                <form id="my_form" action="{{ url('/service-report') }}" method="GET">
                                    <div class="form-group has-search">
                                        <input type="text" id="serial_number" name="serial_number" class="form-control form-search-serial" value="{{ Request::get('serial_number') }}" placeholder="Search serial number">
                                        <button type="submit" class="btn btn-danger my-button-search">ค้นหา</button>
                                        @if ($param == true && $found_warranty == null)
                                        <div class="not-found-detail">Cannot found this serial number</div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>

                        <form action="{{ url('service-report') }}" method="POST" enctype="multipart/form-data">
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
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Email <span>*</span></label>
                                        @if($disabled)
                                            <input type="text" name="service_report_email" class="form-control" readonly style="background-color:#ccc">
                                        @else
                                            <input type="text" name="service_report_email" class="form-control" readonly style="background-color:#ccc" value="{{ $found_warranty->warranty_email }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label">ร้านที่ซื้อ <span>*</span></label>
                                            @if($disabled)
                                                <input type="text" class="form-control" name="service_report_shop_name" value="" readonly style="background: #ccc" />
                                            @else
                                                <input type="text" class="form-control" name="service_report_shop_name" value="{{ $found_warranty->warranty_shop_name }}" readonly style="background-color:#ccc" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">วันที่ซื้อ <span>*</span></label>
                                            @if($disabled)
                                                <input class="form-control" name="service_report_buy_date" type="text" readonly style="background: #ccc" />
                                            @else
                                                <input class="form-control" name="service_report_buy_date" type="text" readonly style="background-color:#ccc" value="{{ $carbon->parse($found_warranty->warranty_buy_date)->format("d-m-Y") }}" />
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
                                                <input type="text" class="form-control" name="service_report_product_name" readonly style="background-color:#ccc" />
                                            @else
                                                <input type="text" class="form-control" name="service_report_product_name" readonly style="background-color:#ccc" value="{{ $found_warranty->warranty_product_name }}" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label">รุ่น <span>*</span></label>
                                            @if($disabled)
                                                <input type="text" class="form-control" name="service_report_type_name" readonly style="background-color:#ccc" />
                                            @else
                                                <input type="text" class="form-control" name="service_report_type_name" readonly style="background-color:#ccc" value="{{ $found_warranty->warranty_type_name }}" />
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
                                            <input type="text" name="service_report_serial_number" class="form-control" readonly style="background-color:#ccc" >
                                        @else
                                            <input type="text" name="service_report_serial_number" class="form-control" readonly style="background-color:#ccc" value="{{ $found_warranty->warranty_serial_number }}" >
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">LOT <span>*</span></label>
                                        @if($disabled)
                                            <input type="text" name="service_report_lot" class="form-control" readonly style="background-color:#ccc" >
                                        @else
                                            <input type="text" name="service_report_lot" class="form-control" readonly style="background-color:#ccc" value="{{ $found_warranty->warranty_lot }}" >
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-check-label">อาการเสีย</label>
                                    <textarea class="form-control" rows="3" name="service_report_problem"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">รูปภาพ (สามารถเลือกได้หลายภาพ)</label>
                                        @if($disabled)
                                            <input class="form-control" accept="image/*" id="service_report_bill_image" name="service_report_bill_image[]" type="file" readonly style="background: #ccc" multiple />
                                        @else
                                            <input class="form-control" accept="image/*" id="service_report_bill_image" name="service_report_bill_image[]" type="file" multiple />
                                        @endif
                                    </div>
                                    <div id="service_report_image_show">
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

    <script>
    $(function() {
        // Multiple images preview with JavaScript
        var previewImages = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {

                        var file = event.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + event.target.result + "\" title=\"" + event.target.name + "\"/>" +
                            "<br/><span class=\"remove\">Remove image</span>" +
                            "</span>").appendTo(imgPreviewPlaceholder);

                        $(".remove").click(function(){
                            $(this).parent(".pip").remove();
                        });
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#service_report_bill_image').on('change', function() {
            previewImages(this, 'div#service_report_image_show');
        });
    });
    </script>
</body>

</html>
