@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('sysnews.index')}}">Manage</a>
<table class='table'>
	<tr><th>Id</th><td>{{$sysnew->id}}</td></tr>
	<tr><th>En News H</th><td>{{$sysnew->en_news_h}}</td></tr>
	<tr><th>Bn News H</th><td>{{$sysnew->bn_news_h}}</td></tr>
	<tr><th>Jp News H</th><td>{{$sysnew->jp_news_h}}</td></tr>
	<tr><th>En News D</th><td>{{$sysnew->en_news_d}}</td></tr>
	<tr><th>Bn News D</th><td>{{$sysnew->bn_news_d}}</td></tr>
	<tr><th>Jp News D</th><td>{{$sysnew->jp_news_d}}</td></tr>
	<tr><th>News Date</th><td>{{$sysnew->news_date}}</td></tr>
	<tr><th>N Tag</th><td>{{$sysnew->n_tag}}</td></tr>
	<tr><th>News Category</th><td>{{$sysnew->news_category}}</td></tr>
	<tr><th>N B Photo</th><td>{{$sysnew->n_b_photo}}</td></tr>
	<tr><th>N H Photo</th><td>{{$sysnew->n_h_photo}}</td></tr>
	<tr><th>Pho Alt Text</th><td>{{$sysnew->pho_alt_text}}</td></tr>
	<tr><th>Created At</th><td>{{$sysnew->created_at}}</td></tr>
	<tr><th>Updated At</th><td>{{$sysnew->updated_at}}</td></tr>
	<tr><th>Deleted At</th><td>{{$sysnew->deleted_at}}</td></tr>

</table>

@endsection
