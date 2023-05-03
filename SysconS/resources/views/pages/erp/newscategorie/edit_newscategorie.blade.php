@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/newscategories')}}">Manage</a>
<form action="{{route('newscategories.update',$newscategorie)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"News Category Name","name"=>"txtNews_category_name","value"=>$newscategorie->news_category_name]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at","value"=>$newscategorie->deleted_at]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
