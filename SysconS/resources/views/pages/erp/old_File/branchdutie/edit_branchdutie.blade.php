@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/branchduties')}}">Manage</a>
<form action="{{route('branchduties.update',$branchdutie)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! select_field(["label"=>"Branch Id","name"=>"cmbBranchId","table"=>$branchs,"value"=>$branchdutie->branch_id]) !!}
	{!! input_field(["label"=>"Branch Name","name"=>"txtBranch_name","value"=>$branchdutie->branch_name]) !!}
	{!! input_field(["label"=>"B H Name","name"=>"txtB_h_name","value"=>$branchdutie->b_h_name]) !!}
	{!! input_field(["label"=>"B H Phone","name"=>"txtB_h_phone","value"=>$branchdutie->b_h_phone]) !!}
	{!! input_field(["label"=>"B H Email","name"=>"txtB_h_email","value"=>$branchdutie->b_h_email]) !!}
	{!! input_field(["label"=>"B H Address","name"=>"txtB_h_address","value"=>$branchdutie->b_h_address]) !!}
	{!! input_field(["label"=>"Assign Date","name"=>"txtAssign_date","value"=>$branchdutie->assign_date]) !!}
	{!! input_field(["label"=>"Comment","name"=>"txtComment","value"=>$branchdutie->comment]) !!}
	{!! input_field(["label"=>"Status","name"=>"txtStatus","value"=>$branchdutie->status]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at","value"=>$branchdutie->deleted_at]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
