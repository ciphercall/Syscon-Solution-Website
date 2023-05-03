@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('depositecategories.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$depositecategorie->id}}</td></tr>
	<tr><th>D Name</th><td>{{$depositecategorie->d_name}}</td></tr>
	<tr><th>Comment</th><td>{{$depositecategorie->comment}}</td></tr>
	<tr><th>Created At</th><td>{{$depositecategorie->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$depositecategorie->updated_at}}</td></tr>
	<tr><th>Deleted At</th><td>{{$depositecategorie->deleted_at}}</td></tr>

</table>

@endsection
