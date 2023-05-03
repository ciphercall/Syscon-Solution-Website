@extends('layout.erp.home')
@section('page')




<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title"> আয়ের তালিকা  </h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">আয়  </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i>   আয় সংযোজন </a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- Invitation Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>  আয়ের পরিমান</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>  আয় সংযোজন </h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>  আয় </h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>  আয় বাতিল</h6>
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
				<table class="table table-striped custom-table mb-0 " id="example">
					<thead>
						<tr>
                            <th scope="col">ক্রম</th>
                            <th scope="col">শাখা নং</th>
                            <th scope="col">তারিখ</th>
                            <th scope="col">রশিদ নং</th>
                            <th scope="col">টাকার পরিমাণ</th>
                            <th scope="col">বর্ণনা</th>
                            <th scope="col">মন্তব্য</th>
							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($incomeaccounts as $key=> $incomeaccount)





						<tr>
							<td>{{++$key}}</td>

							<td>( {{$incomeaccount->brunch_id}} ) {{$incomeaccount->brunch_name}}</td>
							<td>{{$incomeaccount->date}}</td>
							<td>{{$incomeaccount->money_receipt_no}}</td>
							<td>{{$incomeaccount->amount_money}}</td>

							<td>{{$incomeaccount->description}}</td>
							<td>{{$incomeaccount->comment}}</td>
							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">


										<button type="button" value="{{$incomeaccount->id}}" class="btn btn-success" id="incshBtn" ><i class="bi bi-eye" ></i> </button>

										<button type="button" value="{{$incomeaccount->id}}" class="btn btn-warning" id="incBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$incomeaccount->id}}" class="btn btn-primary" id="incDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>

						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$incomeaccounts->links()}}

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
				<h5 class="modal-title">আয় সংযোজন </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('incomeaccounts.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>
								{{-- 	<input type="hidden" class="form-control" id="cmbexId" name="cmbexId" placeholder="Enter "> --}}

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
								<label class="col-form-label">শাখা নামঃ: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="ooBrunch_name" name="txtBrunch_name" placeholder="শাখা নামঃ " >
							</div>
						</div>


						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">তারিখ: <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="" name="txtDate" placeholder="Enter " required>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">রশিদ নং <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtMoney_receipt_no" placeholder="রশিদ নং " >
							</div>
						</div>
                        <div class="col-sm-6">

							<div class="form-group">
								<label class="col-form-label">টাকার পরিমাণ: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtAmount_money" placeholder="টাকার পরিমাণ " >
							</div>
						</div>
							<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">বর্ণনা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtDescription" placeholder="বর্ণনা " >
							</div>
						</div>

						<div class="col-sm-6">

							<div class="form-group">
								<label class="col-form-label">মন্তব্য  : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtComment" placeholder="মন্তব্য " >
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">ভাউচার ছবি: <span class="text-danger">*</span></label>
								<input type="file" name="filePhoto" class="form-control" placeholder="image">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<img src="{{ URL::to('/assets/photo/v.png') }}"  alt="" sizes="60%" srcset="" height="90px">
								{{-- <label class="col-form-label">Image / ছবি: <span class="text-danger">*</span></label>
								<input type="file" name="filePhoto" class="form-control" placeholder="image"> --}}
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
<div id="edit_inc" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">আয় সংশোধন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('incomeaccount-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>
									<input type="hidden" class="form-control" id="cmbincId" name="cmbincId" placeholder="Enter ">

								<select id="incbrunchId" class="form-control" name="cmbBrunchId" required>
									<option selected>Choose...</option>

									@foreach ($brunchs as $brunch)
									<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} | {{ $brunch->brunch_name }}</option>
									@endforeach
									</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label"> শাখা নামঃ <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="incbrunch_name" name="txtBrunch_name" placeholder="Enter " >
							</div>
						</div>


						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">তারিখ: <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="incdate" name="txtDate" placeholder="Enter " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">রশিদ নং: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="incmoney_receipt_no" name="txtMoney_receipt_no" placeholder="Enter " >
							</div>
						</div>
							<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">বর্ণনা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="incdescription" name="txtDescription" placeholder="Enter " >
							</div>
						</div>
						<div class="col-sm-6">

							<div class="form-group">
								<label class="col-form-label">টাকার পরিমাণ : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="incamount_money" name="txtAmount_money" placeholder="Enter " >
							</div>
						</div>
						<div class="col-sm-6">

							<div class="form-group">
								<label class="col-form-label">মন্তব্য  : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="inccomment" name="txtComment" placeholder="Enter " >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">ভাউচার ছবি: <span class="text-danger">*</span></label>
								<input type="file" name="filePhoto" class="form-control" placeholder="image">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ভাউচার ছবি : <span class="text-danger">*</span></label>
								{{-- <a href="#" target="_blank" rel="noopener noreferrer" id=""> --}}
									{{-- <img src="" alt="" id="inci_photo"> --}}
								<div  id="inci_photo"></div>

								</a>
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
<div class="modal custom-modal fade" id="delete_inc" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
                    <h3>আয় বাতিল করুন</h3>
                    <p>আপনি কি আয় বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-incomeaccount')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_incId" name="d_inc">


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

<div id="show_inc" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title"> আয়ের বিস্তারিত বিবরণ</h3>
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
								<div class="form-control "  id="incSHbrunch_id"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">শাখা নামঃ: <span class="text-danger">*</span></label>
								<div class="form-control" id="incSHbrunch_name"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">তারিখ : <span class="text-danger">*</span></label>
								<div class="form-control" id="incSHdate"></div>

							</div>
						</div>



						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">রশিদ নং: <span class="text-danger">*</span></label>
								<div class="form-control" id="incSHmoney_receipt_no"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">বর্ণনা: <span class="text-danger">*</span></label>
								<div class="form-control" id="incSHdescription"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">টাকার পরিমাণ : <span class="text-danger">*</span></label>
								<div class="form-control" id="incSHamount_money"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">মন্তব্য: <span class="text-danger">*</span></label>
								<div class="form-control" id="incSHcomment"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ভাউচার ছবি : <span class="text-danger">*</span></label>

								<div  id="incSHi_photo"></div>



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
        $(document).on('click','#incDbtn',function(){
			var inc_id=$(this).val();
            // alert(member_id);
			$('#delete_inc').modal('show');
			$('#delete_incId').val(inc_id);
		});



		$(document).on('click','#incBtn',function(){
			//  alert("ok");

			 var inc_id=$(this).val();
			// alert(qu_id);
			 $('#edit_inc').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-incomeaccount/"+inc_id,
				success:function(response){
					// console.log(response.member.description);
					$('#cmbincId').val(inc_id);
					$('#incbrunchId').val(response.incomeaccount.brunch_id);
					$('#incbrunch_name').val(response.incomeaccount.brunch_name);



					$('#incdate').val(response.incomeaccount.date);

					$('#incmoney_receipt_no').val(response.incomeaccount.money_receipt_no);
					$('#incdescription').val(response.incomeaccount.description);
					$('#incamount_money').val(response.incomeaccount.amount_money);

					$('#inccomment').val(response.incomeaccount.comment);


						$("#inci_photo").html(
                        `<a href="img/${response.incomeaccount.i_photo}" target="_blank" rel="noopener noreferrer"><img src="img/${response.incomeaccount.i_photo}" width="100" class="img-fluid img-thumbnail"></a>`);


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

		$(document).on('click','#incshBtn',function(){
			//  alert("ok");

			var incsh_id=$(this).val();
			// alert(invi_id);
			$('#show_inc').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-incomeaccount/"+incsh_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);
					$('#cmbincSHId').html(incsh_id);

					// id, brunch_id, brunch_name, date, money_receipt_no, description, amount_money, comment, created_at, updated_at, deleted_at, i_photo

					$('#incSHbrunch_id').html(response.sincomeaccount.brunch_id);
					$('#incSHbrunch_name').html(response.sincomeaccount.brunch_name);
					$('#incSHdate').html(response.sincomeaccount.date);
					$('#incSHmoney_receipt_no').html(response.sincomeaccount.money_receipt_no);
					$('#incSHdescription').html(response.sincomeaccount.description);
					$('#incSHamount_money').html(response.sincomeaccount.amount_money);
					$('#incSHcomment').html(response.sincomeaccount.comment);
					$("#incSHi_photo").html(
                        `<a href="img/${response.sincomeaccount.i_photo}" target="_blank" rel="noopener noreferrer"><img src="img/${response.sincomeaccount.i_photo}" width="100" class="img-fluid img-thumbnail"></a>`);




				}
			});
		});

	});
</script>
@endsection






