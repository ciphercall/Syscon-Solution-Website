@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/dmsubcategories')}}">Manage</a>
<form action="{{route('dmsubcategories.update',$dmsubcategorie)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"Dmsubcategory","name"=>"txtDmsubcategory","value"=>$dmsubcategorie->dmsubcategory]) !!}
	{!! input_field(["label"=>"Category","name"=>"txtCategory","value"=>$dmsubcategorie->category]) !!}
	{!! input_field(["label"=>"Comment","name"=>"txtComment","value"=>$dmsubcategorie->comment]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at","value"=>$dmsubcategorie->deleted_at]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
