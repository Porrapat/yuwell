@extends('backend.layouts.main')

@section('head')

@endsection

@section('content')

<div class="page-header card">
    <div class="card-block front-icon-breadcrumb">
        <h5 class="m-b-10">Timeline</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>
           
            <li class="breadcrumb-item"><a href="#!">Timeline</a>
            </li>
        </ul>
    </div>
</div>
<div id="content" class="content">
    <!-- begin panel -->
    <div class="card">
        <div class="card-header">
            <h5>Timeline</h5>
            <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#large-Modal"><i
                    class="fa fa-plus">   </i></button>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">Year</th>
                            <th class="text-center" width="15%">Content TH</th>
                            <th class="text-center" width="15%">Content EN</th>
                            <th class="text-center" width="25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($timeline as  $key => $item)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">{{$item->timeline_date}}</td>

                            <td style="text-align: center; vertical-align: middle;">
                                	{!! Str::limit(strip_tags($item->timeline_content_th), 25) !!}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                        {!! Str::limit(strip_tags($item->timeline_content_en), 25) !!}</td>
    
                                {{-- <td style="text-align: center; vertical-align: middle;">
                                    <div class=" ">
                                        <input class="border-checkbox" value="{{$item->milestone_id }}" type="checkbox"
                                            id="show_{{$item->milestone_id }}" onclick="show_(this.value)"
                                            {{$item->blog_popular == 1 ? 'checked' : ''}}>
                                    </div>
                                    @if ($item->blog_popular == 1 )
                                    <span style="color: #4099ff" > Show </span>
                                @else
                                    <span style="color: #FF5370"> Off </span>
                                @endif
                                </td> --}}

                            <td style="text-align: center; vertical-align: middle;">
                                <div class="row">
                                    &nbsp;&nbsp;
                                    {{-- button Edit --}}
                                    <a href="{{ route('timeline.edit',$item->timeline_id )}}" class="btn btn-warning waves-effect"
                                        data-target="#Modalupdate"><i class="fa fa-edit"></i></a>
                                    &nbsp;&nbsp;
                                    {{-- button DELETE --}}
                                    <button type="button" class="btn btn-danger" onclick="del({{$item->timeline_id }})"><i class="fa fa-trash-o"></i> </button>
                                </div>

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

<!-- Modal ???????????????????????????????????? -->
<div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">timeline</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('timeline.store')}}" id="main-contractor" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Year</strong>
                            <input type="text" name="timeline_date" class="form-control" placeholder="Enter Year">
                        </div>
                    </div>

                    <h5 class="sub-title">language Thai</h5>
                  
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Content</strong>
                            <textarea class="form-control summernote" type="text" id="timeline_content_th" name="timeline_content_th" 
                                rows="3" placeholder="Enter Content"></textarea>
                        </div>
                    </div>

                    <h5 class="sub-title">language Eng</h5>
                  
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Content</strong>
                            <textarea class="form-control summernote" type="text" id="timeline_content_en" name="timeline_content_en"
                                rows="3" placeholder="Enter Content"></textarea>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <input type="submit" value="Save" class="btn btn-primary waves-effect waves-light "
                    form="main-contractor">
            </div>
        </div>
    </div>
</div>

<form action="" method="post" id="delete">
    
    @csrf
    @method('DELETE')
</form>
@endsection
@section('script')
@include('flash-message')
<script>
    $("#example1").DataTable(

    );

</script>
<script>
    function del(id) {
        var urlaction = '{{url('admin/timeline')}}' + '/' + id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: '?????????????????????????????????????',
            text: "????????????????????????????????????????????????????????????????????????????????????????????????!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: '??????????????????',
            cancelButtonText: '??????????????????',
            reverseButtons: true
        }).then((result) => {
            // alert(result.value);
            if (result.value) {
                //   alert("????????????");
                //   alert("#deleteclass_"+id );
                $("#delete").attr('action', urlaction);
                $("#delete").submit();
                // $(this).closest('form').submit();

                swalWithBootstrapButtons.fire(
                    '??????????????????????????????????????????!',
                    '???????????????????????????????????????????????????????????????????????????',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    '??????????????????',
                    '???????????????????????????????????????????????????',
                    'error'
                )
            }
        })
    }

</script>
@endsection
