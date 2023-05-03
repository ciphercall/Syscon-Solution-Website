@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('dmarketings.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$dmarketing->id}}</td></tr>
	<tr><th>En Page Title</th><td>{{$dmarketing->en_page_title}}</td></tr>
	<tr><th>Bn Page Title</th><td>{{$dmarketing->bn_page_title}}</td></tr>
	<tr><th>Jp Page Title</th><td>{{$dmarketing->jp_page_title}}</td></tr>
	<tr><th>En Page Details</th><td>{{$dmarketing->en_page_details}}</td></tr>
	<tr><th>Bn Page Details</th><td>{{$dmarketing->bn_page_details}}</td></tr>
	<tr><th>Jp Page Details</th><td>{{$dmarketing->jp_page_details}}</td></tr>
	<tr><th>Page Bg Photo</th><td>{{$dmarketing->page_bg_photo}}</td></tr>
	<tr><th>Dev Faq</th><td>{{$dmarketing->dev_faq}}</td></tr>
	<tr><th>Dev Tag</th><td>{{$dmarketing->dev_tag}}</td></tr>
	<tr><th>Page Url</th><td>{{$dmarketing->page_url}}</td></tr>
	<tr><th>En Sevice Fea</th><td>{{$dmarketing->en_sevice_fea}}</td></tr>
	<tr><th>Bn Sevice Fea</th><td>{{$dmarketing->bn_sevice_fea}}</td></tr>
	<tr><th>Jp Sevice Fea</th><td>{{$dmarketing->jp_sevice_fea}}</td></tr>
	<tr><th>En Sevice F D</th><td>{{$dmarketing->en_sevice_f_d}}</td></tr>
	<tr><th>Bn Sevice F D</th><td>{{$dmarketing->bn_sevice_f_d}}</td></tr>
	<tr><th>Jp Sevice F D</th><td>{{$dmarketing->jp_sevice_f_d}}</td></tr>
	<tr><th>Sevice F Photo</th><td>{{$dmarketing->sevice_f_photo}}</td></tr>
	<tr><th>Status</th><td>{{$dmarketing->status}}</td></tr>
	<tr><th>Created At</th><td>{{$dmarketing->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$dmarketing->updated_at}}</td></tr>
	<tr><th>Deleted-at</th><td>{{$dmarketing->deleted-at}}</td></tr>
	<tr><th>Dc Id</th><td>{{$dmarketing->dc_id}}</td></tr>
	<tr><th>Dsc Id</th><td>{{$dmarketing->dsc_id}}</td></tr>
	<tr><th>Benefits Text</th><td>{{$dmarketing->benefits_text}}</td></tr>

</table>

@endsection
