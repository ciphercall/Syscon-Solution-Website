{{-- @extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/workedbrands')}}">Manage</a>
<form action="{{route('workedbrands.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	{!! input_field(["label"=>"W Brand Name","name"=>"txtW_brand_name"]) !!}
	{!! input_field(["label"=>"Work Details","name"=>"txtWork_details"]) !!}
	{!! input_field(["label"=>"Bn W Brand Name","name"=>"txtBn_w_brand_name"]) !!}
	{!! input_field(["label"=>"Jp W Brand Name","name"=>"txtJp_w_brand_name"]) !!}
	{!! input_field(["label"=>"Bn Work Details","name"=>"txtBn_work_details"]) !!}
	{!! input_field(["label"=>"Jp Work Details","name"=>"txtJp_work_details"]) !!}
	{!! input_field(["label"=>"B Logo","name"=>"txtB_logo"]) !!}
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
                <h2 class="page-title">Worked Brand List</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Worked Brand List</li>
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
                    <h2 class="card-title mb-0">Manage Worked Brand </h2>
                </div>
                <div class="card-body">
                    <div class="card-body" data-select2-id="select2-data-15-ltse">

                            <form action="{{route('workedbrands.store')}}" method="post" enctype="multipart/form-data" data-select2-id="select2-data-14-6nfs" >
                                @csrf
                            <div class="row" data-select2-id="select2-data-13-jku7">

                                <div class="col-md-12">
                                    <h3 class="card-title">Worked Brand Name</h3>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Brand Name EN:</label>
                                                <input type="text" class="form-control" name="txtW_brand_name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Brand Name BN:</label>
                                                <input type="text" class="form-control" name="txtBn_w_brand_name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Brand Name JP:</label>
                                                <input type="text" class="form-control" name="txtJp_w_brand_name">
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="card-title">Worked Brand Details</h3>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Work Details EN:</label>
                                                <input type="text" class="form-control" name="work_details">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Work Details BN:</label>
                                                <input type="text" class="form-control " name="bn_work_details">
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Work Details JP:</label>
                                                <input type="text" class="form-control" name="jp_work_details">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Brand Logo:</label>
                                                <input type="file" class="form-control" name="filePhoto">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Comment:</label>
                                                <input type="text" class="form-control" name="txtComment">
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


        </div>
    </div>

</div>
@endsection
