@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/branchduties')}}">Manage</a>
<form action="{{route('branchduties.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	{!! select_field(["label"=>"Branch Id","name"=>"cmbBranchId","table"=>$branchs]) !!}
	{!! input_field(["label"=>"Branch Name","name"=>"txtBranch_name"]) !!}
	{!! input_field(["label"=>"B H Name","name"=>"txtB_h_name"]) !!}
	{!! input_field(["label"=>"B H Phone","name"=>"txtB_h_phone"]) !!}
	{!! input_field(["label"=>"B H Email","name"=>"txtB_h_email"]) !!}
	{!! input_field(["label"=>"B H Address","name"=>"txtB_h_address"]) !!}
	{!! input_field(["label"=>"Assign Date","name"=>"txtAssign_date"]) !!}
	{!! input_field(["label"=>"Comment","name"=>"txtComment"]) !!}
	{!! input_field(["label"=>"Status","name"=>"txtStatus"]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at"]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]) !!}
</form>

@endsection
