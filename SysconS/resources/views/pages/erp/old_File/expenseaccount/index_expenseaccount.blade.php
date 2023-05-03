@extends('layout.erp.home')
@section('page')





<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title"> ব্যয়ের তালিকা  </h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">ব্যয় </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i> ব্যয় সংযোজন </a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- Invitation Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>ব্যয়ের পরিমান  </h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>ব্যয়ের   </h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>ব্যয়ের অনুমদন </h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>ব্যয় বাতিল </h6>
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
						@forelse ($expenseaccounts as $key=> $expenseaccount)




						<tr>
							<td>{{++$key}}</td>

							<td>( {{$expenseaccount->brunch_id}} ) {{$expenseaccount->brunch_name}}</td>
							<td>{{$expenseaccount->date}}</td>
							<td>{{$expenseaccount->receipt_no}}</td>
							<td>{{$expenseaccount->amount_money}}</td>

							<td>{{$expenseaccount->description}}</td>
							<td>{{$expenseaccount->comment}}</td>
							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">





										<button type="button" value="{{$expenseaccount->id}}" class="btn btn-success" id="expshBtn" ><i class="bi bi-eye-fill" ></i> </button>
										<button type="button" value="{{$expenseaccount->id}}" class="btn btn-primary" id="expBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$expenseaccount->id}}" class="btn btn-warning" id="exDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>

						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$expenseaccounts->links()}}

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
				<h5 class="modal-title">ব্যয় সংযোজন করুন </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('expenseaccounts.store')}}" method="post" enctype="multipart/form-data">
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
								<label class="col-form-label"> শাখা নামঃ <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="ooBrunch_name" name="txtBrunch_name" placeholder=" শাখা নামঃ " >
							</div>
						</div>


						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">তারিখ: <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="" name="txtDate" placeholder="তারিখ " required>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">রশিদ নং: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtReceipt_no" placeholder="রশিদ নং " >
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
								<label class="col-form-label">টাকার পরিমাণ: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtAmount_money" placeholder="Enter " >
							</div>
						</div>
						<div class="col-sm-6">

							<div class="form-group">
								<label class="col-form-label">মন্তব্য : <span class="text-danger">*</span></label>
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
<div id="edit_exp" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">ব্যয়ের হিসাব সংশোধন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('expenseaccount-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label"> শাখা নং <span class="text-danger">*</span></label>
									<input type="hidden" class="form-control" id="excmbexId" name="cmbexId" placeholder="Enter ">

								<select id="exbrunchId" class="form-control" name="cmbBrunchId" required>
									<option selected>Choose...</option>

									@foreach ($brunchs as $brunch)
									<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} | {{ $brunch->brunch_name }}</option>
									@endforeach
									</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">  শাখা নামঃ <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="exbrunch_name" name="txtBrunch_name" placeholder="Enter " >
							</div>
						</div>


						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">তারিখ: <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="exdate" name="txtDate" placeholder="Enter " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">রশিদ নং: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="exreceipt_no" name="txtReceipt_no" placeholder="Enter " >
							</div>
						</div>
							<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">বর্ণনা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="exdescription" name="txtDescription" placeholder="Enter " >
							</div>
						</div>
						<div class="col-sm-6">

							<div class="form-group">
								<label class="col-form-label">টাকার পরিমাণ : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="examount_money" name="txtAmount_money" placeholder="Enter " >
							</div>
						</div>
						<div class="col-sm-6">

							<div class="form-group">
								<label class="col-form-label">মন্তব্য  : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="excomment" name="txtComment" placeholder="Enter " >
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
								<label class="col-form-label" id="labelb">Photo : <span class="text-danger">*</span></label>
								<div  id="exe_photo"></div>

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
<div class="modal custom-modal fade" id="delete_ex" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
                    <h3>ব্যয়ের হিসাব বাতিল করুন</h3>
                    <p>আপনি কি ব্যয়ের হিসাব বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-expenseaccount')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_exId" name="d_ex">


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

<div id="show_exp" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title"> ব্যয়ের হিসাব  বিস্তারিত বিবরণ</h3>
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
								<div class="form-control "  id="expSHbrunch_id"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> শাখা নামঃ <span class="text-danger">*</span></label>
								<div class="form-control" id="expSHbrunch_name"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">তারিখ: <span class="text-danger">*</span></label>
								<div class="form-control" id="expSHdate"></div>

							</div>
						</div>



						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> রশিদ নং: <span class="text-danger">*</span></label>
								<div class="form-control" id="expSHreceipt_no"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">বর্ণনা: <span class="text-danger">*</span></label>
								<div class="form-control" id="expSHdescription"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">টাকার পরিমাণ: <span class="text-danger">*</span></label>
								<div class="form-control" id="expSHamount_money"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">মন্তব্য: <span class="text-danger">*</span></label>
								<div class="form-control" id="expSHcomment"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">ভাউচার ছবি : <span class="text-danger">*</span></label>
								<div  id="exSHe_photo"></div>

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
        $(document).on('click','#exDbtn',function(){
			var ex_id=$(this).val();
            // alert(member_id);
			$('#delete_ex').modal('show');
			$('#delete_exId').val(ex_id);
		});



		$(document).on('click','#expBtn',function(){
			//  alert("ok");

			 var ex_id=$(this).val();
			// alert(qu_id);
			 $('#edit_exp').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-expenseaccount/"+ex_id,
				success:function(response){
					// console.log(response.member.name);
					$('#excmbexId').val(ex_id);
					$('#exbrunchId').val(response.expenseaccount.brunch_id);
					$('#exbrunch_name').val(response.expenseaccount.brunch_name);




					$('#exdate').val(response.expenseaccount.date);

					$('#exreceipt_no').val(response.expenseaccount.receipt_no);
					$('#exdescription').val(response.expenseaccount.description);
					$('#examount_money').val(response.expenseaccount.amount_money);

					$('#excomment').val(response.expenseaccount.comment);
					$("#exe_photo").html(
                        `<img src="img/${response.expenseaccount.e_photo}" width="100" class="img-fluid img-thumbnail">`);

						$("#exe_photo").html(
                        `<a href="img/${response.expenseaccount.e_photo}" target="_blank" rel="noopener noreferrer"><img src="img/${response.expenseaccount.e_photo}" width="100" class="img-fluid img-thumbnail"></a>`);



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


        $(document).on('click','#expshBtn',function(){
			//  alert("ok");

			var expsh_id=$(this).val();
			// alert(invi_id);
			$('#show_exp').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-expenseaccount/"+expsh_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);
					$('#cmbincSHId').html(expsh_id);


					$('#expSHbrunch_id').html(response.sexpenseaccount.brunch_id);
					$('#expSHbrunch_name').html(response.sexpenseaccount.brunch_name);
					$('#expSHdate').html(response.sexpenseaccount.date);
					$('#expSHreceipt_no').html(response.sexpenseaccount.receipt_no);
					$('#expSHdescription').html(response.sexpenseaccount.description);
					$('#expSHamount_money').html(response.sexpenseaccount.amount_money);
					$('#expSHcomment').html(response.sexpenseaccount.comment);


						$("#exSHe_photo").html(
                        `<a href="img/${response.sexpenseaccount.e_photo}" target="_blank" rel="noopener noreferrer"><img src="img/${response.sexpenseaccount.e_photo}" width="100" class="img-fluid img-thumbnail"></a>`);

				}
			});
		});
	});
</script>
@endsection





