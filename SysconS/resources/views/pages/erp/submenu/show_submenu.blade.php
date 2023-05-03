@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('submenus.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$submenu->id}}</td></tr>
	<tr><th>Sm Name</th><td>{{$submenu->sm_name}}</td></tr>
	<tr><th>Menu Id</th><td>{{$submenu->menu_id}}</td></tr>
	<tr><th>Slug</th><td>{{$submenu->slug}}</td></tr>
	<tr><th>M Photo</th><td>{{$submenu->m_photo}}</td></tr>
	<tr><th>Comment</th><td>{{$submenu->comment}}</td></tr>
	<tr><th>Deleted At</th><td>{{$submenu->deleted_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$submenu->updated_at}}</td></tr>
	<tr><th>Created At</th><td>{{$submenu->created_at}}</td></tr>

</table>

@endsection
