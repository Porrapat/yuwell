@extends('backend.layouts.main')

@section('head')

<!-- sweet alert framework -->
<link rel="stylesheet" type="text/css" href="{{asset('files/bower_components/sweetalert/css/sweetalert.css')}}">


@endsection
@section('content')

<div class="page-header card">
    <div class="card-block front-icon-breadcrumb">
        <h5 class="m-b-10">{{ $producttype->type_name }}</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item">
                <a href="#!">
               
                Products
               
            </a>
            </li>
        </ul>
    </div>
</div>


<div id="content" class="content">
    <!-- begin panel -->
    <div class="card">
        <div class="card-header">
            <h5>{{ $producttype->type_name }}</h5>
            <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#large-Modal"><i
                    class="fa fa-plus"> </i> Add</button>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="10%">Id</th>
                            <th class="text-center" width="20%">Name EN</th>
                            <th class="text-center" width="20%">Name TH</th>
                            {{-- <th class="text-center" width="20%">show to home page.</th> --}}
                            <th class="text-center" width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productcollection as $key => $item)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">{{$key+1}}</td>
                            <td style="text-align: center; vertical-align: middle;">{{$item->collection_name_en}} </td>
                            <td style="text-align: center; vertical-align: middle;">{{$item->collection_name_th}} </td>
                            {{-- <td style="text-align: center; vertical-align: middle;">
                                <div class=" ">
                                    <input class="border-checkbox" value="{{$item->product_id}}" type="checkbox"
                                        id="show_{{$item->gallery_id}}" onclick="show_(this.value)"
                                        {{$item->gallery_show == 1 ? 'checked' : ''}}>
                                </div>
                                @if ($item->gallery_show == 1 )
                                <span style="color: #4099ff"> Show </span>
                                @else
                                <span style="color: #FF5370"> Off </span>
                                @endif
                            </td> --}}
                            <td style="text-align: center;">
                                <a href="{{ url('/admin/product',$item->collection_id ) }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Products</a>
                                <a href="{{route('product-collection.edit',$item->collection_id  )}}" class="btn btn-mat btn-warning"><i
                                        class="fa fa-edit"></i> Edit</a>
                                <button type="button" class="btn btn-danger"
                                    onclick="del({{$item->collection_id  }})"><i class="fa fa-trash-o"></i> Delete </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end panel -->
</div>
<!-- Modal ตารางป็อปอัพ -->
<div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add {{ $producttype->type_name }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('product-collection.store')}}" id="main-contractor" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="collection_fkey" value="{{ $producttype->type_id }}">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Name EN : </label>
                            <div class="col-sm-10">
                                <input type="text" name="collection_name_en" class="form-control">
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Name TH : </label>
                            <div class="col-sm-10">
                                <input type="text" name="collection_name_th" class="form-control" >
                            </div>
                        </div>

                    {{-- <div class="col-md-12" id="showdetail1" style="display:none">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Services Name EN : </label>
                            <div class="col-sm-10">
                                <input type="text" name="type_name" class="form-control" >
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Services Name TH : </label>
                            <div class="col-sm-10">
                                <input type="text" name="type_name_th" class="form-control" >
                            </div>
                        </div>
                    </div> --}}

                    {{-- <h5 class="sub-title">Image</h5>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" name="collection_img" accept="image/*" multiple required>
                            <i style="float:; color:red;">*ขนาดไฟล์ (... pixels)</i>
                        </div>
                    </div> --}}


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">ปิด</button>
                <input type="submit" value="ยืนยัน" class="btn btn-primary waves-effect waves-light "
                    form="main-contractor">
            </div>
        </div>
    </div>
</div>

<form action="" method="post" id="deletegallery">

    @csrf
    {{ method_field('delete') }}
</form>
@endsection
@section('script')
<script>
    $("#example1").DataTable();

    function showdetail() {
        if ($('#gallery_type').val() == '1') {
            $("#showdetail").show();
        } else {
            $("#showdetail").hide();
        }
        if ($('#gallery_type').val() == '2') {
            $("#showdetail1").show();
        } else {
            $("#showdetail1").hide();
        };
    }

    function delgallery(id) {
        var urlaction = '{{url('backoffice/gallery')}}' + '/' + id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            reverseButtons: true
        }).then((result) => {
            // alert(result.value);
            if (result.value) {
                //   alert("ผ่าน");
                //   alert("#deleteclass_"+id );
                $("#deletegallery").attr('action', urlaction);
                $("#deletegallery").submit();
                // $(this).closest('form').submit();

                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Undelete Data.',
                    'error'
                )
            }
        })
    }

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    function show_(id) {
        // alert(id);
        var one = 0;
        if ($('#show_' + id).is(':checked')) {
            one = 1;
        } else {
            one = 0;
        }
        $.ajax({
            url: "{{url('showgallery')}}",
            type: 'get',
            dataType: "json",
            data: {
                id: id,
                one: one
            },
            success: function () {
                // alert('สวัสดี');
            }
        });
        window.location.reload(true);

    }

    $(document).on('change', '.filterType', function () {
        intyp = $('#gallery_type').val();
        filterIntType(intyp);
    });

    function filterIntType(intyp) {
        $.ajax({
            url: "{{url('backoffice/filterIntType')}}",
            type: 'GET',
            data: {
                intyp: intyp,
            },
        }).done(function (data) {
            $('#Addtypeth').html(data.th_add)
            $('#Addtypeen').html(data.en_add)

        });
    }

</script>
@endsection
