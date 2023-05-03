@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/workedbrands')}}">Manage</a>
<form action="{{route('workedbrands.update',$workedbrand)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"W Brand Name","name"=>"txtW_brand_name","value"=>$workedbrand->w_brand_name]) !!}
	{!! input_field(["label"=>"Work Details","name"=>"txtWork_details","value"=>$workedbrand->work_details]) !!}
	{!! input_field(["label"=>"Bn W Brand Name","name"=>"txtBn_w_brand_name","value"=>$workedbrand->bn_w_brand_name]) !!}
	{!! input_field(["label"=>"Jp W Brand Name","name"=>"txtJp_w_brand_name","value"=>$workedbrand->jp_w_brand_name]) !!}
	{!! input_field(["label"=>"Bn Work Details","name"=>"txtBn_work_details","value"=>$workedbrand->bn_work_details]) !!}
	{!! input_field(["label"=>"Jp Work Details","name"=>"txtJp_work_details","value"=>$workedbrand->jp_work_details]) !!}
	{!! input_field(["label"=>"B Logo","name"=>"txtB_logo","value"=>$workedbrand->b_logo]) !!}
	{!! input_field(["label"=>"Comment","name"=>"txtComment","value"=>$workedbrand->comment]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at","value"=>$workedbrand->deleted_at]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
