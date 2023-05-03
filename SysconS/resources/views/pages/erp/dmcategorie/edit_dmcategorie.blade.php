@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/dmcategories')}}">Manage</a>
<form action="{{route('dmcategories.update',$dmcategorie)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"Dmcategory","name"=>"txtDmcategory","value"=>$dmcategorie->dmcategory]) !!}
	{!! input_field(["label"=>"Commnet","name"=>"txtCommnet","value"=>$dmcategorie->commnet]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at","value"=>$dmcategorie->deleted_at]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
