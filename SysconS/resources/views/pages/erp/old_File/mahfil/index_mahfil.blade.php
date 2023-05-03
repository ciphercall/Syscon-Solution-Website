@extends('layout.erp.home')
@section('page')




<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h2 class="page-title"> মাহফিল তালিকা</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">মাহফিল </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i> মাহফিল সংযোজনঃ</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- mahfil Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>মাহফিলের সংখ্যা</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>মাহফিলের পরিমান </h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>মাহফিল</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>মাহফিল</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /mahfil Center Statistics -->
	@if (session('success'))
		<div class="alert alert-success"><b>{{session('success')}}</b> </div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table display nowrap" id="example">
					<thead>
						<tr>
                            <th scope="col">#</th>
                            <th scope="col">শাখার নাম</th>
                            <th scope="col">মাহফিল শুরুর তারিখ</th>
                            <th scope="col">মাহফিল শেষের তারিখ</th>
                            <th scope="col">মাহফিলের উপলক্ষ্য</th>
                            <th scope="col">বক্তাদের নাম</th>
                            <th scope="col">স্থান</th>


							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($mahfils as $key=> $mahfil)

						<tr>
							<td>{{++$key}}</td>

							<td>( {{$mahfil->brunch_id}} ) {{$mahfil->brunch_name}}</td>

							<td>{{$mahfil->start_date}}</td>
							<td>{{$mahfil->end_date}}</td>

							<td>{{$mahfil->occasion}}</td>
							<td>{{$mahfil->speakers}}</td>

							<td>{{$mahfil->address}}</td>

							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">


										{{-- <a class="btn btn-success" href="{{route('mahfils.show',$mahfil->id)}}"  ><i class="bi bi-eye-fill"></i> </a> --}}

										<button type="button" value="{{$mahfil->id}}" class="btn btn-success" id="mahshBtn" ><i class="bi bi-eye-fill"></i> </button>


										<button type="button" value="{{$mahfil->id}}" class="btn btn-primary" id="mahBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$mahfil->id}}" class="btn btn-warning" id="mahDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>
						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$mahfils->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add mahfil Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> মাহফিল সংযোজন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('mahfils.store')}}" method="post" enctype="multipart/form-data">
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
								<label class="col-form-label">শাখার নাম:</label>
								<input type="text" class="form-control" id="ooBrunch_name" name="txtBrunch_name" required placeholder="শাখার নাম">

							</div>
						</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">মাহফিল শুরুর তারিখ: <span class="text-danger">*</span></label>
									<input type="date" class="form-control" id="txtStart_date" name="txtStart_date" placeholder="Enter Full Name" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">মাহফিল শেষের তারিখ:</label>
									<input type="date" class="form-control" id="txtEnd_date" name="txtEnd_date" placeholder="Enter Phone Number" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">মাহফিল শুরুর সময়:<span class="text-danger">*</span></label>
									<input type="time" class="form-control" id="txtStart_time" name="txtStart_time" placeholder="Enter Start Time" required>
								</div>
							</div><div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">মাহফিল শেষের সময়: <span class="text-danger">*</span></label>
									<input type="time" class="form-control" id="txtEnd_time" name="txtEnd_time" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">বক্তাদের সংখ্যা</label>
									<input type="text" class="form-control" id="txtNum_speakers" name="txtNum_speakers" placeholder="বক্তাদের সংখ্যা" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">বক্তাদের নাম: <span class="text-danger">*</span></label>
									{{-- <input type="text" class="form-control" id="txtSpeakers" name="txtSpeakers" placeholder="বক্তাদের নাম" required> --}}

                                    <textarea name="txtSpeakers" id="txtSpeakers" class="form-control" placeholder="বক্তাদের নাম" required></textarea>


								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">অনুষ্ঠান :
                                        <span class="text-danger">*</span></label>
									{{-- <input type="text" class="form-control" id="txtOccasion" name="txtOccasion" placeholder="Occasion" required> --}}
                                    <select id="txtOccasion" class="form-control" name="txtOccasion" required>
                                        <option selected>Choose...</option>

                                        @foreach ($occations as $occation)
                                        <option value="{{ $occation->id }}">{{ $occation->name }} </option>
                                        @endforeach
                                        </select>
								</div>
							</div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">ঠিকানা:</label>
									<input type="text" class="form-control" id="txtAddress" name="txtAddress" placeholder="ঠিকানা" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">দর্শকের সংখ্যা: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="txtNum_audience" name="txtNum_audience" placeholder="দর্শকের সংখ্যা" required>
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
<!-- /Add mahfil Center Modal -->

<!-- Edit mahfil Center Modal -->
<div id="edit_mah" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> মাহফিল সংশোধন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('mahfil-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-4">

							<div class="form-group">
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>
								<input type="hidden" class="form-control" id="cmbmahId" name="cmbmahId" required>


								<select id="mahbrunch_id" class="form-control" name="cmbBrunchId" required>
								<option selected>Choose...</option>

								@foreach ($brunchs as $brunch)
								<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} | {{ $brunch->brunch_name }}</option>
								@endforeach
								</select>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="mahbrunch_name" name="txtBrunch_name" required>
							</div>
						</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">মাহফিল শুরুর তারিখ: <span class="text-danger">*</span></label>
									<input type="date" class="form-control" id="mahstart_date" name="txtStart_date" placeholder="Enter Full Name" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">মাহফিল শেষের তারিখ:</label>
									<input type="date" class="form-control" id="mahend_date" name="txtEnd_date" placeholder="Enter Phone Number" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">মাহফিল শুরুর সময়: <span class="text-danger">*</span></label>
									<input type="time" class="form-control" id="mahstart_time" name="txtStart_time" placeholder="Enter Start Time" required>
								</div>
							</div><div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">মাহফিল শেষের সময়: <span class="text-danger">*</span></label>
									<input type="time" class="form-control" id="mahend_time" name="txtEnd_time" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">বক্তাদের সংখ্যা</label>
									<input type="text" class="form-control" id="mahnum_speakers" name="txtNum_speakers" placeholder=" Number Of Speakers Name" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">বক্তাদের নাম: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="mahspeakers" name="txtSpeakers" placeholder="Enter Speakers Name" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">অনুষ্ঠান: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="mahoccasion" name="txtOccasion" placeholder="Occasion" required>
								</div>
							</div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">ঠিকানা:</label>
									<input type="text" class="form-control" id="mahaddress" name="txtAddress" placeholder="Enter Address" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">দর্শকের সংখ্যা: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="mahnum_audience" name="txtNum_audience" placeholder="Enter Speakers" required>
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
<!-- /Edit mahfil Center Modal -->

<!-- Delete mahfil Center Modal -->
<div class="modal custom-modal fade" id="delete_mah" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
                    <h3>মাহফিল বাতিল করুন</h3>
                    <p>আপনি কি মাহফিল বাতিল করতে চান ?</p>

				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-mahfil')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_mahId" name="d_mah">


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
<!-- /Delete mahfil Center Modal -->

<!-- show mahfil Center Modal -->
<div id="show_mah" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title"> মাহফিল বিস্তারিত বিবরণ</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				{{-- <div><h1 id="mahSHbrunch_name"></h1></div> --}}
				<div class="card mb-0">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<div class="profile-view">
									{{-- <div class="profile-img-wrap">
										<div class="profile-img">
											<a href="#"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
										</div>
									</div> --}}
									{{-- <div class="profile-basic"> --}}
										<div class="row">
											<div class="col-md-6">
												{{-- <div class="profile-info-left">
													<label class="col-form-label"><b>Branch ID:</b> </label>
													<h2 class="user-name m-t-0 mb-0" id="mahSHbrunch_id"></h2>
													<label class="col-form-label"><b>Branch Name:</b> </label>
													<h4  id="mahSHbrunch_name"></h4>

													<label
													class="col-form-label"><b>Address:</b> </label>


													<div class="staff-id" id="mahSHaddress"></div>

													<label
													class="col-form-label"><b>Occasion:</b> </label>

													<div  id="mahSHoccasion"></div>

												</div> --}}
												<div class="profile-info-left">
												<ul class="personal-info">
													<li>
														<div class="title"><b>শাখা নং:</b></div>
														<div class="text" id="mahSHbrunch_id"></div>
													</li>
													<li>
														<div class="title"><b>শাখার নাম:</b></div>
														<div class="text"><a href="" id="mahSHbrunch_name"></a></div>
													</li>
													<li>
														<div class="title"><b>ঠিকানা:</b></div>
														<div class="text" id="mahSHaddress"></div>
													</li>
													<li>
														<div class="title"><b>অনুষ্ঠান:</b></div>
														<div class="text" id="mahSHoccasion"></div>
													</li>
                                                    <li>
														<span class="title">মাহফিল শুরুর তারিখ:</span>
														<span class="text" id="mahSHstart_date"></span>
													</li>
													<li>
														<div class="title">মাহফিল শেষের তারিখ:</div>
														<div class="text" id="mahSHend_date"></div>
													</li>

												</ul>
											</div>

											</div>
											<div class="col-md-6">
												<ul class="personal-info">
													<li>
														<div class="title">বক্তাদের নাম:</div>
														<div class="text"><a href="" id="mahSHspeakers"></a></div>
													</li>
													<li>
														<span class="title">বক্তাদের সংখ্যা:</span>
														<span class="text"><a href="" id="mahSHnum_speakers"></a></span>
													</li>

													<li>
														<div class="title">মাহফিল শুরুর সময়:</div>
														<div class="text" id="mahSHstart_time"></div>
													</li>
													<li>
														<div class="title">মাহফিল শেষের সময়:</div>
														<div class="text" id="mahSHend_time"></div>
													</li>
                                                   <li>
														<div class="title">দর্শকের সংখ্যা:</div>
														<div class="text" id="mahSHnum_audience"></div>
													</li>

												</ul>
											</div>
										</div>
									{{-- </div> --}}
									<div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /show mahfil Center Modal -->
<script>
	$(document).ready(function(){
        $(document).on('click','#mahDbtn',function(){
			var mah_id=$(this).val();
            // alert(member_id);
			$('#delete_mah').modal('show');
			$('#delete_mahId').val(mah_id);
		});



		$(document).on('click','#mahBtn',function(){
			//  alert("ok");

			var mah_id=$(this).val();
			// alert(invi_id);
			$('#edit_mah').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-mahfil/"+mah_id,
				success:function(response){
					// console.log(response.mahfil.brunch_name);
					$('#cmbmahId').val(mah_id);




					$('#mahbrunch_id').val(response.mahfil.brunch_id);
					$('#mahbrunch_name').val(response.mahfil.brunch_name);
					$('#mahstart_date').val(response.mahfil.start_date);
					$('#mahend_date').val(response.mahfil.end_date);
					$('#mahstart_time').val(response.mahfil.start_time);
					$('#mahend_time').val(response.mahfil.end_time);
					$('#mahnum_speakers').val(response.mahfil.num_speakers);
					$('#mahspeakers').val(response.mahfil.speakers);
					$('#mahoccasion').val(response.mahfil.occasion);
					$('#mahaddress').val(response.mahfil.address);
					$('#mahnum_audience').val(response.mahfil.num_audience);



				}
			});
		});

		$(document).on('click','#mahshBtn',function(){
			//  alert("ok");

			var mahsh_id=$(this).val();
			// alert(invi_id);
			$('#show_mah').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-mahfil/"+mahsh_id,
				success:function(response){
					// console.log(response.mahfil.brunch_name);
					$('#cmbmahSHId').html(mahsh_id);




					$('#mahSHbrunch_id').html(response.smahfil.brunch_id);
					$('#mahSHbrunch_name').html(response.smahfil.brunch_name);
					$('#mahSHstart_date').html(response.smahfil.start_date);
					$('#mahSHend_date').html(response.smahfil.end_date);
					$('#mahSHstart_time').html(response.smahfil.start_time);
					$('#mahSHend_time').html(response.smahfil.end_time);
					$('#mahSHnum_speakers').html(response.smahfil.num_speakers);
					$('#mahSHspeakers').html(response.smahfil.speakers);
					$('#mahSHoccasion').html(response.smahfil.occasion);
					$('#mahSHaddress').html(response.smahfil.address);
					$('#mahSHnum_audience').html(response.smahfil.num_audience);



				}
			});
		});


		$("#cmbBrunchId").on("change",function(){
			// alert("ok");
           $.ajax({
             url:"<?php echo url("getbrunchs")?>",
             type:'GET',
             data:{"id":$(this).val()},
             success:function(res){
              let brunch=JSON.parse(res);
                console.log(brunch);
               $("#ooBrunch_name").val(brunch.brunch_name);

            //    $("#").val(member.);






             }
           });
        });




	});
</script>
@endsection



