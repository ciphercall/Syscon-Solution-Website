{{-- @extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('submenus.create')}}">Create</a><table class='table'>
<tr>
	<th>Id</th>
	<th>Sm Name</th>
	<th>Menu Id</th>
	<th>Slug</th>
	<th>M Photo</th>
	<th>Comment</th>
	<th>Deleted At</th>
	<th>Updated At</th>
	<th>Created At</th>

</tr>
@forelse ($submenus as $submenu)
<tr>
	<td>{{$submenu->id}}</td>
	<td>{{$submenu->sm_name}}</td>
	<td>{{$submenu->menu_id}}</td>
	<td>{{$submenu->slug}}</td>
	<td>{{$submenu->m_photo}}</td>
	<td>{{$submenu->comment}}</td>
	<td>{{$submenu->deleted_at}}</td>
	<td>{{$submenu->updated_at}}</td>
	<td>{{$submenu->created_at}}</td>

	<td>
	<div>
	<form action="{{route('submenus.destroy',$submenu->id)}}" method="post" >
	<a class='btn btn-primary' href="{{route('submenus.edit',$submenu->id)}}">Edit<a>
	<a class='btn btn-info' href="{{route('submenus.show',$submenu->id)}}">Show<a>
		@csrf
		@method("DELETE")
		<input class='btn btn-danger' type="submit" name="btnDelete" class="btnDelete" data-id="{{$submenu->id}}"  value="Delete" />
	</form>
	</div>
	</td>
</tr>
@empty
<tr><td colspan="9">No records found</td></tr>
@endforelse
</table>
{{$submenus->links()}}

@endsection --}}


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
				<h2 class="page-title">Sub-Menu List</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active"> Sub-Menu List</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i>  Add Sub-Menu </a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- menu Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>  Sub-Menu List </h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6> Sub-Menu List</h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6> Sub-Menu List</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6> Sub-Menu List</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /menu Center Statistics -->
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

							<th>Sub-Memu SL</th>
							<th>Menu Name</th>
							<th>Sub-Menu Name</th>
							<th>Sub-Menu Icon</th>

							<th>Sub-Menu URL</th>
							<th>Comment</th>
							<th>Date</th>



							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
                        @forelse ($submenus as $key=>$submenu)






						<tr>
							<td>{{++$key}}</td>
                            <td>{{$submenu->id}}</td>

                            <td>{{$submenu->menu_id}}</td>
                            <td>{{$submenu->sm_name}}</td>
                            <td>{{$submenu->m_photo}}</td>


                            <td>{{$submenu->slug}}</td>
                            <td>{{$submenu->menuent}}</td>
                            <td>{{$submenu->created_at}}</td>





							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">


										<button type="button" value="{{$submenu->id}}" class="btn btn-success" id="submenushBtn" ><i class="bi bi-eye-fill"></i> </button>


										<button type="button" value="{{$submenu->id}}" class="btn btn-primary" id="submenuBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$submenu->id}}" class="btn btn-warning" id="submenuDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>
						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$submenus->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->
<!-- Modal নবায়ন-->

<!-- Add menu Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Main Menu </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('submenus.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">


						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">Menu Name: </label>
								<select id="" class="form-control" name="cmbMenuId" required>
									<option selected>Choose...</option>

									@foreach ($menus as $memu)
									<option value="{{ $memu->id }}"> {{ $memu->m_name }}</option>
									@endforeach
									</select>

							</div>
						</div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label"> Sub-Menu Name:</label>
                                <input type="text" class="form-control" id="" name="txtSm_name" placeholder="Sub-Menu Name" required>
                            </div>
                        </div>
                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> Sub-Menu URL:</label>
									<input type="text" class="form-control" id="" name="txtSlug" placeholder="Sub-Menu URL" required>
								</div>
							</div>
                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> Photo Icon:</label>
									<input type="file" class="form-control" id="" name="txtM_photo"  >
								</div>
							</div>


                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> Comment:</label>
									<input type="text" class="form-control" id="" name="txtComment" placeholder="Comment" >
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
<!-- /Add menu Center Modal -->

<!-- Edit menu Center Modal -->
<div id="edit_submenu" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> Edit Main Sub Menu </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('/submenus-update')}}" method="post" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
					<div class="row">
                        <input type="hidden" id="cmbsubmenuId" name="cmbsubmenuId"  required>


						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">Menu Name: </label>
								<select id="emenu_id" class="form-control" name="cmbMenuId" required>
									<option selected>Choose...</option>

									@foreach ($menus as $memu)
									<option value="{{ $memu->id }}"> {{ $memu->m_name }}</option>
									@endforeach
									</select>

							</div>
						</div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label"> Sub-Menu Name:</label>
                                <input type="text" class="form-control" id="esm_name" name="txtSm_name" placeholder="Sub-Menu Name" required>
                            </div>
                        </div>
                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> Sub-Menu URL:</label>
									<input type="text" class="form-control" id="eslug" name="txtSlug" placeholder="Sub-Menu URL" required>
								</div>
							</div>
                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> Photo Icon:</label>
									<input type="file" class="form-control" id="em_photo" name="txtM_photo"  >
								</div>
							</div>


                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> Comment:</label>
									<input type="text" class="form-control" id="editcomment" name="txtComment" placeholder="Comment" >
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
<!-- /Edit menu Center Modal -->

<!-- Delete menu Center Modal -->
<div class="modal custom-modal fade" id="delete_menu" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
					<h3>Delete Sub-Menu</h3>
					<p>Are Sure to Delete Sub-Menu?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-submenus')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_submenuId" name="d_submenu">


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
<!-- /Delete menu Center Modal -->

<!-- show menu Center Modal -->


<div id="show_submenu" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Sub-Menu Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: rgb(4, 21, 34)">

				<form action="">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">Menu Name: </label>
								<select id="" class="form-control" name="cmbMenuId" required>
									<option selected>Choose...</option>

									@foreach ($menus as $memu)
									<option value="{{ $memu->id }}"> {{ $memu->m_name }}</option>
									@endforeach
									</select>

							</div>
						</div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label"> Sub-Menu Name:</label>
                                <input type="text" class="form-control" id="" name="" placeholder="Sub-Menu Name" required>
                            </div>
                        </div>
                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> Sub-Menu URL:</label>
									<input type="text" class="form-control" id="" name="" placeholder="Sub-Menu URL" required>
								</div>
							</div>
                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> Photo Icon:</label>
									<input type="file" class="form-control" id="" name=""  >
								</div>
							</div>


                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> Comment:</label>
									<input type="text" class="form-control" id="" name="" placeholder="Comment" >
								</div>
							</div>

                        </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- nobayon Modal -->
<script>
	$(document).ready(function(){
        $(document).on('click','#submenuDbtn',function(){
			var menu_id=$(this).val();
            // alert(member_id);
			$('#delete_submenu').modal('show');
			$('#delete_submenuId').val(menu_id);
		});



		$(document).on('click','#submenuBtn',function(){
			//  alert("ok");

			var submenu_id=$(this).val();
			// alert(menu_id);
			$('#edit_submenu').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-submenus/"+submenu_id,
				success:function(response){
					// console.log(response.menu.menunch_name);
					$('#cmbsubmenuId').val(submenu_id);

	                    // console.log(response);
					$('#esm_name').val(response.submenu.sm_name);
					$('#emenu_id').val(response.submenu.menu_id);



					$('#eslug').val(response.submenu.slug);
					$('#em_photo').val(response.submenu.m_photo);

					$('#editcomment').val(response.submenu.comment);





				}
			});
		});

		$(document).on('click','#submenushBtn',function(){
			//  alert("ok");

			var menush_id=$(this).val();
			// alert(invi_id);
			$('#show_menu').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-menus/"+menush_id,
				success:function(response){
					$('#cmbmenuSHId').html(menush_id);

                    $('#shetxtM_name').html(response.smenu.m_name);


					$('#shetxtSlag').html(response.smenu.slag);
					$('#shecomment').html(response.smenu.comment);


				}
			});
		});







	});
</script>


@endsection









