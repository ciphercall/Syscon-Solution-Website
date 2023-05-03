@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('developments.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$development->id}}</td></tr>
	<tr><th>En Page Title</th><td>{{$development->en_page_title}}</td></tr>
	<tr><th>Bn Page Title</th><td>{{$development->bn_page_title}}</td></tr>
	<tr><th>Jp Page Title</th><td>{{$development->jp_page_title}}</td></tr>
	<tr><th>En Page Details</th><td>{{$development->en_page_details}}</td></tr>
	<tr><th>Bn Page Details</th><td>{{$development->bn_page_details}}</td></tr>
	<tr><th>Jp Page Details</th><td>{{$development->jp_page_details}}</td></tr>
	<tr><th>Page Bg Photo</th><td>{{$development->page_bg_photo}}</td></tr>
	<tr><th>Dev Faq</th><td>{{$development->dev_faq}}</td></tr>
	<tr><th>Dev Tag</th><td>{{$development->dev_tag}}</td></tr>
	<tr><th>Page Url</th><td>{{$development->page_url}}</td></tr>
	<tr><th>En Sevice Fea</th><td>{{$development->en_sevice_fea}}</td></tr>
	<tr><th>Bn Sevice Fea</th><td>{{$development->bn_sevice_fea}}</td></tr>
	<tr><th>Jp Sevice Fea</th><td>{{$development->jp_sevice_fea}}</td></tr>
	<tr><th>En Sevice F D</th><td>{{$development->en_sevice_f_d}}</td></tr>
	<tr><th>Bn Sevice F D</th><td>{{$development->bn_sevice_f_d}}</td></tr>
	<tr><th>Jp Sevice F D</th><td>{{$development->jp_sevice_f_d}}</td></tr>
	<tr><th>Sevice F Photo</th><td>{{$development->sevice_f_photo}}</td></tr>
	<tr><th>Status</th><td>{{$development->status}}</td></tr>
	<tr><th>Created At</th><td>{{$development->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$development->updated_at}}</td></tr>
	<tr><th>Deleted-at</th><td>{{$development->deleted-at}}</td></tr>
	<tr><th>Dc Id</th><td>{{$development->dc_id}}</td></tr>
	<tr><th>Dsc Id</th><td>{{$development->dsc_id}}</td></tr>

</table>

@endsection
