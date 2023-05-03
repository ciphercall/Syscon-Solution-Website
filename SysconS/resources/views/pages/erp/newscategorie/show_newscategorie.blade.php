@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('newscategories.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$newscategorie->id}}</td></tr>
	<tr><th>News Category Name</th><td>{{$newscategorie->news_category_name}}</td></tr>
	<tr><th>Created At</th><td>{{$newscategorie->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$newscategorie->updated_at}}</td></tr>
	<tr><th>Deleted At</th><td>{{$newscategorie->deleted_at}}</td></tr>

</table>

@endsection
