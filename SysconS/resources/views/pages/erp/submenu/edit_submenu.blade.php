@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/submenus')}}">Manage</a>
<form action="{{route('submenus.update',$submenu)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"Sm Name","name"=>"txtSm_name","value"=>$submenu->sm_name]) !!}
	{!! select_field(["label"=>"Menu Id","name"=>"cmbMenuId","table"=>$menus,"value"=>$submenu->menu_id]) !!}
	{!! input_field(["label"=>"Slug","name"=>"txtSlug","value"=>$submenu->slug]) !!}
	{!! input_field(["label"=>"M Photo","name"=>"txtM_photo","value"=>$submenu->m_photo]) !!}
	{!! input_field(["label"=>"Comment","name"=>"txtComment","value"=>$submenu->comment]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at","value"=>$submenu->deleted_at]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
