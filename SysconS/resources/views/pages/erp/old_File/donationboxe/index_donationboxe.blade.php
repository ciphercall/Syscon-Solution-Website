@extends('layout.erp.home')
@section('page')



<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">দান বাক্সের তালিকা</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">  দান বক্স  </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i> দান বক্স সংযোজন</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- donationboxe Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>  দান বাক্সের সংখ্যা</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>দান বাক্সের অনুমদন </h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>দান বাক্স</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>দান বাক্স বাতিল</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /donationboxe Center Statistics -->
	@if (session('success'))
		<div class="alert alert-success"><b>{{session('success')}}</b> </div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table display nowrap" id="example">
					<thead>
						<tr>
                            <th scope="col">ক্রম</th>
                            <th scope="col">শাখা নং</th>
                            {{-- <th scope="col">শাখার নাম</th> --}}
                            <th scope="col">ক্যাটাগরি</th>
                            <th scope="col">গ্রহণ তারিখ</th>
                            <th scope="col">গ্রহিতার নাম</th>
                            <th scope="col">ঠিকানা</th>
                            <th scope="col">বক্স নাম্বার</th>
                            <th scope="col">মোবাইল নাম্বার</th>
                            <th scope="col">দাতার নাম</th>

							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($donationboxes as $key=> $donationboxe)

						<tr>

							<td>{{++$key}}</td>
                            <td>( {{$donationboxe->brunch_id}} ) {{$donationboxe->brunch_name}}</td>
							<td>{{$donationboxe->rec_category}}</td>
							<td>{{$donationboxe->date}}</td>

							<td>{{$donationboxe->receiver_name}}</td>
							<td>{{$donationboxe->address}}</td>
							<td>{{$donationboxe->box_no}}</td>
							<td>{{$donationboxe->phone}}</td>
							<td>{{$donationboxe->provider_name}}</td>

							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">

{{--
										<a class="btn btn-success" href="{{route('donationboxes.show',$donationboxe->id)}}"  ><i class="bi bi-eye-fill"></i> </a> --}}


                                        <button type="button" value="{{$donationboxe->id}}" class="btn btn-success" id="donSHBtn" ><i class="bi bi-eye-fill" ></i> </button>


										<button type="button" value="{{$donationboxe->id}}" class="btn btn-primary" id="donBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$donationboxe->id}}" class="btn btn-warning" id="donDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>
						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$donationboxes->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add donationboxe Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> দান বক্স সংযোজন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('donationboxes.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>
								{{-- <input type="hidden" class="form-control" id="" name="cmbBrunchId" placeholder="Enter " required> --}}

								<select id="cmbBrunchId" class="form-control" name="cmbBrunchId" required>
									<option selected>Choose...</option>

									@foreach ($brunchs as $brunch)
									<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} | {{ $brunch->brunch_name }}</option>
									@endforeach
									</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label"> শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="ooBrunch_name" name="txtBrunch_name" placeholder="Enter " >
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রহণ তারিখ : <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="" name="txtDate" placeholder="Enter " required>
							</div>
						</div>


                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রহণকারীর ক্যাটাগরি: </label>

                                <select id="cmbmcategory" class="form-control"                  name="txtCategory" required>
									<option selected>Choose...</option>

									@foreach ($m_categorys as $r_category)
									<option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রহিতার নাম: <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="" name="txtMember_name" placeholder="Enter " required> --}}
                                <select id="cmbRname" class="form-control" name="txtReceiver_name" required>

								</select>
							</div>
						</div>

                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">মোবাইল নাম্বার: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="ootxtPhone" name="txtPhone" placeholder="Enter " required>
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">ঠিকানা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtAddress" placeholder="Enter " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">বক্স নাম্বার: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtBox_no" placeholder="Enter " >
							</div>
						</div>

                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">দাতার ক্যাটাগরি: <span class="text-danger">*</span></label>

                                <select id="cmbPcategory" class="form-control" name="txtPro_category" required>
									<option selected>Choose...</option>

									@foreach ($m_categorys as $r_category)
									<option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
									@endforeach
									</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">দাতার নাম : <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="cmbRname" name="txtProvider_name" placeholder="Enter " required> --}}
                                <select id="cmbPname" class="form-control" name="txtProvider_name" required>

								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label"> মন্তব্য : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtComment" placeholder="Enter " >
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
<!-- /Add donationboxe Center Modal -->

<!-- Edit donationboxe Center Modal -->
<div id="edit_don" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">  দান বক্স সংশোধন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('donationboxe-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>
								<input type="hidden" class="form-control" id="doncmbdonId" name="cmbdonId" placeholder="Enter " required>

								<select id="donbrunch_id" class="form-control" name="cmbBrunchId" required>
									<option selected>Choose...</option>

									@foreach ($brunchs as $brunch)
									<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} | {{ $brunch->brunch_name }}</option>
									@endforeach
									</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="donbrunch_name" name="txtBrunch_name" placeholder="শাখার নাম " >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label"> গ্রহণকারীর ক্যাটাগরি: <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="doncategory" name="txtCategory" placeholder="Enter " > --}}
                                <select id="doncategory" class="form-control"                  name="txtCategory" required>
									<option selected>Choose...</option>

									@foreach ($m_categorys as $r_category)
									<option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
									@endforeach
								</select>
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রহিতার নামঃ <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="donreceiver_name" name="txtReceiver_name" placeholder="গ্রহিতার নাম " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রহণ তারিখ  : <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="dondate" name="txtDate" placeholder="Enter " required>
							</div>
						</div>

                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">মোবাইল নাম্বার: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="donphone" name="txtPhone" placeholder="Enter " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">ঠিকানা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="donaddress" name="txtAddress" placeholder="Enter " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">বক্স নাম্বার: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="donbox_no" name="txtBox_no" placeholder="Enter " >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">দাতার ক্যাটাগরি: <span class="text-danger">*</span></label>

                                <select id="donpro_category" class="form-control" name="txtPro_category" required>
									<option selected>Choose...</option>

									@foreach ($m_categorys as $r_category)
									<option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
									@endforeach
									</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">দাতার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="donprovider_name" name="txtProvider_name" placeholder="Enter " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label"> মন্তব্য : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="doncomment" name="txtComment" placeholder="Enter " >
							</div>
						</div>



					</div>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit donationboxe Center Modal -->

<!-- Delete donationboxe Center Modal -->
<div class="modal custom-modal fade" id="delete_don" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
                    <h3> দান বক্স বাতিল করুন</h3>
                    <p>আপনি কি দান বক্স বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-donationboxe')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_donId" name="d_don">


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
<!-- /Delete donationboxe Center Modal -->


<!-- show volunteer Center Modal -->
<div id="show_don" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
		<div class="modal-content">
			<div class="modal-header" >
				<h2 class="modal-title"> দান বাক্সের বিস্তারিত বিবরণ</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal;" >
				{{-- <div><h1 id="mahSHbrunch_name"></h1></div> --}}
				<div class="card mb-0">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<div class="profile-view">
									{{-- <div class="profile-img-wrap">
										<div class="profile-img">
											<a href="#"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
										</div>
									</div> --}}
									{{-- <div class="profile-basic"> --}}
										<div class="row">
                                            <style>
                                                #showdata{
                                                    color: #000;
                                                }
                                            </style>
											<div class="col-md-6">
												<div class="profile-info-left">




                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> শাখা নং: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="donSHbrunch_id"></div>

                                                        </div>
                                                    </div>
                                                                                                                                                     <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> শাখার নাম: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="donSHbrunch_name"></div>

                                                        </div>
                                                    </div>
                                                                                                                                                     <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> গ্রহণকারীর ক্যাটাগরি: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="donSHcategory"></div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata">গ্রহিতার নামঃ <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="donSHreceiver_name"></div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> গ্রহনের তারিখ: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="donSHdate"></div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> মোবাইল নাম্বার: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="donSHphone"></div>

                                                        </div>
                                                    </div>
												</div>

										    </div>
                                            <div class="col-md-6">
												<div class="profile-info-right">

                                                                                                                                                     <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> ঠিকানা: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="donSHaddress"></div>

                                                        </div>
                                                    </div>
                                                                                                                                                     <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> বক্স নাম্বার: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="donSHbox_no"></div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> দাতার ক্যাটাগরি: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="donSHpro_category"></div>

                                                        </div>
                                                    </div>
                                                                                                                                                     <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> দাতার নাম: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="donSHprovider_name"></div>

                                                        </div>
                                                    </div>
                                                                                                                                                     <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> মন্তব্য: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="donSHcomment"></div>

                                                        </div>
                                                    </div>

												</div>

										    </div>
								    	</div>
									<div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
								{{-- </div> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /show volunteer Center Modal -->

<script>
    var filteredMember = [];

$(document).ready(function(){
        $(document).on('click','#donDbtn',function(){
			var don_id=$(this).val();
            // alert(member_id);
			$('#delete_don').modal('show');
			$('#delete_donId').val(don_id);
		});



		$(document).on('click','#donBtn',function(){
			//  alert("ok");

			var don_id=$(this).val();
			// alert(invi_id);
			$('#edit_don').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-donationboxe/"+don_id,
				success:function(response){
					// console.log(response.donationboxe.brunch_name);
					$('#doncmbdonId').val(don_id);

					$('#donbrunch_id').val(response.donationboxe.brunch_id);
					$('#donbrunch_name').val(response.donationboxe.brunch_name);
					$('#doncategory').val(response.donationboxe.rec_category);
					$('#dondate').val(response.donationboxe.date);
					$('#donreceiver_name').val(response.donationboxe.receiver_name);
					$('#donaddress').val(response.donationboxe.address);
					$('#donbox_no').val(response.donationboxe.box_no);
					$('#donphone').val(response.donationboxe.phone);
					$('#donpro_category').val(response.donationboxe.pro_category);

					$('#donprovider_name').val(response.donationboxe.provider_name);
					$('#doncomment').val(response.donationboxe.comment);



				}
			});
		});
		$("#cmbBrunchId").on("change",function(){
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

        $(document).on('click','#donSHBtn',function(){
			//  alert("ok");

			var donsh_id=$(this).val();
			// alert(invi_id);
			$('#show_don').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-donationboxe/"+donsh_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);

                    $('#donSHcmbdonId').html(donsh_id);

					$('#donSHbrunch_id').html(response.sdonationboxe.brunch_id);
					$('#donSHbrunch_name').html(response.sdonationboxe.brunch_name);
					$('#donSHcategory').html(response.sdonationboxe.rec_category);
					$('#donSHdate').html(response.sdonationboxe.date);
					$('#donSHreceiver_name').html(response.sdonationboxe.receiver_name);
					$('#donSHaddress').html(response.sdonationboxe.address);
					$('#donSHbox_no').html(response.sdonationboxe.box_no);
					$('#donSHphone').html(response.sdonationboxe.phone);
					$('#donSHpro_category').html(response.sdonationboxe.pro_category);

					$('#donSHprovider_name').html(response.sdonationboxe.provider_name);
					$('#donSHcomment').html(response.sdonationboxe.comment);



				}
			});
		});

// //////////////////////////////////////////////////
        $('#cmbmcategory').on('change', function () {
			var idCountry = this.value;
            $("#cmbRname").html('');
            if(idCountry == "1"){
                $.ajax({
				url: "{{url('api/fetch-member')}}",
				type: "POST",
				data: {
					m_category: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {

                    // console.log(result.cmembers[0]);
                    filteredMember = result.cmembers;

					$('#cmbRname').html('<option value="">Select Member</option>');
					$.each(result.cmembers, function (key, value) {
						$("#cmbRname").append('<option value="' + value
							.id + '">' + value.id  +' | ' + value.m_name + '</option>');


					});

				}
			});
            }else if(idCountry == "2"){
                $.ajax({
				url: "{{url('api/fetch-cmember')}}",
				type: "POST",
				data: {
					cm_category: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
                    filteredMember = result.cmmembers;

					$('#cmbRname').html('<option value="">Select Member</option>');
					$.each(result.cmmembers, function (key, value) {
						$("#cmbRname").append('<option value="' + value
							.id + '">' + value.id  +' | ' + value.m_name + '</option>');
					});

				}
			});

            }else if(idCountry == "3"){
                $.ajax({
				url: "{{url('api/fetch-brunche')}}",
				type: "POST",
				data: {
					bh_category: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
                    filteredMember = result.bhmembers;

					$('#cmbRname').html('<option value="">Select Member</option>');
					$.each(result.bhmembers, function (key, value) {
						$("#cmbRname").append('<option value="' + value
							.id + '">' + value.id  +' | ' + value.m_name + '</option>');
					});

				}
			});
            }


		});
        $('#cmbRname').on('change', function(){
            // console.log($('#cmbRname').val());
            var selectedVal = $('#cmbRname').val();
            for(var i=0;i<filteredMember.length;i++){
                var selectedId = filteredMember[i].id;
                // console.log(selectedId);
                if(selectedVal == selectedId){
                    $("#ootxtPhone").val(filteredMember[i].m_phone);
                    // $("#txtfMember_name").val(filteredMember[i].m_name);


                }

            }
        });
// //////////////////
// Provider
        $('#cmbPcategory').on('change', function () {
			var idCountry = this.value;
            $("#cmbPname").html('');
            if(idCountry == "1"){
                $.ajax({
				url: "{{url('api/fetch-member')}}",
				type: "POST",
				data: {
					m_category: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {

                    // console.log(result.cmembers[0]);
                    filteredMember = result.cmembers;

					$('#cmbPname').html('<option value="">Select Member</option>');
					$.each(result.cmembers, function (key, value) {
						$("#cmbPname").append('<option value="' + value
							.id + '">' + value.id  +' | ' + value.m_name + '</option>');


					});

				}
			});
            }else if(idCountry == "2"){
                $.ajax({
				url: "{{url('api/fetch-cmember')}}",
				type: "POST",
				data: {
					cm_category: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
                    filteredMember = result.cmmembers;

					$('#cmbPname').html('<option value="">Select Member</option>');
					$.each(result.cmmembers, function (key, value) {
						$("#cmbPname").append('<option value="' + value
							.id + '">' + value.id  +' | ' + value.m_name + '</option>');
					});

				}
			});

            }else if(idCountry == "3"){
                $.ajax({
				url: "{{url('api/fetch-brunche')}}",
				type: "POST",
				data: {
					bh_category: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
                    filteredMember = result.bhmembers;

					$('#cmbPname').html('<option value="">Select Member</option>');
					$.each(result.bhmembers, function (key, value) {
						$("#cmbPname").append('<option value="' + value
							.id + '">' + value.id  +' | ' + value.m_name + '</option>');
					});

				}
			});
            }


		});
        // $('#cmbRname').on('change', function(){
        //     // console.log($('#cmbRname').val());
        //     var selectedVal = $('#cmbRname').val();
        //     for(var i=0;i<filteredMember.length;i++){
        //         var selectedId = filteredMember[i].id;
        //         // console.log(selectedId);
        //         if(selectedVal == selectedId){
        //             $("#ootxtPhone").val(filteredMember[i].m_phone);
        //             // $("#txtfMember_name").val(filteredMember[i].m_name);


        //         }

        //     }
        // });

	});
</script>
@endsection



