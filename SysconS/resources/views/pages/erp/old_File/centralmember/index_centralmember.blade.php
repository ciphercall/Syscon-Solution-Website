
@extends('layout.erp.home')
@section('page')
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h2 class="page-title">কেন্দ্রীয় সদস্যের তালিকা</h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">ড্যাশবোর্ড</a></li>
					<li class="breadcrumb-item active"> কেন্দ্রীয় সদস্য</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> সদস্য সংযোজন</a>
				<div class="view-icons">
					<a href="employees.html" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
					{{-- <a href="{{route('members')}}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a> --}}
					<a href="{{url('all/cmember')}}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>

				</div>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- Search Filter -->
	  <div class="row filter-row">
		<div class="col-sm-6 col-md-3">
			<div class="form-group form-focus">
				<input type="text" class="form-control floating">
				<label class="focus-label"> কেন্দ্রীয় সদস্য নং</label>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="form-group form-focus">
				<input type="text" class="form-control floating">
				<label class="focus-label"> কেন্দ্রীয় সদস্য নাম</label>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="form-group form-focus select-focus">
				<select class="select floating">
					<option>#</option>

				</select>
				<label class="focus-label">Designation</label>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<a href="#" class="btn btn-success btn-block"> Search </a>
		</div>
	</div>
	<!-- Search Filter -->
	@if (session('success'))
	<div class="alert alert-success"><b>{{session('success')}}</b> </div>
@endif

	   <div class="row staff-grid-row">
		@foreach ($cmembers as $cmember)
		<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
			<div class="profile-widget">
				<div class="profile-img">
					<a href="{{route('centralmembers.show',$cmember->id)}}" class="avatar"><img src="img/{{$cmember->m_photo}}" height="80px" width="85px"/></a>
				</div>
				<div class="dropdown profile-action">
					<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
					<div class="dropdown-menu dropdown-menu-right">

						<a href="{{route('centralmembers.show',$cmember->id)}}"><button type="button" value="{{$cmember->id}}" class="btn btn-success" id="padcshBtn" ><i class="bi bi-eye-fill"></i> </button></a>

						<button type="button" value="{{$cmember->id}}" class="btn btn-primary" id="cmemBtn" ><i class="bi bi-pencil-square" ></i> </button>

						<button type="button" value="{{$cmember->id}}" class="btn btn-warning" id="cmemDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>
					</div>
				</div>
				<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">{{$cmember->m_name}}</a></h4>
				<div class=" "><span class="badge bg-inverse-success">{{$cmember->name}}</span></div>



				<div class="small text-muted">{{$cmember->occupation}}</div>

			</div>
		</div>
		<!-- Delete Employee Modal -->
			<div class="modal custom-modal fade" id="delete_employee" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<<h3>কেন্দ্রীয় তরিক্বত পন্থী বাতিল করন</h3>
                                <p>আপনি কি কেন্দ্রীয় তরিক্বত পন্থী বাতিল করতে চান ?</p>
							</div>
							<div class="modal-btn delete-action">
								<div class="row">
									<div class="col-6">
										<form action="{{route('members.destroy',$cmember->id)}}" method="post" >
											@csrf
											@method("DELETE")
											<input class="btn btn-primary continue-btn" type="submit" name="btnDelete" class="btnDelete" data-id="{{$cmember->id}}"  value="Delete" />
										</form>

										{{-- <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a> --}}
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
		<!-- /Delete Employee Modal -->
		@endforeach

	</div>
</div>
<!-- /Page Content -->

<!-- Add Employee Modal -->
<div id="add_employee" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"> কেন্দ্রীয় তরিক্বত পন্থী সংযোজন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{{-- add employee--}}
			<div class="modal-body" style="background-color: rgb(4, 102, 102)">
				<form action="{{route('centralmembers.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">নাম : <span class="text-danger">*</span></label>
								{{-- <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Enter Full Name" required> --}}



								<select id="txtName" class="form-control" name="txtName" required>
									<option selected>Choose...</option>
									@foreach ($members as $name)
									<option value="{{ $name->id }}">{{ $name->m_name }}</option>
								@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-4">
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
								<label class="col-form-label">জন্ম তারিখ :</label>
								<input type="date" class="form-control" id="txtDate_birth" name="txtDate_birth" >
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">পিতার নাম :</label>
								<input type="text" class="form-control" id="txtFather" name="txtFather" placeholder="পিতার নাম" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">মাতার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtMother" name="txtMother" placeholder="মাতার নাম" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">তরিক্বপন্থী সদস্য: <span class="text-danger">*</span></label>
								<input type="number" class="form-control" id="txtFamily_member" name="txtFamily_member" placeholder="পরিবারে তরিক্বত পন্থী সদস্য" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">রক্তের গ্রুপ:</label>
								<select id="txtBlood_group" class="form-control" name="txtBlood_group" required>
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
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">কর্মস্থল: <span class="text-danger">*</span></label>
								<select id="txtWorkplace" class="form-control" name="txtWorkplace" required>
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
								<select id="txtCountry" class="form-control" name="txtCountry" required>
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
								<select id="txtdivision" class="form-control" name="txtdivision" required>
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
								<select id="txtdistrict" class="form-control" name="txtdistrict" required>
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
								<select id="txtupazila" class="form-control" name="txtupazila" required>
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
								<select id="txtunion" class="form-control" name="txtunion" required>
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
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">স্থায়ী ঠিকানা: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtParmanentadd" name="txtParmanentadd" placeholder="স্থায়ী ঠিকানা" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">কর্মস্থলের ঠিকানা:</label>
								<input type="text" class="form-control" id="txtWorkplace_address" name="txtWorkplace_address" placeholder="কর্মস্থলের ঠিকানা  " required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">বৈবাহিক অবস্থা: <span class="text-danger">*</span></label>
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
								<input type="number" class="form-control" id="cmbDonation_boxId" name="cmbDonation_boxId" placeholder="দান বাক্স নম্বর" required>
							</div>
						</div>


						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">তরিক্বত তারিখ: <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="txtTorikot_date" name="txtTorikot_date" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শেষ ছবক:</label>
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
								<label class="col-form-label"> শাখা নং: <span class="text-danger">*</span></label>
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
								<label class="col-form-label">শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="ooBrunch_name" name="txtBrunch_name" required placeholder="শাখার নাম">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">শেষ ছবক গ্রহনের তারিখ:</label>
								<input type="date" class="form-control" id="txtBaiyat_date" name="txtBaiyat_date" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">পদবি : <span class="text-danger">*</span></label>
								<select id="txtDesignation" class="form-control" name="txtDesignation" required>
									<option selected>Choose...</option>
									@foreach ($designations as $designation)
									<option value="{{ $designation->id }}">{{ $designation->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						{{-- <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> ছবি: <span class="text-danger">*</span></label>
								<input type="file" name="filePhoto" class="form-control" placeholder="image">
							</div>
						</div> --}}

                        <div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label" id="labelb"> ছবি : <span class="text-danger">*</span></label>

								<div  id="cSHi_photo"></div>



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
<!-- /Add Employee Modal -->

<!-- Edit padcollection Center Modal -->
{{-- <div id="edit_padc" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit padcollections</h5>
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
								<label class="col-form-label">Brunch NO / শাখা নং: <span class="text-danger">*</span></label>

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
								<label class="col-form-label">Brunch Name / শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="padcbrunch_name" name="txtBrunch_name" required>

							</div>
						</div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">Date: <span class="text-danger">*</span></label>
									<input type="date" class="form-control" id="padcdate" name="txtDate" placeholder="Enter Speakers Name" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">Page_no: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="padcpage_no" name="txtPage_no" placeholder="Occasion" required>
								</div>
							</div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">Pad Collection:</label>
									<input type="text" class="form-control" id="padcpad_collection" name="txtPad_collection" placeholder="Enter Duty Date" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">Provider: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="padcprovider" name="txtProvider" placeholder="Enter Provider" required>
								</div>
							</div>	<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">Comment: <span class="text-danger">*</span></label>
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
</div> --}}
<!-- /Edit padcollection Center Modal -->



<script>
	$(document).ready(function () {

  //Show c_member other information
  		$("#txtName").on("change",function(){
           $.ajax({
             url:"<?php echo url("getmembers")?>",
             type:'GET',
             data:{"id":$(this).val()},
             success:function(res){
              let member=JSON.parse(res);
                console.log(member);
            //    $("#customer-name").val(member.name);
               $("#txtPhone").val(member.m_phone);
               $("#txtEmail").val(member.m_email);
               $("#txtDate_birth").val(member.m_date_birth);
               $("#txtFather").val(member.father);
               $("#txtMother").val(member.mother);
               $("#txtFamily_member").val(member.family_member);

               $("#txtBlood_group").val(member.blood_group);
               $("#txtGender").val(member.gender);
			   $("#txtEduction_type").val(member.eduction_type);


               $("#txtEducation_skill").val(member.education_skill);
               $("#txtOccupation").val(member.occupation);

            //    $("#").val(member.workplace);

            //    $("#txtCountry").val(member.country);
            //    $("#txtCity").val(member.city);
               $("#txtPresentadd").val(member.presentadd);
               $("#txtParmanentadd").val(member.parmanentadd);
               $("#txtWorkplace_address").val(member.workplace_address);

               $("#txtRelationship").val(member.relationship);
               $("#txtNid").val(member.nid);
               $("#cmbDonation_boxId").val(member.donation_box_id);

               $("#txtTorikot_date").val(member.torikot_date);
               $("#txtSobok_type").val(member.sobok_type);
               $("#cmbBrunchId").val(member.brunch_id);
               $("#txtBrunch_name").val(member.brunch_name);
               $("#txtBaiyat_date").val(member.baiyat_date);
               $("#txtOccasion").val(member.occasion);
               $("#txtDuty").val(member.duty);
               $("#txtDesignation").val(member.designation);
               $("#cSHi_photo").html(
                        `<a href="img/${member.m_photo}" target="_blank" rel="noopener noreferrer"><img src="img/${member.m_photo}" width="100" class="img-fluid img-thumbnail"></a>`);
            //    $("#").val(member.);






             }
           });
        });

// ////////////////////country dis union
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
///////////////////////////////////
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
	});
</script>

@include('pages.erp.centralmember.edit_centralmember')

@endsection



