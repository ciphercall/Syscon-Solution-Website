@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/devcategories')}}">Manage</a>
<form action="{{route('devcategories.update',$devcategorie)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"Dcategory","name"=>"txtDcategory","value"=>$devcategorie->dcategory]) !!}
	{!! input_field(["label"=>"Commnet","name"=>"txtCommnet","value"=>$devcategorie->commnet]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at","value"=>$devcategorie->deleted_at]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
