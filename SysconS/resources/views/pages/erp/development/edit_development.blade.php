@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/developments')}}">Manage</a>
<form action="{{route('developments.update',$development)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"En Page Title","name"=>"txtEn_page_title","value"=>$development->en_page_title]) !!}
	{!! input_field(["label"=>"Bn Page Title","name"=>"txtBn_page_title","value"=>$development->bn_page_title]) !!}
	{!! input_field(["label"=>"Jp Page Title","name"=>"txtJp_page_title","value"=>$development->jp_page_title]) !!}
	{!! input_field(["label"=>"En Page Details","name"=>"txtEn_page_details","value"=>$development->en_page_details]) !!}
	{!! input_field(["label"=>"Bn Page Details","name"=>"txtBn_page_details","value"=>$development->bn_page_details]) !!}
	{!! input_field(["label"=>"Jp Page Details","name"=>"txtJp_page_details","value"=>$development->jp_page_details]) !!}
	{!! input_field(["label"=>"Page Bg Photo","name"=>"txtPage_bg_photo","value"=>$development->page_bg_photo]) !!}
	{!! input_field(["label"=>"Dev Faq","name"=>"txtDev_faq","value"=>$development->dev_faq]) !!}
	{!! input_field(["label"=>"Dev Tag","name"=>"txtDev_tag","value"=>$development->dev_tag]) !!}
	{!! input_field(["label"=>"Page Url","name"=>"txtPage_url","value"=>$development->page_url]) !!}
	{!! input_field(["label"=>"En Sevice Fea","name"=>"txtEn_sevice_fea","value"=>$development->en_sevice_fea]) !!}
	{!! input_field(["label"=>"Bn Sevice Fea","name"=>"txtBn_sevice_fea","value"=>$development->bn_sevice_fea]) !!}
	{!! input_field(["label"=>"Jp Sevice Fea","name"=>"txtJp_sevice_fea","value"=>$development->jp_sevice_fea]) !!}
	{!! input_field(["label"=>"En Sevice F D","name"=>"txtEn_sevice_f_d","value"=>$development->en_sevice_f_d]) !!}
	{!! input_field(["label"=>"Bn Sevice F D","name"=>"txtBn_sevice_f_d","value"=>$development->bn_sevice_f_d]) !!}
	{!! input_field(["label"=>"Jp Sevice F D","name"=>"txtJp_sevice_f_d","value"=>$development->jp_sevice_f_d]) !!}
	{!! input_field(["label"=>"Sevice F Photo","name"=>"txtSevice_f_photo","value"=>$development->sevice_f_photo]) !!}
	{!! input_field(["label"=>"Status","name"=>"txtStatus","value"=>$development->status]) !!}
	{!! input_field(["label"=>"Deleted-at","name"=>"txtDeleted-at","value"=>$development->deleted-at]) !!}
	{!! select_field(["label"=>"Dc Id","name"=>"cmbDcId","table"=>$dcs,"value"=>$development->dc_id]) !!}
	{!! select_field(["label"=>"Dsc Id","name"=>"cmbDscId","table"=>$dscs,"value"=>$development->dsc_id]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
