@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('dmcategories.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$dmcategorie->id}}</td></tr>
	<tr><th>Dmcategory</th><td>{{$dmcategorie->dmcategory}}</td></tr>
	<tr><th>Commnet</th><td>{{$dmcategorie->commnet}}</td></tr>
	<tr><th>Created At</th><td>{{$dmcategorie->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$dmcategorie->updated_at}}</td></tr>
	<tr><th>Deleted At</th><td>{{$dmcategorie->deleted_at}}</td></tr>

</table>

@endsection
