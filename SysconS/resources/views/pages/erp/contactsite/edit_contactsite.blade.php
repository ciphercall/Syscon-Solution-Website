@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/contactsites')}}">Manage</a>
<form action="{{route('contactsites.update',$contactsite)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"C Name","name"=>"txtC_name","value"=>$contactsite->c_name]) !!}
	{!! input_field(["label"=>"C Email","name"=>"txtC_email","value"=>$contactsite->c_email]) !!}
	{!! input_field(["label"=>"C Details","name"=>"txtC_details","value"=>$contactsite->c_details]) !!}
	{!! input_field(["label"=>"Comment","name"=>"txtComment","value"=>$contactsite->comment]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at","value"=>$contactsite->deleted_at]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
