@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('devcategories.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$devcategorie->id}}</td></tr>
	<tr><th>Dcategory</th><td>{{$devcategorie->dcategory}}</td></tr>
	<tr><th>Commnet</th><td>{{$devcategorie->commnet}}</td></tr>
	<tr><th>Created At</th><td>{{$devcategorie->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$devcategorie->updated_at}}</td></tr>
	<tr><th>Deleted At</th><td>{{$devcategorie->deleted_at}}</td></tr>

</table>

@endsection
