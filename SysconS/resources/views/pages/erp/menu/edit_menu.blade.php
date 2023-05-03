@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/menus')}}">Manage</a>
<form action="{{route('menus.update',$menu)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"M Name","name"=>"txtM_name","value"=>$menu->m_name]) !!}
	{!! input_field(["label"=>"Slag","name"=>"txtSlag","value"=>$menu->slag]) !!}
	{!! input_field(["label"=>"Comment","name"=>"txtComment","value"=>$menu->comment]) !!}
	{!! input_field(["label"=>"Deleted-at","name"=>"txtDeleted-at","value"=>$menu->deleted-at]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
