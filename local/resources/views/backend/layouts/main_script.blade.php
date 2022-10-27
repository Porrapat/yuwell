
<script src="{{asset('/files/backend/bower_components/jquery/js/jquery.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/popper.js/js/popper.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script src="{{asset('/files/backend/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script src="{{asset('/files/backend/bower_components/modernizr/js/modernizr.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/modernizr/js/css-scrollbars.js')}}"></script>
<!-- Custom js -->
<script  src="{{asset('/files/backend/assets/pages/advance-elements/select2-custom.js')}}"></script>
<script src="{{asset('/files/backend/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('/files/backend/assets/js/vertical/vertical-layout.min.js')}}"></script>
<script src="{{asset('/files/backend/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('/files/backend/assets/js/script.js')}}"></script>


<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- data-table js -->
<script src="{{asset('/files/backend/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}">
</script>
<script src="{{asset('/files/backend/assets/pages/data-table/js/jszip.min.js')}}"></script>
<script src="{{asset('/files/backend/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
<script src="{{asset('/files/backend/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}">
</script>
<script
    src="{{asset('/files/backend/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}">
</script>
<script
    src="{{asset('/files/backend/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}">
</script>



<script src="{{asset('files/backend/assets/pages/data-table/js/data-table-custom.js')}}"></script>


{{-- custom js --}}
{{-- <script src="{{asset('js/custom.js')}}"></script> --}}
<!-- light-box js -->
<script src="{{asset('/files/backend/bower_components/ekko-lightbox/js/ekko-lightbox.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/lightbox2/js/lightbox.js')}}"></script>

<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@500&display=swap" rel="stylesheet">

<!-- Date-time picker css -->
<link rel="stylesheet" type="text/css" href="{{asset('/files/backend/assets/pages/advance-elements/css/bootstrap-datetimepicker.css')}}">
<!-- Date-range picker css  -->
<link rel="stylesheet" type="text/css" href="{{asset('/files/backend/bower_components/bootstrap-daterangepicker/css/daterangepicker.css')}}" />

{{-- ค้นหาตัวเลือก --}}
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- Select 2 js -->
<script  src="{{asset('/files/backend/bower_components/select2/js/select2.full.min.js')}}"></script>
    
<!-- Multiselect js -->
<script  src="{{asset('/files/backend/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js')}}">
</script>
<script  src="{{asset('/files/backend/bower_components/multiselect/js/jquery.multi-select.js')}}"></script>
<script  src="{{asset('/files/backend/assets/js/jquery.quicksearch.js')}}"></script>

{{-- @yield('script') --}}
<script>
    $(document).ready(function () {
        var path = document.URL;
        $('.pcoded-item li').filter(function () {
            return $('a', this).attr('href') === path;
        }).parents("li").addClass('active pcoded-trigger');
        $('.pcoded-item li').filter(function () {
            return $('a', this).attr('href') === path;
        }).addClass('active');
        console.log("ready!");
    });
</script>
<script>
    //light box
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>
{{-- <script>
$('#divBtnImg').hide();
function alertSuccessJs(title, text, success) {
    swal({
        title: "" + title + "",
        text: "" + text + "",
        icon: "" + success + "",
        timer: 3000,
        button: "OK",
    });
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img-preview').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
        $('#divBtnImg').show();
    } else {
        $('#divBtnImg').hide();
    }
}
function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img-preview2').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
        $('#divBtnImg').show();
    } else {
        $('#divBtnImg').hide();
    }
}
$(".dropper-default").dateDropper({
    dropWidth: 200,
    dropPrimaryColor: "#1abc9c",
    dropBorder: "1px solid #1abc9c",
    maxYear: "{!! date('Y')+30 !!}",
    dateFormat: 'dddd-mmmm-yy'
});
$('.select2').select2();
$('.autonumber').autoNumeric('init');
</script> --}}
{{-- </body>
</html> --}}

{{-- //datepicker --}}
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
{{-- <link rel="stylesheet" href="{{asset('/files/backend/resources/demos/style.css')}}"> --}}

<!-- Bootstrap date-time-picker js -->
<script  src="{{asset('/files/backend/assets/pages/advance-elements/moment-with-locales.min.js')}}"></script>
<script  src="{{asset('/files/backend/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script  src="{{asset('/files/backend/assets/pages/advance-elements/bootstrap-datetimepicker.min.js')}}"></script>

<!-- Date-range picker js -->
<script  src="{{asset('/files/backend/bower_components/bootstrap-daterangepicker/js/daterangepicker.js')}}"></script>
<!-- Date-dropper js -->
<script  src="{{asset('/files/backend/bower_components/datedropper/js/datedropper.min.js')}}"></script>
<!-- Color picker js -->
<script  src="{{asset('/files/backend/bower_components/spectrum/js/spectrum.js')}}"></script>
<script  src="{{asset('/files/backend/bower_components/jscolor/js/jscolor.js')}}"></script>

<link href="{{asset('/files/backend/bootstrap-datepicker-custom/dist/css/bootstrap-datepicker.css')}}" rel="stylesheet" />
<script src="{{asset('/files/backend/bootstrap-datepicker-custom/dist/js/bootstrap-datepicker-custom.js')}}"></script>
<script src="{{asset('/files/backend/bootstrap-datepicker-custom/dist/locales/bootstrap-datepicker.th.min.js')}}" charset="UTF-8"></script>

<!-- data-table js -->
<script src="{{asset('/files/backend/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/files/backend/assets/pages/data-table/js/jszip.min.js')}}"></script>
<script src="{{asset('/files/backend/assets/pages/data-table/js/pdfmake.min.js')}}"></script>
<script src="{{asset('/files/backend/assets/pages/data-table/js/vfs_fonts.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/files/backend/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<script  src="{{asset('/files/backend/assets/js/modal.js')}} "></script>
<script  src="{{asset('/files/backend/assets/js/modalEffects.js')}}"></script>

<script src="{{asset('/files/backend/assets/js/classie.js')}} "></script>


 <!-- Custom js -->
 <script  src="{{ asset('/files/backend/assets/pages/advance-elements/custom-picker.js') }}"></script>
<!-- Mini-color js -->
<script  src="{{ asset('/files/backend/bower_components/jquery-minicolors/js/jquery.minicolors.min.js') }}"></script>
