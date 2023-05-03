@extends('layout.erp.home')
@section('page')


<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="page-title">দায়িত্বের তালিকা</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">দায়িত্ব</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

		<!-- Content Starts -->
		<!-- Search Filter -->
	<div class="row filter-row">

		<div class="col-sm-6 col-md-3">
			<div class="form-group form-focus">
				<input type="text" class="form-control floating">
				<label class="focus-label"> দায়িত্বের নাম</label>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="form-group form-focus">
				<div class="cal-icon">
					<select class="form-control floating select">
						<option>
							Jan
						</option>
						<option>
							Feb
						</option>
						<option>
							Mar
						</option>
					</select>
				</div>
				<label class="focus-label">Month</label>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="form-group form-focus">
				<div class="cal-icon">
					<select class="form-control floating select">
						<option>
							2018
						</option>
						<option>
							2019
						</option>
						<option>
							2020
						</option>
					</select>
				</div>
				<label class="focus-label">Year</label>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#add_duty"><i class="fa fa-plus"></i>  Add Duty </a>
		</div>
	</div>
	<!-- /Search Filter -->
	@if ($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-striped  " id="example ">
					<thead>
						<tr>
							<th>#</th>
							<th>দায়িত্বের নাম</th>
							<th>তারিখ</th>


							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($duties as $dutie)
						<tr>
							<td>{{$dutie->id}}</td>
							<td>
								{{$dutie->name}}
							</td>
							<td>{{$dutie->created_at}}</td>

							<td class="text-right">
								{{-- <button type="button" class="btn btn-success">
									<i class="bi bi-eye-fill"></i>
								</button> --}}
								<button type="button" value="{{$dutie->id}}" class="btn btn-success" id="dutyshBtn" ><i class="bi bi-eye-fill"></i> </button>


								<button type="button" value="{{$dutie->id}}" class="btn btn-primary" id="dutyBtn" ><i class="bi bi-pencil-square" ></i> </button>

								<button type="button" value="{{$dutie->id}}" class="btn btn-warning" id="dutyDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

                            </td>
						</tr>


						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- /Content End -->

</div>
<div class="d-felx justify-content-center">

	{{ $duties->links() }}

</div>

<!-- Delete padcollection Center Modal -->
<div class="modal custom-modal fade" id="delete_duty" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
					<h3> দায়িত্ব বাতিল করুন</h3>
                    <p>আপনি কি দায়িত্ব বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-duty')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_dutyId" name="d_duty">


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
<div id="edit_duty" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">দায়িত্ব সংশোধন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('duty-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<input type="hidden" class="form-control" id="cmbdutyId" name="cmbdutyId" required>
						<div class="col-sm-8">
							<div class="form-group">
								<label class="col-form-label">দায়িত্বের নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="dutyname" name="txtName" required>

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

<div id="show_duty" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">দায়িত্ব সংশোধন</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: rgb(4, 21, 34)">

				<form action="">
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<label class="col-form-label" id="dutySHid">দায়িত্ব  : <span class="text-danger">*</span></label>
								<div class="form-control "  id="dutySHname"></div>

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
        $(document).on('click','#dutyDbtn',function(){
			var duty_id=$(this).val();
            // alert(member_id);
			$('#delete_duty').modal('show');
			$('#delete_dutyId').val(duty_id);
		});



		$(document).on('click','#dutyBtn',function(){
			//  alert("ok");

			var duty_id=$(this).val();
			// alert(invi_id);
			$('#edit_duty').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-duty/"+duty_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);
					$('#cmbdutyId').val(duty_id);


					$('#dutyname').val(response.duty.name);




				}
			});
		});

		$(document).on('click','#dutyshBtn',function(){
			//  alert("ok");

			var padcsh_id=$(this).val();
			// alert(invi_id);
			$('#show_duty').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-duty/"+padcsh_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);
					$('#cmbpadcSHId').html(padcsh_id);


					$('#dutySHname').html(response.sduty.name);




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


@include('pages.erp.dutie.create_dutie')
@endsection
