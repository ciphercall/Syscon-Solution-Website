@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('customers.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$customer->id}}</td></tr>
	<tr><th>C Name</th><td>{{$customer->c_name}}</td></tr>
	<tr><th>Deg</th><td>{{$customer->deg}}</td></tr>
	<tr><th>C Phone</th><td>{{$customer->c_phone}}</td></tr>
	<tr><th>C Email</th><td>{{$customer->c_email}}</td></tr>
	<tr><th>C Review</th><td>{{$customer->c_review}}</td></tr>
	<tr><th>Status</th><td>{{$customer->status}}</td></tr>
	<tr><th>Comment</th><td>{{$customer->comment}}</td></tr>
	<tr><th>Created At</th><td>{{$customer->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$customer->updated_at}}</td></tr>
	<tr><th>Deleted At</th><td>{{$customer->deleted_at}}</td></tr>
	<tr><th>Bn C Name</th><td>{{$customer->bn_c_name}}</td></tr>
	<tr><th>Bn C Deg</th><td>{{$customer->bn_c_deg}}</td></tr>
	<tr><th>Bn Review</th><td>{{$customer->bn_review}}</td></tr>
	<tr><th>Jp C Name</th><td>{{$customer->jp_c_name}}</td></tr>
	<tr><th>Jp C Deg</th><td>{{$customer->jp_c_deg}}</td></tr>
	<tr><th>Jp C Review</th><td>{{$customer->jp_c_review}}</td></tr>

</table>

@endsection
