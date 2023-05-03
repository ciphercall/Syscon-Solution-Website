{{-- @extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/sysnews')}}">Manage</a>
<form action="{{route('sysnews.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	{!! input_field(["label"=>"En News H","name"=>"txtEn_news_h"]) !!}
	{!! input_field(["label"=>"Bn News H","name"=>"txtBn_news_h"]) !!}
	{!! input_field(["label"=>"Jp News H","name"=>"txtJp_news_h"]) !!}
	{!! input_field(["label"=>"En News D","name"=>"txtEn_news_d"]) !!}
	{!! input_field(["label"=>"Bn News D","name"=>"txtBn_news_d"]) !!}
	{!! input_field(["label"=>"Jp News D","name"=>"txtJp_news_d"]) !!}
	{!! input_field(["label"=>"News Date","name"=>"txtNews_date"]) !!}
	{!! input_field(["label"=>"N Tag","name"=>"txtN_tag"]) !!}
	{!! input_field(["label"=>"News Category","name"=>"txtNews_category"]) !!}
	{!! input_field(["label"=>"N B Photo","name"=>"txtN_b_photo"]) !!}
	{!! input_field(["label"=>"N H Photo","name"=>"txtN_h_photo"]) !!}
	{!! input_field(["label"=>"Pho Alt Text","name"=>"txtPho_alt_text"]) !!}
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
                        <form action="#" data-select2-id="select2-data-14-6nfs">
                            <div class="row" data-select2-id="select2-data-13-jku7">

                                <div class="col-md-12">
                                    <h4 class="card-title">Personal details</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name:</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name:</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone:</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
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
