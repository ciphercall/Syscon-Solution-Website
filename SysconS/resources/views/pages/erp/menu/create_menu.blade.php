@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/menus')}}">Manage</a>
<form action="{{route('menus.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	{!! input_field(["label"=>"M Name","name"=>"txtM_name"]) !!}
	{!! input_field(["label"=>"Slag","name"=>"txtSlag"]) !!}
	{!! input_field(["label"=>"Comment","name"=>"txtComment"]) !!}
	{!! input_field(["label"=>"Deleted-at","name"=>"txtDeleted-at"]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]) !!}
</form>

@endsection
