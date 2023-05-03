@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('procategories.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$procategorie->id}}</td></tr>
	<tr><th>P Name</th><td>{{$procategorie->p_name}}</td></tr>
	<tr><th>P Url</th><td>{{$procategorie->p_url}}</td></tr>
	<tr><th>Comment</th><td>{{$procategorie->comment}}</td></tr>
	<tr><th>Created At</th><td>{{$procategorie->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$procategorie->updated_at}}</td></tr>
	<tr><th>Deleted At</th><td>{{$procategorie->deleted_at}}</td></tr>

</table>

@endsection
