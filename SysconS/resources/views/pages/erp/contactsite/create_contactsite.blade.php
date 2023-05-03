@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/contactsites')}}">Manage</a>
<form action="{{route('contactsites.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	{!! input_field(["label"=>"C Name","name"=>"txtC_name"]) !!}
	{!! input_field(["label"=>"C Email","name"=>"txtC_email"]) !!}
	{!! input_field(["label"=>"C Details","name"=>"txtC_details"]) !!}
	{!! input_field(["label"=>"Comment","name"=>"txtComment"]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at"]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]) !!}
</form>

@endsection
