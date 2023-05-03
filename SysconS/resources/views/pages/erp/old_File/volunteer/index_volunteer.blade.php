@extends('layout.erp.home')
@section('page')


{{-- <style>
    #{
        font-weight: bold
    }
</style> --}}
<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h2 class="page-title">কর্মীর তালিকাঃ

                </h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">কর্মী</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i> কর্মীর সংযোজন</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- volunteer Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কর্মীর সংখ্যা</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কর্মীর অনুমদন </h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কর্মী অপেক্ষারত</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>কর্মী বাতিল</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /volunteer Center Statistics -->
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
                            <th scope="col">কর্মীর নাম ও আইডি</th>
                            <th scope="col">মোবাইল নাম্বার</th>
                            {{-- <th scope="col">উপলক্ষ</th>
                            <th scope="col">দায়িত্ত</th>
                            <th scope="col">পূর্বের দায়িত্ত</th>
                            <th scope="col">বর্তমান দায়িত্ব</th>
                            <th scope="col"> স্থান</th> --}}
                            <th scope="col"> দায়িত্বের তারিখ</th>


							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($volunteers as $key=> $volunteer)


						<tr>
							<td>{{++$key}}</td>
							<td>( {{$volunteer->brunch_id}} ) {{$volunteer->brunch_name}}</td>

                            <td>
                                <h2 class="table-avatar">
                                    <a href="" class="avatar"><img src="{{asset('img')}}/{{$volunteer->m_photo}}" /></a>
                                    <a href="">( {{$volunteer->v_id}}  ){{$volunteer->member_name}} </a>
                                </h2>
                            </td>

							{{-- <td>{{$volunteer->member_id}} | {{$volunteer->member_name}}</td> {{$volunteer->phone_code}}--}}
							<td>{{$volunteer->phone_code}} {{$volunteer->phone}}</td>
							{{-- <td>{{$volunteer->occasion}}</td>
							<td>{{$volunteer->duty}}</td>
							<td>{{$volunteer->present_duty}}</td>
							<td>{{$volunteer->previous_duty}}</td>
							<td>{{$volunteer->place}}</td> --}}
							<td>{{$volunteer->duty_date}}</td>



							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">


										<button type="button" value="{{$volunteer->id}}" class="btn btn-success" id="volshBtn" ><i class="bi bi-eye-fill"></i> </button>


										<button type="button" value="{{$volunteer->id}}" class="btn btn-primary" id="volBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$volunteer->id}}" class="btn btn-warning" id="volDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>
						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>

                <div class="d-felx justify-content-center">

                    {{$volunteers->links()}}

                </div>
			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->

<!-- Add volunteer Center Modal -->
<div id="add_overtime" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">কর্মীর সংযোজন করুন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{route('volunteers.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-4">

							<div class="form-group">
								<label class="col-form-label">শাখা নং: <span class="text-danger">*</span></label>

								{{-- <input type="hidden" class="form-control" id="cmbvolId" name="cmbvolId" required>
								 --}}
								<select id="cmbBrunchId" class="form-control" name="cmbBrunchId" required>
								<option >Choose...</option>

								@foreach ($brunchs as $brunch)
								<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} </option>
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
									<label class="col-form-label">কর্মীর আইডি: <span class="text-danger">*</span></label>
									<select id="cmbMemberId" class="form-control select2" name="cmbMemberId" required>
										<option >Choose...</option>

										@foreach ($members as $member)
										<option value="{{ $member->id }}">V- 0{{ $member->id }}  </option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">কর্মীর নাম:</label>
									<input type="text" class="form-control" id="dtxtMember_name" name="txtMember_name" placeholder="কর্মীর নাম" required>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
                                    <label class="col-form-label">মোবাইল কোড: <span class="text-danger">*</span></label>
                                    	<select id="txtphone_code" class="form-control select2" name="txtphone_code" >
										<option >+880...</option>

										@foreach ($countries as $con)
										<option value="{{ $con->id }}">( {{ $con->iso3 }} ) {{ $con->phonecode }} </option>
										@endforeach
										</select>


								</div>
							</div>
                            <div class="col-sm-4">
								<div class="form-group">

									<label class="col-form-label">মোবাইল নাম্বার: <span class="text-danger">*</span></label>
									<input type="number" class="form-control" id="dootxtPhone" name="txtPhone" placeholder="মোবাইল নাম্বার" required>
								</div>
							</div>



                            {{-- ///////////////////////////////////////////////////////////////////// --}}
                            <div class="col-sm-3">
								<div class="form-group">
									<label class="col-form-label"> পূর্বের দায়িত্তঃ</label>


									 <select id="txtDuty6" class="form-control" name="" required>
										<option >Choose...</option>

										@foreach ($dutys as $duty)
										<option value="{{ $duty->id }}"> {{ $duty->name }} </option>
										@endforeach
										</select>




								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label class="col-form-label">উপলক্ষ: <span class="text-danger">*</span></label>


									<select id="txtOccasion6" class="form-control" name="txtOccasion6" required>
										<option >Choose...</option>

										@foreach ($occasions as $occasion)
										<option value="{{ $occasion->id }}"> {{ $occasion->name }} </option>
										@endforeach
								    </select>



								</div>
							</div>

                            <div class="col-sm-3">
								<div class="form-group">
									<label class="col-form-label">স্থান: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="txtPlace6" name="txtPlace6" placeholder="স্থান" >
								</div>
							</div>
                            <div class="col-sm-3">
								<div class="form-group">
									<label class="col-form-label">বর্তমান দায়িত্ত: <span class="text-danger">*</span></label>
									{{-- <input type="text" class="form-control" id="txtPresent_duty6" name="txtPresent_duty6" placeholder="পূর্বের দায়িত্ত" > --}}
                                    <select id="" class="form-control" name="txtDuty6" required>
										<option >Choose...</option>

										@foreach ($dutys as $duty)
										<option value="{{ $duty->id }}"> {{ $duty->name }} </option>
										@endforeach
										</select>
								</div>
							</div>

{{-- ////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                             {{-- ///////////////////////////////////////////////////////////////////// --}}
                             <div class="col-sm-3">
								<div class="form-group">


									 <select id="txtDuty1" class="form-control" name="txtDuty1" required>
										<option >Choose...</option>

										@foreach ($dutys as $duty)
										<option value="{{ $duty->id }}"> {{ $duty->name }} </option>
										@endforeach
										</select>




								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">


									<select id="txtOccasion1" class="form-control" name="txtOccasion1" required>
										<option >Choose...</option>

										@foreach ($occasions as $occasion)
										<option value="{{ $occasion->id }}"> {{ $occasion->name }} </option>
										@endforeach
								    </select>



								</div>
							</div>

                            <div class="col-sm-3">
								<div class="form-group">
									<input type="text" class="form-control" id="txtPlace1" name="txtPlace1" placeholder="স্থান" >
								</div>
							</div>
                            <div class="col-sm-3">
								<div class="form-group">
									{{-- <input type="text" class="form-control" id="txtPrevious_duty1" name="txtPrevious_duty1" placeholder="পূর্বের দায়িত্ত" > --}}
                                    <select id="txtPresent_duty1" class="form-control" name="txtDuty1" required>
										<option >Choose...</option>

										@foreach ($dutys as $duty)
										<option value="{{ $duty->id }}"> {{ $duty->name }} </option>
										@endforeach
										</select>
								</div>
							</div>
                            {{-- ///////////////////////// --}}
                            <div class="col-sm-3">
								<div class="form-group">


									 <select id="txtDuty2" class="form-control" name="txtDuty2" required>
										<option >Choose...</option>

										@foreach ($dutys as $duty)
										<option value="{{ $duty->id }}"> {{ $duty->name }} </option>
										@endforeach
										</select>




								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">


									<select id="txtOccasion2" class="form-control" name="txtOccasion2" required>
										<option >Choose...</option>

										@foreach ($occasions as $occasion)
										<option value="{{ $occasion->id }}"> {{ $occasion->name }} </option>
										@endforeach
								    </select>



								</div>
							</div>

                            <div class="col-sm-3">
								<div class="form-group">
									<input type="text" class="form-control" id="txtPlace2" name="txtPlace2" placeholder="স্থান" >
								</div>
							</div>
                            <div class="col-sm-3">
								<div class="form-group">
									{{-- <input type="text" class="form-control" id="txtPrevious_duty2" name="txtPrevious_duty2" placeholder="পূর্বের দায়িত্ত" > --}}
                                    <select id="txtDuty2" class="form-control" name="txtDuty2" required>
										<option >Choose...</option>

										@foreach ($dutys as $duty)
										<option value="{{ $duty->id }}"> {{ $duty->name }} </option>
										@endforeach
										</select>
								</div>
							</div>

                            {{-- //////////////////////////////// --}}
                            <div class="col-sm-3">
								<div class="form-group">


									 <select id="txtDuty3" class="form-control" name="txtDuty3" required>
										<option >Choose...</option>

										@foreach ($dutys as $duty)
										<option value="{{ $duty->id }}"> {{ $duty->name }} </option>
										@endforeach
										</select>




								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">


									<select id="txtOccasion3" class="form-control" name="txtOccasion3" required>
										<option >Choose...</option>

										@foreach ($occasions as $occasion)
										<option value="{{ $occasion->id }}"> {{ $occasion->name }} </option>
										@endforeach
								    </select>



								</div>
							</div>

                            <div class="col-sm-3">
								<div class="form-group">
									<input type="text" class="form-control" id="txtPlace3" name="txtPlace3" placeholder="স্থান" >
								</div>
							</div>
                            <div class="col-sm-3">
								<div class="form-group">
									{{-- <input type="text" class="form-control" id="txtPrevious_duty3" name="txtPrevious_duty3" placeholder="পূর্বের দায়িত্ত" > --}}
                                    <select id="txtDuty" class="form-control" name="txtDuty3" required>
										<option >Choose...</option>

										@foreach ($dutys as $duty)
										<option value="{{ $duty->id }}"> {{ $duty->name }} </option>
										@endforeach
										</select>
								</div>
							</div>
{{-- ///////////////////////////////////////////// --}}
                            <div class="col-sm-3">
								<div class="form-group">


									 <select id="txtDuty4" class="form-control" name="txtDuty4" required>
										<option >Choose...</option>

										@foreach ($dutys as $duty)
										<option value="{{ $duty->id }}"> {{ $duty->name }} </option>
										@endforeach
										</select>




								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">


									<select id="txtOccasion4" class="form-control" name="txtOccasion4" required>
										<option >Choose...</option>

										@foreach ($occasions as $occasion)
										<option value="{{ $occasion->id }}"> {{ $occasion->name }} </option>
										@endforeach
								    </select>



								</div>
							</div>

                            <div class="col-sm-3">
								<div class="form-group">
									<input type="text" class="form-control" id="txtPlace4" name="txtPlace4" placeholder="স্থান" >
								</div>
							</div>
                            <div class="col-sm-3">
								<div class="form-group">
									{{-- <input type="text" class="form-control" id="txtPrevious_duty4" name="txtPrevious_duty4" placeholder="পূর্বের দায়িত্ত" > --}}
                                    <select id="" class="form-control" name="txtDuty4" required>
										<option >Choose...</option>

										@foreach ($dutys as $duty)
										<option value="{{ $duty->id }}"> {{ $duty->name }} </option>
										@endforeach
										</select>
								</div>
							</div>
                            {{-- //////////////////////////// --}}

                            <div class="col-sm-3">
								<div class="form-group">


									 <select id="txtDuty5" class="form-control" name="txtDuty5" required>
										<option >Choose...</option>

										@foreach ($dutys as $duty)
										<option value="{{ $duty->id }}"> {{ $duty->name }} </option>
										@endforeach
										</select>




								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">


									<select id="txtOccasion5" class="form-control" name="txtOccasion5" required>
										<option >Choose...</option>

										@foreach ($occasions as $occasion)
										<option value="{{ $occasion->id }}"> {{ $occasion->name }} </option>
										@endforeach
								    </select>



								</div>
							</div>

                            <div class="col-sm-3">
								<div class="form-group">
									<input type="text" class="form-control" id="txtPlace5" name="txtPlace5" placeholder="স্থান" >
								</div>
							</div>
                            <div class="col-sm-3">
								<div class="form-group">
									{{-- <input type="text" class="form-control" id="txtPrevious_duty5" name="txtPrevious_duty5" placeholder="পূর্বের দায়িত্ত" > --}}
                                    <select id="" class="form-control" name="txtDuty5" required>
										<option >Choose...</option>

										@foreach ($dutys as $duty)
										<option value="{{ $duty->id }}"> {{ $duty->name }} </option>
										@endforeach
										</select>
								</div>
							</div>

{{-- ////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
							{{-- <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> দায়িত্ব: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="txtSpeakers" name="txtPresent_duty" placeholder="বর্তমান দায়িত্ব" required>
								</div>
							</div> --}}



							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label"> দায়িত্বের তারিখ:</label>
									<input type="date" class="form-control" id="txtAddress" name="txtDuty_date" placeholder="Enter Duty Date" required>
								</div>
							</div>

                            <div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">মন্তব্য: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="txtNum_audience" name="txtComment" placeholder="মন্তব্য" >
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
<!-- /Add volunteer Center Modal -->

<!-- Edit volunteer Center Modal -->
<div id="edit_vol" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">কর্মী সংশোধন করুন</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal">
				<form action="{{url('volunteer-update')}}"  method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-sm-4">

							<div class="form-group">
								<label class="col-form-label">Brunch NO / শাখা নং: <span class="text-danger">*</span></label>

								<input type="hidden" class="form-control" id="cmbvolId" name="cmbvolId" required>

								<select id="volbrunch_id" class="form-control" name="cmbBrunchId" required>
								<option >Choose...</option>

								@foreach ($brunchs as $brunch)
								<option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} </option>
								@endforeach
								</select>

							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="col-form-label"> শাখার নাম: <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="volbrunch_name" name="txtBrunch_name" required placeholder=" শাখার নাম">

							</div>
						</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">কর্মীর আইডি: <span class="text-danger">*</span></label>
									<select id="volmember_id" class="form-control" name="cmbMemberId" required>
										<option >Choose...</option>

										@foreach ($members as $member)
										<option value="{{ $member->id }}">{{ $member->id }} | {{ $member->name }} </option>
										@endforeach
										</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">কর্মীর নাম:</label>
									<input type="text" class="form-control" id="volmember_name" name="txtMember_name" placeholder="কর্মীর নাম" required>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label class="col-form-label">মোবাইল নাম্বার: <span class="text-danger">*</span></label>
									<input type="number" class="form-control" id="volphone" name="txtPhone" placeholder="Enter Start Time" required>
								</div>
							</div>

							<div class="col-sm-2">
								<div class="form-group">
                                    <label class="col-form-label">মোবাইল কোড: <span class="text-danger">*</span></label>
                                    	<select id="vtxtphone_code" class="form-control" name="txtphone_code" >
										<option >+880...</option>

										@foreach ($countries as $con)
										<option value="{{ $con->id }}">( {{ $con->iso3 }} ) {{ $con->phonecode }} </option>
										@endforeach
										</select>


								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">উপলক্ষ: <span class="text-danger">*</span></label>


									<select id="voloccasion" class="form-control" name="txtOccasion" required>
										<option >Choose...</option>

										@foreach ($occasions as $occasion)
										<option value="{{ $occasion->id }}"> {{ $occasion->name }} </option>
										@endforeach
										</select>


								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">দায়িত্তঃ</label>
									{{-- <input type="text" class="form-control" id="txtNum_speakers" name="txtDuty" placeholder=" Number Of Speakers Name" required> --}}

									<select id="volduty" class="form-control" name="txtDuty" required>
										<option >Choose...</option>

										@foreach ($dutys as $duty)
										<option value="{{ $duty->id }}"> {{ $duty->name }} </option>
										@endforeach
										</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">বর্তমান দায়িত্ব: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="volpresent_duty" name="txtPresent_duty" placeholder="বর্তমান দায়িত্ব" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">পূর্বের দায়িত্ত: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="volprevious_duty" name="txtPrevious_duty" placeholder="পূর্বের দায়িত্ত" required>
								</div>
							</div>


							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">দায়িত্বের তারিখ:</label>
									<input type="date" class="form-control" id="volduty_date" name="txtDuty_date" placeholder="Enter Duty Date" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">স্থান: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="volplace" name="txtPlace" placeholder="স্থান" required>
								</div>
							</div>	<div class="col-sm-4">
								<div class="form-group">
									<label class="col-form-label">মন্তব্য: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="volcomment" name="txtComment" placeholder="মন্তব্য" >
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
<!-- /Edit volunteer Center Modal -->

<!-- Delete volunteer Center Modal -->
<div class="modal custom-modal fade" id="delete_vol" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
                    <h3>কর্মী বাতিল করন</h3>
                    <p>আপনি কি কর্মী বাতিল করতে চান ?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-volunteer')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_volId" name="d_vol">


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
<!-- /Delete volunteer Center Modal -->



<!-- show volunteer Center Modal -->
<div id="show_vol" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
		<div class="modal-content">
			<div class="modal-header" >
				<h2 class="modal-title"> কর্মীর বিস্তারিত বিবরণ</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="background-color: teal;" >
				{{-- <div><h1 id="mahSHbrunch_name"></h1></div> --}}
				<div class="card mb-0">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<div class="profile-view">
									{{-- <div class="profile-img-wrap">
										<div class="profile-img">
											<a href="#"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
										</div>
									</div> --}}
									{{-- <div class="profile-basic"> --}}
										<div class="row">
                                            <style>
                                                #showdata{
                                                    color: #000;
                                                }
                                            </style>
											<div class="col-md-6">
												<div class="profile-info-left">




                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> শাখা নং: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="volSHbrunch_id"></div>

                                                        </div>
                                                    </div>
                                                                                                                                                     <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> শাখার নাম: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="volSHbrunch_name"></div>

                                                        </div>
                                                    </div>
                                                                                                                                                     <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata">কর্মীর আইডি: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="volSHmember_id"></div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata">কর্মীর নাম <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="volSHmember_name"></div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> মোবাইল নাম্বার <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="volSHphone"></div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> উপলক্ষ: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="volSHoccasion"></div>

                                                        </div>
                                                    </div>
												</div>

										    </div>
                                            <div class="col-md-6">
												<div class="profile-info-right">


                                                                                                                                                     <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata">দায়িত্ত: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="volSHduty"></div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> বর্তমান দায়িত্ব : <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="volSHpresent_duty"></div>

                                                        </div>
                                                    </div>
                                                                                                                                                     <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> পূর্বের দায়িত্ত: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="volSHprevious_duty"></div>

                                                        </div>
                                                    </div>
                                                                                                                                                     <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata"> দায়িত্বের তারিখ: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="volSHduty_date"></div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata">স্থান: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="volSHplace"></div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-10">

                                                        <div class="form-group">
                                                            <label class="col-form-label" id="showdata">মন্তব্য: <span class="text-danger">*</span></label>
                                                            <div class="form-control" id="volSHcomment"></div>

                                                        </div>
                                                    </div>

												</div>

										    </div>
								    	</div>
									<div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
								{{-- </div> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /show volunteer Center Modal -->
<script>
	$(document).ready(function(){
        $(document).on('click','#volDbtn',function(){
			var vol_id=$(this).val();
            // alert(member_id);
			$('#delete_vol').modal('show');
			$('#delete_volId').val(vol_id);
		});



		$(document).on('click','#volBtn',function(){
			//  alert("ok");

			var vol_id=$(this).val();
			// alert(invi_id);
			$('#edit_vol').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-volunteer/"+vol_id,
				success:function(response){

					$('#cmbvolId').val(vol_id);


					$('#volbrunch_id').val(response.volunteer.brunch_id);
					$('#volbrunch_name').val(response.volunteer.brunch_name);

					$('#volmember_id').val(response.volunteer.member_id);
					$('#volmember_name').val(response.volunteer.member_name);
					$('#volphone').val(response.volunteer.phone);
					$('#vtxtphone_code').val(response.volunteer.phone_code);

					$('#voloccasion').val(response.volunteer.occasion);
					$('#volduty').val(response.volunteer.duty);
					$('#volpresent_duty').val(response.volunteer.present_duty);
					$('#volprevious_duty').val(response.volunteer.previous_duty);
					$('#volduty_date').val(response.volunteer.duty_date);
					$('#volplace').val(response.volunteer.place);
					$('#volcomment').val(response.volunteer.comment);



				}
			});
		});

		$(document).on('click','#volshBtn',function(){
			//  alert("ok");

			var volsh_id=$(this).val();
			// alert(invi_id);
			$('#show_vol').modal('show');
			$.ajax({
				type: "GET",
				url: "/show-volunteer/"+volsh_id,
				success:function(response){
					// console.log(response.volunteer.brunch_name);
					$('#cmbvolSHId').html(volsh_id);

					$('#volSHbrunch_id').html(response.svolunteer.brunch_id);
					$('#volSHbrunch_name').html(response.svolunteer.brunch_name);

					$('#volSHmember_id').html(response.svolunteer.member_id);
					$('#volSHmember_name').html(response.svolunteer.member_name);
					$('#volSHphone').html(response.svolunteer.phone);
					$('#volSHoccasion').html(response.svolunteer.occasion);
					$('#volSHduty').html(response.svolunteer.duty);
					$('#volSHpresent_duty').html(response.svolunteer.present_duty);
					$('#volSHprevious_duty').html(response.svolunteer.previous_duty);
					$('#volSHduty_date').html(response.svolunteer.duty_date);
					$('#volSHplace').html(response.svolunteer.place);
					$('#volSHcomment').html(response.svolunteer.comment);



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
              let volunteer=JSON.parse(res);
                console.log(volunteer);
               $("#ooBrunch_name").val(volunteer.brunch_name);


            //    $("#").val(member.);






             }
           });
        });

		$("#cmbMemberId").on("change",function(){
           $.ajax({
             url:"<?php echo url("getmembers")?>",
             type:'GET',
             data:{"id":$(this).val()},
             success:function(res){
              let member=JSON.parse(res);
                console.log(member);
            //    $("#customer-name").val(member.name);
            //    $("#txtMember_name").val(member.m_name);

            //    $("#ootxtPhone").val(member.m_phone);
               $("#dtxtMember_name").val(member.m_name);
               $("#dootxtPhone").val(member.m_phone);




             }
           });
        });

        // $("#cmbMemberId").on("change",function(){
        //    $.ajax({
        //      url:"<?php echo url("api/fetch-vduties")?>",
        //      type:'GET',
        //      data:{"member_id":$(this).val()},
        //      success:function(res){
        //       let mem=JSON.parse(res);
        //         console.log(mem);
        //     //    $("#customer-name").val(member.name);
        //     //    $("#txtDuty1").val(members.duty1);

        //     //    $("#txtOccasion1").val(members.occasion1);
        //     //    $("#txtPlace1").val(members.place1);


        //      }
        //    });
        // });
        // $("#cmbMemberId").on("change",function(){
		// 	//  alert("ok");

		// 	var duty_id=$(this).val();
		// 	alert(duty_id);
		// 	// $('#show_vol').modal('show');
		// 	$.ajax({
		// 		type: "GET",
		// 		url: "/api/fetch-vduties/"+duty_id,
		// 		success:function(response){
		// 			console.log(response.vduty.id);
		// 			// $('#cmbvolSHId').html(duty_id);

		// 			// $('#volSHbrunch_id').html(response.svolunteer.brunch_id);
		// 			// $('#volSHbrunch_name').html(response.svolunteer.brunch_name);

		// 			// $('#volSHmember_id').html(response.svolunteer.member_id);
		// 			// $('#volSHmember_name').html(response.svolunteer.member_name);
		// 			// $('#volSHphone').html(response.svolunteer.phone);
		// 			// $('#volSHoccasion').html(response.svolunteer.occasion);
		// 			// $('#volSHduty').html(response.svolunteer.duty);
		// 			// $('#volSHpresent_duty').html(response.svolunteer.present_duty);
		// 			// $('#volSHprevious_duty').html(response.svolunteer.previous_duty);
		// 			// $('#volSHduty_date').html(response.svolunteer.duty_date);
		// 			// $('#volSHplace').html(response.svolunteer.place);
		// 			// $('#volSHcomment').html(response.svolunteer.comment);



		// 		}
		// 	});
		// });

        $('#cmbMemberId').on('change', function () {
			var idCountr = this.value;
			//  alert(idCountr);

			$("#txtCountry").html('');
			$.ajax({
				url: "{{url('api/fetch-vduties')}}",
				type: "GET",
				data: {
					member_id: idCountr,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
                    console.log(result);
                    // $("#dtxtMember_name").val(result.vduty.m_name);


					// $('#txtCountry').html('<option value="">Select Country</option>');
					$.each(result.vduty, function (key, value) {
                        // $("#dtxtMember_name").val(value.m_name);
                        // $("#dootxtPhone").val(value.m_phone);

                          $("#txtDuty6").val(value.duty6);
                          $("#txtOccasion6").val(value.occasion6);
                          $("#txtPlace6").val(value.place6);

                          $("#txtDuty1").val(value.duty1);
                          $("#txtOccasion1").val(value.occasion1);
                          $("#txtPlace1").val(value.place1);

                          $("#txtDuty2").val(value.duty2);
                          $("#txtOccasion2").val(value.occasion2);
                          $("#txtPlace2").val(value.place2);

                          $("#txtDuty3").val(value.duty3);
                          $("#txtOccasion3").val(value.occasion3);
                          $("#txtPlace3").val(value.place3);

                          $("#txtDuty4").val(value.duty4);
                          $("#txtOccasion4").val(value.occasion4);
                          $("#txtPlace4").val(value.place4);

                          $("#txtDuty5").val(value.duty5);
                          $("#txtOccasion5").val(value.occasion5);
                          $("#txtPlace5").val(value.place5);

						// $("#txtCountry").append('<option value="' + value
						// 	.id + '">' + value.member_id + '</option>');
					});
				}
			});
		});



	});
</script>
@endsection




