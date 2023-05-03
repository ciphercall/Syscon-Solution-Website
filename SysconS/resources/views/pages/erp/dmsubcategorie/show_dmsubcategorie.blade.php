@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('dmsubcategories.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$dmsubcategorie->id}}</td></tr>
	<tr><th>Dmsubcategory</th><td>{{$dmsubcategorie->dmsubcategory}}</td></tr>
	<tr><th>Category</th><td>{{$dmsubcategorie->category}}</td></tr>
	<tr><th>Comment</th><td>{{$dmsubcategorie->comment}}</td></tr>
	<tr><th>Created At</th><td>{{$dmsubcategorie->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$dmsubcategorie->updated_at}}</td></tr>
	<tr><th>Deleted At</th><td>{{$dmsubcategorie->deleted_at}}</td></tr>

</table>

@endsection
