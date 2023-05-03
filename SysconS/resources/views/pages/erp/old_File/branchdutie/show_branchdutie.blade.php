@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('branchduties.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$branchdutie->id}}</td></tr>
	<tr><th>Branch Id</th><td>{{$branchdutie->branch_id}}</td></tr>
	<tr><th>Branch Name</th><td>{{$branchdutie->branch_name}}</td></tr>
	<tr><th>B H Name</th><td>{{$branchdutie->b_h_name}}</td></tr>
	<tr><th>B H Phone</th><td>{{$branchdutie->b_h_phone}}</td></tr>
	<tr><th>B H Email</th><td>{{$branchdutie->b_h_email}}</td></tr>
	<tr><th>B H Address</th><td>{{$branchdutie->b_h_address}}</td></tr>
	<tr><th>Assign Date</th><td>{{$branchdutie->assign_date}}</td></tr>
	<tr><th>Comment</th><td>{{$branchdutie->comment}}</td></tr>
	<tr><th>Status</th><td>{{$branchdutie->status}}</td></tr>
	<tr><th>Created At</th><td>{{$branchdutie->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$branchdutie->updated_at}}</td></tr>
	<tr><th>Deleted At</th><td>{{$branchdutie->deleted_at}}</td></tr>

</table>

@endsection
