@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('workedbrands.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$workedbrand->id}}</td></tr>
	<tr><th>W Brand Name</th><td>{{$workedbrand->w_brand_name}}</td></tr>
	<tr><th>Work Details</th><td>{{$workedbrand->work_details}}</td></tr>
	<tr><th>Bn W Brand Name</th><td>{{$workedbrand->bn_w_brand_name}}</td></tr>
	<tr><th>Jp W Brand Name</th><td>{{$workedbrand->jp_w_brand_name}}</td></tr>
	<tr><th>Bn Work Details</th><td>{{$workedbrand->bn_work_details}}</td></tr>
	<tr><th>Jp Work Details</th><td>{{$workedbrand->jp_work_details}}</td></tr>
	<tr><th>B Logo</th><td>{{$workedbrand->b_logo}}</td></tr>
	<tr><th>Comment</th><td>{{$workedbrand->comment}}</td></tr>
	<tr><th>Created At</th><td>{{$workedbrand->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$workedbrand->updated_at}}</td></tr>
	<tr><th>Deleted At</th><td>{{$workedbrand->deleted_at}}</td></tr>

</table>

@endsection
