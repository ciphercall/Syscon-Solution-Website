


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
				<h2 class="page-title">Main Menu List</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active"> Menu List</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i>  Add Menu List</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- menu Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>  Menu List </h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6> Menu List</h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6> Menu List</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6> Menu List</h6>
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

							<th>Memu SL</th>

							<th>Menu Name</th>

							<th>Menu URL</th>
							<th>Comment</th>
							<th>Date</th>



							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
                        @forelse ($menus as $key=>$menu)






						<tr>
							<td>{{++$key}}</td>
                            <td>{{$menu->id}}</td>

                            <td>{{$menu->m_name}}</td>
                            <td>{{$menu->slag}}</td>
                            <td>{{$menu->comment}}</td>
                            <td>{{$menu->created_at}}</td>





							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">


										<button type="button" value="{{$menu->id}}" class="btn btn-success" id="menushBtn" ><i class="bi bi-eye-fill"></i> </button>


										<button type="button" value="{{$menu->id}}" class="btn btn-primary" id="menuBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$menu->id}}" class="btn btn-warning" id="menuDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>
						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$menus->links()}}

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
				<form action="{{route('menus.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">


						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">Menu Name: </label>
								<input type="text" class="form-control " id="" name="txtM_name" placeholder="Menu Name"   required>

							</div>
						</div>

                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> Menu URL:</label>
									<input type="text" class="form-control" id="" name="txtSlag" placeholder="Menu URL" required>
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
<div id="edit_menu" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> Edit Main Menu </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('/menus-update')}}" method="post" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
					<div class="row">
                        <input type="hidden" id="cmbmenuId" name="cmbmenuId"  required>


						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">Menu Name: </label>
								<input type="text" class="form-control " id="em_name" name="txtM_name" placeholder="Menu Name" required>

							</div>
						</div>

                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> Menu URL:</label>
									<input type="text" class="form-control" id="eslag" name="txtSlag" placeholder="Menu URL" required>
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
					<h3>Delete Menu</h3>
					<p>Are Sure to Delete Menu?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-menus')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_menuId" name="d_menu">


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


<div id="show_menu" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Menu Details</h5>
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
								<input type="text" class="form-control " id="shmtxtM_name" name="txtM_name" placeholder="Menu Name"   required>

							</div>
						</div>

                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> Menu URL:</label>
									<input type="text" class="form-control" id="shmtxtSlag" name="txtSlag" placeholder="Menu URL" required>
								</div>
							</div>


                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> Comment:</label>
									<input type="text" class="form-control" id="shmtxtComment" name="txtComment" placeholder="Comment" >
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
        $(document).on('click','#menuDbtn',function(){
			var menu_id=$(this).val();
            // alert(member_id);
			$('#delete_menu').modal('show');
			$('#delete_menuId').val(menu_id);
		});



		$(document).on('click','#menuBtn',function(){
			//  alert("ok");

			var menu_id=$(this).val();
			// alert(menu_id);
			$('#edit_menu').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-menus/"+menu_id,
				success:function(response){
					// console.log(response.menu.menunch_name);
					$('#cmbmenuId').val(menu_id);

	                    // console.log(response);
					$('#em_name').val(response.menu.m_name);


					$('#eslag').val(response.menu.slag);
					$('#editcomment').val(response.menu.comment);





				}
			});
		});

		$(document).on('click','#menushBtn',function(){
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









