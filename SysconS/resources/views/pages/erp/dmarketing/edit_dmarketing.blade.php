@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/dmarketings')}}">Manage</a>
<form action="{{route('dmarketings.update',$dmarketing)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"En Page Title","name"=>"txtEn_page_title","value"=>$dmarketing->en_page_title]) !!}
	{!! input_field(["label"=>"Bn Page Title","name"=>"txtBn_page_title","value"=>$dmarketing->bn_page_title]) !!}
	{!! input_field(["label"=>"Jp Page Title","name"=>"txtJp_page_title","value"=>$dmarketing->jp_page_title]) !!}
	{!! input_field(["label"=>"En Page Details","name"=>"txtEn_page_details","value"=>$dmarketing->en_page_details]) !!}
	{!! input_field(["label"=>"Bn Page Details","name"=>"txtBn_page_details","value"=>$dmarketing->bn_page_details]) !!}
	{!! input_field(["label"=>"Jp Page Details","name"=>"txtJp_page_details","value"=>$dmarketing->jp_page_details]) !!}
	{!! input_field(["label"=>"Page Bg Photo","name"=>"txtPage_bg_photo","value"=>$dmarketing->page_bg_photo]) !!}
	{!! input_field(["label"=>"Dev Faq","name"=>"txtDev_faq","value"=>$dmarketing->dev_faq]) !!}
	{!! input_field(["label"=>"Dev Tag","name"=>"txtDev_tag","value"=>$dmarketing->dev_tag]) !!}
	{!! input_field(["label"=>"Page Url","name"=>"txtPage_url","value"=>$dmarketing->page_url]) !!}
	{!! input_field(["label"=>"En Sevice Fea","name"=>"txtEn_sevice_fea","value"=>$dmarketing->en_sevice_fea]) !!}
	{!! input_field(["label"=>"Bn Sevice Fea","name"=>"txtBn_sevice_fea","value"=>$dmarketing->bn_sevice_fea]) !!}
	{!! input_field(["label"=>"Jp Sevice Fea","name"=>"txtJp_sevice_fea","value"=>$dmarketing->jp_sevice_fea]) !!}
	{!! input_field(["label"=>"En Sevice F D","name"=>"txtEn_sevice_f_d","value"=>$dmarketing->en_sevice_f_d]) !!}
	{!! input_field(["label"=>"Bn Sevice F D","name"=>"txtBn_sevice_f_d","value"=>$dmarketing->bn_sevice_f_d]) !!}
	{!! input_field(["label"=>"Jp Sevice F D","name"=>"txtJp_sevice_f_d","value"=>$dmarketing->jp_sevice_f_d]) !!}
	{!! input_field(["label"=>"Sevice F Photo","name"=>"txtSevice_f_photo","value"=>$dmarketing->sevice_f_photo]) !!}
	{!! input_field(["label"=>"Status","name"=>"txtStatus","value"=>$dmarketing->status]) !!}
	{!! input_field(["label"=>"Deleted-at","name"=>"txtDeleted-at","value"=>$dmarketing->deleted-at]) !!}
	{!! select_field(["label"=>"Dc Id","name"=>"cmbDcId","table"=>$dcs,"value"=>$dmarketing->dc_id]) !!}
	{!! select_field(["label"=>"Dsc Id","name"=>"cmbDscId","table"=>$dscs,"value"=>$dmarketing->dsc_id]) !!}
	{!! input_field(["label"=>"Benefits Text","name"=>"txtBenefits_text","value"=>$dmarketing->benefits_text]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
