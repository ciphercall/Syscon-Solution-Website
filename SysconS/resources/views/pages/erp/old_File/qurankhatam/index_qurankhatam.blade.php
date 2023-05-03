@extends('layout.erp.home')
@section('page')


<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">কোরআন খতমের তালিকা</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">কোরআন খতম </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i>  খতম সংযোজন</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- Invitation Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কোরআন খতম এর পরিমান</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কোরআন খতম</h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কোরআন খতমের অপেক্ষা</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কোরআন খতম বাতিল</h6>
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
				<table id="example" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
                            <th scope="col">নাম ও ছবি</th>

                                    <th scope="col">শাখা নং</th>
                                    <th scope="col">সদস্য নং</th>


                                    <th scope="col">তারিখ</th>
                                    <th scope="col">পরিমাণ</th>
                                    <th scope="col">উপলক্ষ</th>
                                    <th scope="col">মন্তব্য</th>

							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($qurankhatams as $key=> $qurankhatam)



						<tr>
							<td>{{++$key}}</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="" class="avatar"><img src="{{asset('img')}}/{{$qurankhatam->m_photo}}" /></a>
                                    <a href="">{{$qurankhatam->name}} </a>
                                </h2>
                            </td>
							<td>{{$qurankhatam->brunch_name}} | {{$qurankhatam->brunch_id}}</td>
							<td>{{$qurankhatam->studid}}</td>
							{{-- <td>{{$qurankhatam->name}}</td> --}}

							<td>{{$qurankhatam->date}}</td>
							<td>{{$qurankhatam->amount}}</td>
							<td>{{$qurankhatam->occasion}}</td>
							<td>{{$qurankhatam->comment}}</td>
							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">





										<button type="button" value="{{$qurankhatam->id}}" class="btn btn-success" id="qurBtn" ><i class="bi bi-eye-fill" ></i> </button>

										<button type="button" value="{{$qurankhatam->id}}" class="btn btn-primary" id="quBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$qurankhatam->id}}" class="btn btn-warning" id="quDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>

						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$qurankhatams->links()}}

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
				<h5 class="modal-title"> কোরআন খতম সংযোজন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('qurankhatams.store')}}" method="post" enctype="multipart/form-data">
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
								<label class="col-form-label"> শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="ooBrunch_name" name="txtBrunch_name" placeholder="শাখার নাম " >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">সদস্য নং: <span class="text-danger">*</span></label>

                                <select id="cmbqMemberId" class="form-control" name="txtStudid" required>
                                    <option selected>Choose...</option>

                                    @foreach ($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->id }} | {{ $member->m_name }} </option>
                                    @endforeach
                                </select>
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">সদস্য নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtqMember_name" name="txtName" placeholder="সদস্য নাম " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">ইমেইল : <span class="text-danger">*</span></label>
								<input type="email" class="form-control" id="ootxtEmail" name="txtEmail" placeholder="ইমেইল " >
							</div>
						</div>	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">ফোন নং : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="ootxtPhone" name="txtPhone" placeholder="ফোন নং " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">তারিখ : <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="" name="txtDate" placeholder="Enter " >
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label"> পরিমাণ <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtAmount" placeholder="পরিমাণ " >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">উপলক্ষ : <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="" name="txtOccasion" placeholder="Enter " > --}}


                                <select id="" class="form-control" name="txtOccasion" required>
                                    <option selected>Choose...</option>

                                    @foreach ($occations as $occation)
                                    <option value="{{ $occation->id }}"> {{ $occation->name }} </option>
                                    @endforeach
                                </select>

							</div>
						</div>
						<div class="col-sm-6">

							<div class="form-group">
								<label class="col-form-label"> মন্তব্য : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtComment" placeholder="মন্তব্য " >
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
<div id="edit_qu" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">কোরআন খতম সংশোধন </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('qurankhatam-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>
								<input type="hidden" class="form-control" id="cmbquId" name="cmbquId" placeholder="Enter " required>

								<select id="qubrunchId" class="form-control" name="cmbBrunchId" required>
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
								<input type="text" class="form-control" id="qubrunch_name" name="txtBrunch_name" placeholder="Enter " >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">সদস্য নং : <span class="text-danger">*</span></label>


                                <select id="qumemberId" class="form-control" name="txtStudid" required>
                                    <option selected>Choose...</option>

                                    @foreach ($members as $member)
                                    <option value="{{ $member->id }}">{{ $member->id }} | {{ $member->m_name }} </option>
                                    @endforeach
                                </select>
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">সদস্য নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="quname" name="txtName" placeholder="Enter " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">ইমেইল : <span class="text-danger">*</span></label>
								<input type="email" class="form-control" id="quemail" name="txtEmail" placeholder="Enter " >
							</div>
						</div>	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">ফোন নং : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="quphone" name="txtPhone" placeholder="Enter " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">তারিখ : <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="qudate" name="txtDate" placeholder="Enter " >
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">পরিমাণ <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="quamount" name="txtAmount" placeholder="Enter " >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">উপলক্ষ : <span class="text-danger">*</span></label>

                                <select id="quoccasion" class="form-control" name="txtOccasion" required>
                                    <option selected>Choose...</option>

                                    @foreach ($occations as $occation)
                                    <option value="{{ $occation->id }}"> {{ $occation->name }} </option>
                                    @endforeach
                                </select>
							</div>
						</div>
						<div class="col-sm-6">

							<div class="form-group">
								<label class="col-form-label">মন্তব্য : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="qucomment" name="txtComment" placeholder="Enter " >
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
<div class="modal custom-modal fade" id="delete_qu" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
                    <h3>কোরআন খতম বাতিল করন</h3>
                    <p>আপনি কি কোরআন খতম বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-qurankhatam')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_quId" name="d_qu">


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

<div id="show_qur" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">কোরআন খতমের বিস্তারিত</h3>
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
								<div class="form-control "  id="qurSHbrunch_id"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">শাখার নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="qurSHbrunch_name"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">তারিখ : <span class="text-danger">*</span></label>
								<div class="form-control" id="qurSHdate"></div>

							</div>
						</div>



						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> সদস্য নং : <span class="text-danger">*</span></label>
								<div class="form-control" id="qurSHstudid"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">সদস্য নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="qurSHname"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ইমেইল: <span class="text-danger">*</span></label>
								<div class="form-control" id="qurSHemail"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ফোন নং: <span class="text-danger">*</span></label>
								<div class="form-control" id="qurSHphone"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">পরিমাণ: <span class="text-danger">*</span></label>
								<div class="form-control" id="qurSHamount"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">উপলক্ষ: <span class="text-danger">*</span></label>
								<div class="form-control" id="qurSHoccasion"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">মন্তব্য: <span class="text-danger">*</span></label>
								<div class="form-control" id="qurSHcomment"></div>

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
        $(document).on('click','#quDbtn',function(){
			var qu_id=$(this).val();
            // alert(member_id);
			$('#delete_qu').modal('show');
			$('#delete_quId').val(qu_id);
		});



		$(document).on('click','#quBtn',function(){
			//  alert("ok");

			var qu_id=$(this).val();
			// alert(qu_id);
			$('#edit_qu').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-qurankhatam/"+qu_id,
				success:function(response){
					// console.log(response.member.name);
					$('#cmbquId').val(qu_id);
					$('#qubrunchId').val(response.qurankhatam.brunch_id);
					$('#qubrunch_name').val(response.qurankhatam.brunch_name);



					$('#qumemberId').val(response.qurankhatam.studid);
					$('#qudate').val(response.qurankhatam.date);
					$('#quname').val(response.qurankhatam.name);
					$('#quemail').val(response.qurankhatam.email);
					$('#quphone').val(response.qurankhatam.phone);
					$('#quamount').val(response.qurankhatam.amount);
					$('#quoccasion').val(response.qurankhatam.occasion);
					$('#qucomment').val(response.qurankhatam.comment);




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

		$(document).on('click','#qurBtn',function(){
			//  alert("ok");

			var qursh_id=$(this).val();
			// alert(invi_id);
			$('#show_qur').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-qurankhatam/"+qursh_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);
					$('#cmbincSHId').html(qursh_id);


					$('#qurSHbrunch_id').html(response.squrankhatam.brunch_id);
					$('#qurSHbrunch_name').html(response.squrankhatam.brunch_name);
					$('#qurSHdate').html(response.squrankhatam.date);
					$('#qurSHstudid').html(response.squrankhatam.studid);

					$('#qurSHname').html(response.squrankhatam.name);
					$('#qurSHemail').html(response.squrankhatam.email);
					$('#qurSHphone').html(response.squrankhatam.phone);
					$('#qurSHamount').html(response.squrankhatam.amount);
					$('#qurSHoccasion').html(response.squrankhatam.occasion);
					$('#qurSHcomment').html(response.squrankhatam.comment);



				}
			});
		});


        $("#cmbqMemberId").on("change",function(){
           $.ajax({
             url:"<?php echo url("getmembers")?>",
             type:'GET',
             data:{"id":$(this).val()},
             success:function(res){
              let member=JSON.parse(res);
                console.log(member);
            //    $("#customer-name").val(member.name);
               $("#txtqMember_name").val(member.m_name);

               $("#ootxtPhone").val(member.m_phone);
               $("#ootxtEmail").val(member.m_email);







             }
           });
        });
	});
</script>
@endsection



