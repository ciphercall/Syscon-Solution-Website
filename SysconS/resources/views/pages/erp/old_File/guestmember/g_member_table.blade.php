@extends('layout.erp.home')
@section('page')

<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title"> মেহমানের তালিকা</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">  মেহমান  </li>
                </ul>
            </div>
            <div class="col-auto float-right ml-auto">
                <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> মেহমান  সংযোজন</a>
                <div class="view-icons">
                    <a href="{{url('/guestmembers')}}" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                    <a href="#" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
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
                <label class="focus-label">মেহমান নং</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <input type="text" class="form-control floating">
                <label class="focus-label">মেহমানের নাম</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus select-focus">
                <select class="select floating">
                    <option>Select Designation</option>
                    <option>Web Developer</option>
                    <option>Web Designer</option>
                    <option>Android Developer</option>
                    <option>Ios Developer</option>
                </select>
                <label class="focus-label">Designation</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#" class="btn btn-success btn-block"> Search </a>
        </div>
    </div>
    <!-- /Search Filter -->

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">নাম ও ছবি</th>

                            <th scope="col">শাখা নং</th>
                            <th scope="col">ফোন</th>
                            <th scope="col">ইমেইল</th>
                            <th scope="col">তরিক্বত গ্রহণের তারিখ</th>
                            <th scope="col">শেষ ছবক</th>
                            <th scope="col">বাইয়াত গ্রহণের তারিখ</th>
                            <th scope="col"><b>Status<b></th>



                            <th class="text-right no-sort">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gmembers as $key=> $member)
                        <tr>
                            <td>{{++$key}}</td>

                            <td>

                                <h2 class="table-avatar">
                                    <a href="{{route('guestmembers.show',$member->id)}}" class="avatar"><img src="{{asset('img')}}/{{$member->photo}}" /></a>
                                    <a href="{{route('guestmembers.show',$member->id)}}">{{$member->name}} <span>{{$member->occupation}}</span></a>
                                </h2>
                            </td>
                            <td>( {{$member->brunch_id}} ) {{$member->brunch_name}}</td>

                            <td>{{$member->phone}}</td>

                            <td>{{$member->email}}</td>
                            <td>{{$member->torikot_date}}</td>
                            <td>{{$member->sobok_type}}</td>
                            <td>{{$member->baiyat_date}}</td>
                            <td>
                                <div class="dropdown action-label">
									<a href="#" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-dot-circle-o text-danger"></i> Inactive </a>
													{{-- <div class="dropdown-menu" style="">
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
														<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
													</div> --}}
									</div>
                             </td>
                            <td class="text-right">

								<a class="btn btn-success" href="{{route('guestmembers.show',$member->id)}}" ><i class="bi bi-eye-fill"></i> </a>




								<button type="button" value="{{$member->id}}" class="btn btn-primary" id="gmemBtn" ><i class="bi bi-pencil-square" ></i> </button>

								<button type="button" value="{{$member->id}}" class="btn btn-warning" id="deletemembert" ><i class="fa fa-trash-o m-r-5"></i> </button>

					{{-- <button type="button" value="{{$member->id}}" class="dropdown-item" id="deletebtn" ><i class="fa fa-trash-o m-r-5"></i> Delete</button> --}}
					<!-- Delete Employee Modal -->
						<div class="modal custom-modal fade" id="deletemembert" role="dialog">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-body">
										<div class="form-header">
											<h3>Delete Employee</h3>
											<p>Are you sure want to delete?</p>
										</div>
										<div class="modal-btn delete-action">
											<div class="row">
												<div class="col-6">
													<form action="{{url('delete-member')}}" method="post" >
														@csrf
														@method("DELETE")
														<input type="hidden" id="delete_memberIdt" name="d_member">


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
                            </td>
                        </tr>

                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /Page Content -->

		<!-- Delete Employee Modal -->
		<div class="modal custom-modal fade" id="deletemembert" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body">
						<div class="form-header">
							<h3>Delete Employee</h3>
							<p>Are you sure want to delete?</p>
						</div>
						<div class="modal-btn delete-action">
							<div class="row">
								<div class="col-6">
									<form action="{{url('delete-member')}}" method="post" >
										@csrf
										@method("DELETE")
										<input type="hidden" id="delete_memberIdt" name="d_member">


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
				<h5 class="modal-title">মেহমানের তালিকা সংযোজন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{{-- add employee--}}
			<div class="modal-body"  style="background-color: teal">
				<form action="{{route('members.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> নাম : <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtName" name="txtName" placeholder="নাম" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">ফোন :</label>
								<input type="number" class="form-control" id="txtPhone" name="txtPhone" placeholder="ফোন" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">ইমেইল : <span class="text-danger">*</span></label>
								<input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="ইমেইল" required>
							</div>
						</div><div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> জন্ম তারিখ : <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="txtDate_birth" name="txtDate_birth" required >
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> পিতার নাম :</label>
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
								<label class="col-form-label">Blood Group / রক্তের গ্রুপ:</label>
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
								<label class="col-form-label">Gender / লিঙ্গ: <span class="text-danger">*</span></label>
								<select id="txtGender" class="form-control" name="txtGender" required>
									<option selected>Choose...</option>
									<option value="Male">পুরুষ</option>
									<option value="Female">মহিলা</option>
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">Eduction Type / শিক্ষার ধরন: <span class="text-danger">*</span></label>
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
								<label class="col-form-label">পেশা: <span class="text-danger">*</span></label>
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
								<label class="col-form-label">স্থায়ী ঠিকানা:</label>
								<input type="text" class="form-control" id="txtWorkplace_address" name="txtWorkplace_address" placeholder="স্থায়ী ঠিকানা" required>
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
								<label class="col-form-label"> এনআইডি নম্বর: <span class="text-danger">*</span></label>
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
								<label class="col-form-label">শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="txtBrunch_name" name="txtBrunch_name" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label">বাইয়াত তারিখ:</label>
								<input type="date" class="form-control" id="txtBaiyat_date" name="txtBaiyat_date" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> উপলক্ষ্য: <span class="text-danger">*</span></label>
								<select id="txtOccasion" class="form-control" name="txtOccasion" required>
									<option selected>Choose...</option>
									@foreach ($occasions as $occasion)
									<option value="{{ $occasion->id }}">{{ $occasion->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> দায়িত্ব : <span class="text-danger">*</span></label>
								<select id="txtDuty" class="form-control" name="txtDuty" required>
									<option selected>Choose...</option>
									@foreach ($dutys as $du)
									<option value="{{ $du->id }}">{{ $du->name }}</option>
									@endforeach
								</select>
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
								<label class="col-form-label">ছবি: <span class="text-danger">*</span></label>
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
<!-- /Add Employee Modal -->






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



		// $(document).on('click','#deletebtnt',function(){
		// 	var member_id=$(this).val();
        //     alert(member_id);
		// 	$('#deletemembert').modal('show');
		// 	$('#delete_memberIdt').val(member_id);
		// });

	});
</script>

@include('pages.erp.guestmember.edit_guestmember')


@endsection











