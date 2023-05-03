@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/projects')}}">Manage</a>
<form action="{{route('projects.update',$project)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"En P Title","name"=>"txtEn_p_title","value"=>$project->en_p_title]) !!}
	{!! input_field(["label"=>"Bn P Title","name"=>"txtBn_p_title","value"=>$project->bn_p_title]) !!}
	{!! input_field(["label"=>"Jp P Title","name"=>"txtJp_p_title","value"=>$project->jp_p_title]) !!}
	{!! input_field(["label"=>"En P Details","name"=>"txtEn_p_details","value"=>$project->en_p_details]) !!}
	{!! input_field(["label"=>"Bn P Details","name"=>"txtBn_p_details","value"=>$project->bn_p_details]) !!}
	{!! input_field(["label"=>"Jp P Details","name"=>"txtJp_p_details","value"=>$project->jp_p_details]) !!}
	{!! input_field(["label"=>"P Category","name"=>"txtP_category","value"=>$project->p_category]) !!}
	{!! input_field(["label"=>"P B Photo","name"=>"txtP_b_photo","value"=>$project->p_b_photo]) !!}
	{!! input_field(["label"=>"P H Photo","name"=>"txtP_h_photo","value"=>$project->p_h_photo]) !!}
	{!! input_field(["label"=>"Alt Text","name"=>"txtAlt_text","value"=>$project->alt_text]) !!}
	{!! input_field(["label"=>"P Tag","name"=>"txtP_tag","value"=>$project->p_tag]) !!}
	{!! input_field(["label"=>"Client","name"=>"txtClient","value"=>$project->client]) !!}
	{!! input_field(["label"=>"P Date","name"=>"txtP_date","value"=>$project->p_date]) !!}
	{!! input_field(["label"=>"P Url","name"=>"txtP_url","value"=>$project->p_url]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
