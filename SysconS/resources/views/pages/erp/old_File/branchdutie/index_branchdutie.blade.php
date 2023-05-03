

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
				<h2 class="page-title"> শাখা ভিত্তিক দায়িত্বের তালিকা</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">শাখা দায়িত্ব</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i> শাখা ভিত্তিক দায়িত্ব সংযোজন</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- branchdutie Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6> শাখার দায়িত্বের সংখ্য </h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>শাখা দায়িত্বের অনুমদন </h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>শাখা দায়িত্বের অনুমদন বাতিল</h6>
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
	<!-- /branchdutie Center Statistics -->
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
							<th>ছবি</th>

							<th>শাখার কোড</th>

							<th>শাখার নাম</th>
							<th>নাম</th>

							<th>ফোন</th>
							<th>ইমেইল</th>
							<th>ঠিকানা</th>
							<th>আনুমদনের তারিখ</th>

							<th>Status</th>

							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
                        @forelse ($branchduties as $key=> $branchdutie)





						<tr>
							<td>{{++$key}}</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="" class="avatar"><img src="{{asset('img')}}/{{$branchdutie->b_h_photo}}" /></a>
                                </h2>
                            </td>
							<td>{{$branchdutie->branch_id}}</td>

							<td> {{$branchdutie->branch_name}}</td>

                            <td>{{$branchdutie->b_h_name}}</td>
                            <td>{{$branchdutie->b_h_phone}}</td>
                            <td>{{$branchdutie->b_h_email}}</td>
                            <td>{{$branchdutie->b_h_address}}</td>
                            <td>{{$branchdutie->assign_date}}</td>
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


										<button type="button" value="{{$branchdutie->id}}" class="btn btn-success" id="bhdshBtn" ><i class="bi bi-eye-fill"></i> </button>


										<button type="button" value="{{$branchdutie->id}}" class="btn btn-primary" id="bhdBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$branchdutie->id}}" class="btn btn-warning" id="bhdDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>
						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$branchduties->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add branchdutie Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> শাখা দায়িত্ব সংযুক্ত করুন </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('branchduties.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শাখা নং: <span class="text-danger">*</span></label>
								<select id="cmbBrunchbdhId" class="form-control" name="cmbBranchId" required>
									<option selected>Choose...</option>

									@foreach ($branchs as $brunch)
									<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} | {{ $brunch->brunch_name }}</option>
									@endforeach
								</select>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">শাখার নাম: </label>
								<input type="text" class="form-control" id="ooBrunch_name" name="txtBranch_name" placeholder="শাখার নাম"   required>

							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> নাম: </label>
								<input type="text" class="form-control" id="oobhdnch_name" name="txtB_h_name" placeholder="নাম" required>

							</div>
						</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">ফোন: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="" name="txtB_h_phone" placeholder="ফোন" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">   ইমেইল : <span class="text-danger">*</span></label>
									<input type="email" class="form-control" id="" name="txtB_h_email" placeholder="ইমেইল" required>
								</div>
							</div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> ঠিকানা:</label>
									<input type="text" class="form-control" id="" name="txtB_h_address" placeholder="ঠিকানা" required>
								</div>
							</div>
                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> দায়িত্ব প্রদানের তারিখ:</label>
									<input type="date" class="form-control" id="" name="txtAssign_date" placeholder="দায়িত্ব প্রদানের তারিখ" required>
								</div>
							</div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label"> পদবি: <span class="text-danger">*</span></label>

                                    <select id="" class="form-control" name="txtdesignation" required>
                                        <option selected>Choose...</option>

                                        @foreach ($degs as $deg)
                                        <option value="{{ $deg->id }}">{{ $deg->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label"> ছবি: <span class="text-danger">*</span></label>
                                    <input type="file" name="filePhoto" class="form-control" placeholder="image" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <img src="{{ URL::to('/assets/photo/av.jpg') }}" alt="" sizes="" srcset="">
                                    {{-- <label class="col-form-label">Image / ছবি: <span class="text-danger">*</span></label>
                                    <input type="file" name="filePhoto" class="form-control" placeholder="image"> --}}
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
<!-- /Add branchdutie Center Modal -->

<!-- Edit branchdutie Center Modal -->
<div id="edit_bhd" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> শাখা দায়িত্ব সংশোধন </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('/branchduties-update')}}" method="post" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শাখা নং: <span class="text-danger">*</span></label>
                                <input type="hidden" class="form-control" id="cmbbhdId" name="cmbbhdId" required>

								<select id="cmbBrunchbdhId" class="form-control" name="cmbBranchId" required>
									<option selected>Choose...</option>

									@foreach ($branchs as $brunch)
									<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} | {{ $brunch->brunch_name }}</option>
									@endforeach
								</select>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">শাখার নাম: </label>
								<input type="text" class="form-control" id="bhdBrunch_name" name="txtBranch_name" placeholder="শাখার নাম"   required>

							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> নাম: </label>
								<input type="text" class="form-control" id="bhdb_h_name" name="txtB_h_name" placeholder="নাম" required>

							</div>
						</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">ফোন: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="bhdphone" name="txtB_h_phone" placeholder="ফোন" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">ইমেইল : <span class="text-danger">*</span></label>
									<input type="email" class="form-control" id="bhdemail" name="txtB_h_email" placeholder="ইমেইল" required>
								</div>
							</div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> ঠিকানা:</label>
									<input type="text" class="form-control" id="bhdaddress" name="txtB_h_address" placeholder="ঠিকানা" required>
								</div>
							</div>
                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> দায়িত্ব প্রদানের তারিখ:</label>
									<input type="date" class="form-control" id="bhdassign_date" name="txtAssign_date" placeholder=" দায়িত্ব প্রদানের তারিখ" required>
								</div>
							</div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label"> ছবি: <span class="text-danger">*</span></label>
                                    <input type="file" name="filePhoto" class="form-control" placeholder="image">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group" id="bhdFilephoto">
                                    {{-- <img src="{{ URL::to('/assets/photo/av.jpg') }}" alt="" sizes="" srcset=""> --}}
                                    {{-- <label class="col-form-label">Image / ছবি: <span class="text-danger">*</span></label>
                                    <input type="file" name="filePhoto" class="form-control" placeholder="image"> --}}
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label"> পদবি: <span class="text-danger">*</span></label>


                                    <select id="cmbdesignation" class="form-control" name="txtdesignation" required>
                                        <option selected>Choose...</option>

                                        @foreach ($degs as $deg)
                                        <option value="{{ $deg->id }}">{{ $deg->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> মন্তব্য:</label>
									<input type="text" class="form-control" id="bhdcomment" name="txtComment" placeholder="মন্তব্য" required>
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
<!-- /Edit branchdutie Center Modal -->

<!-- Delete branchdutie Center Modal -->
<div class="modal custom-modal fade" id="delete_bhd" role="dialog">
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



						<form action="{{url('delete-branchduties')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_bhdId" name="d_bhd">


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
<!-- /Delete branchdutie Center Modal -->

<!-- show branchdutie Center Modal -->


<div id="show_bhd" class="modal custom-modal fade" role="dialog">
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
								<div class="form-control "  id="bhdSHbranch_id"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">শাখার নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="bhdSHbranch_name"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ইমেইল : <span class="text-danger">*</span></label>
								<div class="form-control" id="bhdSHemail"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ফোন : <span class="text-danger">*</span></label>
								<div class="form-control" id="bhdSHphone"></div>

							</div>
						</div>


						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ঠিকানা:</span></label>
								<div class="form-control" id="bhdSHaddress"></div>

							</div>
						</div>
						{{-- <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">bhdnch Head: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shbhdnch_head"></div>

							</div>
						</div> --}}
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> দায়িত্ব প্রদানের তারিখ: </span></label>
								<div class="form-control" id="bhdSHassign_date"></div>

							</div>

						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ছবি: </span></label>
								<div  id="bhdSHFilephoto"></div>

							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">পদবি: </span></label>
								<div class="form-control" id="bhdSHdesignation"></div>

							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">মন্তব্য: </span></label>
								<div class="form-control" id="bhdSHcomment"></div>

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
<!-- /show branchdutie Center Modal -->
<script>
	$(document).ready(function(){
        $(document).on('click','#bhdDbtn',function(){
			var bhd_id=$(this).val();
            // alert(member_id);
			$('#delete_bhd').modal('show');
			$('#delete_bhdId').val(bhd_id);
		});



		$(document).on('click','#bhdBtn',function(){
			//  alert("ok");

			var bhd_id=$(this).val();
			// alert(bhd_id);
			$('#edit_bhd').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-branchduties/"+bhd_id,
				success:function(response){
					// console.log(response.branchdutie.bhdnch_name);
					$('#cmbbhdId').val(bhd_id);

	                    // console.log(response);
					$('#cmbBrunchbdhId').val(response.branchdutie.branch_id);


					$('#bhdBrunch_name').val(response.branchdutie.branch_name);
					$('#bhdb_h_name').val(response.branchdutie.b_h_name);

					$('#bhdphone').val(response.branchdutie.b_h_phone);
					$('#cmbdesignation').val(response.branchdutie.designation);

					$('#bhdemail').val(response.branchdutie.b_h_email);
					$('#bhdaddress').val(response.branchdutie.b_h_address);
					$('#bhdassign_date').val(response.branchdutie.assign_date);
					$('#bhdcomment').val(response.branchdutie.comment);
                    $("#bhdFilephoto").html(
                        // `<img src="img/${response.guestmember.photo}" width="100" class="img-fluid img-thumbnail">`);
                        `<img src='{{asset("img/`+response.branchdutie.b_h_photo+`")}}' width="100" class="img-fluid img-thumbnail">`);


				}
			});
		});

		$(document).on('click','#bhdshBtn',function(){
			//  alert("ok");

			var bhdsh_id=$(this).val();
			// alert(invi_id);
			$('#show_bhd').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-branchduties/"+bhdsh_id,
				success:function(response){
					$('#cmbbhdSHId').html(bhdsh_id);

                    $('#bhdSHbranch_id').html(response.sbranchdutie.branch_id);


                    $('#bhdSHbranch_name').html(response.sbranchdutie.branch_name);
                    $('#bhdSHb_h_name').html(response.sbranchdutie.b_h_name);

                    $('#bhdSHphone').html(response.sbranchdutie.b_h_phone);
                    $('#bhdSHemail').html(response.sbranchdutie.b_h_email);
                    $('#bhdSHaddress').html(response.sbranchdutie.b_h_address);
                    $('#bhdSHdesignation').html(response.sbranchdutie.designation);

                    $('#bhdSHassign_date').html(response.sbranchdutie.assign_date);
                    $('#bhdSHcomment').html(response.sbranchdutie.comment);
                    $("#bhdSHFilephoto").html(
                        // `<img src="img/${response.guestmember.photo}" width="100" class="img-fluid img-thumbnail">`);
                        `<img src='{{asset("img/`+response.sbranchdutie.b_h_photo+`")}}' width="100" class="img-fluid img-thumbnail">`);


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
               $("#ooBrunch_name").val(padcollection.brunch_name);



            //    $("#").val(member.);






             }
           });
        });




	});
</script>


@endsection








