

<!-- Edit Invitation Center Modal -->
<div id="edit_dep" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> দান বক্স ও কমপ্লেক্স বাবদ জমা সংশোধন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('depositcenter-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>
									<input type="hidden" class="form-control" id="cmbdepId" name="cmbdepId" placeholder="Enter ">

								<select id="depbrunchId" class="form-control" name="cmbBrunchId" required>
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
								<input type="text" class="form-control" id="depbrunch_name" name="txtBrunch_name" placeholder="Enter " >
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">জমা দেওয়ার তারিখ: <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="depcollection_date" name="txtCollection_date" placeholder="Enter " >
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">জমা কারীর ক্যাটাগরি: <span class="text-danger">*</span></label>
								{{-- <input type="date" class="form-control" id="bdwithdrawal_date" name="txtWithdrawal_date" placeholder="Enter " required> --}}
                                <select id="depm_category" class="form-control" name="txtM_category" required>
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

								{{-- <input type="text" class="form-control" id="depmember_name" name="txtMember_name" placeholder="Enter " required> --}}

                                <select id="depmember_name" class="form-control" name="txtMember_name" required>

								</select>
							</div>
						</div>
							<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">মোবাইল নাম্বার : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="depphone" name="txtPhone" placeholder="Enter " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রহিতার টাকার পরিমাণ<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="depreceived_amount" name="txtReceived_amount" placeholder="Enter " >
							</div>
						</div>

                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">কি বাবদ টাকা জমা: <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="" name="txtPurpose_catagory" placeholder="Enter " > --}}

                                <select id="deppurpose_catagory" class="form-control" name="txtPurpose_catagory" required>
									<option selected>Choose...</option>

									@foreach ($dpcs as $dpc)
									<option value="{{ $dpc->id }}"> {{ $dpc->d_name }}</option>
									@endforeach
									</select>

							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রহিতার ক্যাটাগরি: <span class="text-danger">*</span></label>
								{{-- <input type="date" class="form-control" id="bdwithdrawal_date" name="txtWithdrawal_date" placeholder="Enter " required> --}}
                                <select id="depr_m_category" class="form-control" name="txtR_m_category" required>
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
								{{-- <input type="text" class="form-control" id="depreceiver_name" name="txtReceiver_name" placeholder="গ্রহিতার নাম " > --}}
                                <select id="depreceiver_name" class="form-control" name="txtReceiver_name" required>

                                </select>
							</div>
						</div>
						{{-- <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রহিতার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="depreceiver_name" name="txtReceiver_name" placeholder="Enter " >
							</div>
						</div> --}}
							<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">রশিদ নং: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="depmoney_receipt_no" name="txtMoney_receipt_no" placeholder="Enter " >
							</div>
						</div>
						<div class="col-sm-6">

							<div class="form-group">
								<label class="col-form-label">প্রাপ্তি স্বীকার : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="depacknowledgment_receipt" name="txtAcknowledgment_receipt" placeholder="Enter " >
							</div>
						</div>
						<div class="col-sm-6">

							<div class="form-group">
								<label class="col-form-label">মন্তব্য:</label>
								<input type="text" class="form-control" id="depcomment" name="txtComment" placeholder="মন্তব্য " >
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
<!-- /Edit Invitation Center Modal -->
<script>
    var filteredMember = [];

$(document).ready(function(){




		$(document).on('click','#depBtn',function(){
			//  alert("ok");

			var dep_id=$(this).val();
			// alert(qu_id);
			$('#edit_dep').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-depositcenter/"+dep_id,
				success:function(response){
					// console.log(response.member.name);
					$('#cmbdepId').val(dep_id);
					$('#depbrunchId').val(response.depositcenter.brunch_id);
					$('#depbrunch_name').val(response.depositcenter.brunch_name);



					$('#depm_category').val(response.depositcenter.m_category);

					$('#depcollection_date').val(response.depositcenter.collection_date);
					$('#depmember_name').val(response.depositcenter.member_name);
					$('#depphone').val(response.depositcenter.phone);
					$('#depreceived_amount').val(response.depositcenter.received_amount);
					$('#deppurpose_catagory').val(response.depositcenter.purpose_catagory);



					$('#depr_m_category').val(response.depositcenter.r_m_category);

					$('#depreceiver_name').val(response.depositcenter.receiver_name);
					$('#depmoney_receipt_no').val(response.depositcenter.money_receipt_no);
					$('#depacknowledgment_receipt').val(response.depositcenter.acknowledgment_receipt);
					$('#depcomment').val(response.depositcenter.comment);




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



        $('#depm_category').on('change', function () {
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

					$('#depmember_name').html('<option value="">Select Member</option>');
					$.each(result.cmembers, function (key, value) {
						$("#depmember_name").append('<option value="' + value
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

					$('#depmember_name').html('<option value="">Select Member</option>');
					$.each(result.cmmembers, function (key, value) {
						$("#depmember_name").append('<option value="' + value
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

					$('#depmember_name').html('<option value="">Select Member</option>');
					$.each(result.bhmembers, function (key, value) {
						$("#depmember_name").append('<option value="' + value
							.id + '">' + value.id  +' | ' + value.m_name + '</option>');
					});

				}
			});
            }


		});




        // ///////////////////////////////////////data
        $('#depr_m_category').on('change', function () {
			var idCountry = this.value;
            $("#depreceiver_name").html('');
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

					$('#depreceiver_name').html('<option value="">Select Member</option>');
					$.each(result.cmembers, function (key, value) {
						$("#depreceiver_name").append('<option value="' + value
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

					$('#depreceiver_name').html('<option value="">Select Member</option>');
					$.each(result.cmmembers, function (key, value) {
						$("#depreceiver_name").append('<option value="' + value
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

					$('#depreceiver_name').html('<option value="">Select Member</option>');
					$.each(result.bhmembers, function (key, value) {
						$("#depreceiver_name").append('<option value="' + value
							.id + '">' + value.id  +' | ' + value.m_name + '</option>');
					});

				}
			});
            }


		});
	});
</script>

