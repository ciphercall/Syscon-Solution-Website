@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('devsubcategories.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$devsubcategorie->id}}</td></tr>
	<tr><th>Devsubcategory</th><td>{{$devsubcategorie->devsubcategory}}</td></tr>
	<tr><th>Category</th><td>{{$devsubcategorie->category}}</td></tr>
	<tr><th>Comment</th><td>{{$devsubcategorie->comment}}</td></tr>
	<tr><th>Created At</th><td>{{$devsubcategorie->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$devsubcategorie->updated_at}}</td></tr>
	<tr><th>Deleted At</th><td>{{$devsubcategorie->deleted_at}}</td></tr>

</table>

@endsection
