

@extends('layout.erp.home')
@section('page')


<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title"> দান বাক্সের টাকা উত্তোলনের তালিকা </h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">দান বাক্সের টাকা উত্তোলন </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i> দান বাক্সের টাকা উত্তোলন সংযোজন</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- dboxwithdrawal Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>দান বাক্সের টাকা উত্তোলনের পরিমান</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>দান বাক্সের টাকা উত্তোলন</h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>দান বাক্সের টাকা উত্তোলন</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>দান বাক্সের টাকা উত্তোলন বাতিল</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /dboxwithdrawal Center Statistics -->
	@if (session('success'))
		<div class="alert alert-success"><b>{{session('success')}}</b> </div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table id="example" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th scope="col">ক্রম</th>
                                    <th scope="col">শাখা নং</th>
                                    {{-- <th scope="col">শাখার নাম</th> --}}
                                    <th scope="col">উত্তোলনের তারিখ</th>
                                    <th scope="col">নাম</th>
                                    <th scope="col">টাকার পরিমাণ</th>
                                    <th scope="col">ঠিকানা</th>
                                    <th scope="col">বক্স নাম্বার</th>
                                    <th scope="col">রশিদ নং</th>
                                    {{-- <th scope="col">মন্তব্য</th>
                                    <th scope="col">কাজ</th> --}}

							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($dboxwithdrawals as $key=> $dboxwithdrawal)


						<tr>
							<td>{{++$key}}</td>

							<td>( {{$dboxwithdrawal->brunch_id}} ) {{$dboxwithdrawal->brunch_name}}</td>
							<td>{{$dboxwithdrawal->withdrawal_date}}</td>
							<td>{{$dboxwithdrawal->receiver_name}}</td>
							<td>{{$dboxwithdrawal->received_amount}}</td>
							<td>{{$dboxwithdrawal->address}}</td>

							<td>{{$dboxwithdrawal->receipt_no}}</td>
							<td>{{$dboxwithdrawal->box_no}}</td>
							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">




																			{{-- ///////////// --}}
										<button type="button" value="{{$dboxwithdrawal->id}}" class="btn btn-success" id="dboshBtn" ><i class="bi bi-eye-fill" ></i> </button>


										<button type="button" value="{{$dboxwithdrawal->id}}" class="btn btn-primary" id="dbBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$dboxwithdrawal->id}}" class="btn btn-warning" id="dbDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>



									</div>
								</div>
							</td>

						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$dboxwithdrawals->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add dboxwithdrawal Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">দান বাক্সের টাকা উত্তোলন সংযোজন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('dboxwithdrawals.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="" name="cmbBrunchId" placeholder="Enter " required> --}}

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
								<input type="text" class="form-control" id="ooBrunch_name" name="txtBrunch_name" placeholder="শাখার নাম " >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">উত্তোলনের তারিখ: <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="" name="txtWithdrawal_date" placeholder="উত্তোলনের তারিখ " required>
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">উত্তোলনের ক্যাটাগরি : <span class="text-danger">*</span></label>
								{{-- <input type="date" class="form-control" id="bdwithdrawal_date" name="txtWithdrawal_date" placeholder="Enter " required> --}}
                                <select id="cmbmcategory" class="form-control" name="txtR_category" required>
									<option selected>Choose...</option>

									@foreach ($r_categorys as $r_category)
									<option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
									@endforeach
									</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">উত্তোলনকারীর নাম: <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="" name="txtReceiver_name" placeholder="Enter " > --}}
                                <select id="cmbRname" class="form-control" name="txtReceiver_name" required>
									{{-- <option selected>Choose...</option>

									@foreach ($r_categorys as $r_category)
									<option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
									@endforeach --}}
									</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">রশিদ নংঃ <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtReceipt_no" placeholder="রশিদ নংঃ " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">ঠিকানা : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtAddress" placeholder="ঠিকানা " >
							</div>
						</div>	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">টাকার পরিমাণ: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtReceived_amount" placeholder="টাকার পরিমাণ " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">বক্স নাম্বার: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtBox_no" placeholder="বক্স নাম্বার " >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">মন্তব্য: <span class="text-danger">*</span></label>
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
<!-- /Add dboxwithdrawal Center Modal -->

<!-- Edit dboxwithdrawal Center Modal -->
<div id="edit_db" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">দান বাক্সের টাকা উত্তোলন সংশোধন </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('dboxwithdrawal-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>
								<input type="hidden" class="form-control" id="bdbrunchId" name="cmbdbId" placeholder="Enter " required>

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
								<label class="col-form-label"> শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="dbbrunch_name" name="txtBrunch_name" placeholder="Enter " >
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">উত্তোলনের তারিখ: <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="bdwithdrawal_date" name="txtWithdrawal_date" placeholder="উত্তোলনের তারিখ " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">উত্তোলনের ক্যাটাগরি: <span class="text-danger">*</span></label>
								{{-- <input type="date" class="form-control" id="bdwithdrawal_date" name="txtWithdrawal_date" placeholder="Enter " required> --}}
                                <select id="bdr_category" class="form-control" name="txtR_category" required>
									<option selected>Choose...</option>

									@foreach ($r_categorys as $r_category)
									<option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
									@endforeach
									</select>
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">উত্তোলনকারীর নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="bdreceiver_name" name="txtReceiver_name" placeholder="Enter " >
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">রশিদ নংঃ <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="bdreceipt_no" name="txtReceipt_no" placeholder="Enter " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">ঠিকানা : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="bdaddress" name="txtAddress" placeholder="Enter " >
							</div>
						</div>	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">টাকার পরিমাণ : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="bdreceived_amount" name="txtReceived_amount" placeholder="Enter " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">বক্স নাম্বার: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="bdbox_no" name="txtBox_no" placeholder="Enter " >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">মন্তব্য : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="bdcomment" name="txtComment" placeholder="Enter " >
							</div>
						</div>


					</div>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit dboxwithdrawal Center Modal -->

<!-- Delete dboxwithdrawal Center Modal -->
<div class="modal custom-modal fade" id="delete_db" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
                    <h3>দান বাক্সের টাকা উত্তোলন বাতিল করুন</h3>
                    <p>আপনি কি দান বাক্সের টাকা উত্তোলন বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-dboxwithdrawal')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_dbId" name="d_db">


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
<!-- /Delete dboxwithdrawal Center Modal -->

<!-- show padcollection Center Modal -->

<div id="show_dbo" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">দান বাক্সের টাকা উত্তোলন বিস্তারিত বিবরণ</h3>
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
								<div class="form-control "  id="dboSHdboSHbrunch_id"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">শাখার নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="dboSHdboSHbrunch_name"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">উত্তোলনের তারিখ : <span class="text-danger">*</span></label>
								<div class="form-control" id="dboSHwithdrawal_date"></div>

							</div>
						</div>

                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">উত্তোলনের ক্যাটাগরি : <span class="text-danger">*</span></label>
								<div class="form-control" id="dboSHr_category"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">উত্তোলনকারীর নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="dboSHreceiver_name"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">  রশিদ নংঃ: <span class="text-danger">*</span></label>
								<div class="form-control" id="dboSHreceipt_no"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> ঠিকানা: <span class="text-danger">*</span></label>
								<div class="form-control" id="dboSHaddress"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> টাকার পরিমাণ: <span class="text-danger">*</span></label>
								<div class="form-control" id="dboSHreceived_amount"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">বক্স নাম্বার: <span class="text-danger">*</span></label>
								<div class="form-control" id="dboSHbox_no"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">মন্তব্য : <span class="text-danger">*</span></label>
								<div class="form-control" id="dboSHcomment"></div>

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
$(document).ready(function(){
        $(document).on('click','#dbDbtn',function(){
			var db_id=$(this).val();
            // alert(member_id);
			$('#delete_db').modal('show');
			$('#delete_dbId').val(db_id);
		});



		$(document).on('click','#dbBtn',function(){
			//  alert("ok");

			var inv_id=$(this).val();
			// alert(inv_id);
			$('#edit_db').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-dboxwithdrawal/"+inv_id,
				success:function(response){
					// console.log(response.member.name);
					$('#cmbinId').val(inv_id);
					$('#bdbrunchId').val(response.dboxwithdrawal.brunch_id);


					$('#dbbrunch_name').val(response.dboxwithdrawal.brunch_name);
					$('#bdwithdrawal_date').val(response.dboxwithdrawal.withdrawal_date);
					$('#bdr_category').val(response.dboxwithdrawal.r_category);

					$('#bdreceiver_name').val(response.dboxwithdrawal.receiver_name);
					$('#bdreceipt_no').val(response.dboxwithdrawal.receipt_no);
					$('#bdaddress').val(response.dboxwithdrawal.address);
					$('#bdreceived_amount').val(response.dboxwithdrawal.received_amount);
					$('#bdbox_no').val(response.dboxwithdrawal.box_no);
					$('#bdcomment').val(response.dboxwithdrawal.comment);




				}
			});
		});
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

		$(document).on('click','#dboshBtn',function(){
			//  alert("ok");

			var dbosh_id=$(this).val();
			// alert(dbo_id);
			$('#show_dbo').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-dboxwithdrawal/"+dbosh_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);
					$('#cmbincSHId').html(dbosh_id);


					$('#dboSHdboSHbrunch_id').html(response.sdboxwithdrawal.brunch_id);
					$('#dboSHdboSHbrunch_name').html(response.sdboxwithdrawal.brunch_name);

					$('#dboSHwithdrawal_date').html(response.sdboxwithdrawal.withdrawal_date);
					$('#dboSHr_category').html(response.sdboxwithdrawal.r_category);

					$('#dboSHreceiver_name').html(response.sdboxwithdrawal.receiver_name);
					$('#dboSHreceipt_no').html(response.sdboxwithdrawal.receipt_no);
					$('#dboSHaddress').html(response.sdboxwithdrawal.address);
					$('#dboSHreceived_amount').html(response.sdboxwithdrawal.received_amount);
					$('#dboSHbox_no').html(response.sdboxwithdrawal.box_no);
					$('#dboSHcomment').html(response.sdboxwithdrawal.comment);




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
					$('#cmbRname').html('<option value="">Select Member</option>');
					$.each(result.cmembers, function (key, value) {
						$("#cmbRname").append('<option value="' + value
							.id + '">' + value.m_name + '</option>');
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
					$('#cmbRname').html('<option value="">Select Member</option>');
					$.each(result.cmmembers, function (key, value) {
						$("#cmbRname").append('<option value="' + value
							.id + '">' + value.m_name + '</option>');
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
					$('#cmbRname').html('<option value="">Select Member</option>');
					$.each(result.bhmembers, function (key, value) {
						$("#cmbRname").append('<option value="' + value
							.id + '">' + value.m_name + '</option>');
					});

				}
			});
            }


		});

        // $('#cmbmcategory').on('change', function () {
		// 	var idCountry = this.value;
		// 	$("#cmbRname").html('');
		// 	$.ajax({
		// 		url: "{{url('api/fetch-cmember')}}",
		// 		type: "POST",
		// 		data: {
		// 			cm_category: idCountry,
		// 			_token: '{{csrf_token()}}'
		// 		},
		// 		dataType: 'json',
		// 		success: function (result) {
		// 			$('#cmbRname').html('<option value="">Select Member</option>');
		// 			$.each(result.cmmembers, function (key, value) {
		// 				$("#cmbRname").append('<option value="' + value
		// 					.id + '">' + value.m_name + '</option>');
		// 			});
		// 			//  $('#txtCity').html('<option value="">Select City</option>');
		// 		}
		// 	});
		// });

        // $('#cmbmcategory').on('change', function () {
		// 	var idm_category = this.value;
		// 	$("#cmbRname").html('');
		// 	$.ajax({
		// 		url: "{{url('api/fetch-brunche')}}",
		// 		type: "POST",
		// 		data: {
		// 			bh_category: idm_category,
		// 			_token: '{{csrf_token()}}'
		// 		},
		// 		dataType: 'json',
		// 		success: function (result) {
		// 			$('#cmbRname').html('<option value="">Select Member</option>');
		// 			$.each(result.bhmembers, function (key, value) {
		// 				$("#cmbRname").append('<option value="' + value
		// 					.id + '">' + value.brunch_head + '</option>');
		// 			});
		// 			//  $('#txtCity').html('<option value="">Select City</option>');
		// 		}
		// 	});
		// });



	});
</script>
@endsection


