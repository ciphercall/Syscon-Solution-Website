{{-- @extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/dmsubcategories')}}">Manage</a>
<form action="{{route('dmsubcategories.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	{!! input_field(["label"=>"Dmsubcategory","name"=>"txtDmsubcategory"]) !!}
	{!! input_field(["label"=>"Category","name"=>"txtCategory"]) !!}
	{!! input_field(["label"=>"Comment","name"=>"txtComment"]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at"]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]) !!}
</form>

@endsection --}}

@extends('layout.erp.home')
@section('page')

<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Digital Marketing Sub-Category List</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Digital Marketing Sub-Categories List</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-lg-12">

            <!--  ///////////////////////////////////-->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title mb-0">Add Digital Marketing Sub-Category </h2>
                </div>
                <div class="card-body">
                    <div class="card-body" data-select2-id="select2-data-15-ltse">
                        <form action="{{route('dmsubcategories.store')}}" method="post" enctype="multipart/form-data"
                        data-select2-id="select2-data-14-6nfs">
                        @csrf
                            <div class="row" data-select2-id="select2-data-13-jku7">

                                <div class="col-md-12">
                                    <h4 class="card-title">Development Sub-Category</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Development Category:</label>
                                                {{-- <input type="text" class="form-control"> --}}
                                                <select name="txtDmsubcategory" class="form-control" id="">
                                                    <option value="">Select Category..</option>
                                                    @foreach ($dmcategories as $devcategorie)
                                                    <option value="{{$devcategorie->id}}">{{$devcategorie->dmcategory}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Sub-Category Page Name:</label>
                                                <input type="text" class="form-control" name="txtCategory" placeholder="Sub-Category Page Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Page Url:</label>
                                                <input type="text" class="form-control" name="txtD_url" placeholder="Page Url">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Comment:</label>
                                                <input type="text" class="form-control" name="txtComment" placeholder="Comment">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ////////////////////////// -->


        </div>
    </div>

</div>
@endsection
