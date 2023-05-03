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
				<h2 class="page-title">কমপ্লেক্স বাবদ প্রতিশ্রুতির তালিকা
				</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">কমপ্লেক্স বাবদ প্রতিশ্রুতি </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i> কমপ্লেক্স বাবদ প্রতিশ্রুতি সংযোজন</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- complexpromise Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কমপ্লেক্স বাবদ প্রতিশ্রুতির সংখ্যা</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কমপ্লেক্স বাবদ প্রতিশ্রুতি </h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কমপ্লেক্স বাবদ প্রতিশ্রুতি</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কমপ্লেক্স বাবদ প্রতিশ্রুতি বাতিল</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /complexpromise Center Statistics -->
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

							<th>শাখার নামঃ</th>
							<th>সদস্যের নামঃ</th>
							<th>তারিখ</th>
							<th>প্রদানকারির নাম</th>
							<th>ধরন</th>
							<th>পশু</th>
							<th>মাধ্যম</th>
							<th>পরিমান</th>


							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($complexpromises as $key=> $complexpromise)

						<tr>
							<td>{{$key}}</td>

							<td>{{$complexpromise->brunch_id}}| {{$complexpromise->brunch_name}}</td>
							<td> {{$complexpromise->cp_name}}</td>
							<td>{{$complexpromise->date}}</td>
							<td>{{$complexpromise->cp_name}}</td>
							<td>{{$complexpromise->deg}}</td>
							<td>{{$complexpromise->promise}}</td>
							<td>{{$complexpromise->paid}}</td>
							<td>{{$complexpromise->comment}}</td>

							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">


										<button type="button" value="{{$complexpromise->id}}" class="btn btn-success" id="complexpromiseshBtn" ><i class="bi bi-eye-fill"></i> </button>


										<button type="button" value="{{$complexpromise->id}}" class="btn btn-primary" id="complexpromiseBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$complexpromise->id}}" class="btn btn-warning" id="complexpromiseDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>
						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$complexpromises->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add complexpromise Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">কমপ্লেক্স বাবদ প্রতিশ্রুতি সংযোজন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('complexpromises.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">Brunch Code / শাখার নং: <span class="text-danger">*</span></label>
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


							{{-- <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">Mamber Id : <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="Smamber_id" name="cmbMamberId" placeholder="Enter Speakers Name" required>
								</div>
							</div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> Member Name : <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="Smember_name" name="txtMember_name" placeholder="Email" required>
								</div>
							</div>
						 --}}
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">তারিখ  :</label>
									<input type="date" class="form-control" id="" name="txtDate" placeholder="তারিখ" required>
								</div>
							</div>
							{{-- <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">প্রদানকারি:</label>
									<input type="text" class="form-control" id="" name="txtCp_name" placeholder="প্রদানকারি" required>
								</div>
							</div> --}}
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">প্রদানকারির ক্যাটাগরি: <span class="text-danger">*</span></label>
                                    {{-- <input type="date" class="form-control" id="bdwithdrawal_date" name="txtWithdrawal_date" placeholder="Enter " required> --}}
                                    <select id="depr_m_category" class="form-control" name="txtm_category" required>
                                        <option selected>Choose...</option>

                                        @foreach ($m_categorys as $r_category)
                                        <option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">প্রদানকারির নাম: <span class="text-danger">*</span></label>
                                    {{-- <input type="text" class="form-control" id="depreceiver_name" name="txtReceiver_name" placeholder="গ্রহিতার নাম " > --}}
                                    <select id="Scp_name" class="form-control" name="txtCp_name" required>

                                    </select>
                                </div>
                            </div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> পদবি : <span class="text-danger">*</span></label>
									{{-- <input type="text" class="form-control" id="" name="txtDeg" placeholder="পদবি" required> --}}
                                    <select id="" class="form-control" name="txtDeg" required>
                                        <option selected>Choose...</option>

                                        @foreach ($desis as $desi)
                                        <option value="{{ $desi->id }}"> {{ $desi->name }}</option>
                                        @endforeach
                                        </select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">ওয়াদা : <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="" name="txtPromise" placeholder="ওয়াদা" required>
								</div>
							</div>	<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">পরিশোধ: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="" name="txtPaid" placeholder="পরিশোধ" required>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> মন্তব্য : <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="" name="txtComment" placeholder="মন্তব্য" >
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
<!-- /Add complexpromise Center Modal -->

<!-- Edit complexpromise Center Modal -->
<div id="edit_complexpromise" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">কমপ্লেক্স বাবদ প্রতিশ্রুতি সংশোধন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('complexpromise-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')

					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type="hidden" class="form-control" id="cmbcomplexpromiseId" name="cmbcomplexpromiseId" required>
								<label class="col-form-label"> শাখার নং: <span class="text-danger">*</span></label>
								<select id="ScmbBrunchId" class="form-control" name="cmbBrunchId" required>
									<option selected>Choose...</option>

									@foreach ($brunchs as $brunch)
									<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} </option>
									@endforeach
									</select>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="SBrunch_name" name="txtBrunche_name" required>

							</div>
						</div>


						{{-- <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">Mamber Id : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="Smamber_id" name="cmbMamberId" placeholder="Enter Speakers Name" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">Member Name : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="Smember_name" name="txtMember_name" placeholder="Enter Speakers Name" required>
							</div>
						</div> --}}
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">তারিখ : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="Scdate" name="txtDate" placeholder="Enter Speakers Name" required>
							</div>
						</div>


                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">প্রদানকারির ক্যাটাগরি: <span class="text-danger">*</span></label>

                                <select id="Scp_m_category" class="form-control" name="txtm_category" required>
									<option selected>Choose...</option>

									@foreach ($m_categorys as $r_category)
									<option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
									@endforeach
									</select>
							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">প্রদানকারির নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="eScp_name" name="txtCp_name" >


                                {{-- <select id="Scp_name" class="form-control" name="txtCp_name" required>

                                </select> --}}
							</div>
						</div>
						{{-- <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">প্রদানকারির নামঃ:</label>
								<input type="date" class="form-control" id="Scp_name" name="txtCp_name" placeholder="Enter Address" required>
							</div>
						</div> --}}
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">পদবি : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="Sdeg" name="txtDeg" placeholder="Enter Provider" required>
							</div>
						</div>	<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">ওয়াদা : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="Spromise" name="txtPromise" placeholder="Enter Designation" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">পরিশোধ : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="Spaid" name="txtPaid" placeholder="Enter Bg" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">মন্তব্য : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="Scomment" name="txtComment" placeholder="Enter Bg" >
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
<!-- /Edit complexpromise Center Modal -->

<!-- Delete complexpromise Center Modal -->
<div class="modal custom-modal fade" id="delete_complexpromise" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
                    <h3>>কমপ্লেক্স বাবদ প্রতিশ্রুতি বাতিল করুন</h3>
                    <p>আপনি কি কমপ্লেক্স বাবদ প্রতিশ্রুতি বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-complexpromise')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_complexpromiseId" name="d_complexpromise">


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
<!-- /Delete complexpromise Center Modal -->

<!-- show complexpromise Center Modal -->


<div id="show_complexpromise" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">কমপ্লেক্স বাবদ প্রতিশ্রুতির বিস্তারিত বিবরণ</h5>
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
								<label class="col-form-label" id="labelb">শাখার নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shbrunch_name"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">প্রদানকারির নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shcp_name"></div>

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
								<label class="col-form-label" id="labelb">ওয়াদা: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shpromise"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">পরিশোধ: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shpaid"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">মন্তব্য: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shcomment"></div>

							</div>
						</div>

					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!-- /show complexpromise Center Modal -->
<script>
	$(document).ready(function(){
        $(document).on('click','#complexpromiseDbtn',function(){
			var complexpromise_id=$(this).val();
            // alert(member_id);
			$('#delete_complexpromise').modal('show');
			$('#delete_complexpromiseId').val(complexpromise_id);
		});



		$(document).on('click','#complexpromiseBtn',function(){
			//  alert("ok");

			var complexpromise_id=$(this).val();
			// alert(complexpromise_id);
			$('#edit_complexpromise').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-complexpromise/"+complexpromise_id,
				success:function(response){
					console.log(response.complexpromise.date);
					$('#cmbcomplexpromiseId').val(complexpromise_id);

					$('#ScmbBrunchId').val(response.complexpromise.brunch_id);
					$('#SBrunch_name').val(response.complexpromise.brunch_name);

					$('#Scdate').val(response.complexpromise.date);
					$('#Scp_m_category').val(response.complexpromise.m_category);

					$('#eScp_name').val(response.complexpromise.cp_name);
					$('#Sdeg').val(response.complexpromise.deg);
					$('#Spromise').val(response.complexpromise.promise);
					$('#Spaid').val(response.complexpromise.paid);
					$('#Scomment').val(response.complexpromise.comment);



				}
			});
		});

		$(document).on('click','#complexpromiseshBtn',function(){
			//  alert("ok");

			var complexpromisesh_id=$(this).val();
			// alert(invi_id);
			$('#show_complexpromise').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-complexpromise/"+complexpromisesh_id,
				success:function(response){
					$('#cmbcomplexpromiseSHId').html(complexpromisesh_id);

					$('#Shbrunch_id').html(response.scomplexpromise.brunch_id);
					$('#Shbrunch_name').html(response.scomplexpromise.brunch_name);

					$('#Shdate').html(response.scomplexpromise.date);

					$('#Shcp_name').html(response.scomplexpromise.cp_name);

					$('#Shdeg').html(response.scomplexpromise.deg);
					$('#Shpromise').html(response.scomplexpromise.promise);
					$('#Shpaid').html(response.scomplexpromise.paid);
					$('#Shcomment').html(response.scomplexpromise.comment);

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

// /////////////////////////////////////////////////////////

        $('#depr_m_category').on('change', function () {
			var idCountry = this.value;
            $("#Scp_name").html('');
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

					$('#Scp_name').html('<option value="">Select Member</option>');
					$.each(result.cmembers, function (key, value) {
						$("#Scp_name").append('<option value="' + value
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

					$('#Scp_name').html('<option value="">Select Member</option>');
					$.each(result.cmmembers, function (key, value) {
						$("#Scp_name").append('<option value="' + value
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

					$('#Scp_name').html('<option value="">Select Member</option>');
					$.each(result.bhmembers, function (key, value) {
						$("#Scp_name").append('<option value="' + value
							.id + '">' + value.id  +' | ' + value.m_name + '</option>');
					});

				}
			});
            }


		});


	});
</script>

@endsection










