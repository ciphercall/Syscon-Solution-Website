@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/devsubcategories')}}">Manage</a>
<form action="{{route('devsubcategories.update',$devsubcategorie)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"Devsubcategory","name"=>"txtDevsubcategory","value"=>$devsubcategorie->devsubcategory]) !!}
	{!! input_field(["label"=>"Category","name"=>"txtCategory","value"=>$devsubcategorie->category]) !!}
	{!! input_field(["label"=>"Comment","name"=>"txtComment","value"=>$devsubcategorie->comment]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at","value"=>$devsubcategorie->deleted_at]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
