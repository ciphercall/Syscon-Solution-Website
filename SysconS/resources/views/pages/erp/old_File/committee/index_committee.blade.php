
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
				<h2 class="page-title"> কমিটির  তালিকা</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">কমিটি</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i>  কমিটি সংযোজন</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- committee Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6> কমিটির  সংখ্য </h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কমিটির   অনুমদন </h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কমিটির  অনুমদন বাতিল</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কমিটি</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /committee Center Statistics -->
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


							<th>শাখার কোড</th>

							<th>শাখার নাম</th>
							<th>আনুমদনের তারিখ</th>
							<th>মেয়াদকাল</th>

							<th>নবায়নের তারিখ</th>
							<th>নবায়নের আবেদন </th>


							<th>Status</th>

							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
                        @forelse ($committees as $key=>$committee)






						<tr>
							<td>{{++$key}}</td>
                            <td>{{$committee->branch_id}}</td>
                            <td>{{$committee->branch_name}}</td>
                            <td>{{$committee->appro_date}}</td>
                            <td>{{$committee->duration}}</td>
                            <td>{{$committee->renewal_date}}</td>

                            <td>

                                {{-- <a class="dropdown-item" href="#" ><i class="fa fa-pencil m-r-5"></i> Edit</a> --}}

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_promotion"><i class="fa fa-dot-circle-o text-success"></i> নবায়ন করুন</a>
                             </td>
                            <td>
                                <div class="dropdown action-label">
									<a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Active </a>
													<div class="dropdown-menu" style="">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
													</div>
								</div>
                             </td>

							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">


										<button type="button" value="{{$committee->id}}" class="btn btn-success" id="commshBtn" ><i class="bi bi-eye-fill"></i> </button>


										<button type="button" value="{{$committee->id}}" class="btn btn-primary" id="commBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$committee->id}}" class="btn btn-warning" id="commDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>
						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$committees->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->
<!-- Modal নবায়ন-->

<!-- Add committee Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">কমিটি সংযুক্ত করুন </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('committees.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শাখা নং: <span class="text-danger">*</span></label>
								<select id="cmbBrunchbdhId" class="form-control" name="cmbBranchId" required>
									<option selected>Choose...</option>

									@foreach ($brunchs as $brunch)
									<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} | {{ $brunch->brunch_name }}</option>
									@endforeach
								</select>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">শাখার নাম: </label>
								<input type="text" class="form-control ooBrunch_name" id="" name="txtBranch_name" placeholder="শাখার নাম"   required>

							</div>
						</div>

                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> অনুমদনের প্রদানের তারিখ:</label>
									<input type="date" class="form-control" id="" name="txtAppro_date" placeholder="অনুমদনের প্রদানের তারিখ" required>
								</div>
							</div>
                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">  মেয়াদকাল:</label>
									<input type="text" class="form-control" id="" name="txtDuration" placeholder="মেয়াদকাল" required>
								</div>
							</div>
                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">  নবায়নের তারিখ:</label>
									<input type="date" class="form-control" id="" name="txtRenewal_date" placeholder=" নবায়নের তারিখ" required>
								</div>
							</div>

                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> মন্তব্য:</label>
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
<!-- /Add committee Center Modal -->

<!-- Edit committee Center Modal -->
<div id="edit_comm" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> শাখা দায়িত্ব সংশোধন </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('/committees-update')}}" method="post" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
					<div class="row">
                        <input type="hidden" id="cmbcommId" name="cmbcommId"  required>


						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শাখা নং: <span class="text-danger">*</span></label>
								<select id="cmbBrunchbdhId" class="form-control" name="cmbBranchId" required>
									<option selected>Choose...</option>

									@foreach ($brunchs as $brunch)
									<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} | {{ $brunch->brunch_name }}</option>
									@endforeach
								</select>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">শাখার নাম: </label>
								<input type="text" class="form-control ooBrunch_name" id="ooBrunch_name" name="txtBranch_name" placeholder="শাখার নাম"   required>

							</div>
						</div>

                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> অনুমদনের প্রদানের তারিখ:</label>
									<input type="date" class="form-control" id="commappro_date" name="txtAppro_date" placeholder="অনুমদনের প্রদানের তারিখ" required>
								</div>
							</div>
                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">  মেয়াদকাল:</label>
									<input type="text" class="form-control" id="commduration" name="txtDuration" placeholder="মেয়াদকাল" required>
								</div>
							</div>
                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">  নবায়নের তারিখ:</label>
									<input type="date" class="form-control" id="cmbrenewal_date" name="txtRenewal_date" placeholder=" নবায়নের তারিখ" required>
								</div>
							</div>

                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> মন্তব্য:</label>
									<input type="text" class="form-control" id="commcomment" name="txtComment" placeholder="মন্তব্য" >
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
<!-- /Edit committee Center Modal -->

<!-- Delete committee Center Modal -->
<div class="modal custom-modal fade" id="delete_comm" role="dialog">
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



						<form action="{{url('delete-committees')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_commId" name="d_comm">


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
<!-- /Delete committee Center Modal -->

<!-- show committee Center Modal -->


<div id="show_comm" class="modal custom-modal fade" role="dialog">
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
								<div class="form-control "  id="commSHbranch_id"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">শাখার নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="commSHbranch_name"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ইমেইল : <span class="text-danger">*</span></label>
								<div class="form-control" id="commSHemail"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ফোন : <span class="text-danger">*</span></label>
								<div class="form-control" id="commSHphone"></div>

							</div>
						</div>


						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ঠিকানা:</span></label>
								<div class="form-control" id="commSHaddress"></div>

							</div>
						</div>
						{{-- <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">commnch Head: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shcommnch_head"></div>

							</div>
						</div> --}}
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> দায়িত্ব প্রদানের তারিখ: </span></label>
								<div class="form-control" id="commSHassign_date"></div>

							</div>

						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ছবি: </span></label>
								<div  id="commSHFilephoto"></div>

							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">পদবি: </span></label>
								<div class="form-control" id="commSHdesignation"></div>

							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">মন্তব্য: </span></label>
								<div class="form-control" id="commSHcomment"></div>

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
<!-- /show committee Center Modal -->

<!-- nobayon Modal -->
<div id="edit_promotion" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">কমিটি নবায়ন</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>নবায়ন <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" >
                    </div>
                    <div class="form-group">
                        <label>নবায়ন <span class="text-danger">*</span></label>
                        <input class="form-control" type="text"  readonly>
                    </div>

                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- nobayon Modal -->
<script>
	$(document).ready(function(){
        $(document).on('click','#commDbtn',function(){
			var comm_id=$(this).val();
            // alert(member_id);
			$('#delete_comm').modal('show');
			$('#delete_commId').val(comm_id);
		});



		$(document).on('click','#commBtn',function(){
			//  alert("ok");

			var comm_id=$(this).val();
			// alert(comm_id);
			$('#edit_comm').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-committees/"+comm_id,
				success:function(response){
					// console.log(response.committee.commnch_name);
					$('#cmbcommId').val(comm_id);

	                    // console.log(response);
					$('#cmbBrunchbdhId').val(response.committee.branch_id);


					$('#ooBrunch_name').val(response.committee.branch_name);
					$('#commappro_date').val(response.committee.appro_date);

					$('#commduration').val(response.committee.duration);
					$('#cmbrenewal_date').val(response.committee.renewal_date);
					$('#commcomment').val(response.committee.comment);



				}
			});
		});

		$(document).on('click','#commshBtn',function(){
			//  alert("ok");

			var commsh_id=$(this).val();
			// alert(invi_id);
			$('#show_comm').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-committees/"+commsh_id,
				success:function(response){
					$('#cmbcommSHId').html(commsh_id);

                    $('#commSHbranch_id').html(response.scommittee.branch_id);


                    $('#commSHbranch_name').html(response.scommittee.branch_name);
                    $('#commSHappro_date').html(response.scommittee.appro_date);

                    $('#commSHduration').html(response.scommittee.duration);
                    $('#commSHcomment').html(response.scommittee.comment);
                    $('#commSHrenewal_date').html(response.scommittee.renewal_date);


				}
			});
		});


        $("#cmbBrunchbdhId").on("change",function(){
			// alert("ok");
           $.ajax({
             url:"<?php echo url("getvolunteers")?>",
             type:'GET',
             data:{"id":$(this).val()},
             success:function(res){
              let padcollection=JSON.parse(res);
                console.log(padcollection);
               $(".ooBrunch_name").val(padcollection.brunch_name);



            //    $("#").val(member.);






             }
           });
        });




	});
</script>


@endsection









