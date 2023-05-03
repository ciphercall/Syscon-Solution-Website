@extends('layout.erp.home')
@section('page')


	<!-- Page Content -->
		<div class="content container-fluid">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title"> উপলক্ষ্যের তালিকা</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">উপলক্ষ্য</li>
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
						<a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#add_occation"><i class="fa fa-plus"></i> অনুষ্ঠান সংযোজন</a>
					</div>
				</div>
				<!-- /Search Filter -->

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table mb-0 datatable">
								<thead>
									<tr>
										<th>#</th>
										<th>উপলক্ষ্য</th>
										<th>তারিখ</th>

										<th class="text-right">Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($occations as $occation)
									<tr>
										<td>{{$occation-> id}}</td>
										<td>{{$occation-> name}}</td>
										<td>{{$occation-> created_at}}</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<button type="button" value="{{$occation->id}}" class="btn btn-success" id="occationshBtn" ><i class="bi bi-eye-fill"></i> </button>


												<button type="button" value="{{$occation->id}}" class="btn btn-primary" id="occationBtn" ><i class="bi bi-pencil-square" ></i> </button>

												<button type="button" value="{{$occation->id}}" class="btn btn-warning" id="occationDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>
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



<!-- Add Occation Modal -->
<div id="add_occation" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">অনুষ্ঠান সংযোজন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{{-- add member--}}
			<div class="modal-body">
				<form action="{{route('occations.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="col-form-label"> উপলক্ষ্য: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtOccasion" name="txtOccasion" placeholder="উপলক্ষ্য" required>
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
<!-- /Add Occation Modal -->

<!-- Delete padcollection Center Modal -->
<div class="modal custom-modal fade" id="delete_occation" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
					<h3> উপলক্ষ্য বাতিল করুন</h3>
                    <p>আপনি কি উপলক্ষ্য বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-occation')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_occationId" name="d_occation">


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


<!-- Edit padcollection Center Modal -->
<div id="edit_occation" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">উপলক্ষ্য সংশোধন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('occation-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<input type="hidden" class="form-control" id="cmboccationId" name="cmboccationId" required>
						<div class="col-sm-8">
							<div class="form-group">
								<label class="col-form-label">occation Name /  নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="occationname" name="txtName" required>

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
<!-- /Edit padcollection Center Modal -->

<!-- show padcollection Center Modal -->

<div id="show_occation" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">উপলক্ষ্য বিস্তারিত বিবরণ</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: rgb(4, 21, 34)">

				<form action="">
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<label class="col-form-label" id="occationSHid">উপলক্ষ্য  : <span class="text-danger">*</span></label>
								<div class="form-control "  id="occationSHname"></div>

							</div>
						</div>



					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!-- /show loan Center Modal -->
<!-- /Page Content -->
<script>
	$(document).ready(function(){
        $(document).on('click','#occationDbtn',function(){
			var occation_id=$(this).val();
            // alert(member_id);
			$('#delete_occation').modal('show');
			$('#delete_occationId').val(occation_id);
		});



		$(document).on('click','#occationBtn',function(){
			//  alert("ok");

			var occation_id=$(this).val();
			// alert(invi_id);
			$('#edit_occation').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-occation/"+occation_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);
					$('#cmboccationId').val(occation_id);


					$('#occationname').val(response.occation.name);




				}
			});
		});

		$(document).on('click','#occationshBtn',function(){
			//  alert("ok");

			var padcsh_id=$(this).val();
			// alert(invi_id);
			$('#show_occation').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-occation/"+padcsh_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);
					$('#cmbpadcSHId').html(padcsh_id);


					$('#occationSHname').html(response.soccation.name);




				}
			});
		});


		// $("#cmbBrunchId").on("change",function(){
		// 	// alert("ok");
        //    $.ajax({
        //      url:"<?php echo url("getvolunteers")?>",
        //      type:'GET',
        //      data:{"id":$(this).val()},
        //      success:function(res){
        //       let padcollection=JSON.parse(res);
        //         console.log(padcollection);
        //        $("#ooBrunch_name").val(padcollection.brunch_name);


        //     //    $("#").val(member.);






        //      }
        //    });
        // });




	});
</script>

@endsection
