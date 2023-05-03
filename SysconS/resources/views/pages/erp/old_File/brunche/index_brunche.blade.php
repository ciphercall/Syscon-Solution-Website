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
				<h2 class="page-title"> শাখা</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">শাখা </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i> শাখা সংযুক্ত করুন</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- brunche Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>শাখা  </h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>শাখা </h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>শাখা অনুমদন বাতিল</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>শাখা অনুমদন</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /brunche Center Statistics -->
	@if (session('success'))
		<div class="alert alert-success"><b>{{session('success')}}</b> </div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table display nowrap" id="example">
					<thead>
						<tr>
							<th>শাখার কোড</th>

							<th>শাখার নাম</th>
							<th>ফোন</th>
							<th>ইমেইল</th>
							<th>ঠিকানা</th>
							<th>আনুমদনের তারিখ</th>


							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($brunches as $brunche)




						<tr>
                            {{-- <td>
                                <h2 class="table-avatar">
                                    <a href="" class="avatar"><img src="{{asset('img')}}/{{$brunche->m_photo}}" /></a>
                                    <a href="">{{$brunche->m_name}} </a>
                                </h2>
                            </td> --}}
							<td>{{$brunche->brunch_code}}</td>

							<td> {{$brunche->brunch_name}}</td>

							<td>{{$brunche->phone}}</td>
							<td>{{$brunche->email}}</td>
							<td>{{$brunche->address}}</td>
							<td>{{$brunche->designation}}</td>


							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">


										<button type="button" value="{{$brunche->id}}" class="btn btn-success" id="brushBtn" ><i class="bi bi-eye-fill"></i> </button>


										<button type="button" value="{{$brunche->id}}" class="btn btn-primary" id="bruBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$brunche->id}}" class="btn btn-warning" id="bruDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>
						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{-- {{$brunches->links()}} --}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add brunche Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> শাখা </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('brunches.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শাখা নং: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="ooBrunch_name" name="txtBrunch_code" required>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">শাখার নাম: </label>
								<input type="text" class="form-control" id="ooBrunch_name" name="txtBrunch_name" required>

							</div>
						</div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">ফোন: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="" name="txtPhone" placeholder="Enter Speakers Name" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">   ইমেইল : <span class="text-danger">*</span></label>
									<input type="email" class="form-control" id="" name="txtEmail" placeholder="Email" required>
								</div>
							</div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> ঠিকানা:</label>
									<input type="text" class="form-control" id="" name="txtAddress" placeholder="Enter Address" required>
								</div>
							</div>
							{{-- <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">Brunch Head: <span class="text-danger">*</span></label>


                                    <select id="" class="form-control" name="txtBrunch_head" required>
										<option selected>Choose...</option>

										@foreach ($members as $member)
										<option value="{{ $member->id }}">{{ $member->id }} | {{ $member->m_name }} </option>
										@endforeach
										</select>



								</div>
							</div> --}}
                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">শাখা অনুমদনের তারিখ: <span class="text-danger">*</span></label>
									<input type="date" class="form-control" id="" name="txtDesignation" placeholder="Enter Designation" required>
								</div>
							</div>
							{{-- <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">Bg : <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="" name="txtBg" placeholder="Enter Bg" required>
								</div>
							</div> --}}
					</div>
							<div class="submit-section">
								<input class="btn btn-primary submit-btn" type="submit"  name="btnCreate" value="Submit">

							</div>
				</form>
			</div>

		</div>
	</div>
</div>
<!-- /Add brunche Center Modal -->

<!-- Edit brunche Center Modal -->
<div id="edit_bru" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> শাখা</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('brunche-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')

					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শাখা নং: <span class="text-danger">*</span></label>

								<input type="hidden" class="form-control" id="cmbbruId" name="cmbbruId" required>


								<input type="text" class="form-control" id="brubrunch_code" name="txtBrunch_code" required>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="brubrunch_name" name="txtBrunch_name" required>

							</div>
						</div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">ফোন : <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="bruphone" name="txtPhone" placeholder="Enter Speakers Name" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> ইমেইল : <span class="text-danger">*</span></label>
									<input type="email" class="form-control" id="bruemail" name="txtEmail" placeholder="Email" required>
								</div>
							</div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">ঠিকানা :</label>
									<input type="text" class="form-control" id="bruaddress" name="txtAddress" placeholder="Enter Address" required>
								</div>
							</div>
							{{-- <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">Brunch Head: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="brubrunch_head" name="txtBrunch_head" placeholder="Enter Provider" required>
								</div> --}}
							{{-- </div>	 --}}
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">শাখা অনুমদনের তারিখ: </label>
									<input type="date" class="form-control" id="brudesignation" name="txtDesignation" placeholder="Enter Designation" required>
								</div>
							</div>
							{{-- <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">Bg : <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="brubg" name="txtBg" placeholder="Enter Bg" required>
								</div>
							</div> --}}
					</div>
							<div class="submit-section">
								<input class="btn btn-primary submit-btn" type="submit"  name="btnCreate" value="Submit">

						</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit brunche Center Modal -->

<!-- Delete brunche Center Modal -->
<div class="modal custom-modal fade" id="delete_bru" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
					<h3>শাখাটি বাতিল করুন</h3>
					<p>আপনি কি শাখাটি বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-brunche')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_bruId" name="d_bru">


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
<!-- /Delete brunche Center Modal -->

<!-- show brunche Center Modal -->


<div id="show_bru" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">শাখার বিস্তারিত বর্ণনা</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: rgb(4, 21, 34)">

				<form action="">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">শাখা নং: <span class="text-danger">*</span></label>
								<div class="form-control "  id="Shbrunch_code"></div>

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
								<label class="col-form-label" id="labelb">ইমেইল : <span class="text-danger">*</span></label>
								<div class="form-control" id="Shemail"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ফোন : <span class="text-danger">*</span></label>
								<div class="form-control" id="Shphone"></div>

							</div>
						</div>


						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ঠিকানা:</span></label>
								<div class="form-control" id="Shaddress"></div>

							</div>
						</div>
						{{-- <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">Brunch Head: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shbrunch_head"></div>

							</div>
						</div> --}}
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">শাখা অনুমদনের তারিখ: </span></label>
								<div class="form-control" id="Shdesignation"></div>

							</div>
						</div>
						{{-- <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">BG: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shbg"></div>

							</div>
						</div> --}}

					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!-- /show brunche Center Modal -->
<script>
	$(document).ready(function(){
        $(document).on('click','#bruDbtn',function(){
			var bru_id=$(this).val();
            // alert(member_id);
			$('#delete_bru').modal('show');
			$('#delete_bruId').val(bru_id);
		});



		$(document).on('click','#bruBtn',function(){
			//  alert("ok");

			var bru_id=$(this).val();
			// alert(bru_id);
			$('#edit_bru').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-brunche/"+bru_id,
				success:function(response){
					// console.log(response.brunche.brunch_name);
					$('#cmbbruId').val(bru_id);

	// console.log(response);
					$('#brubrunch_code').val(response.brunche.brunch_code);


					$('#brubrunch_name').val(response.brunche.brunch_name);
					$('#bruphone').val(response.brunche.phone);
					$('#bruemail').val(response.brunche.email);
					$('#bruaddress').val(response.brunche.address);
					$('#brubrunch_head').val(response.brunche.brunch_head);
					$('#brudesignation').val(response.brunche.designation);
					$('#brubg').val(response.brunche.bg);



				}
			});
		});

		$(document).on('click','#brushBtn',function(){
			//  alert("ok");

			var brush_id=$(this).val();
			// alert(invi_id);
			$('#show_bru').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-brunche/"+brush_id,
				success:function(response){
					$('#cmbbruSHId').html(brush_id);

					$('#Shbrunch_code').html(response.sbrunche.brunch_code);


					$('#Shbrunch_name').html(response.sbrunche.brunch_name);
					$('#Shphone').html(response.sbrunche.phone);
					$('#Shemail').html(response.sbrunche.email);
					$('#Shaddress').html(response.sbrunche.address);
					$('#Shbrunch_head').html(response.sbrunche.brunch_head);
					$('#Shdesignation').html(response.sbrunche.designation);
					$('#Shbg').html(response.sbrunche.bg);



				}
			});
		});





	});
</script>


@endsection







