@extends('layout.erp.home')
@section('page')

<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">ফাজলে আহমাদী দাওয়াতের তালিকাঃ</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">ফাজলে আহমাদী </li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i> ফজলে আহমদী সংযোজন</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- fazleahmadi Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>ফাজলে আহমাদীর পরিমান</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>ফজলে আহমদী সংযোজন </h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>ফজলে আহমদী </h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>ফজলে আহমদী বাতিল</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /fazleahmadi Center Statistics -->
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
                                    {{-- <th scope="col">শাখার নাম</th> --}}
                                    <th scope="col">গ্রাহকের  আইডি</th>

                                    <th scope="col">গ্রাহকের ক্যাটাগরি</th>
                                    <th scope="col">শাখা নং</th>

                                    <th scope="col">পদবী</th>

                                    <th scope="col">মোবাইল নাম্বার</th>
                                    <th scope="col">তারিখ</th>
                                    <th scope="col">শুরুর সংখ্যা </th>
                                    <th scope="col">শেষ সংখ্যা </th>
                                    <th scope="col">গৃহীত টাকা</th>
                                    {{-- <th scope="col"> প্রদান কৃত রশিদ নং </th>
                                    <th scope="col"> প্রদান কৃত সংখ্যা</th> --}}


							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($fazleahmadis as $key=> $fazleahmadi)



						<tr>
							<td>{{++$key}}</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="" class="avatar"><img src="{{asset('img')}}/{{$fazleahmadi->m_photo}}" /></a>
                                    <a href="" >( {{$fazleahmadi->member_id}} ) {{$fazleahmadi->member_name}}</a>

                                </h2>
                            </td>
							{{-- <td></td> --}}
							<td>{{$fazleahmadi->member_category}}</td>

                            <td>( {{$fazleahmadi->brunch_id}} ) {{$fazleahmadi->brunch_name}}</td>
							<td>{{$fazleahmadi->designation}}</td>
							<td>{{$fazleahmadi->phone}}</td>


							<td>{{$fazleahmadi->date}}</td>
							<td>{{$fazleahmadi->edition_no_from}}</td>

							<td>{{$fazleahmadi->edition_no_to}}</td>
							<td>{{$fazleahmadi->received_amount}}</td>


							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-fazanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">





										<button type="button" value="{{$fazleahmadi->id}}" class="btn btn-success" id="fazshBtn" ><i class="bi bi-eye-fill" ></i> </button>

										<button type="button" value="{{$fazleahmadi->id}}" class="btn btn-primary" id="fazBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$fazleahmadi->id}}" class="btn btn-warning" id="fazDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>
						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$fazleahmadis->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add fazleahmadi Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> ফজলে আহমদী সংযোজন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('fazleahmadis.store')}}" method="post" enctype="multipart/form-data">
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
								<label class="col-form-label">তারিখ : <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="" name="txtDate" placeholder="তারিখ " required>
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রাহকের প্রকার: <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="" name="txtMember_category" placeholder="Enter " > --}}
                                <select id="cmbmcategory" class="form-control" name="txtMember_category" required>
									<option selected>Choose...</option>

									@foreach ($m_categorys as $m_category)
									<option value="{{ $m_category->id }}"> {{ $m_category->c_name }}</option>
									@endforeach
									</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রাহকের  আইডি: <span class="text-danger">*</span></label>
								<select id="cmbRname" class="form-control" name="cmbMemberId" required>
									{{-- <option selected>Choose...</option>

									@foreach ($members as $member)
									<option value="{{ $member->id }}">{{ $member->id }} | {{ $member->m_name }}</option>
									@endforeach --}}
									</select>
							</div>
						</div>	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রাহকের নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtfMember_name" name="txtMember_name" placeholder="গ্রাহকের নাম " required>
							</div>
						</div>

                        	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">মোবাইল নাম্বার: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="ootxtPhone" name="txtPhone" placeholder="মোবাইল নাম্বার " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">পদবী : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtDesignation" placeholder="পদবী " >
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শুরুর সংখ্যা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtEdition_no_from" placeholder="শুরুর সংখ্যা " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শেষ সংখ্যা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtEdition_no_to" placeholder="শেষ সংখ্যা " required>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গৃহীত টাকা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtReceived_amount" placeholder="গৃহীত টাকা " >
							</div>
						</div>	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">প্রদান কৃত রশিদ নং: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtMoney_receipt_no" placeholder="প্রদান কৃত রশিদ নং " >
							</div>
						</div>	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">প্রদান কৃত সংখ্যা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="" name="txtEdition_delivery" placeholder="প্রদান কৃত সংখ্যা " >
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
<!-- /Add fazleahmadi Center Modal -->

<!-- Edit fazleahmadi Center Modal -->
<div id="edit_faz" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> ফজলে আহমদী সংশোধন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('fazleahmadi-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>
								<input type="hidden" class="form-control" id="cmbfazId" name="cmbfazId" placeholder="Enter " required>

								<select id="fazbrunch_id" class="form-control" name="cmbBrunchId" required>
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
								<input type="text" class="form-control" id="fazbrunch_name" name="txtBrunch_name" placeholder="Enter " >
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">তারিখ : <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="fazdate" name="txtDate" placeholder="Enter " required>
							</div>
						</div>

                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রাহকের প্রকার: <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="" name="txtMember_category" placeholder="Enter " > --}}
                                <select id="fazmember_category" class="form-control" name="txtMember_category" required>
									<option selected>Choose...</option>

									@foreach ($m_categorys as $m_category)
									<option value="{{ $m_category->id }}"> {{ $m_category->c_name }}</option>
									@endforeach
									</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রাহকের  আইডি: <span class="text-danger">*</span></label>
								<select id="fazmember_id" class="form-control" name="cmbMemberId" required>
									<option selected>Choose...</option>

									@foreach ($members as $member)
									<option value="{{ $member->id }}">{{ $member->id }} | {{ $member->m_name }}</option>
									@endforeach
									</select>
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">গ্রাহকের নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="fazmember_name" name="txtMember_name" placeholder="Enter " required>
							</div>
						</div>
                        	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">মোবাইল নাম্বার: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="fazphone" name="txtPhone" placeholder="পদবী " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">পদবী : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="fazdesignation" name="txtDesignation" placeholder="Enter " >
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শুরুর সংখ্যা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="fazedition_no_from" name="txtEdition_no_from" placeholder="Enter " required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">শেষ সংখ্যা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="fazedition_no_to" name="txtEdition_no_to" placeholder="Enter " required>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label"> গৃহীত টাকা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="fazreceived_amount" name="txtReceived_amount" placeholder="Enter " >
							</div>
						</div>	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">প্রদান কৃত রশিদ নং: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="fazmoney_receipt_no" name="txtMoney_receipt_no" placeholder="Enter " >
							</div>
						</div>	<div class="col-sm-6">
							<div class="form-group">
								<label class="col-form-label">প্রদান কৃত সংখ্যা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="fazedition_delivery" name="txtEdition_delivery" placeholder="Enter " >
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
<!-- /Edit fazleahmadi Center Modal -->

<!-- Delete fazleahmadi Center Modal -->
<div class="modal custom-modal fade" id="delete_faz" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
                    <h3> ফজলে আহমদী বাতিল করুন</h3>
                    <p>আপনি কি  ফজলে আহমদী বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-fazleahmadi')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_fazId" name="d_faz">


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
<!-- /Delete fazleahmadi Center Modal -->


<!-- show padcollection Center Modal -->

<div id="show_faz" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title"> ফজলে আহমদী বিস্তারিত বিবরণ</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: rgb(4, 21, 34)">

				<form action="">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">Brunch Code / শাখা নং: <span class="text-danger">*</span></label>
								<div class="form-control "  id="fazSHbrunch_id"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">শাখার নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="fazSHbrunch_name"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">তারিখ : <span class="text-danger">*</span></label>
								<div class="form-control" id="fazSHdate"></div>

							</div>
						</div>

                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> গ্রাহকের প্রকার: <span class="text-danger">*</span></label>
								<div class="form-control" id="fazSHmember_category"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">গ্রাহকের  আইডি : <span class="text-danger">*</span></label>
								<div class="form-control" id="fazSHmember_id"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">গ্রাহকের নাম: <span class="text-danger">*</span></label>
								<div class="form-control" id="fazSHmember_name"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> মোবাইল নাম্বার: <span class="text-danger">*</span></label>
								<div class="form-control" id="fazSHphone"></div>

							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">পদবী: <span class="text-danger">*</span></label>
								<div class="form-control" id="fazSHdesignation"></div>

							</div>
						</div>

                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">শুরুর সংখ্যা : <span class="text-danger">*</span></label>
								<div class="form-control" id="fazSHedition_no_to"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">শেষ সংখ্যা : <span class="text-danger">*</span></label>
								<div class="form-control" id="fazSHedition_no_from"></div>

							</div>
						</div>


						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">গৃহীত টাকা : <span class="text-danger">*</span></label>
								<div class="form-control" id="fazSHreceived_amount"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">প্রদান কৃত রশিদ নং : <span class="text-danger">*</span></label>
								<div class="form-control" id="fazSHmoney_receipt_no"></div>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">প্রদান কৃত সংখ্যা : <span class="text-danger">*</span></label>
								<div class="form-control" id="fazSHedition_delivery"></div>

							</div>
						</div>
						{{-- <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb">comment: <span class="text-danger">*</span></label>
								<div class="form-control" id="fazSHcomment"></div>

							</div>
						</div> --}}

					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!-- /show loan Center Modal -->

<script>
    // glolab data receved
    var filteredMember = [];

	$(document).ready(function(){
        $(document).on('click','#fazDbtn',function(){
			var faz_id=$(this).val();
            // alert(member_id);
			$('#delete_faz').modal('show');
			$('#delete_fazId').val(faz_id);
		});



		$(document).on('click','#fazBtn',function(){
			//  alert("ok");

			var faz_id=$(this).val();
			// alert(invi_id);
			$('#edit_faz').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-fazleahmadi/"+faz_id,
				success:function(response){
					// console.log(response.fazleahmadi.brunch_name);
					$('#cmbfazId').val(faz_id);
					$('#fazmember_id').val(response.fazleahmadi.member_id);


					$('#fazmember_name').val(response.fazleahmadi.member_name);
					$('#fazphone').val(response.fazleahmadi.phone);
					$('#fazbrunch_id').val(response.fazleahmadi.brunch_id);
					$('#fazbrunch_name').val(response.fazleahmadi.brunch_name);
					$('#fazmember_category').val(response.fazleahmadi.member_category);
					$('#fazdesignation').val(response.fazleahmadi.designation);
					$('#fazdate').val(response.fazleahmadi.date);
					$('#fazedition_no_to').val(response.fazleahmadi.edition_no_to);
					$('#fazedition_no_from').val(response.fazleahmadi.edition_no_from);
					$('#fazreceived_amount').val(response.fazleahmadi.received_amount);
					$('#fazmoney_receipt_no').val(response.fazleahmadi.money_receipt_no);
					$('#fazedition_delivery').val(response.fazleahmadi.edition_delivery);



				}
			});
		});

		$('#fazbrunch_id').on('change', function () {
			var idCountry = this.value;
			$("#txtCountry").html('');
			$.ajax({
				url: "{{url('api/fetch-country')}}",
				type: "POST",
				data: {
					work_p_id: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
					$('#txtCountry').html('<option value="">Select Country</option>');
					$.each(result.countries, function (key, value) {
						$("#txtCountry").append('<option value="' + value
							.id + '">' + value.name + '</option>');
					});
					 $('#txtCity').html('<option value="">Select City</option>');
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

		$(document).on('click','#fazshBtn',function(){
			//  alert("ok");

			var fazsh_id=$(this).val();
			// alert(invi_id);
			$('#show_faz').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-fazleahmadi/"+fazsh_id,
				success:function(response){
					// console.log(response.padcollection.brunch_name);
					$('#cmbincSHId').html(fazsh_id);


					$('#fazSHbrunch_id').html(response.sfazleahmadi.brunch_id);
					$('#fazSHbrunch_name').html(response.sfazleahmadi.brunch_name);
					$('#fazSHmember_id').html(response.sfazleahmadi.member_id);
					$('#fazSHmember_name').html(response.sfazleahmadi.member_name);
					$('#fazSHphone').html(response.sfazleahmadi.phone);
					$('#fazSHmember_category').html(response.sfazleahmadi.member_category);
					$('#fazSHdesignation').html(response.sfazleahmadi.designation);
					$('#fazSHdate').html(response.sfazleahmadi.date);
					$('#fazSHedition_no_to').html(response.sfazleahmadi.edition_no_to);
					$('#fazSHedition_no_from').html(response.sfazleahmadi.edition_no_from);
					$('#fazSHreceived_amount').html(response.sfazleahmadi.received_amount);
					$('#fazSHmoney_receipt_no').html(response.sfazleahmadi.money_receipt_no);
					$('#fazSHedition_delivery').html(response.sfazleahmadi.edition_delivery);




				}
			});
		});

// ////////////////////////////////////////////// member category
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


        //-------------------data up in to phone and name
        $('#cmbRname').on('change', function(){
            // console.log($('#cmbRname').val());
            var selectedVal = $('#cmbRname').val();
            for(var i=0;i<filteredMember.length;i++){
                var selectedId = filteredMember[i].id;
                // console.log(selectedId);
                if(selectedVal == selectedId){
                    $("#ootxtPhone").val(filteredMember[i].m_phone);
                    $("#txtfMember_name").val(filteredMember[i].m_name);


                }

            }
        });
	});
</script>
@endsection


