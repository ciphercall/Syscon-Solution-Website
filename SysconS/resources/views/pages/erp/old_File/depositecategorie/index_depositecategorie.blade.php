{{-- @extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('depositecategories.create')}}">Create</a><table class='table'>
<tr>
	<th>Id</th>
	<th>D Name</th>
	<th>Comment</th>
	<th>Created At</th>
	<th>Updated At</th>
	<th>Deleted At</th>

</tr>
@forelse ($depositecategories as $depositecategorie)
<tr>
	<td>{{$depositecategorie->id}}</td>
	<td>{{$depositecategorie->d_name}}</td>
	<td>{{$depositecategorie->comment}}</td>
	<td>{{$depositecategorie->created_at}}</td>
	<td>{{$depositecategorie->updated_at}}</td>
	<td>{{$depositecategorie->deleted_at}}</td>

	<td>
	<div>
	<form action="{{route('depositecategories.destroy',$depositecategorie->id)}}" method="post" >
	<a class='btn btn-primary' href="{{route('depositecategories.edit',$depositecategorie->id)}}">Edit<a>
	<a class='btn btn-info' href="{{route('depositecategories.show',$depositecategorie->id)}}">Show<a>
		@csrf
		@method("DELETE")
		<input class='btn btn-danger' type="submit" name="btnDelete" class="btnDelete" data-id="{{$depositecategorie->id}}"  value="Delete" />
	</form>
	</div>
	</td>
</tr>
@empty
<tr><td colspan="6">No records found</td></tr>
@endforelse
</table>
{{$depositecategories->links()}}

@endsection --}}

@extends('layout.erp.home')
@section('page')


	<!-- Page Content -->
		<div class="content container-fluid">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">জমার শ্রেণী তালিকা</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
								<li class="breadcrumb-item active">জমার শ্রেণী</li>
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
						<a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#add_depositecategorie"><i class="fa fa-plus"></i> Add depositecategorie</a>
					</div>
				</div>
				<!-- /Search Filter -->

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped custom-table mb-0 " id="example">
								<thead>
									<tr>
										<th>No</th>
										<th>জমার শ্রেণী</th>
										<th>তারিখ </th>

										<th class="text-right">Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($depositecategories as $depositecategorie)
									<tr>
										<td>{{$depositecategorie-> id}}</td>
										<td>{{$depositecategorie-> d_name}}</td>
										<td>{{$depositecategorie-> created_at}}</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
												<button type="button" value="{{$depositecategorie->id}}" class="btn btn-success" id="depositecategorieshBtn" ><i class="bi bi-eye-fill"></i> </button>


												<button type="button" value="{{$depositecategorie->id}}" class="btn btn-primary" id="depositecategorieBtn" ><i class="bi bi-pencil-square" ></i> </button>

												<button type="button" value="{{$depositecategorie->id}}" class="btn btn-warning" id="depositecategorieDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>
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



<!-- Add depositecategorie Modal -->
<div id="add_depositecategorie" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">জমা শ্রেণী সংযোজন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{{-- add member--}}
			<div class="modal-body">
				<form action="{{route('depositecategories.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="col-form-label" style="color: black">জমার শ্রেণী: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtOccasion" name="txtD_name" placeholder="জমার শ্রেণী" required>
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
<!-- /Add depositecategorie Modal -->

<!-- Delete padcollection Center Modal -->
<div class="modal custom-modal fade" id="delete_depositecategorie" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
                    <h3> জমা শ্রেণী বাতিল করুন</h3>
                    <p>আপনি কি জমা শ্রেণী বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-depositecategorie')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_depositecategorieId" name="d_depositecategorie">


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
<div id="edit_depositecategorie" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">জমার শ্রেণী সংশোধন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('depositecategorie-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<input type="hidden" class="form-control" id="cmbdepositecategorieId" name="cmbdepositecategorieId" required>
						<div class="col-sm-8">
							<div class="form-group">
								<label class="col-form-label">জমার শ্রেণী: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="depositecategoriename" name="txtName" required>

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

<div id="show_depositecategorie" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">জমা শ্রেণী বিস্তারিত</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: rgb(4, 21, 34)">

				<form action="">
					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<label class="col-form-label" id="depositecategorieSHid">জমা শ্রেণী : <span class="text-danger">*</span></label>
								<div class="form-control "  id="depositecategorieSHname"></div>

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
        $(document).on('click','#depositecategorieDbtn',function(){
			var depositecategorie_id=$(this).val();
            // alert(member_id);
			$('#delete_depositecategorie').modal('show');
			$('#delete_depositecategorieId').val(depositecategorie_id);
		});



		$(document).on('click','#depositecategorieBtn',function(){
			//  alert("ok");

			var depositecategorie_id=$(this).val();
			// alert(invi_id);
			$('#edit_depositecategorie').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-depositecategorie/"+depositecategorie_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);
					$('#cmbdepositecategorieId').val(depositecategorie_id);


					$('#depositecategoriename').val(response.depositecategorie.d_name);




				}
			});
		});

		$(document).on('click','#depositecategorieshBtn',function(){
			//  alert("ok");

			var padcsh_id=$(this).val();
			// alert(invi_id);
			$('#show_depositecategorie').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-depositecategorie/"+padcsh_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);
					$('#cmbpadcSHId').html(padcsh_id);


					$('#depositecategorieSHname').html(response.sdepositecategorie.d_name);




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

