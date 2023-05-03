@extends('layout.erp.home')
@section('page')


	<!-- Page Content -->
		<div class="content container-fluid">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">পদবির তালিকা</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">পদবি</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<!-- Search Filter -->
				<div class="row filter-row">
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus select-focus">
							<select class="select floating">
								<option>Choose</option>
							</select>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus">
							<div class="cal-icon">
								<input class="form-control floating datetimepicker" type="text">
							</div>
							<label class="focus-label">From</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus">
							<div class="cal-icon">
								<input class="form-control floating datetimepicker" type="text">
							</div>
							<label class="focus-label">To</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#add_designation"><i class="fa fa-plus"></i>পদবি সংযোজন করুন</a>
					</div>
				</div>
				<!-- /Search Filter -->
				@if (session('success'))
				<div class="alert alert-success"><b>{{session('success')}}</b> </div>
			@endif
				<div class="row">
					<div class="col-md-12">
                    <div class="table-responsive">
								<table class="table table-striped custom-table mb-0 " id="example">
								<thead>
									<tr>
										<th>নং</th>
										<th>পদবির নাম</th>
										<th>তারিখ</th>

										<th class="text-right">Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($designations as $designation)
									<tr>
										<td>{{$designation-> id}}</td>
										<td>{{$designation-> name}}</td>
										<td>{{$designation-> created_at}}</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<button type="button" value="{{$designation->id}}" class="btn btn-success" id="designationshBtn" ><i class="bi bi-eye-fill"></i> </button>


													<button type="button" value="{{$designation->id}}" class="btn btn-primary" id="designationBtn" ><i class="bi bi-pencil-square" ></i> </button>

													<button type="button" value="{{$designation->id}}" class="btn btn-warning" id="designationDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>
												</div>
											</div>

										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
		</div>
	<!-- /Page Content -->



<!-- Add Designation Modal -->
<div id="add_designation" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">পদবি সংযোজন</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{{-- add member--}}
			<div class="modal-body" style="background-color: #008080">
				<form action="{{route('designations.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="col-form-label">পদবীর নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtDesignation" name="txtDesignation" placeholder="Enter Designation" required>
							</div>
						</div>

					</div>

					<div class="submit-section">
						<input class="btn btn-primary submit-btn" type="submit" name="btnCreate" value="Submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Add DesignatiTRTTRRTRTTRTojhggjfyhln Modal -->

<!-- Edit Designation Modal -->
<div id="edit_designation" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"> পদবি সংশোধন</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('designations.update',$designation->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					@method("PUT")
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
                                <label class="col-form-label"> পদবীর নাম: <span class="text-danger">*</span></label>
                                <input type="hidden" class="form-control"  id="cmbdesignationId" name="cmbdesignationId">

                                <input type="text" class="form-control"  id="designationname" name="txtDesignation">
							</div>
						</div>
					</div>


					<div class="submit-section">
						<input class="btn btn-primary submit-btn" type="submit"  name="btnUpdate" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- /Edit Designation Modal -->



<div id="show_designation" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">পদবির বিস্তারিত</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: #008080">

				<form action="">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="col-form-label" >পদবি  : </label>
								<span class="form-control "  id="designationSHname"></span>

							</div>
						</div>



					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!-- /show loan Center Modal -->


<!-- Delete padcollection Center Modal -->
<div class="modal custom-modal fade" id="delete_designation" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
					<h3> পদবি বাতিল করুন</h3>
                    <p>আপনি কি পদবি বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-designation')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_designationId" name="d_designation">


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
<!-- /Delete padcollection Center Modal -->
<!-- /Page Content -->
<script>
	$(document).ready(function(){

        $(document).on('click','#designationDbtn',function(){
			var designation_id=$(this).val();
            // alert(member_id);
			$('#delete_designation').modal('show');
			$('#delete_designationId').val(designation_id);
		});



		$(document).on('click','#designationBtn',function(){
			//  alert("ok");

			var designation_id=$(this).val();
			// alert(invi_id);
			$('#edit_designation').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-designation/"+designation_id,
				success:function(response){
					// console.log(response.desiollection.brunch_name);
					$('#cmbdesignationId').val(designation_id);


					$('#designationname').val(response.designation.name);




				}
			});
		});

		$(document).on('click','#designationshBtn',function(){
			//  alert("ok");

			var desish_id=$(this).val();
			// alert(invi_id);
			$('#show_designation').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-designation/"+desish_id,
				success:function(response){
					// console.log(response.desiollection.brunch_name);
					$('#cmbdesiSHId').html(desish_id);


					$('#designationSHname').html(response.sdesignation.name);




				}
			});
		});





	});
</script>
@endsection
