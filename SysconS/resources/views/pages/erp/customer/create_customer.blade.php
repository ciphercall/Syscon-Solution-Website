{{-- @extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/customers')}}">Manage</a>
<form action="{{route('customers.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	{!! input_field(["label"=>"C Name","name"=>"txtC_name"]) !!}
	{!! input_field(["label"=>"Deg","name"=>"txtDeg"]) !!}
	{!! input_field(["label"=>"C Phone","name"=>"txtC_phone"]) !!}
	{!! input_field(["label"=>"C Email","name"=>"txtC_email"]) !!}
	{!! input_field(["label"=>"C Review","name"=>"txtC_review"]) !!}
	{!! input_field(["label"=>"Status","name"=>"txtStatus"]) !!}
	{!! input_field(["label"=>"Comment","name"=>"txtComment"]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at"]) !!}
	{!! input_field(["label"=>"Bn C Name","name"=>"txtBn_c_name"]) !!}
	{!! input_field(["label"=>"Bn C Deg","name"=>"txtBn_c_deg"]) !!}
	{!! input_field(["label"=>"Bn Review","name"=>"txtBn_review"]) !!}
	{!! input_field(["label"=>"Jp C Name","name"=>"txtJp_c_name"]) !!}
	{!! input_field(["label"=>"Jp C Deg","name"=>"txtJp_c_deg"]) !!}
	{!! input_field(["label"=>"Jp C Review","name"=>"txtJp_c_review"]) !!}

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
                <h3 class="page-title">Customer List</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Customer List</li>
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
                    <h2 class="card-title mb-0">Add Customer </h2>
                </div>
                <div class="card-body">
                    <div class="card-body" data-select2-id="select2-data-15-ltse">
                        <form action="{{route('add-customers')}}" method="post" enctype="multipart/form-data" data-select2-id="select2-data-14-6nfs">
                            @csrf
                            <div class="row" data-select2-id="select2-data-13-jku7">

                                <div class="col-md-12">
                                    <h3 class="card-title">Add Customer  details</h3>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Customer Name:</label>
                                                <input type="text" class="form-control" name="txtC_name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Bangla Name:</label>
                                                <input type="text" class="form-control" name="txtBn_c_name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Japanese  Name:</label>
                                                <input type="text" class="form-control" name="txtJp_c_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Designation EN:</label>
                                                <input type="text" class="form-control" name="txtDeg">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Designation BN:</label>
                                                <input type="text" class="form-control" name="txtBn_c_deg">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Designation JP:</label>
                                                <input type="text" class="form-control" name="txtJp_c_deg">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Review EN:</label>
                                                {{-- <input type="text" class="form-control" name="txtDeg"> --}}
                                                <textarea rows="4" class="form-control summernote" placeholder="Enter your message here " name="txtC_review"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Review BN:</label>
                                                {{-- <input type="text" class="form-control" name="txtDeg"> --}}
                                                <textarea rows="4" class="form-control summernote" placeholder="Enter your message here" name="txtBn_review"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Review JP:</label>
                                                {{-- <input type="text" class="form-control" name="txtDeg"> --}}
                                                <textarea rows="4" class="form-control summernote" placeholder="Enter your message here" name="txtJp_c_review"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <input type="text" class="form-control" name="txtC_email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone:</label>
                                                <input type="text" class="form-control" name="txtC_phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Photo:</label>
                                                <input type="file" class="form-control" name="filePhoto">
                                            </div>
                                        </div>

                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address line:</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Country:</label>
                                                <select class="select select2-hidden-accessible" data-select2-id="select2-data-7-64c6" tabindex="-1" aria-hidden="true">
                                                    <option data-select2-id="select2-data-9-ls9d">Select Country</option>
                                                    <option value="1">USA</option>
                                                    <option value="2">France</option>
                                                    <option value="3">India</option>
                                                    <option value="4">Spain</option>
                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-8-82n0" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-9y8w-container" aria-controls="select2-9y8w-container"><span class="select2-selection__rendered" id="select2-9y8w-container" role="textbox" aria-readonly="true" title="Select Country">Select Country</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>State/Province:</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>ZIP code:</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City:</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div> --}}
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
