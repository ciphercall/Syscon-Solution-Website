@extends('layout.erp.home')
@section('page')




<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h2 class="page-title"> প্যাড সংগ্রহের তালিকা

                </h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active"> প্যাড সংগ্রহ </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i>প্যাড সংগ্রহ সংযোজন</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- padcollection Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6> প্যাড সংগ্রহএর সংখ্যা</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6> প্যাড সংগ্রহ</h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6> প্যাড সংগ্রহের অনুমদন</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6> প্যাড সংগ্রহ বাতিল</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /padcollection Center Statistics -->
	@if (session('success'))
		<div class="alert alert-success"><b>{{session('success')}}</b> </div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-striped custom-table mb-0 datatable">
					<thead>
						<tr>
                            <th scope="col">ক্রম</th>
                            <th scope="col">শাখা নং</th>
                            <th scope="col">তারিখ</th>
                            <th scope="col">পাতার পরিমাণ</th>
                            <th scope="col">সংগ্রহ</th>
                            <th scope="col">প্রদান কারী</th>
                            <th scope="col">মন্তব্য</th>


							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($padcollections as $key=> $padcollection)


						<tr>
							<td>{{++$key}}</td>

							<td>( {{$padcollection->brunch_id}} ) {{$padcollection->brunch_name}}</td>
							<td>{{$padcollection->date}}</td>
							<td>{{$padcollection->page_no}}</td>
							<td>{{$padcollection->pad_collection}}</td>
							<td>{{$padcollection->provider}}</td>
							<td>{{$padcollection->comment}}</td>

							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">


										<button type="button" value="{{$padcollection->id}}" class="btn btn-success" id="padcshBtn" ><i class="bi bi-eye-fill"></i> </button>


										<button type="button" value="{{$padcollection->id}}" class="btn btn-primary" id="padcBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$padcollection->id}}" class="btn btn-warning" id="padcDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>
						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$padcollections->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add padcollection Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">প্যাড সংগ্রহ সংযোজন </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('padcollections.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-4">

							<div class="form-group">
								<label class="col-form-label"> শাখা নং: <span class="text-danger">*</span></label>

								{{-- <input type="hidden" class="form-control" id="cmbpadcId" name="cmbpadcId" required>
								 --}}
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
                                    <label class="col-form-label">শাখার নাম: </label>
                                    <input type="text" class="form-control" id="ooBrunch_name" name="txtBrunch_name" required placeholder="শাখার নাম">

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="col-form-label">প্রদানকারীর ধরন: </label>

                                    <select id="cmbmcategory" class="form-control" name="txtMcategory" required>
                                        <option selected>Choose...</option>

                                        @foreach ($m_categorys as $r_category)
                                        <option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">প্রদানকারী: <span class="text-danger">*</span></label>
									{{-- <input type="text" class="form-control" id="cmbRname" name="txtProvider" placeholder="Enter Provider" required> --}}
                                    <select id="cmbRname" class="form-control" name="txtProvider" required>

									</select>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">তারিখ: <span class="text-danger">*</span></label>
									<input type="date" class="form-control" id="" name="txtDate" placeholder="Enter Speakers Name" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">পাতার পরিমাণ: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="" name="txtPage_no" placeholder="পাতার" required>
								</div>
							</div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">সংগ্রহ</label>
									<input type="text" class="form-control" id="txtAddress" name="txtPad_collection" placeholder="সংগ্রহ" required>
								</div>
							</div>

                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">মন্তব্য: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="txtNum_audience" name="txtComment" placeholder="মন্তব্য" required>
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
<!-- /Add padcollection Center Modal -->

<!-- Edit padcollection Center Modal -->
<div id="edit_padc" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">প্যাড সংগ্রহ সংশোধন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('padcollection-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-4">

							<div class="form-group">
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>

								<input type="hidden" class="form-control" id="cmbpadcId" name="cmbpadcId" required>

								<select id="padcbrunch_id" class="form-control" name="cmbBrunchId" required>
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
								<input type="text" class="form-control" id="padcbrunch_name" name="txtBrunch_name" required>

							</div>
						</div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">প্রদানকারীর ধরন: </label>

                                <select id="cmbmcategory" class="form-control" name="txtMcategory" required>
                                    <option selected>Choose...</option>

                                    @foreach ($m_categorys as $r_category)
                                    <option value="{{ $r_category->id }}"> {{ $r_category->c_name }}</option>
                                    @endforeach
                                    </select>
                            </div>
                        </div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">তারিখ: <span class="text-danger">*</span></label>
									<input type="date" class="form-control" id="padcdate" name="txtDate" placeholder="Enter Speakers Name" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">পাতার পরিমাণ: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="padcpage_no" name="txtPage_no" placeholder="Occasion" required>
								</div>
							</div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">সংগ্রহ:</label>
									<input type="text" class="form-control" id="padcpad_collection" name="txtPad_collection" placeholder="Enter Duty Date" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">প্রদানকারী: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="padcprovider" name="txtProvider" placeholder="Enter Provider" required>
								</div>
							</div>	<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">মন্তব্য: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="padccomment" name="txtComment" placeholder="Enter Speakers" required>
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

<!-- Delete padcollection Center Modal -->
<div class="modal custom-modal fade" id="delete_padc" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
                    <h3>প্যাড সংগ্রহ বাতিল করুন</h3>
                    <p>আপনি কি প্যাড সংগ্রহ বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-padcollection')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_padcId" name="d_padc">


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

<!-- show padcollection Center Modal -->

<div id="show_padc" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">প্যাড সংগ্রহের বিস্তারিত বিবরণ</h3>
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
								<div class="form-control "  id="padcSHbrunch_id"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">শাখার নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="padcSHbrunch_name"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">তারিখ : <span class="text-danger">*</span></label>
								<div class="form-control" id="padcSHdate"></div>

							</div>
						</div>



						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> পাতার পরিমাণ:: <span class="text-danger">*</span></label>
								<div class="form-control" id="padcSHpage_no"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">সংগ্রহ: <span class="text-danger">*</span></label>
								<div class="form-control" id="padcSHpad_collection"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">প্রদানকারী : <span class="text-danger">*</span></label>
								<div class="form-control" id="padcSHprovider"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">মন্তব্য: <span class="text-danger">*</span></label>
								<div class="form-control" id="padcSHcomment"></div>

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
        $(document).on('click','#padcDbtn',function(){
			var padc_id=$(this).val();
            // alert(member_id);
			$('#delete_padc').modal('show');
			$('#delete_padcId').val(padc_id);
		});



		$(document).on('click','#padcBtn',function(){
			//  alert("ok");

			var padc_id=$(this).val();
			// alert(invi_id);
			$('#edit_padc').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-padcollection/"+padc_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);
					$('#cmbpadcId').val(padc_id);


					$('#padcbrunch_id').val(response.padcollection.brunch_id);
					$('#padcbrunch_name').val(response.padcollection.brunch_name);
					$('#padcdate').val(response.padcollection.date);
					$('#padcpage_no').val(response.padcollection.page_no);
					$('#padcpad_collection').val(response.padcollection.pad_collection);
					$('#padcprovider').val(response.padcollection.provider);
					$('#padccomment').val(response.padcollection.comment);



				}
			});
		});

		$(document).on('click','#padcshBtn',function(){
			//  alert("ok");

			var padcsh_id=$(this).val();
			// alert(invi_id);
			$('#show_padc').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-padcollection/"+padcsh_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);
					$('#cmbpadcSHId').html(padcsh_id);


					$('#padcSHbrunch_id').html(response.spadcollection.brunch_id);
					$('#padcSHbrunch_name').html(response.spadcollection.brunch_name);
					$('#padcSHdate').html(response.spadcollection.date);
					$('#padcSHpage_no').html(response.spadcollection.page_no);
					$('#padcSHpad_collection').html(response.spadcollection.pad_collection);
					$('#padcSHprovider').html(response.spadcollection.provider);
					$('#padcSHcomment').html(response.spadcollection.comment);



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





