@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/depositecategories')}}">Manage</a>
<form action="{{route('depositecategories.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	{!! input_field(["label"=>"D Name","name"=>"txtD_name"]) !!}
	{!! input_field(["label"=>"Comment","name"=>"txtComment"]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at"]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]) !!}
</form>

@endsection
