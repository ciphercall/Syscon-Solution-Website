@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/employees')}}">Manage</a>
<form action="{{route('employees.update',$employee)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"E Name","name"=>"txtE_name","value"=>$employee->e_name]) !!}
	{!! input_field(["label"=>"Deg","name"=>"txtDeg","value"=>$employee->deg]) !!}
	{!! input_field(["label"=>"It Background","name"=>"txtIt_background","value"=>$employee->it_background]) !!}
	{!! input_field(["label"=>"E Photo","name"=>"txtE_photo","value"=>$employee->e_photo]) !!}
	{!! input_field(["label"=>"Fb Link","name"=>"txtFb_link","value"=>$employee->fb_link]) !!}
	{!! input_field(["label"=>"Linkdin Link","name"=>"txtLinkdin_link","value"=>$employee->linkdin_link]) !!}
	{!! input_field(["label"=>"Instagram Link","name"=>"txtInstagram_link","value"=>$employee->instagram_link]) !!}
	{!! input_field(["label"=>"Twitter Link","name"=>"txtTwitter_link","value"=>$employee->twitter_link]) !!}
	{!! input_field(["label"=>"Status","name"=>"txtStatus","value"=>$employee->status]) !!}
	{!! select_field(["label"=>"Emp Id","name"=>"cmbEmpId","table"=>$emps,"value"=>$employee->emp_id]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at","value"=>$employee->deleted_at]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
