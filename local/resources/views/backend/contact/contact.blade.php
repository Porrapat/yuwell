@extends('backend.layouts.main')

@section('head')

<!-- lightbox Fremwork -->
<link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/lightbox2/css/lightbox.min.css')}}">
@endsection
@section('content')

<div class="page-header card">
    <div class="card-block front-icon-breadcrumb">
        <h5 class="m-b-10">Contact</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">contact</a>
            </li>
        </ul>
    </div>
</div>
<form action="{{route('contact.update',$contact[0]->contact_id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{method_field('PUT')}}
    <div class="page-header card">
        <div class="card-block">
            <h5 class="m-b-10">Contact</h5>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"> Content TH : </label>
                <div class="col-sm-10">
                    @foreach ($contact as $item)
                    <textarea rows="3" name="contact_content_th" cols="3" class="form-control"
                        placeholder="Content...">{{$item->contact_content_th}}</textarea>
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                    <label class="col-sm-2 col-form-label"> Content EN : </label>
                    <div class="col-sm-10">
                        @foreach ($contact as $item)
                        <textarea rows="3" name="contact_content_en" cols="3" class="form-control"
                            placeholder="Content...">{{$item->contact_content_en}}</textarea>
                        @endforeach
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Location TH : </label>
                    <div class="col-sm-10">
                        @foreach ($contact as $item)
                        <textarea rows="3" name="contact_address_th" cols="3" class="form-control"
                            placeholder="Content...">{{$item->contact_address_th}}</textarea>
                        @endforeach
                    </div>
                </div>
                <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Location EN : </label>
                        <div class="col-sm-10">
                            @foreach ($contact as $item)
                            <textarea rows="3" name="contact_address_en" cols="3" class="form-control"
                                placeholder="Content...">{{$item->contact_address_en}}</textarea>
                            @endforeach
                        </div>
                    </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Telephone : </label>
                
                <div class="col-sm-10">
                    @foreach ($contact as $item)
                 
                        <input type="text" name="contact_phone" class="form-control" value="{{$item->contact_phone}}">

                    @endforeach
                </div>
            </div>
           
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">E-mail : </label>
                <div class="col-sm-10">
                    @foreach ($contact as $item)
                    <input type="text" name="contact_email" class="form-control" value="{{$item->contact_email}}">
                    @endforeach
                </div>
            </div>
            {{-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Website : </label>
                <div class="col-sm-10">
                    @foreach ($contact as $item)
                    <input type="text" name="contact_website" class="form-control" value="{{$item->contact_website}}">
                    @endforeach
                </div>
            </div> --}}
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Working hours TH : </label>
                <div class="col-sm-10">
                    @foreach ($contact as $item)
                    <input type="text" name="contact_work_time_th" class="form-control" value="{{$item->contact_work_time_th}}">
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Working hours EN : </label>
                    <div class="col-sm-10">
                        @foreach ($contact as $item)
                        <input type="text" name="contact_work_time_en" class="form-control" value="{{$item->contact_work_time_en}}">
                        @endforeach
                    </div>
                </div>
            {{-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Map Link: </label>
                <div class="col-sm-10">
                    @foreach ($contact as $item)
                    <input type="text" name="con_map" class="form-control" value="{{$item->con_map}}">
                    @endforeach
                </div>
            </div> --}}

            <h5 class="sub-title">Social Media</h5>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Facebook : </label>
                <div class="col-sm-10">
                    @foreach ($contact as $item)
                    <input type="text" name="contact_facebook" class="form-control" value="{{$item->contact_facebook}}">
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Twitter : </label>
                <div class="col-sm-10">
                    @foreach ($contact as $item)
                    <input type="text" name="contact_twitter" class="form-control" value="{{$item->contact_twitter}}">
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Instragram : </label>
                <div class="col-sm-10">
                    @foreach ($contact as $item)
                    <input type="text" name="contact_instragram" class="form-control" value="{{$item->contact_instragram}}">
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Youtube : </label>
                <div class="col-sm-10">
                    @foreach ($contact as $item)
                    <input type="text" name="contact_youtube" class="form-control" value="{{$item->contact_youtube}}">
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Linkin : </label>
                <div class="col-sm-10">
                    @foreach ($contact as $item)
                    <input type="text" name="contact_linkin" class="form-control" value="{{$item->contact_linkin}}">
                    @endforeach
                </div>
            </div>
            {{-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Map link : </label>
                <div class="col-sm-10">
                    @foreach ($contact as $item)
                    <input type="text" name="contact_map" class="form-control" value="{{$item->contact_map}}">
                    @endforeach
                </div>
            </div> --}}
            <h5 class="sub-title">Shopping</h5>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Lazada : </label>
                <div class="col-sm-10">
                    @foreach ($contact as $item)
                    <input type="text" name="contact_lazada" class="form-control" value="{{$item->contact_lazada}}">
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Shopee : </label>
                <div class="col-sm-10">
                    @foreach ($contact as $item)
                    <input type="text" name="contact_shopee" class="form-control" value="{{$item->contact_shopee}}">
                    @endforeach
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">JD CENTRAL : </label>
                <div class="col-sm-10">
                    @foreach ($contact as $item)
                    <input type="text" name="contact_jd" class="form-control" value="{{$item->contact_jd}}">
                    @endforeach
                </div>
            </div>
                {{-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Open - Close Time: </label>
                    <div class="col-sm-10">
    
                        @foreach ($contact as $item)
                        TH <input type="text" name="con_time" class="form-control" value="{{$item->con_time}}">
                        EN <input type="text" name="con_time_en" class="form-control" value="{{$item->con_time_en}}">
                        <div class="row">
                                <div class="col-sm-3">
                                    <p>Open</p><input class="form-control" name="con_open" type="time" value="{{ $item->con_open}}" />
                                </div>
                                <div class="col-sm-3">
                                    <p>Close</p><input class="form-control" name="con_close" type="time" value="{{ $item->con_close}}" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> --}}

        </div>
        <div class="card-block text-right">
            <button type="submit" class="btn btn-primary waves-effect waves-light ">Submit</button>
        </div>
    </div>
</form>
<!-- Modal ตารางป็อปอัพ -->
{{-- <div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Contact</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('contact.store')}}" id="main-contractor" method="POST"
enctype="multipart/form-data">
@csrf
<h5 class="sub-title">THAILAND</h5>

<div class="col-md-12">
    <div class="form-group">
        <strong>Location</strong>
        <textarea class="form-control" type="text" id="con_location" name="con_location" rows="3"
            placeholder="Enter Location"></textarea>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <strong>Tel</strong>
        <input type="text" name="con_tel" class="form-control" placeholder="Enter Tel">
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <strong>E-mail</strong>
        <input type="text" name="con_mail" class="form-control" placeholder="Enter E-mail">
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <strong>Time</strong>
        <input type="text" name="con_time" class="form-control" placeholder="Enter Time">
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <strong>Fax</strong>
        <input type="text" name="con_fax" class="form-control" placeholder="Enter Fax">
    </div>
</div>

<h5 class="sub-title">INTERNATIONAL</h5>

<div class="col-md-12">
    <div class="form-group">
        <strong>Location</strong>
        <textarea class="form-control" type="text" id="con_location_inter" name="con_location_inter" rows="3"
            placeholder="Enter Location"></textarea>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <strong>Tel</strong>
        <input type="text" name="con_tel_inter" class="form-control" placeholder="Enter Tel">
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <strong>E-mail</strong>
        <input type="text" name="com_mail_inter" class="form-control" placeholder="Enter E-mail">
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <strong>Time</strong>
        <input type="text" name="con_time_inter" class="form-control" placeholder="Enter Time">
    </div>
</div>

<hr>

<div class="col-md-12">
    <div class="form-group">
        <strong>Call Center</strong>
        <input type="text" name="con_callcenter" class="form-control" placeholder="Enter Call Center">
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <strong>Map</strong>
        <input type="text" name="con_map" class="form-control" placeholder="Enter Map">
    </div>
</div>

<h5 class="sub-title">Social Media</h5>

<div class="col-md-12">
    <div class="form-group">
        <strong>Facebook</strong>
        <input type="text" name="con_facebook" class="form-control" placeholder="Enter Facebook">
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <strong>Twitter</strong>
        <input type="text" name="con_twitter" class="form-control" placeholder="Enter Twitter">
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <strong>Youtube</strong>
        <input type="text" name="con_youtube" class="form-control" placeholder="Enter Youtube">
    </div>
</div>

</form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">ปิด</button>
    <input type="submit" value="ยืนยัน" class="btn btn-primary waves-effect waves-light " form="main-contractor">
</div>
</div>
</div>
</div> --}}
@endsection
@section('script')
@include('flash-message')
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });

</script>
<script>
    // clock
    function updateClock() {
        var currentTime = new Date();
        // Operating System Clock Hours for 12h clock
        console.log(currentTime);
        var currentHoursAP = currentTime.getHours();
        // Operating System Clock Hours for 24h clock
        var currentHours = currentTime.getHours();
        // Operating System Clock Minutes
        var currentMinutes = currentTime.getMinutes();
        // Operating System Clock Seconds
        var currentSeconds = currentTime.getSeconds();
        // Adding 0 if Minutes & Seconds is More or Less than 10
        currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
        currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;
        // Picking "AM" or "PM" 12h clock if time is more or less than 12
        var timeOfDay = (currentHours < 12) ? "AM" : "PM";
        // transform clock to 12h version if needed
        currentHoursAP = (currentHours > 12) ? currentHours - 12 : currentHours;
        // transform clock to 12h version after mid night
        currentHoursAP = (currentHoursAP == 0) ? 12 : currentHoursAP;
        // display first 24h clock and after line break 12h version
        var currentTimeString = currentHours + " : " + currentMinutes + " : " + currentSeconds;
        // print clock js in div #clock.
        $("#clock").html(currentTimeString);
    }
    $(document).ready(function () {
        setInterval(updateClock, 0);
    });

    var today = new Date().getHours();
    if (today >= 9 && today <= 19) {
        document.getElementById('openclose').innerHTML = "<span style='color: green;'>OPEN<span>";
    } else {
        document.getElementById('openclose').innerHTML = "<span style='color: red;'>Close<span>";
    }

</script>

<script src="{{asset('files/bower_components/lightbox2/js/lightbox.min.js')}}"></script>

@endsection
