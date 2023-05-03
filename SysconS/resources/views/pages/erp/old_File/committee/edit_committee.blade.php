@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/committees')}}">Manage</a>
<form action="{{route('committees.update',$committee)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! select_field(["label"=>"Branch Id","name"=>"cmbBranchId","table"=>$branchs,"value"=>$committee->branch_id]) !!}
	{!! input_field(["label"=>"Branch Name","name"=>"txtBranch_name","value"=>$committee->branch_name]) !!}
	{!! input_field(["label"=>"Appro Date","name"=>"txtAppro_date","value"=>$committee->appro_date]) !!}
	{!! input_field(["label"=>"Duration","name"=>"txtDuration","value"=>$committee->duration]) !!}
	{!! input_field(["label"=>"Renewal Date","name"=>"txtRenewal_date","value"=>$committee->renewal_date]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at","value"=>$committee->deleted_at]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
