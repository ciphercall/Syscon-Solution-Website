@extends('layout.erp.home')
@section('page')


<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">নতুন দাওয়াত জমা:

                </h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">নতুন দাওয়াত জমা:</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i> নতুন দাওয়াত জমা সংযোজন</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- Invitation Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>নতুন দাওয়াত জমার পরিমান</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>নতুন দাওয়াত জমা</h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>নতুন দাওয়াত জমা বাঁকি</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6> দাওয়াত জমা বাতিল</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /Invitation Center Statistics -->
	@if (session('success'))
		<div class="alert alert-success"><b>{{session('success')}}</b> </div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table display nowrap" id="example"
				>
					<thead>
						<tr>
							<th>শাখার নাম</th>
							<th>তারিখ</th>
							<th>তাহলিল</th>
							<th>দোয়া ইউনুছ</th>
							<th>দরুদে সাইফিল্লাহ</th>
							<th>দরুদে নাড়িয়া</th>
							<th>কুরআন খতম</th>
							<th>উপলক্ষ</th>

							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($invitationcenters as $invitationcenter)

						<tr>
							<td>{{$invitationcenter->brunch_name}}</td>
							<td>{{$invitationcenter->date}}</td>
							<td>{{$invitationcenter->tahlil}}</td>
							<td>{{$invitationcenter->doa_yunus}}</td>
							<td>{{$invitationcenter->darude_saifillah}}</td>
							<td>{{$invitationcenter->darude_nariya}}</td>
							<td>{{$invitationcenter->quran_katom}}</td>
							<td>{{$invitationcenter->occasion}}</td>
							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">




										{{-- <button type="button" value="{{$invitationcenter->id}}" class="dropdown-item" id="inBtn" ><i class="fa fa-pencil m-r-5" ></i> Edit</button>

										<button type="button" value="{{$invitationcenter->id}}" class="dropdown-item" id="inDbtn" ><i class="fa fa-trash-o m-r-5"></i> Delete</button> --}}

										<button type="button" value="{{$invitationcenter->id}}" class="btn btn-info" id="invshBtn" ><i class="bi bi-eye" ></i> </button>

										<button type="button" value="{{$invitationcenter->id}}" class="btn btn-primary" id="inBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$invitationcenter->id}}" class="btn btn-warning" id="inDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>



									</div>
								</div>
							</td>
						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$invitationcenters->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add Invitation Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">নতুন দাওয়াত জমা সংযোজন </h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('invitationcenters.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="" name="cmbBrunchId" placeholder="Enter " required> --}}

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
								<label class="col-form-label">শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="ooBrunch_name" name="txtBrunch_name" placeholder="শাখার নাম" >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">তারিখ : <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="" name="txtDate" placeholder="তারিখ" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">তাহলিল : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtTahlil" placeholder="তাহলিল" >
							</div>
						</div>	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">দোয়া ইউনুছ: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtDoa_yunus" placeholder="দোয়া ইউনুছ" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">দরুদে সাইফিল্লাহ: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtDarude_saifillah" placeholder="দরুদে সাইফিল্লাহ" >
							</div>
						</div>	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">দরুদে নাড়িয়া: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtDarude_nariya" placeholder="দরুদে নাড়িয়া" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">কুরআন খতমঃ <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtQuran_katom" placeholder="কুরআন খতমঃ" >
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">উপলক্ষ : <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="" name="txtOccasion" placeholder="Enter " required> --}}
                                <select id="" class="form-control" name="txtOccasion" required>
									<option selected>Choose...</option>

									@foreach ($occations as $occation)
									<option value="{{ $occation->id }}">{{ $occation->name }}</option>
									@endforeach
									</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">মন্তব্য : <span class="text-danger">*</span></label>
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
<!-- /Add Invitation Center Modal -->

<!-- Edit Invitation Center Modal -->
<div id="edit_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">নতুন দাওয়াত জমা সংশোধন </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('invitationcenter-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>


								<input type="hidden" class="form-control" id="cmbinId" name="cmbinId" placeholder="Enter " required>

								<select id="InbrunchId" class="form-control" name="cmbBrunchId" required>
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
								<input type="text" class="form-control" id="inBrunch_name" name="txtBrunch_name" placeholder="Enter " >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">তারিখ : <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="inDate" name="txtDate" placeholder="Enter " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">তাহলিল : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="Intahlil" name="txtTahlil" placeholder="Enter " >
							</div>
						</div>	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">দোয়া ইউনুছ: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="Indoa_yunus" name="txtDoa_yunus" placeholder="Enter " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">দরুদে সাইফিল্লাহ: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="Indarude_saifillah" name="txtDarude_saifillah" placeholder="Enter " >
							</div>
						</div>	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">দরুদে নাড়িয়া: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="Indarude_nariya" name="txtDarude_nariya" placeholder="Enter " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">কুরআন খতমঃ <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="Inquran_katom" name="txtQuran_katom" placeholder="Enter Quran Katom" >
							</div>
						</div>	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">উপলক্ষ : <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="Inoccasion" name="txtOccasion" placeholder="Enter " required> --}}

                                <select id="Inoccasion" class="form-control" name="txtOccasion" required>
									<option selected>Choose...</option>

									@foreach ($occations as $occation)
									<option value="{{ $occation->id }}">{{ $occation->name }}</option>
									@endforeach
									</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">মন্তব্য : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="Incomment" name="txtComment" placeholder="Enter " >
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
<!-- /Edit Invitation Center Modal -->

<!-- Delete Invitation Center Modal -->
<div class="modal custom-modal fade" id="delete_overtime" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
                    <h3>নতুন দাওয়াত জমা বাতিল করুন</h3>
                    <p>আপনি কি নতুন দাওয়াত জমা বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-invitationcenter')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_invId" name="d_inv">


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
<!-- /Delete Invitation Center Modal -->

<!-- show padcollection Center Modal -->

<div id="show_inv" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">নতুন দাওয়াত জমা বিস্তারিত বিবরণ</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: rgb(4, 21, 34)">

				<form action="">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> শাখা নং: <span class="text-danger">*</span></label>
								<div class="form-control "  id="invSHbrunch_id"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">শাখার নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="invSHbrunch_name"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">তারিখ : <span class="text-danger">*</span></label>
								<div class="form-control" id="invSHdate"></div>

							</div>
						</div>



						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> তাহলিল: <span class="text-danger">*</span></label>
								<div class="form-control" id="invSHtahlil"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> দোয়া ইউনুছ: <span class="text-danger">*</span></label>
								<div class="form-control" id="invSHdoa_yunus"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> দরুদে সাইফিল্লাহ: <span class="text-danger">*</span></label>
								<div class="form-control" id="invSHdarude_saifillah"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> দরুদে নাড়িয়া: <span class="text-danger">*</span></label>
								<div class="form-control" id="invSHdarude_nariya"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> কুরআন খতমঃ <span class="text-danger">*</span></label>
								<div class="form-control" id="invSHquran_katom"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> উপলক্ষ : <span class="text-danger">*</span></label>
								<div class="form-control" id="invSHoccasion"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">মন্তব্য: <span class="text-danger">*</span></label>
								<div class="form-control" id="invSHcomment"></div>

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
        $(document).on('click','#inDbtn',function(){
			var inv_id=$(this).val();
            // alert(member_id);
			$('#delete_overtime').modal('show');
			$('#delete_invId').val(inv_id);
		});



		$(document).on('click','#inBtn',function(){
			//  alert("ok");

			var inv_id=$(this).val();
			// alert(inv_id);
			$('#edit_overtime').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-invitationcenter/"+inv_id,
				success:function(response){
					// console.log(response.member.name);
					$('#cmbinId').val(inv_id);
					$('#InbrunchId').val(response.invitationcenter.brunch_id);


					$('#inBrunch_name').val(response.invitationcenter.brunch_name);
					$('#inDate').val(response.invitationcenter.date);
					$('#Intahlil').val(response.invitationcenter.tahlil);
					$('#Indoa_yunus').val(response.invitationcenter.doa_yunus);
					$('#Indarude_saifillah').val(response.invitationcenter.darude_saifillah);
					$('#Indarude_nariya').val(response.invitationcenter.darude_nariya);
					$('#Inquran_katom').val(response.invitationcenter.quran_katom);
					$('#Inoccasion').val(response.invitationcenter.occasion);
					$('#Incomment').val(response.invitationcenter.comment);


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


		$(document).on('click','#invshBtn',function(){
			//  alert("ok");

			var invsh_id=$(this).val();
			// alert(invi_id);
			$('#show_inv').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-invitationcenter/"+invsh_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);
					$('#cmbincSHId').html(invsh_id);


					$('#invSHbrunch_id').html(response.sinvitationcenter.brunch_id);
					$('#invSHbrunch_name').html(response.sinvitationcenter.brunch_name);
					$('#invSHdate').html(response.sinvitationcenter.date);
					$('#invSHtahlil').html(response.sinvitationcenter.darude_saifillah);
					$('#invSHdoa_yunus').html(response.sinvitationcenter.doa_yunus);
					$('#invSHdarude_saifillah').html(response.sinvitationcenter.darude_saifillah);
					$('#invSHdarude_nariya').html(response.sinvitationcenter.darude_nariya);
					$('#invSHquran_katom').html(response.sinvitationcenter.quran_katom);
					$('#invSHoccasion').html(response.sinvitationcenter.occasion);
					$('#invSHcomment').html(response.sinvitationcenter.comment);



				}
			});
		});
	});
</script>
@endsection
