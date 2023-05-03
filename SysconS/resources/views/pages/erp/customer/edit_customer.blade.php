@extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{url('/customers')}}">Manage</a>
<form action="{{route('customers.update',$customer)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method("PUT")
	{!! input_field(["label"=>"C Name","name"=>"txtC_name","value"=>$customer->c_name]) !!}
	{!! input_field(["label"=>"Deg","name"=>"txtDeg","value"=>$customer->deg]) !!}
	{!! input_field(["label"=>"C Phone","name"=>"txtC_phone","value"=>$customer->c_phone]) !!}
	{!! input_field(["label"=>"C Email","name"=>"txtC_email","value"=>$customer->c_email]) !!}
	{!! input_field(["label"=>"C Review","name"=>"txtC_review","value"=>$customer->c_review]) !!}
	{!! input_field(["label"=>"Status","name"=>"txtStatus","value"=>$customer->status]) !!}
	{!! input_field(["label"=>"Comment","name"=>"txtComment","value"=>$customer->comment]) !!}
	{!! input_field(["label"=>"Deleted At","name"=>"txtDeleted_at","value"=>$customer->deleted_at]) !!}
	{!! input_field(["label"=>"Bn C Name","name"=>"txtBn_c_name","value"=>$customer->bn_c_name]) !!}
	{!! input_field(["label"=>"Bn C Deg","name"=>"txtBn_c_deg","value"=>$customer->bn_c_deg]) !!}
	{!! input_field(["label"=>"Bn Review","name"=>"txtBn_review","value"=>$customer->bn_review]) !!}
	{!! input_field(["label"=>"Jp C Name","name"=>"txtJp_c_name","value"=>$customer->jp_c_name]) !!}
	{!! input_field(["label"=>"Jp C Deg","name"=>"txtJp_c_deg","value"=>$customer->jp_c_deg]) !!}
	{!! input_field(["label"=>"Jp C Review","name"=>"txtJp_c_review","value"=>$customer->jp_c_review]) !!}

	{!! input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]) !!}
</form>

@endsection
