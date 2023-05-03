@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/committees')}}">Manage</a>
<form action="{{route('committees.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	{!! select_field(["label"=>"Branch Id","name"=>"cmbBranchId","table"=>$branchs]) !!}
	{!! input_field(["label"=>"Branch Name","name"=>"txtBranch_name"]) !!}
	{!! input_field(["label"=>"Appro Date","name"=>"txtAppro_date"]) !!}
	{!! input_field(["label"=>"Duration","name"=>"txtDuration"]) !!}
	{!! input_field(["label"=>"Renewal Date","name"=>"txtRenewal_date"]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at"]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]) !!}
</form>

@endsection
