@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/depositecategories')}}">Manage</a>
<form action="{{route('depositecategories.update',$depositecategorie)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"D Name","name"=>"txtD_name","value"=>$depositecategorie->d_name]) !!}
	{!! input_field(["label"=>"Comment","name"=>"txtComment","value"=>$depositecategorie->comment]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at","value"=>$depositecategorie->deleted_at]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
