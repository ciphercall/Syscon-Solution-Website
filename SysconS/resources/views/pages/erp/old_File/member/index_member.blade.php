@extends('layout.erp.home')
@section('page')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">তরিক্বত পন্থী</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">ড্যাশবোর্ড</a></li>
					<li class="breadcrumb-item active">তরিক্বত পন্থী</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> তরিক্বত পন্থী সংযোজন</a>
				<div class="view-icons">
					<a href="employees.html" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>

					<a href="{{url('all/employee/card')}}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>

				</div>
			</div>
		</div>
	</div>
	<!-- /Page Header -->
	@if (session('success'))
		<div class="alert alert-success"><b>{{session('success')}}</b> </div>
	@endif
	<!-- Search Filter -->
	  <div class="row filter-row">
		<div class="col-sm-6 col-md-3">
			<div class="form-group form-focus">
				<input type="text" class="form-control floating">
				<label class="focus-label"> তরিক্বত পন্থী নং</label>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="form-group form-focus">
				<input type="text" class="form-control floating">
				<label class="focus-label">তরিক্বত পন্থী নাম</label>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="form-group form-focus select-focus">
				<select class="select floating">
					<option>Demo</option>

				</select>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<a href="#" class="btn btn-success btn-block"> খোঁজা </a>
		</div>
	</div>
	<!-- Search Filter -->

	   <div class="row staff-grid-row">
		@foreach ($members as $member)
		<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
			<div class="profile-widget">
				<div class="profile-img">
					<a href="{{route('members.show',$member->id)}}" class="avatar"><img src="img/{{$member->m_photo}}" height="80px" width="85px"/></a>
				</div>
				<div class="dropdown profile-action">
					<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
					<div class="dropdown-menu dropdown-menu-right">

					<button type="button" value="{{$member->id}}" class="dropdown-item" id="editmember" ><i class="fa fa-pencil m-r-5" ></i> Edit</button>


					<button type="button" value="{{$member->id}}" class="dropdown-item" id="deletebtn" ><i class="fa fa-trash-o m-r-5"></i> Delete</button>


					</div>
				</div>
				<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">{{$member->m_name}}</a></h4>
				<div class=" "><span class="badge bg-inverse-success">{{$member->name}}</span></div>
                <div class="small text-muted">{{$member->occupation}}</div>
			</div>
		</div>



		@endforeach

	</div>
</div>
<!-- /Page Contnt -->


	<!-- Delete Employee Modal -->
	<div class="modal custom-modal fade" id="deletemember" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<h3> তরিক্বত পন্থী বাতিল</h3>
						<p>আপনি কি তরিক্বত পন্থী বাতিল করতে চান ?</p>
					</div>
					<div class="modal-btn delete-action">
						<div class="row">
							<div class="col-6">
								<form action="{{url('delete-member')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_memberId" name="d_member">


									<button type="submit" class="btn btn-primary continue-btn">
									Yes Delete
									</button>



							</div>
							<div class="col-6">
								<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
							</div>

						</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- /Delete Employee Modal -->

<!-- Add Employee Modal -->
<div id="add_employee" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title">তরিক্বত পন্থী সংযোজন </h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{{-- add employee--}}
			<div class="modal-body"  style="background-color: teal">
                <form name="ajax-contact-form" id="ajax-contact-form" method="post" action="javascript:void(0)">
                    @csrf
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> নাম : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtName" name="txtName" placeholder="নাম" required>
							</div>
						</div>

                        <div class="col-sm-2">
							<div class="form-group">
								<label class="col-form-label"> ফোন কোড:</label>
								<select id="cmbm_phone_code" class="form-control" name="cmbm_phone_code" >
									<option selected>Choose...</option>
									@foreach ($phcodes as $phc)
									<option value="{{ $phc->id }}">( {{ $phc->iso3 }} ) {{ $phc->phonecode }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<label class="col-form-label"> ফোন :</label>
								<input type="number" class="form-control" id="txtPhone" name="txtPhone" placeholder="ফোন" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">ইমেইল : </label>
								<input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="ইমেইল" >
							</div>
						</div><div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> জন্ম তারিখ : </label>
								<input type="date" class="form-control" id="txtDate_birth" name="txtDate_birth"  placeholder=" জন্ম তারিখ">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">পিতার নাম : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtFather" name="txtFather" placeholder="পিতার নাম" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> মাতার নাম:</label>
								<input type="text" class="form-control" id="txtMother" name="txtMother" placeholder="মাতার নাম" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">পরিবারে তরিক্বত পন্থী সদস্য : <span class="text-danger">*</span></label>
								<input type="number" class="form-control" id="txtFamily_member" name="txtFamily_member" placeholder="পরিবারে তরিক্বত পন্থী সদস্য" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">রক্তের গ্রুপ:</label>
								<select id="txtBlood_group" class="form-control" name="txtBlood_group" >
									<option selected>Choose...</option>
									<option value="A+">A+</option>
									<option value="A-">A-</option>
									<option value="B+">B+</option>
									<option value="B-">B-</option>
									<option value="O+">O+</option>
									<option value="O-">O-</option>
									<option value="AB+">AB+</option>
									<option value="AB-">AB-</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> লিঙ্গ: <span class="text-danger">*</span></label>
								<select id="txtGender" class="form-control" name="txtGender" required>
									<option selected>Choose...</option>
									<option value="Male">পুরুষ</option>
									<option value="Female">মহিলা</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শিক্ষার ধরন: <span class="text-danger">*</span></label>
								<select id="txtEduction_type" class="form-control" name="txtEduction_type" required>
									<option selected>Choose...</option>
									<option value="general">জেনারেল</option>
									<option value="madrasa">মাদ্রাসা</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">শিক্ষাগত যোগ্যতা:</label>
								<input type="text" class="form-control" id="txtEducation_skill" name="txtEducation_skill" placeholder="শিক্ষাগত যোগ্যতা" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> পেশা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtOccupation" name="txtOccupation" placeholder="পেশা" required>
							</div>
						</div>
                        <div class="col-sm-12">
							<div class="form-group">
								<label class="col-form-label"><h2> বর্তমান ঠিকানা:</h2> </label>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> কর্মস্থল: <span class="text-danger">*</span></label>
								<select id="txtWorkplace" class="form-control " name="txtWorkplace" required>
									<option selected>Choose...</option>
									@foreach ($workplaces as $wp)
									<option value="{{ $wp->id }}">{{ $wp->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> দেশের নাম:</label>
								<select id="txtCountry" class="form-control " name="txtCountry" required>
									{{-- <option selected>Choose...</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="usa">USA</option>
									<option value="soudi arob">Soudi Arob</option> --}}
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> বিভাগ নাম:</label>
								<select id="txtdivision" class="form-control " name="txtdivision" required>
									{{-- <option selected>Choose...</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="usa">USA</option>
									<option value="soudi arob">Soudi Arob</option> --}}
								</select>
							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> জেলার নাম:</label>
								<select id="txtdistrict" class="form-control " name="txtdistrict" required>
									{{-- <option selected>Choose...</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="usa">USA</option>
									<option value="soudi arob">Soudi Arob</option> --}}
								</select>
							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> থানা/উপজেলার নাম:</label>
								<select id="txtupazila" class="form-control " name="txtupazila" required>
									{{-- <option selected>Choose...</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="usa">USA</option>
									<option value="soudi arob">Soudi Arob</option> --}}
								</select>
							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">  ইউনিয়নের নাম:</label>
								<select id="txtunion" class="form-control " name="txtunion" required>
									{{-- <option selected>Choose...</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="usa">USA</option>
									<option value="soudi arob">Soudi Arob</option> --}}
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">বর্তমান ঠিকানা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtPresentadd" name="txtPresentadd" placeholder="বর্তমান ঠিকানা" required>
							</div>
						</div>
                        <div class="col-sm-12">
							<div class="form-group">
								<label class="col-form-label"><h2> স্থায়ী ঠিকানা:</h2>  </label>

							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> কর্মস্থল: <span class="text-danger">*</span></label>
								<select id="txtpar_Workplace" class="form-control" name="txtpar_Workplace" required>
									<option selected>Choose...</option>
									@foreach ($workplaces as $wp)
									<option value="{{ $wp->id }}">{{ $wp->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> দেশের নাম:</label>
								<select id="txtpar_Country" class="form-control" name="txtpar_Country" required>
									{{-- <option selected>Choose...</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="usa">USA</option>
									<option value="soudi arob">Soudi Arob</option> --}}
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> বিভাগ নাম:</label>
								<select id="txtpar_division" class="form-control" name="txtpar_division" required>
									{{-- <option selected>Choose...</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="usa">USA</option>
									<option value="soudi arob">Soudi Arob</option> --}}
								</select>
							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> জেলার নাম:</label>
								<select id="txtpar_district" class="form-control" name="txtpar_district" required>
									{{-- <option selected>Choose...</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="usa">USA</option>
									<option value="soudi arob">Soudi Arob</option> --}}
								</select>
							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> থানা/উপজেলার নাম:</label>
								<select id="txtpar_upazila" class="form-control" name="txtpar_upazila" required>
									{{-- <option selected>Choose...</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="usa">USA</option>
									<option value="soudi arob">Soudi Arob</option> --}}
								</select>
							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">  ইউনিয়নের নাম:</label>
								<select id="txtpar_union" class="form-control" name="txtpar_union" required>
									{{-- <option selected>Choose...</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="usa">USA</option>
									<option value="soudi arob">Soudi Arob</option> --}}
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">স্থায়ী ঠিকানা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtParmanentadd" name="txtParmanentadd" placeholder="স্থায়ী ঠিকানা" required>
							</div>
						</div><br>
                        <div class="col-sm-12">
							<div class="form-group">


							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">কর্ম স্থলের ঠিকানা:</label>
								<input type="text" class="form-control" id="txtWorkplace_address" name="txtWorkplace_address" placeholder="কর্ম স্থলের ঠিকানা" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> বৈবাহিক অবস্থা: <span class="text-danger">*</span></label>
								<select id="txtRelationship" class="form-control" name="txtRelationship" required>
									<option selected>Choose...</option>
									<option value="Married">Married</option>
									<option value="Unmarried">Unmarried</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">এনআইডি নম্বর: <span class="text-danger">*</span></label>
								<input type="number" class="form-control" id="txtNid" name="txtNid" placeholder="এনআইডি নম্বর" required>
							</div>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">দান বাক্স নম্বর:</label>
								<input type="number" class="form-control" id="cmbDonation_boxId" name="cmbDonation_boxId" required placeholder="দান বাক্স নম্বর">
							</div>
						</div>


						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">তরিক্বত গ্রহণের তারিখ: <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="txtTorikot_date" name="txtTorikot_date" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শেষ ছবক: <span class="text-danger">*</span></label>
								<select id="txtSobok_type" class="form-control" name="txtSobok_type" required>
									<option selected>Choose...</option>
									@foreach ($soboks as $sobok)
									<option value="{{ $sobok->id }}">{{ $sobok->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">শেষ ছবক গ্রহণের তারিখ:</label>
								<input type="date" class="form-control" id="txtBaiyat_date" name="txtBaiyat_date" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>
								{{-- <input type="number" class="form-control" id="cmbBrunchId" name="cmbBrunchId" required> --}}
								<select id="cmbBrunchId" class="form-control" name="cmbBrunchId" required>
								<option selected>Choose...</option>

								@foreach ($brunchs as $brunch)
								<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} | {{ $brunch->brunch_name }}</option>
								@endforeach
								</select>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="ooBrunch_name" name="txtBrunch_name" required placeholder="শাখার নাম">
							</div>
						</div>


                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> পদবি : <span class="text-danger">*</span></label>
								<select id="txtDesignation" class="form-control" name="txtDesignation" required>
									<option selected>Choose...</option>
									@foreach ($designations as $designation)
									<option value="{{ $designation->id }}">{{ $designation->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> ছবি: <span class="text-danger">*</span></label>
								<input type="file" name="filePhoto" class="form-control" placeholder="image">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<img src="{{ URL::to('/assets/photo/av.jpg') }}" alt="" sizes="" srcset="">
								{{-- <label class="col-form-label">Image / ছবি: <span class="text-danger">*</span></label>
								<input type="file" name="filePhoto" class="form-control" placeholder="image"> --}}
							</div>
						</div>

					</div>
					{{-- <div class="table-responsive m-t-15">
						<table class="table table-striped custom-table">
							<thead>
								<tr>
									<th>Module Permission</th>
									<th class="text-center">Read</th>
									<th class="text-center">Write</th>
									<th class="text-center">Create</th>
									<th class="text-center">Delete</th>
									<th class="text-center">Import</th>
									<th class="text-center">Export</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Holidays</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
								</tr>
								<tr>
									<td>Leaves</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
								</tr>
								<tr>
									<td>Clients</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
								</tr>
								<tr>
									<td>Projects</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
								</tr>
								<tr>
									<td>Tasks</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
								</tr>
								<tr>
									<td>Chats</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
								</tr>
								<tr>
									<td>Assets</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
								</tr>
								<tr>
									<td>Timing Sheets</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input checked="" type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
									<td class="text-center">
										<input type="checkbox">
									</td>
								</tr>
							</tbody>
						</table>
					</div> --}}
					<div class="submit-section">
						<input class="btn btn-primary submit-btn" type="submit"  name="btnCreate" value="Submit">

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add  Modal -->






<script>
	$(document).ready(function () {
		$('#txtWorkplace').on('change', function () {
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
					 $('#txtdivision').html('<option value="">Select Division</option>');
				}
			});
		});
		$('#txtCountry').on('change', function () {
			var idState = this.value;
			$("#txtdivision").html('');
			$.ajax({
				url: "{{url('api/fetch-cities')}}",
				type: "POST",
				data: {
					country_id: idState,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#txtdivision').html('<option value="">Select Division</option>');
					$.each(res.cities, function (key, value) {
						$("#txtdivision").append('<option value="' + value
							.id + '">' + value.bn_name + '</option>');
					});

                    $('#txtdistrict').html('<option value="">Select Division</option>');
				}
			});
		});


        $('#txtdivision').on('change', function () {
			var iddivision = this.value;
			$("#txtdistrict").html('');
			$.ajax({
				url: "{{url('api/fetch-district')}}",
				type: "POST",
				data: {
					division_id: iddivision,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#txtdistrict').html('<option value="">Select Division</option>');
					$.each(res.districts, function (key, value) {
						$("#txtdistrict").append('<option value="' + value
							.id + '">' + value.bn_name + '</option>');
					});

                    $('#txtupazila').html('<option value="">Select Division</option>');
				}
			});
		});


        $('#txtdistrict').on('change', function () {
			var districtid = this.value;
			$("#txtupazila").html('');
			$.ajax({
				url: "{{url('api/fetch-upazilas')}}",
				type: "POST",
				data: {
					district_id: districtid,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#txtupazila').html('<option value="">Select upazila</option>');
					$.each(res.Upazilas, function (key, value) {
						$("#txtupazila").append('<option value="' + value
							.id + '">' + value.bn_name + '</option>');
					});

                    $('#txtunion').html('<option value="">Select Union</option>');
				}
			});
		});

        $('#txtupazila').on('change', function () {
			var upazillaid = this.value;
			$("#txtunion").html('');
			$.ajax({
				url: "{{url('api/fetch-unions')}}",
				type: "POST",
				data: {
					upazilla_id: upazillaid,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#txtunion').html('<option value="">Select Union</option>');
					$.each(res.Unions, function (key, value) {
						$("#txtunion").append('<option value="' + value
							.id + '">' + value.bn_name + '</option>');
					});


				}
			});
		});

// ////////////////////////////////////prasent address
        $('#txtpar_Workplace').on('change', function () {
			var idCountry = this.value;
			$("#txtpar_Country").html('');
			$.ajax({
				url: "{{url('api/fetch-country')}}",
				type: "POST",
				data: {
					work_p_id: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
					$('#txtpar_Country').html('<option value="">Select Country</option>');
					$.each(result.countries, function (key, value) {
						$("#txtpar_Country").append('<option value="' + value
							.id + '">' + value.name + '</option>');
					});
					 $('#txtpar_division').html('<option value="">Select Division</option>');
				}
			});
		});
		$('#txtpar_Country').on('change', function () {
			var idState = this.value;
			$("#txtpar_division").html('');
			$.ajax({
				url: "{{url('api/fetch-cities')}}",
				type: "POST",
				data: {
					country_id: idState,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#txtpar_division').html('<option value="">Select Division</option>');
					$.each(res.cities, function (key, value) {
						$("#txtpar_division").append('<option value="' + value
							.id + '">' + value.bn_name + '</option>');
					});

                    $('#txtpar_district').html('<option value="">Select Division</option>');
				}
			});
		});


        $('#txtpar_division').on('change', function () {
			var iddivision = this.value;
			$("#txtpar_district").html('');
			$.ajax({
				url: "{{url('api/fetch-district')}}",
				type: "POST",
				data: {
					division_id: iddivision,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#txtpar_district').html('<option value="">Select Division</option>');
					$.each(res.districts, function (key, value) {
						$("#txtpar_district").append('<option value="' + value
							.id + '">' + value.bn_name + '</option>');
					});

                    $('#txtpar_upazila').html('<option value="">Select Division</option>');
				}
			});
		});


        $('#txtpar_district').on('change', function () {
			var districtid = this.value;
			$("#txtpar_upazila").html('');
			$.ajax({
				url: "{{url('api/fetch-upazilas')}}",
				type: "POST",
				data: {
					district_id: districtid,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#txtpar_upazila').html('<option value="">Select upazila</option>');
					$.each(res.Upazilas, function (key, value) {
						$("#txtpar_upazila").append('<option value="' + value
							.id + '">' + value.bn_name + '</option>');
					});

                    $('#txtpar_union').html('<option value="">Select Union</option>');
				}
			});
		});

        $('#txtpar_upazila').on('change', function () {
			var upazillaid = this.value;
			$("#txtpar_union").html('');
			$.ajax({
				url: "{{url('api/fetch-unions')}}",
				type: "POST",
				data: {
					upazilla_id: upazillaid,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#txtpar_union').html('<option value="">Select Union</option>');
					$.each(res.Unions, function (key, value) {
						$("#txtpar_union").append('<option value="' + value
							.id + '">' + value.bn_name + '</option>');
					});


				}
			});
		});


        // ////////////////////////

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


        // $.ajax({
        //      url:"http://country.io/phone.json",
        //      type:'GET',
        //      success:function(res){
        //         console.log("This is our test API: "+res);
        //      }
        //     });


	});
</script>
@include('pages.erp.member.edit_member')
{{-- @include('pages.erp.member.create_member') --}}

@endsection




