@extends('layout.erp.home')
@section('page')

<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title"> কমপ্লেক্স দান বাক্সের টাকা উত্তোলনের তালিকা</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active"> কমপ্লেক্স </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i>  দান বাক্সের টাকা উত্তোলন সংযোজন</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- complexe Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কমপ্লেক্স দান বাক্সের টাকার পরিমান</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কমপ্লেক্স দান বাক্সের টাকা </h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কমপ্লেক্স দান বাক্সের টাকা</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কমপ্লেক্স দান বাক্সের টাকা উত্তোলন বাতিল</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /complexe Center Statistics -->
	@if (session('success'))
		<div class="alert alert-success"><b>{{session('success')}}</b> </div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-striped custom-table mb-0 " id="example">
					<thead>
						<tr>
							<th scope="col">ক্রম</th>
                            <th scope="col">শাখা নং</th>
                            {{-- <th scope="col">শাখার নাম</th> --}}
                            <th scope="col">উত্তোলনের তারিখ</th>
                            <th scope="col">দাতার নাম</th>
                            <th scope="col">টাকার পরিমাণ</th>
                            <th scope="col">ঠিকানা</th>
                            <th scope="col">রশিদ নং</th>
                            <th scope="col">মন্তব্য</th>
							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($complexes as $key=> $complexe)

						<tr>
							<td>{{++$key}}</td>

							<td>( {{$complexe->brunch_id}} ) {{$complexe->brunch_name}}</td>
							<td>{{$complexe->withdrawal_date}}</td>
							<td>{{$complexe->receiver_name}}</td>
							<td>{{$complexe->received_amount}}</td>
							<td>{{$complexe->address}}</td>

							<td>{{$complexe->receipt_no}}</td>
							<td>{{$complexe->comment}}</td>

							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">




										<button type="button" value="{{$complexe->id}}" class="btn btn-success" id="compBtn" ><i class="bi bi-eye-fill" ></i> </button>
										<button type="button" value="{{$complexe->id}}" class="btn btn-primary" id="comBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$complexe->id}}" class="btn btn-warning" id="comDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>
						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$complexes->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add complexe Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">কমপ্লেক্স দান বাক্সের টাকা উত্তোলন সংযোজন </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('complexes.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শাখা নং : <span class="text-danger">*</span></label>
								{{-- <input type="hidden" class="form-control" id="" name="" placeholder="Enter " required> --}}

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
								<input type="text" class="form-control" id="ooBrunch_name" name="txtBrunch_name" placeholder="Enter " >
							</div>
						</div>
						{{-- <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label"> দাতার ক্যাটাগরি: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtCategory" placeholder="Enter " >
							</div>
						</div> --}}
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">উত্তোলনের তারিখ: <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="" name="txtWithdrawal_date" placeholder="Enter " required>
							</div>
						</div>

						{{-- <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">দাতার নামঃ<span class="text-danger">*</span></label>

								<select id="txtReceiver_name" class="form-control" name="txtReceiver_name" required>
									<option selected>Choose...</option>

									@foreach ($members as $member)
									<option value="{{ $member->id }}">{{ $member->id }} | {{ $member->name }}</option>
									@endforeach
									</select>
							</div>
						</div> --}}
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label"> দাতার ক্যাটাগরি: <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="doncategory" name="txtCategory" placeholder="Enter " > --}}
                                <select id="doncategory" class="form-control"                  name="txtR_m_category" required>
									<option selected>Choose...</option>

									@foreach ($m_categorys as $r_category)
									<option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
									@endforeach
								</select>
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">দাতার নামঃ <span class="text-danger">*</span></label>
								<select id="donreceiver_name" class="form-control" name="txtReceiver_name" required>

								</select>
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">টাকার পরিমাণ: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtReceived_amount" placeholder="টাকার পরিমাণ " >
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">রশিদ নং: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtReceipt_no" placeholder="রশিদ নং " >
							</div>
						</div>	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">ঠিকানা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtAddress" placeholder="ঠিকানা " required>
							</div>
						</div>
						{{-- <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">টাকার পরিমাণ: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtReceived_amount" placeholder="টাকার পরিমাণ " >
							</div>
						</div> --}}

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label"> মন্তব্য : <span class="text-danger">*</span></label>
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
<!-- /Add complexe Center Modal -->

<!-- Edit complexe Center Modal -->
<div id="edit_com" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">কমপ্লেক্স দান বাক্সের টাকা সংশোধন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('complexe-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শাখা নং : <span class="text-danger">*</span></label>
								<input type="hidden" class="form-control" id="cmbcomId" name="cmbcomId" placeholder="Enter " required>

								<select id="combrunch_id" class="form-control" name="cmbBrunchId" required>
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
								<input type="text" class="form-control" id="combrunch_name" name="txtBrunch_name" placeholder="Enter " >
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">উত্তোলনের তারিখ: <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="comwithdrawal_date" name="txtWithdrawal_date" placeholder="Enter " required>
							</div>
						</div>

						{{-- <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">দাতার নামঃ: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="comreceiver_name" name="txtReceiver_name" placeholder="Enter " required>
							</div>
						</div> --}}
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label"> দাতার ক্যাটাগরি: <span class="text-danger">*</span></label>

                                <select id="comr_m_category" class="form-control" name="txtR_m_category" required>
									<option selected>Choose...</option>

									@foreach ($m_categorys as $r_category)
									<option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
									@endforeach
								</select>
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">দাতার নামঃ <span class="text-danger">*</span></label>
								{{-- <select id="comreceiver_name" class="form-control" name="txtReceiver_name" required>

								</select> --}}
								{{-- <input type="text" class="form-control" id="comreceiver_name" name="txtReceiver_name" placeholder="Enter " required> --}}
							</div>
						</div>


						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">রশিদ নং:: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="comreceipt_no" name="txtReceipt_no" placeholder="Enter " >
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">টাকার পরিমাণ: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="comreceived_amount" name="txtReceived_amount" placeholder="Enter " >
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">ঠিকানা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="comaddress" name="txtAddress" placeholder="Enter " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label"> মন্তব্য : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="comcomment" name="txtComment" placeholder="Enter " >
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
<!-- /Edit complexe Center Modal -->

<!-- Delete complexe Center Modal -->
<div class="modal custom-modal fade" id="delete_com" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
                    <h3>কমপ্লেক্স দান বাক্সের টাকা উত্তোলন  বাতিল করুন</h3>
                    <p>আপনি কি কমপ্লেক্স দান বাক্সের টাকা উত্তোলন  বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-complexe')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_comId" name="d_com">


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
<!-- /Delete complexe Center Modal -->
<!-- show padcollection Center Modal -->

<div id="show_comp" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">কমপ্লেক্স দান বাক্সের টাকা উত্তোলন  বিস্তারিত বিবরণ</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: rgb(4, 21, 34)">

				<form action="">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">শাখা নং: <span class="text-danger">*</span></label>
								<div class="form-control "  id="compSHbrunch_id"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">শাখার নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="compSHbrunch_name"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">উত্তোলনের তারিখ: <span class="text-danger">*</span></label>
								<div class="form-control" id="compSHwithdrawal_date"></div>

							</div>
						</div>



						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> দাতার নামঃ <span class="text-danger">*</span></label>
								<div class="form-control" id="compSHreceiver_name"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">রশিদ নং: <span class="text-danger">*</span></label>
								<div class="form-control" id="compSHreceipt_no"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ঠিকানা : <span class="text-danger">*</span></label>
								<div class="form-control" id="compSHaddress"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">টাকার পরিমাণ: <span class="text-danger">*</span></label>
								<div class="form-control" id="compSHreceived_amount"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">মন্তব্য: <span class="text-danger">*</span></label>
								<div class="form-control" id="compSHcomment"></div>

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
        $(document).on('click','#comDbtn',function(){
			var com_id=$(this).val();
            // alert(member_id);
			$('#delete_com').modal('show');
			$('#delete_comId').val(com_id);
		});



		$(document).on('click','#comBtn',function(){
			//  alert("ok");

			var com_id=$(this).val();
			// alert(invi_id);
			$('#edit_com').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-complexe/"+com_id,
				success:function(response){
					// console.log(response.complexe.brunch_name);
					$('#cmbcomId').val(com_id);

					$('#combrunch_id').val(response.complexe.brunch_id);
					$('#combrunch_name').val(response.complexe.brunch_name);

					$('#comwithdrawal_date').val(response.complexe.withdrawal_date);
					$('#comr_m_category').val(response.complexe.r_m_category);
					$('#comreceiver_name').val(response.complexe.receiver_name);

					$('#comreceipt_no').val(response.complexe.receipt_no);
					$('#comaddress').val(response.complexe.address);
					$('#comreceived_amount').val(response.complexe.received_amount);
					$('#comcomment').val(response.complexe.comment);



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
		$(document).on('click','#compBtn',function(){
			//  alert("ok");

			var compsh_id=$(this).val();
			// alert(invi_id);
			$('#show_comp').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-complexe/"+compsh_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);
					$('#cmbincSHId').html(compsh_id);


					$('#compSHbrunch_id').html(response.scomplexe.brunch_id);
					$('#compSHbrunch_name').html(response.scomplexe.brunch_name);
					$('#compSHwithdrawal_date').html(response.scomplexe.withdrawal_date);
					$('#compSHreceiver_name').html(response.scomplexe.receiver_name);
					$('#compSHreceipt_no').html(response.scomplexe.receipt_no);
					$('#compSHaddress').html(response.scomplexe.address);
					$('#compSHreceived_amount').html(response.scomplexe.received_amount);
					$('#compSHcomment').html(response.scomplexe.comment);



				}
			});
		});

// //////////////////////////////
     $('#doncategory').on('change', function () {
			var idCountry = this.value;
            $("#donreceiver_name").html('');
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

					$('#donreceiver_name').html('<option value="">Select Member</option>');
					$.each(result.cmembers, function (key, value) {
						$("#donreceiver_name").append('<option value="' + value
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

					$('#donreceiver_name').html('<option value="">Select Member</option>');
					$.each(result.cmmembers, function (key, value) {
						$("#donreceiver_name").append('<option value="' + value
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

					$('#donreceiver_name').html('<option value="">Select Member</option>');
					$.each(result.bhmembers, function (key, value) {
						$("#donreceiver_name").append('<option value="' + value
							.id + '">' + value.id  +' | ' + value.m_name + '</option>');
					});

				}
			});
            }


		});
        // $('#cmbRname').on('change', function(){
        //     // console.log($('#cmbRname').val());
        //     var selectedVal = $('#cmbRname').val();
        //     for(var i=0;i<filteredMember.length;i++){
        //         var selectedId = filteredMember[i].id;
        //         // console.log(selectedId);
        //         if(selectedVal == selectedId){
        //             $("#ootxtPhone").val(filteredMember[i].m_phone);
        //             // $("#txtfMember_name").val(filteredMember[i].m_name);


        //         }

        //     }
        // });
	});
</script>
@endsection




