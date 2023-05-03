@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('committees.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$committee->id}}</td></tr>
	<tr><th>Branch Id</th><td>{{$committee->branch_id}}</td></tr>
	<tr><th>Branch Name</th><td>{{$committee->branch_name}}</td></tr>
	<tr><th>Appro Date</th><td>{{$committee->appro_date}}</td></tr>
	<tr><th>Duration</th><td>{{$committee->duration}}</td></tr>
	<tr><th>Renewal Date</th><td>{{$committee->renewal_date}}</td></tr>
	<tr><th>Created At</th><td>{{$committee->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$committee->updated_at}}</td></tr>
	<tr><th>Deleted At</th><td>{{$committee->deleted_at}}</td></tr>

</table>

@endsection
