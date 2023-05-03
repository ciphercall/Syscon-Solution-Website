@extends('layout.erp.home')
@section('page')





<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h2 class="page-title">সবকের তালিকা </h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">সবক </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i> সবক সংযোজন</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- sobok Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>সবকের পরিমান</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>সবক </h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>সবক</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>সবক বাতিল</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /sobok Center Statistics -->
	@if (session('success'))
		<div class="alert alert-success"><b>{{session('success')}}</b> </div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-striped custom-table mb-0 datatable">
					<thead>
						<tr>
							<th>#</th>
							<th>সবক</th>
							<th>তারিখ</th>


							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($soboks as $sobok)



						<tr>
							<td>{{$sobok->id}}</td>
							<td>{{$sobok->name}}</td>
							<td>{{$sobok->created_at}}</td>

							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">


										<button type="button" value="{{$sobok->id}}" class="btn btn-success" id="sobokshBtn" ><i class="bi bi-eye-fill"></i> </button>


										<button type="button" value="{{$sobok->id}}" class="btn btn-primary" id="sobokBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$sobok->id}}" class="btn btn-warning" id="delete_sobok" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>
						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$soboks->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add sobok Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">সবক সংযোজন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('soboks.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-4">


						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> সবকের নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="ooBrunch_name" name="txtName" required>

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
<!-- /Add sobok Center Modal -->

<!-- Edit sobok Center Modal -->
<div id="edit_sobok" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">সবক সংযোজন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('sobok-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-8">
							<input type="hidden" class="form-control" id="cmbsobokId" name="cmbsobokId" required>
							<div class="form-group">

						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label class="col-form-label">সবকের নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="sobokName" name="txtName" required>

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
<!-- /Edit sobok Center Modal -->

<!-- Delete volunteer Center Modal -->
<div class="modal custom-modal fade" id="delete_Sobokm" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
					<h3>Delete Overtime</h3>
					<p>Are you sure want to Cancel this?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-volunteer')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_volId" name="d_vol">


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
<!-- /Delete volunteer Center Modal -->


<div id="show_sobok" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">সবকের বিস্তারিত</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: rgb(4, 21, 34)">

				<form action="">
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<label class="col-form-label" id="designationSHid">সবক  : <span class="text-danger">*</span></label>
								<div class="form-control "  id="sobokSHname"></div>

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
        $(document).on('click','#delete_sobok',function(){
            //  alert("ok");

			 var sobok_id=$(this).val();
            //  alert(sobok_id);
			$('#delete_Sobokm').modal('show');
			$('#delete_sobokId').val(sobok_id);
		});



		$(document).on('click','#sobokBtn',function(){
			//  alert("ok");

			var sobok_id=$(this).val();
			// alert(invi_id);
			$('#edit_sobok').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-sobok/"+sobok_id,
				success:function(response){
					// console.log(response.sobok.brunch_name);
					$('#cmbsobokId').val(sobok_id);


					$('#sobokName').val(response.sobok.name);



				}
			});
		});

		$(document).on('click','#sobokshBtn',function(){
			//  alert("ok");

			var sobok_id=$(this).val();
			// alert(invi_id);
			$('#show_sobok').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-sobok/"+sobok_id,
				success:function(response){
					console.log(response.ssobok.name);
					$('#cmbsobokSHId').html(sobok_id);


					$('#sobokSHname').html(response.ssobok.name);



				}
			});
		});





	});
</script>
@endsection






