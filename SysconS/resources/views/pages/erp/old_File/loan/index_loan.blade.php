@extends('layout.erp.home')
@section('page')

<style>
	#labelb{
		color: rgb(255, 242, 128);
		font-size: 20px;
	}
	.form-control{
		color: rgb(0, 0, 0);
	}
</style>

<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h2 class="page-title">ঋনের তালিকা

                </h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">ঋন </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i>ঋন সংযোজনঃ</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- loan Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>ঋনের পরিমান</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>ঋনের সংখ্যা </h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>ঋন অনুমদন</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>ঋন বাতিল</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /loan Center Statistics -->
	@if (session('success'))
		<div class="alert alert-success"><b>{{session('success')}}</b> </div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table display nowrap" id="example">
					<thead>
						<tr>
							<th>#</th>

							<th>শাখার নং</th>
							<th>সদস্য নং</th>
							<th>সদস্যের নাম</th>
							<th>তারিখ</th>
							<th>পদবি</th>
							<th> ঋনের পরিমান</th>
							<th> প্রদান</th>


							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($loans as $key=> $loan)

						<tr>
							<td>{{$loan->member_id}}</td>

							<td>{{$loan->brunch_code}}| {{$loan->brunch_name}}</td>
							<td>{{$loan->member_id}}</td>
							<td>{{$loan->member_name}}</td>
							<td>{{$loan->date}}</td>
							<td>{{$loan->deg}}</td>
							<td>{{$loan->loan_amount}}</td>
							<td>{{$loan->paid}}</td>

							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">


										<button type="button" value="{{$loan->id}}" class="btn btn-success" id="loanshBtn" ><i class="bi bi-eye-fill"></i> </button>


										<button type="button" value="{{$loan->id}}" class="btn btn-primary" id="loanBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$loan->id}}" class="btn btn-warning" id="loanDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>
						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$loans->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add loan Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> ঋন সংযোজন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('loans.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শাখা নং: <span class="text-danger">*</span></label>
								<select id="cmbBrunchId" class="form-control" name="cmbBrunchId" required>
									<option selected>Choose...</option>

									@foreach ($brunchs as $brunch)
									<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} </option>
									@endforeach
									</select>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="ooBrunch_name" name="txtBrunch_name" required placeholder="শাখার নাম">

							</div>
						</div>


							<div class="col-sm-4">
								{{-- <div class="form-group">
									<label class="col-form-label">Member Id : <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="" name="cmbMemberId" placeholder="Enter Speakers Name" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> Member Name : <span class="text-danger">*</span></label>
									<input type="email" class="form-control" id="" name="txtMember_name" placeholder="Email" required>
								</div>
							</div> --}}
                            <div class="form-group">
                                <label class="col-form-label">সদস্যের ধরন: </label>

                                <select id="cmbmcategory" class="form-control" name="cmbMemberId" required>
                                    <option selected>Choose...</option>

                                    @foreach ($m_categorys as $r_category)
                                    <option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">সদস্যের নামঃ : <span class="text-danger">*</span></label>
                                {{-- <input type="text" class="form-control" id="cmbRname" name="txtProvider" placeholder="Enter Provider" required> --}}
                                <select id="cmbRname" class="form-control" name="txtMember_name" required >

                                </select>
                            </div>
                        </div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">তারিখ  :</label>
									<input type="date" class="form-control" id="" name="txtDate" placeholder="তারিখ" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">পদবি: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="" name="txtDeg" placeholder="পদবি" required>
								</div>
							</div>	<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> ঋনের পরিমান: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="" name="txtLoan_amount" placeholder="ঋনের পরিমান" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> প্রদান : <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="" name="txtPaid" placeholder="প্রদান" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">মন্তব্য : <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="" name="txtComment" placeholder="মন্তব্য" required>
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
<!-- /Add loan Center Modal -->

<!-- Edit loan Center Modal -->
<div id="edit_loan" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> ঋনের সংশোধন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('loan-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')

					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type="hidden" class="form-control" id="cmbloanId" name="cmbloanId" required>
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>
								<select id="loanbrunch_id" class="form-control" name="cmbBrunchId" required>
									<option selected>Choose...</option>

									@foreach ($brunchs as $brunch)
									<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} </option>
									@endforeach
									</select>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="loanbrunch_name" name="txtBrunch_name" required>

							</div>
						</div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">সদস্যের নং : <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="loanmember_id" name="cmbMemberId" placeholder="Enter Speakers Name" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> সদস্যের নাম: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="loanmember_name" name="txtMember_name" placeholder="Email" required>
								</div>
							</div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> তারিখ :</label>
									<input type="date" class="form-control" id="date" name="txtDate" placeholder="Enter Address" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> পদবি: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="loandeg" name="txtDeg" placeholder="Enter Provider" required>
								</div>
							</div>	<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> ঋনের পরিমান: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="loanloan_amount" name="txtLoan_amount" placeholder="Enter Designation" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> প্রদান: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="loanpaid" name="txtPaid" placeholder="Enter Bg" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">মন্তব্য : <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="loancomment" name="txtComment" placeholder="Enter Bg" required>
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
<!-- /Edit loan Center Modal -->

<!-- Delete loan Center Modal -->
<div class="modal custom-modal fade" id="delete_loan" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
                    <h3>ঋন বাতিল করুন</h3>
                    <p>আপনি কি ঋন বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-loan')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_loanId" name="d_loan">


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
<!-- /Delete loan Center Modal -->

<!-- show loan Center Modal -->


<div id="show_loan" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">ঋনের বিস্তারিত বিবরন</h5>
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
								<div class="form-control "  id="Shbrunch_id"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">শাখা্র নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shbrunch_name"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> সদস্যের নং: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shmember_id"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">সদস্যের নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shmember_name"></div>

							</div>
						</div>


						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> তারিখ : <span class="text-danger">*</span></label>
								<div class="form-control" id="Shdate"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">পদবি: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shdeg"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> ঋনের পরিমান: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shloan_amount"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> পরিমান: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shpaid"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> মন্তব্য: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shcomment"></div>

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
        $(document).on('click','#loanDbtn',function(){
			var loan_id=$(this).val();
            // alert(member_id);
			$('#delete_loan').modal('show');
			$('#delete_loanId').val(loan_id);
		});



		$(document).on('click','#loanBtn',function(){
			//  alert("ok");

			var loan_id=$(this).val();
			// alert(loan_id);
			$('#edit_loan').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-loan/"+loan_id,
				success:function(response){
					// console.log(response.loan.brunch_id);
					$('#cmbloanId').val(loan_id);


					$('#loanbrunch_id').val(response.loan.brunch_id);


					$('#loanbrunch_name').val(response.loan.brunch_name);
					$('#loanmember_id').val(response.loan.member_id);
					$('#loanmember_name').val(response.loan.member_name);
					$('#date').val(response.loan.date);
					$('#loandeg').val(response.loan.deg);
					$('#loanloan_amount').val(response.loan.loan_amount);
					$('#loanpaid').val(response.loan.paid);
					$('#loancomment').val(response.loan.comment);



				}
			});
		});

		$(document).on('click','#loanshBtn',function(){
			//  alert("ok");

			var loansh_id=$(this).val();
			// alert(invi_id);
			$('#show_loan').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-loan/"+loansh_id,
				success:function(response){
					$('#cmbloanSHId').html(loansh_id);

					$('#Shbrunch_id').html(response.sloan.brunch_id);


					$('#Shbrunch_name').html(response.sloan.brunch_name);
					$('#Shmember_id').html(response.sloan.member_id);
					$('#Shmember_name').html(response.sloan.member_name);
					$('#Shdate').html(response.sloan.date);
					$('#Shdeg').html(response.sloan.deg);
					$('#Shloan_amount').html(response.sloan.loan_amount);
					$('#Shpaid').html(response.sloan.paid);
					$('#Shcomment').html(response.sloan.comment);




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


        // /////////////////////////
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








