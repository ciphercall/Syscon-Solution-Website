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
				<h2 class="page-title">যাকাত ও ফিতরার তালিকা </h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">যাকাত ও ফিতরা </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i> যাকাত ও ফিতরা সংযোজন</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- jakat Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>যাকাত ও ফিতরার পরিমান</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>যাকাত ও ফিতরার সংখ্যা </h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>যাকাত ও ফিতরা অনুমদন</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>যাকাত ও ফিতরা বাতিল

                </h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /jakat Center Statistics -->
	{{-- @if (session('success'))
		<div class="alert alert-success"><b>{{session('success')}}</b> </div>
	@endif --}}
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table display nowrap" id="example">
					<thead>
						<tr>
							<th>#</th>

							<th>শাখার নং</th>
							<th>প্রদানকারীর নামঃ</th>
							<th>ধরন</th>
							<th> মাধ্যম</th>
							<th> পরিমান</th>
							<th>মন্তব্য</th>



							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($jakats as $key=> $jakat)

						<tr>
							<td>{{++$key}}</td>

							<td>{{$jakat->brunch_id}}| {{$jakat->brunch_name}}</td>
							<td>{{$jakat->donor}}</td>
							<td>{{$jakat->category}}</td>
							<td>{{$jakat->mediam}}</td>
							<td>{{$jakat->amount}}</td>
							<td>{{$jakat->comment}}</td>

							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">


										<button type="button" value="{{$jakat->id}}" class="btn btn-success" id="jakatshBtn" ><i class="bi bi-eye-fill"></i> </button>


										<button type="button" value="{{$jakat->id}}" class="btn btn-primary" id="jakatBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$jakat->id}}" class="btn btn-warning" id="jakatDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>
						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$jakats->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add jakat Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> যাকাত ও
                     ফিতরা সংযোজন
                </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('jakats.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শাখা্র নং: </label>
								<select id="cmbBrunchId" class="form-control" name="cmbBrunchId" required>
									<option selected>Choose...</option>

									@foreach ($brunchs as $brunch)
									<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} </option>
									@endforeach
									</select>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" placeholder=" শাখার নাম" class="form-control" id="ooBrunch_name" name="txtBrunch_name" required>

							</div>
						</div>


							{{-- <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">Donar: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="" name="txtDonor" placeholder="Enter Donar Name" required>
								</div>
							</div> --}}
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label"> সদস্যের ধরন: </label>

                                    <select id="cmbmcategory" class="form-control" name="j_m_category" required>
                                        <option selected>Choose...</option>

                                        @foreach ($m_categorys as $r_category)
                                        <option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">প্রদানকারীর নামঃ <span class="text-danger">*</span></label>
									{{-- <input type="text" class="form-control" id="" name="txtPadused_des" placeholder="Occasion" required> --}}
                                    <select id="cmbRname" class="form-control" name="txtDonor" required>

									</select>
								</div>
							</div>



							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">ধরন :</label>
									<input type="text" placeholder="ধরন" class="form-control" id="" name="txtCategory"  required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> মাধ্যম :</label>
									<input type="text" placeholder="মাধ্যম" class="form-control" id="" name="txtMediam"  required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> পরিমান :</label>
									<input type="text"  class="form-control" id="" name="txtAmount" placeholder="পরিমান" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">মন্তব্য : <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="" name="txtComment" placeholder="মন্তব্য" required>
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
<!-- /Add jakat Center Modal -->

<!-- Edit jakat Center Modal -->
<div id="edit_jakat" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">যাকাত ও
                    ফিতরা সংশোধন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('jakat-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')

					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<input type="hidden" class="form-control" id="cmbjakatId" name="cmbjakatId" required>


								<label class="col-form-label">শাখার নং: <span class="text-danger">*</span></label>
								<select id="ecmbBrunchId" class="form-control" name="cmbBrunchId" required>
									<option selected>Choose...</option>

									@foreach ($brunchs as $brunch)
									<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} </option>
									@endforeach
									</select>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="eBrunch_name" name="txtBrunch_name" required>

							</div>
						</div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label"> সদস্যের ধরন: </label>

                                <select id="cmbmcategory" class="form-control" name="j_m_category" required>
                                    <option selected>Choose...</option>

                                    @foreach ($m_categorys as $r_category)
                                    <option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">প্রদানকারীর নামঃ: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="Edonor" name="txtDonor" placeholder="Enter Speakers Name" required>
							</div>
						</div>



						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">ধরন :</label>
								<input type="text" class="form-control" id="Scategory" name="txtCategory" placeholder="Enter Address" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">মাধ্যম :</label>
								<input type="text" class="form-control" id="Smediam" name="txtMediam" placeholder="Enter Address" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">পরিমান :</label>
								<input type="text" class="form-control" id="Samount" name="txtAmount" placeholder="Enter Address" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">মন্তব্য: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="Scomment" name="txtComment" placeholder="Enter Provider" required>
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
<!-- /Edit jakat Center Modal -->

<!-- Delete jakat Center Modal -->
<div class="modal custom-modal fade" id="delete_jakat" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
                    <h3>যাকাত ও
                        ফিতরা বাতিল করুন</h3>
                    <p>আপনি কি যাকাত ও
                        ফিতরা বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-jakat')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_jakatId" name="d_jakat">


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
<!-- /Delete jakat Center Modal -->

<!-- show jakat Center Modal -->


<div id="show_jakat" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">যাকাত ও
                    ফিতরার বিস্তারিত বিবরণ</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: rgb(4, 21, 34)">

				<form action="">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> শাখার নং: <span class="text-danger">*</span></label>
								<div class="form-control "  id="Shbrunch_id"></div>

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
                                <label class="col-form-label" id="labelb">সদস্যের ধরন: <span class="text-danger">*</span></label>
                                <div class="form-control" id="shj_m_category"></div>

                            </div>
                        </div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">প্রদানকারীর নামঃ <span class="text-danger">*</span></label>
								<div class="form-control" id="shdonor"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ধরন: <span class="text-danger">*</span></label>
								<div class="form-control" id="shcategory"></div>

							</div>
						</div>


						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">মাধ্যম : <span class="text-danger">*</span></label>
								<div class="form-control" id="shmediam"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">পরিমান : <span class="text-danger">*</span></label>
								<div class="form-control" id="shamount"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">মন্তব্য: <span class="text-danger">*</span></label>
								<div class="form-control" id="Shcomment"></div>

							</div>
						</div>

					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!-- /show jakat Center Modal -->
<script>
	$(document).ready(function(){
        $(document).on('click','#jakatDbtn',function(){
			var jakat_id=$(this).val();
            // alert(member_id);
			$('#delete_jakat').modal('show');
			$('#delete_jakatId').val(jakat_id);
		});



		$(document).on('click','#jakatBtn',function(){
			//  alert("ok");

			var jakat_id=$(this).val();
			// alert(jakat_id);
			$('#edit_jakat').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-jakat/"+jakat_id,
				success:function(response){
					// console.log(response.jakat.brunch_id);


					$('#cmbjakatId').val(jakat_id);

					$('#ecmbBrunchId').val(response.jakat.brunch_id);


					$('#eBrunch_name').val(response.jakat.brunch_name);
					$('#eBrunch_name').val(response.jakat.brunch_name);
					$('#cmbmcategory').val(response.jakat.j_m_category);

					$('#Edonor').val(response.jakat.donor);

					$('#Scategory').val(response.jakat.category);
					$('#Smediam').val(response.jakat.mediam);
					$('#Samount').val(response.jakat.amount);
					$('#Scomment').val(response.jakat.comment);

				}
			});
		});

		$(document).on('click','#jakatshBtn',function(){
			//  alert("ok");

			var jakatsh_id=$(this).val();
			// alert(invi_id);
			$('#show_jakat').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-jakat/"+jakatsh_id,
				success:function(response){
					$('#cmbjakatSHId').html(jakatsh_id);

						$('#Shbrunch_id').html(response.sjakat.brunch_id);


						$('#Shbrunch_name').html(response.sjakat.brunch_name);
                        $('#shj_m_category').html(response.sjakat.j_m_category);

						$('#shdonor').html(response.sjakat.donor);
						$('#shcategory').html(response.sjakat.category);
						$('#shmediam').html(response.sjakat.mediam);
						$('#shamount').html(response.sjakat.amount);

						$('#Shcomment').html(response.sjakat.comment);




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


 // /////////////////////////
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









