@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/procategories')}}">Manage</a>
<form action="{{route('procategories.update',$procategorie)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"P Name","name"=>"txtP_name","value"=>$procategorie->p_name]) !!}
	{!! input_field(["label"=>"P Url","name"=>"txtP_url","value"=>$procategorie->p_url]) !!}
	{!! input_field(["label"=>"Comment","name"=>"txtComment","value"=>$procategorie->comment]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at","value"=>$procategorie->deleted_at]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
