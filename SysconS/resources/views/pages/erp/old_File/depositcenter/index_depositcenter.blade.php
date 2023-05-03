@extends('layout.erp.home')
@section('page')





<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title"> দান বক্স ও কমপ্লেক্স বাবদ জমা তালিকা</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">দান বক্স ও কমপ্লেক্স বাবদ জমা </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i> দান বক্স ও কমপ্লেক্স সংযোজন</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- Invitation Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>দান বক্স ও কমপ্লেক্সের জমা পরিমান</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>দান বক্স ও কমপ্লেক্স </h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>দান বক্স ও কমপ্লেক্স </h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>দান বক্স ও কমপ্লেক্স বাতিল</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /Invitation Center Statistics -->
	@if (session('success'))
		<div class="alert alert-success"><b>{{session('success')}}</b> </div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table display nowrap" id="example">
					<thead>
						<tr>
						        	<th scope="col">ক্রম</th>
                                    <th scope="col">শাখা নং</th>
                                    {{-- <th scope="col">শাখার নাম</th> --}}
                                    <th scope="col">জমা দেওয়ার তারিখ</th>
                                    <th scope="col">জমা কারীর নাম</th>
                                    <th scope="col">টাকার পরিমাণ</th>
                                    <th scope="col">মোবাইল নাম্বার</th>
                                    <th scope="col">গ্রহিতার ক্যাটাগরি</th>

                                    <th scope="col">গ্রহিতার নাম</th>
                                    <th scope="col">রশিদ নং</th>
                                    <th scope="col">মন্তব্য</th>

							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($depositcenters as $key=> $depositcenter)



						<tr>
							<td>{{++$key}}</td>

							<td>( {{$depositcenter->brunch_id}} ) {{$depositcenter->brunch_name}} </td>
							<td>{{$depositcenter->collection_date}}</td>
							<td>{{$depositcenter->member_name}}</td>
							<td>{{$depositcenter->received_amount}}</td>
							<td>{{$depositcenter->phone}}</td>

							<td>{{$depositcenter->purpose_catagory}}</td>
							<td>{{$depositcenter->receiver_name}}</td>
							<td>{{$depositcenter->money_receipt_no}}</td>
							<td>{{$depositcenter->comment}}</td>

							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">




										<button type="button" value="{{$depositcenter->id}}" class="btn btn-info" id="depSHBtn" ><i class="bi bi-eye-fill" ></i> </button>

										<button type="button" value="{{$depositcenter->id}}" class="btn btn-primary" id="depBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$depositcenter->id}}" class="btn btn-warning" id="depDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>

						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$depositcenters->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add Invitation Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> দান বক্স ও কমপ্লেক্স সংযোজন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('depositcenters.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>
								{{-- 	<input type="hidden" class="form-control" id="cmbdepId" name="cmbdepId" placeholder="Enter "> --}}

								<select id="cmbBrunchId" class="form-control" name="cmbBrunchId" required>
									<option selected>Choose...</option>

									@foreach ($brunchs as $brunch)
									<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} | {{ $brunch->brunch_name }}</option>
									@endforeach
									</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="ooBrunch_name" name="txtBrunch_name" placeholder="Enter " >
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">জমা দেওয়ার তারিখ: <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="" name="txtCollection_date" placeholder="Enter " >
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">জমা কারীর ক্যাটাগরি: <span class="text-danger">*</span></label>
								{{-- <input type="date" class="form-control" id="bdwithdrawal_date" name="txtWithdrawal_date" placeholder="Enter " required> --}}
                                <select id="cmbmcategory" class="form-control" name="txtM_category" required>
									<option selected>Choose...</option>

									@foreach ($m_categorys as $r_category)
									<option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
									@endforeach
									</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">জমা কারীর নাম: <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="" name="txtMember_name" placeholder="Enter " required> --}}
                                <select id="cmbRname" class="form-control" name="txtMember_name" required>

								</select>
							</div>
						</div>
							<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">মোবাইল নাম্বার : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="ootxtPhone" name="txtPhone" placeholder="মোবাইল নাম্বার " required>
							</div>
						</div>

                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রহিতার ক্যাটাগরি: <span class="text-danger">*</span></label>
								{{-- <input type="date" class="form-control" id="bdwithdrawal_date" name="txtWithdrawal_date" placeholder="Enter " required> --}}
                                <select id="r_m_category" class="form-control" name="txtR_m_category" required>
									<option selected>Choose...</option>

									@foreach ($m_categorys as $r_category)
									<option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
									@endforeach
									</select>
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রহিতার নাম: <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="rece_member" name="txtReceiver_name" placeholder="গ্রহিতার নাম " > --}}
                                <select id="rece_member" class="form-control" name="txtReceiver_name" required>

                                </select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রহিতার টাকার পরিমাণ <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtReceived_amount" placeholder="গ্রহিতার টাকার পরিমাণ " >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">কি বাবদ টাকা জমা: <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="" name="txtPurpose_catagory" placeholder="Enter " > --}}

                                <select id="" class="form-control" name="txtPurpose_catagory" required>
									<option selected>Choose...</option>

									@foreach ($dpcs as $dpc)
									<option value="{{ $dpc->id }}"> {{ $dpc->d_name }}</option>
									@endforeach
									</select>

							</div>
						</div>

							<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">রশিদ নং: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtMoney_receipt_no" placeholder="রশিদ নং " >
							</div>
						</div>
						<div class="col-sm-6">

							<div class="form-group">
								<label class="col-form-label">প্রাপ্তি স্বীকার : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtAcknowledgment_receipt" placeholder="প্রাপ্তি স্বীকার " >
							</div>
						</div>
						<div class="col-sm-6">

							<div class="form-group">
								<label class="col-form-label">মন্তব্য  : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtComment" placeholder="মন্তব্য " >
							</div>
						</div>


					</div>
					<div class="submit-section">
						<input class="btn btn-primary submit-btn" type="submit"  name="btnCreate" value="Submit">

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Invitation Center Modal -->



<!-- Delete Invitation Center Modal -->
<div class="modal custom-modal fade" id="delete_dep" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
                    <h3>দান বক্স ও কমপ্লেক্স জমা বাতিল করুন</h3>
                    <p>আপনি কি দান বক্স ও কমপ্লেক্স জমা বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-depositcenter')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_depId" name="d_dep">


									<button type="submit" class="btn btn-primary continue-btn">
									Yes Delete
									</button>
								</form>

							</div>
						<div class="col-6">
							<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Delete Invitation Center Modal -->

<!-- show padcollection Center Modal -->

<div id="show_dep" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">দান বক্স ও কমপ্লেক্সের জমা বিস্তারিত বিবরণ</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: rgb(4, 21, 34)">

				<form action="">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> শাখা নং: <span class="text-danger">*</span></label>
								<div class="form-control "  id="depSHbrunch_id"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">শাখার নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="depSHbrunch_name"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">জমা দেওয়ার তারিখ: <span class="text-danger">*</span></label>
								<div class="form-control" id="depSHcollection_date"></div>

							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> জমা কারীর ক্যাটাগরি: <span class="text-danger">*</span></label>
								<div class="form-control" id="depSHm_category"></div>

							</div>
						</div>


						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> জমা কারীর নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="depSHmember_name"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">মোবাইল নাম্বার : <span class="text-danger">*</span></label>
								<div class="form-control" id="depSHphone"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">কি বাবদ টাকা জমা: <span class="text-danger">*</span></label>
								<div class="form-control" id="depSHpurpose_catagory"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">গ্রহিতার নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="depSHreceiver_name"></div>

							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">গ্রহিতার টাকার পরিমাণ : <span class="text-danger">*</span></label>
								<div class="form-control" id="depSHreceived_amount"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">রশিদ নং: <span class="text-danger">*</span></label>
								<div class="form-control" id="depSHmoney_receipt_no"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">প্রাপ্তি স্বীকার: <span class="text-danger">*</span></label>
								<div class="form-control" id="depSHacknowledgment_receipt"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">মন্তব্য: <span class="text-danger">*</span></label>
								<div class="form-control" id="depSHcomment"></div>

							</div>
						</div>

					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!-- /show loan Center Modal -->

<script>
    var filteredMember = [];

$(document).ready(function(){
        $(document).on('click','#depDbtn',function(){
			var dep_id=$(this).val();
            // alert(member_id);
			$('#delete_dep').modal('show');
			$('#delete_depId').val(dep_id);
		});



		// $(document).on('click','#depBtn',function(){
		// 	//  alert("ok");

		// 	var dep_id=$(this).val();
		// 	// alert(qu_id);
		// 	$('#edit_dep').modal('show');
		// 	$.ajax({
		// 		type: "GET",
		// 		url: "/edit-depositcenter/"+dep_id,
		// 		success:function(response){
		// 			// console.log(response.member.name);
		// 			$('#cmbdepId').val(dep_id);
		// 			$('#depbrunchId').val(response.depositcenter.brunch_id);
		// 			$('#depbrunch_name').val(response.depositcenter.brunch_name);



		// 			$('#depm_category').val(response.depositcenter.m_category);

		// 			$('#depcollection_date').val(response.depositcenter.collection_date);
		// 			$('#depmember_name').val(response.depositcenter.member_name);
		// 			$('#depphone').val(response.depositcenter.phone);
		// 			$('#depreceived_amount').val(response.depositcenter.received_amount);
		// 			$('#deppurpose_catagory').val(response.depositcenter.purpose_catagory);
		// 			$('#depr_m_category').val(response.depositcenter.r_m_category);

		// 			$('#depreceiver_name').val(response.depositcenter.receiver_name);
		// 			$('#depmoney_receipt_no').val(response.depositcenter.money_receipt_no);
		// 			$('#depacknowledgment_receipt').val(response.depositcenter.acknowledgment_receipt);
		// 			$('#depcomment').val(response.depositcenter.comment);




		// 		}
		// 	});
		// });


		$("#cmbBrunchId").on("change",function(){
			// alert("ok");
           $.ajax({
             url:"<?php echo url("getvolunteers")?>",
             type:'GET',
             data:{"id":$(this).val()},
             success:function(res){
              let padcollection=JSON.parse(res);
                console.log(padcollection);
               $("#ooBrunch_name").val(padcollection.brunch_name);


            //    $("#").val(member.);






             }
           });
        });

		$(document).on('click','#depSHBtn',function(){
			//  alert("ok");

			var depsh_id=$(this).val();
			// alert(invi_id);
			$('#show_dep').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-depositcenter/"+depsh_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);
					$('#cmbincSHId').html(depsh_id);


					$('#depSHbrunch_id').html(response.sdepositcenter.brunch_id);
					$('#depSHbrunch_name').html(response.sdepositcenter.brunch_name);

					$('#depSHcollection_date').html(response.sdepositcenter.collection_date);
					$('#depSHm_category').html(response.sdepositcenter.m_category);

					$('#depSHmember_name').html(response.sdepositcenter.member_name);
					$('#depSHphone').html(response.sdepositcenter.phone);

					$('#depSHreceived_amount').html(response.sdepositcenter.received_amount);
					$('#depSHpurpose_catagory').html(response.sdepositcenter.purpose_catagory);
					$('#depSHreceiver_name').html(response.sdepositcenter.receiver_name);
					$('#depSHmoney_receipt_no').html(response.sdepositcenter.money_receipt_no);
					$('#depSHacknowledgment_receipt').html(response.sdepositcenter.acknowledgment_receipt);
					$('#depSHcomment').html(response.sdepositcenter.comment);



				}
			});
		});

        $('#cmbmcategory').on('change', function () {
			var idCountry = this.value;
            $("#cmbRname").html('');
            if(idCountry == "1"){
                $.ajax({
				url: "{{url('api/fetch-member')}}",
				type: "POST",
				data: {
					m_category: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {

                    // console.log(result.cmembers[0]);
                    filteredMember = result.cmembers;

					$('#cmbRname').html('<option value="">Select Member</option>');
					$.each(result.cmembers, function (key, value) {
						$("#cmbRname").append('<option value="' + value
							.id + '">' + value.id  +' | ' + value.m_name + '</option>');


					});

				}
			});
            }else if(idCountry == "2"){
                $.ajax({
				url: "{{url('api/fetch-cmember')}}",
				type: "POST",
				data: {
					cm_category: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
                    filteredMember = result.cmmembers;

					$('#cmbRname').html('<option value="">Select Member</option>');
					$.each(result.cmmembers, function (key, value) {
						$("#cmbRname").append('<option value="' + value
							.id + '">' + value.id  +' | ' + value.m_name + '</option>');
					});

				}
			});

            }else if(idCountry == "3"){
                $.ajax({
				url: "{{url('api/fetch-brunche')}}",
				type: "POST",
				data: {
					bh_category: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
                    filteredMember = result.bhmembers;

					$('#cmbRname').html('<option value="">Select Member</option>');
					$.each(result.bhmembers, function (key, value) {
						$("#cmbRname").append('<option value="' + value
							.id + '">' + value.id  +' | ' + value.m_name + '</option>');
					});

				}
			});
            }


		});
        $('#cmbRname').on('change', function(){
            // console.log($('#cmbRname').val());
            var selectedVal = $('#cmbRname').val();
            for(var i=0;i<filteredMember.length;i++){
                var selectedId = filteredMember[i].id;
                // console.log(selectedId);
                if(selectedVal == selectedId){
                    $("#ootxtPhone").val(filteredMember[i].m_phone);
                    $("#txtfMember_name").val(filteredMember[i].m_name);


                }

            }
        });



        // ///////////////////////////////////////data
        $('#r_m_category').on('change', function () {
			var idCountry = this.value;
            $("#rece_member").html('');
            if(idCountry == "1"){
                $.ajax({
				url: "{{url('api/fetch-member')}}",
				type: "POST",
				data: {
					m_category: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {

                    // console.log(result.cmembers[0]);
                    filteredMember = result.cmembers;

					$('#rece_member').html('<option value="">Select Member</option>');
					$.each(result.cmembers, function (key, value) {
						$("#rece_member").append('<option value="' + value
							.id + '">' + value.id  +' | ' + value.m_name + '</option>');


					});

				}
			});
            }else if(idCountry == "2"){
                $.ajax({
				url: "{{url('api/fetch-cmember')}}",
				type: "POST",
				data: {
					cm_category: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
                    filteredMember = result.cmmembers;

					$('#rece_member').html('<option value="">Select Member</option>');
					$.each(result.cmmembers, function (key, value) {
						$("#rece_member").append('<option value="' + value
							.id + '">' + value.id  +' | ' + value.m_name + '</option>');
					});

				}
			});

            }else if(idCountry == "3"){
                $.ajax({
				url: "{{url('api/fetch-brunche')}}",
				type: "POST",
				data: {
					bh_category: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
                    filteredMember = result.bhmembers;

					$('#rece_member').html('<option value="">Select Member</option>');
					$.each(result.bhmembers, function (key, value) {
						$("#rece_member").append('<option value="' + value
							.id + '">' + value.id  +' | ' + value.m_name + '</option>');
					});

				}
			});
            }


		});
	});
</script>

@include('pages.erp.depositcenter.edit_depositcenter')
{{-- C:\xampp\htdocs\syscon\madrasah_sys\madrasah_sys\resources\views\pages\erp\depositcenter\edit_depositcenter.blade.php --}}
@endsection




