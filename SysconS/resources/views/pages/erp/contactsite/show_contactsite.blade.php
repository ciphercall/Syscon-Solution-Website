@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('contactsites.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$contactsite->id}}</td></tr>
	<tr><th>C Name</th><td>{{$contactsite->c_name}}</td></tr>
	<tr><th>C Email</th><td>{{$contactsite->c_email}}</td></tr>
	<tr><th>C Details</th><td>{{$contactsite->c_details}}</td></tr>
	<tr><th>Comment</th><td>{{$contactsite->comment}}</td></tr>
	<tr><th>Deleted At</th><td>{{$contactsite->deleted_at}}</td></tr>
	<tr><th>Created At</th><td>{{$contactsite->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$contactsite->updated_at}}</td></tr>

</table>

@endsection
