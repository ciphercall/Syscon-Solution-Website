@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/sysnews')}}">Manage</a>
<form action="{{route('sysnews.update',$sysnew)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"En News H","name"=>"txtEn_news_h","value"=>$sysnew->en_news_h]) !!}
	{!! input_field(["label"=>"Bn News H","name"=>"txtBn_news_h","value"=>$sysnew->bn_news_h]) !!}
	{!! input_field(["label"=>"Jp News H","name"=>"txtJp_news_h","value"=>$sysnew->jp_news_h]) !!}
	{!! input_field(["label"=>"En News D","name"=>"txtEn_news_d","value"=>$sysnew->en_news_d]) !!}
	{!! input_field(["label"=>"Bn News D","name"=>"txtBn_news_d","value"=>$sysnew->bn_news_d]) !!}
	{!! input_field(["label"=>"Jp News D","name"=>"txtJp_news_d","value"=>$sysnew->jp_news_d]) !!}
	{!! input_field(["label"=>"News Date","name"=>"txtNews_date","value"=>$sysnew->news_date]) !!}
	{!! input_field(["label"=>"N Tag","name"=>"txtN_tag","value"=>$sysnew->n_tag]) !!}
	{!! input_field(["label"=>"News Category","name"=>"txtNews_category","value"=>$sysnew->news_category]) !!}
	{!! input_field(["label"=>"N B Photo","name"=>"txtN_b_photo","value"=>$sysnew->n_b_photo]) !!}
	{!! input_field(["label"=>"N H Photo","name"=>"txtN_h_photo","value"=>$sysnew->n_h_photo]) !!}
	{!! input_field(["label"=>"Pho Alt Text","name"=>"txtPho_alt_text","value"=>$sysnew->pho_alt_text]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at","value"=>$sysnew->deleted_at]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
