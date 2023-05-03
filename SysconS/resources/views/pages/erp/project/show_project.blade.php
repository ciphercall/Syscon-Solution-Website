@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('projects.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$project->id}}</td></tr>
	<tr><th>En P Title</th><td>{{$project->en_p_title}}</td></tr>
	<tr><th>Bn P Title</th><td>{{$project->bn_p_title}}</td></tr>
	<tr><th>Jp P Title</th><td>{{$project->jp_p_title}}</td></tr>
	<tr><th>En P Details</th><td>{{$project->en_p_details}}</td></tr>
	<tr><th>Bn P Details</th><td>{{$project->bn_p_details}}</td></tr>
	<tr><th>Jp P Details</th><td>{{$project->jp_p_details}}</td></tr>
	<tr><th>P Category</th><td>{{$project->p_category}}</td></tr>
	<tr><th>P B Photo</th><td>{{$project->p_b_photo}}</td></tr>
	<tr><th>P H Photo</th><td>{{$project->p_h_photo}}</td></tr>
	<tr><th>Alt Text</th><td>{{$project->alt_text}}</td></tr>
	<tr><th>P Tag</th><td>{{$project->p_tag}}</td></tr>
	<tr><th>Client</th><td>{{$project->client}}</td></tr>
	<tr><th>P Date</th><td>{{$project->p_date}}</td></tr>
	<tr><th>P Url</th><td>{{$project->p_url}}</td></tr>

</table>

@endsection
