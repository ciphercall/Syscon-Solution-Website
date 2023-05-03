@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('employees.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$employee->id}}</td></tr>
	<tr><th>E Name</th><td>{{$employee->e_name}}</td></tr>
	<tr><th>Deg</th><td>{{$employee->deg}}</td></tr>
	<tr><th>It Background</th><td>{{$employee->it_background}}</td></tr>
	<tr><th>E Photo</th><td>{{$employee->e_photo}}</td></tr>
	<tr><th>Fb Link</th><td>{{$employee->fb_link}}</td></tr>
	<tr><th>Linkdin Link</th><td>{{$employee->linkdin_link}}</td></tr>
	<tr><th>Instagram Link</th><td>{{$employee->instagram_link}}</td></tr>
	<tr><th>Twitter Link</th><td>{{$employee->twitter_link}}</td></tr>
	<tr><th>Status</th><td>{{$employee->status}}</td></tr>
	<tr><th>Emp Id</th><td>{{$employee->emp_id}}</td></tr>
	<tr><th>Created At</th><td>{{$employee->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$employee->updated_at}}</td></tr>
	<tr><th>Deleted At</th><td>{{$employee->deleted_at}}</td></tr>

</table>

@endsection
