@extends('backend.layouts.main')

@section('head')

@endsection

@section('content')

<div class="page-header card">
    <div class="card-block warning-breadcrumb">
        <h5 class="m-b-10">Edit</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="#"> <i class="fa fa-home"></i> </a>
            </li>

            <li class="breadcrumb-item"><a href="#!">Edit </a>
            </li>
        </ul>
    </div>
</div>

<div id="content" class="content">
    <form action="{{ route('product-collection.update',$productcollection->collection_id )}}" method="POST" id="update_blog"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')
        <div>
            <div class="card">
                <div class="card-block">
                  
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Name TH</strong>
                            <input type="text" name="collection_name_th" class="form-control" 
                            value="{{ $productcollection->collection_name_th }}" placeholder="Enter Name">
                        </div>
                    </div>
                  
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Name EN</strong>
                            <input type="text" name="collection_name_en" class="form-control" 
                            value="{{ $productcollection->collection_name_en }}" placeholder=" Enter Name">
                        </div>
                    </div>
                   
                   
                   
                   
                    <div class="col-md-12">
                            <a href="{{url('/admin/product-collection',$productcollection->collection_id)}}" class="btn btn-default waves-effect">Back</a>

                        {{-- <button type="button" class="btn btn-default btn-round">Back</button> --}}
                        <input type="submit" id="update_blog" class="btn btn-primary waves-effect" value="Submit">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

</div>
@endsection
@section('script')
@include('flash-message')
<script>
    $("#example1").DataTable(

    );
</script>
@endsection
