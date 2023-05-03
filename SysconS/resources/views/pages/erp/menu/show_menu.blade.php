@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('menus.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$menu->id}}</td></tr>
	<tr><th>M Name</th><td>{{$menu->m_name}}</td></tr>
	<tr><th>Slag</th><td>{{$menu->slag}}</td></tr>
	<tr><th>Comment</th><td>{{$menu->comment}}</td></tr>
	<tr><th>Created At</th><td>{{$menu->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$menu->updated_at}}</td></tr>
	<tr><th>Deleted-at</th><td>{{$menu->deleted-at}}</td></tr>

</table>

@endsection
