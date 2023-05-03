<!-- Edit  Modal -->
<div id="edit_gmember" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">মেহমানের তালিকা সংশধন</h4>
                <button type="button"  class="close " id="closem">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: teal">
                {{-- <form action="{{route('members.update',$member->id)}}" method="PUT" enctype="multipart/form-data"> --}}
                {{-- <form action="" method="post" enctype="multipart/form-data"> --}}

					<form action="{{url('guestmember-update')}}"  method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label"> নাম : <span class="text-danger">*</span></label>
                                <input type="hidden" value="" id="cmbgmemId" name="cmbgmemId">

                                <input type="text" class="form-control" id="ename"
                                    name="txtName" placeholder="Enter Full Name" required>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">ফোন :</label>
                                <input type="number" class="form-control" value="" id="ephone"
                                    name="txtPhone" placeholder="Enter Phone Number" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label"> ইমেইল : <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control"  id="eEmail"
                                    name="txtEmail" placeholder="Enter Your Email" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">জন্ম তারিখ : <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control"
                                    id="edate_birth" name="txtDate_birth" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label"> পিতার নাম :</label>
                                <input type="text" class="form-control"  id="efather"
                                    name="txtFather" placeholder="Enter Father Name" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">মাতার নাম: <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"  id="eMother"
                                    name="txtMother" placeholder="Enter Mother Name" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">তরিক্বপন্থী সদস্য: <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control"
                                    id="eFamily_member" name="txtFamily_member"
                                    placeholder="পরিবারে তরিক্বত পন্থী সদস্য" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">রক্তের গ্রুপ:</label>
                                <select id="eBlood_group" class="form-control" name="txtBlood_group" required>
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
                                <label class="col-form-label">লিঙ্গ: <span
                                        class="text-danger">*</span></label>
                                <select id="eGender" class="form-control" name="txtGender" required>
                                    <option selected>Choose...</option>
                                    <option value="Male">পুরুষ</option>
                                    <option value="Female">মহিলা</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">শিক্ষার ধরন: <span
                                        class="text-danger">*</span></label>
                                <select id="eEduction_type" class="form-control" name="txtEduction_type" required>
                                    <option selected>Choose...</option>
                                    <option value="general">জেনারেল</option>
                                    <option value="madrasa">মাদ্রাসা</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">শিক্ষাগত যোগ্যতা:</label>
                                <input type="text" class="form-control"
                                    id="eEducation_skill" name="txtEducation_skill"
                                    placeholder="Enter Educational Qualification" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">পেশা: <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="eOccupation" name="txtOccupation" placeholder="Enter Occupation" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label"> কর্মস্থল: <span
                                        class="text-danger">*</span></label>
                                <select id="txtWorkplacee" class="form-control" name="txtWorkplace" >
                                    <option selected>Choose...</option>
                                    @foreach ($workplaces as $wp)
                                        <option value="{{ $wp->id }}">{{ $wp->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">দেশের নাম: <span class="text-danger">*</span></label>
                                <select id="txtCountrye" class="form-control" name="txtCountry" >
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
								<select id="txtdivisione" class="form-control" name="txtdivision" required>
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
								<select id="txtdistricte" class="form-control" name="txtdistrict" required>
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
								<select id="txtupazilae" class="form-control" name="txtupazila" required>
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
								<select id="txtunione" class="form-control" name="txtunion" required>
									{{-- <option selected>Choose...</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="usa">USA</option>
									<option value="soudi arob">Soudi Arob</option> --}}
								</select>
							</div>
						</div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">বর্তমান ঠিকানা: <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="ePresentadd" name="txtPresentadd" placeholder="Enter Present Address"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">স্থায়ী ঠিকানা: <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="eParmanentadd" name="txtParmanentadd" placeholder="Enter Parmanent Address"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">কর্মস্থলের ঠিকানা:</label>
                                <input type="text" class="form-control"
                                    id="eWorkplace_address" name="txtWorkplace_address"
                                    placeholder="Enter Parmanent Address" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">বৈবাহিক অবস্থা: <span
                                        class="text-danger">*</span></label>
                                <select id="eRelationship" class="form-control" name="txtRelationship" required>
                                    <option selected>Choose...</option>
                                    <option value="Married">Married</option>
                                    <option value="Unmarried">Unmarried</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">এনআইডি নম্বর: <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control"  id="eNid"
                                    name="txtNid" placeholder="Enter Valid NID Number" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">দান বাক্স নম্বর:</label>
                                <input type="number" class="form-control"
                                    id="eDonation_boxId" name="cmbDonation_boxId" required>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">তরিক্বত তারিখ: <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control"
                                    id="eTorikot_date" name="txtTorikot_date" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label"> শেষ ছবক:</label>
                                <select id="eSobok_type" class="form-control" name="txtSobok_type" required>
                                    <option selected>Choose...</option>
                                    @foreach ($soboks as $sobok)
                                        <option value="{{ $sobok->id }}">{{ $sobok->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">শাখা নং: <span
                                        class="text-danger">*</span></label>
                                {{-- <input type="number" class="form-control" id="cmbBrunchId" name="cmbBrunchId" required> --}}
                                <select id="eBrunchId" class="form-control" name="cmbBrunchId" required>
                                    <option selected>Choose...</option>

                                    @foreach ($brunchs as $brunch)
                                        <option value="{{ $brunch->id }}">{{ $brunch->brunch_code }} |
                                            {{ $brunch->brunch_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label"> শাখার নাম: <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                    id="eBrunch_name" name="txtBrunch_name" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">বাইয়াত তারিখ:</label>
                                <input type="date" class="form-control"
                                    id="eBaiyat_date" name="txtBaiyat_date" required>
                            </div>
                        </div>
                        {{-- <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Ocations / উপলক্ষ্য: <span
                                        class="text-danger">*</span></label>
                                <select id="eOccasion" class="form-control" name="txtOccasion" required>
                                    <option selected>Choose...</option>
                                    @foreach ($occasions as $occasion)
                                        <option value="{{ $occasion->id }}">{{ $occasion->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Duty / দায়িত্ব : <span
                                        class="text-danger">*</span></label>
                                <select id="eDuty" class="form-control" name="txtDuty" required>
                                    <option selected>Choose...</option>
                                    @foreach ($dutys as $du)
                                        <option value="{{ $du->id }}">{{ $du->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label"> পদবি : <span
                                        class="text-danger">*</span></label>
                                <select id="eDesignation" class="form-control" name="txtDesignation" required>
                                    <option selected>Choose...</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Image / ছবি: <span
                                        class="text-danger">*</span></label>
                                <input type="file" name="filePhoto" class="form-control"  placeholder="image">


                            </div>
                            {{-- <img src="img/{{$member->photo}}" height="80px" width="85px"/> --}}

                        </div>
                        <div class="col-sm-4">
                            <div class="form-group" id="eFilephoto">
                                {{-- <img src="img/{{$member->photo}}" height="80px" width="85px"/> --}}


                            </div>
                        </div>

                    </div>
                    <div class="table-responsive m-t-15">
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
                    </div>
                    <div class="submit-section">
                        <input class="btn btn-primary submit-btn" type="submit" name="btnUpdate" value="Update">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Employee Modal -->

<!-- Delete padcollection Center Modal -->
<div class="modal custom-modal fade" id="delete_gmem" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">


				<div class="form-header">
					<h3>Delete Overtime</h3>
					<p>Are you sure want to Cancel this?</p>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">


						<div class="col-6">



						<form action="{{url('delete-guestmember')}}" method="post" >
									@csrf
									@method("DELETE")
									<input type="hidden" id="delete_gmemberId" name="d_gmem">


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
@section('scripts')

<script>

	$(document).ready(function(){
        $("#closem .close").click()
        $(document).on('click','#gmemDbtn',function(){
			var gmember_id=$(this).val();
            // alert(member_id);
			$('#delete_gmem').modal('show');
			$('#delete_gmemberId').val(gmember_id);
		});



		$(document).on('click','#gmemBtn',function(){
			var gmember_id=$(this).val();
			// alert(gmember_id);
			$('#edit_gmember').modal('show');
			$.ajax({
				type: "GET",
				url: "/edit-guestmember/"+gmember_id,
				success:function(response){
					// console.log(response.member.name);
					$('#cmbgmemId').val(gmember_id);

					$('#ename').val(response.guestmember.name);
					$('#ephone').val(response.guestmember.phone);
					 $('#eEmail').val(response.guestmember.email);
					$('#edate_birth').val(response.guestmember.date_birth);
					$('#efather').val(response.guestmember.father);
					$('#eMother').val(response.guestmember.mother);
					$('#eFamily_member').val(response.guestmember.family_member);
					$('#eBlood_group').val(response.guestmember.blood_group);
					$('#eGender').val(response.guestmember.gender);
					$('#eEduction_type').val(response.guestmember.eduction_type);
					$('#eEducation_skill').val(response.guestmember.education_skill);
					$('#eOccupation').val(response.guestmember.occupation);
					// $('#txtWorkplacee').val(response.guestmember.workplace);
					$('#txtCountrye').val(response.guestmember.country);
					$('#txtCitye').val(response.guestmember.city);
					$('#ePresentadd').val(response.guestmember.presentadd);
					$('#eParmanentadd').val(response.guestmember.parmanentadd);
					$('#eWorkplace_address').val(response.guestmember.workplace_address);
					$('#eRelationship').val(response.guestmember.relationship);
					$('#eNid').val(response.guestmember.nid);
					$('#eDonation_boxId').val(response.guestmember.donation_box_id);
					$('#eTorikot_date').val(response.guestmember.torikot_date);
					$('#eSobok_type').val(response.guestmember.sobok_type);
					$('#eBrunchId').val(response.guestmember.brunch_id);
					$('#eBrunch_name').val(response.guestmember.brunch_name);
					$('#eBaiyat_date').val(response.guestmember.baiyat_date);
					$('#eOccasion').val(response.guestmember.occasion);
					$('#eDuty').val(response.guestmember.duty);
					// $('#eFilephoto').removeAttr(response.member.photo);

                    $("#eFilephoto").html(
                        // `<img src="img/${response.guestmember.photo}" width="100" class="img-fluid img-thumbnail">`);
                        `<img src='{{asset("img/`+response.guestmember.photo+`")}}' width="100" class="img-fluid img-thumbnail">`);
					$('#eDesignation').val(response.guestmember.designation);

				}
			});
		});


        $('#txtWorkplacee').on('change', function () {
			var idCountry = this.value;
			$("#txtCountrye").html('');
			$.ajax({
				url: "{{url('api/fetch-country')}}",
				type: "POST",
				data: {
					work_p_id: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
					$('#txtCountrye').html('<option value="">Select Country</option>');
					$.each(result.countries, function (key, value) {
						$("#txtCountrye").append('<option value="' + value
							.id + '">' + value.name + '</option>');
					});
					 $('#txtdivisione').html('<option value="">Select Division</option>');
				}
			});
		});
		$('#txtCountrye').on('change', function () {
			var idState = this.value;
			$("#txtdivisione").html('');
			$.ajax({
				url: "{{url('api/fetch-cities')}}",
				type: "POST",
				data: {
					country_id: idState,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#txtdivisione').html('<option value="">Select Division</option>');
					$.each(res.cities, function (key, value) {
						$("#txtdivisione").append('<option value="' + value
							.id + '">' + value.bn_name + '</option>');
					});

                    $('#txtdistricte').html('<option value="">Select Division</option>');
				}
			});
		});


        $('#txtdivisione').on('change', function () {
			var iddivision = this.value;
			$("#txtdistricte").html('');
			$.ajax({
				url: "{{url('api/fetch-district')}}",
				type: "POST",
				data: {
					division_id: iddivision,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#txtdistricte').html('<option value="">Select Division</option>');
					$.each(res.districts, function (key, value) {
						$("#txtdistricte").append('<option value="' + value
							.id + '">' + value.bn_name + '</option>');
					});

                    $('#txtupazila').html('<option value="">Select Division</option>');
				}
			});
		});


        $('#txtdistricte').on('change', function () {
			var districtid = this.value;
			$("#txtupazilae").html('');
			$.ajax({
				url: "{{url('api/fetch-upazilas')}}",
				type: "POST",
				data: {
					district_id: districtid,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#txtupazilae').html('<option value="">Select upazila</option>');
					$.each(res.Upazilas, function (key, value) {
						$("#txtupazilae").append('<option value="' + value
							.id + '">' + value.bn_name + '</option>');
					});

                    $('#txtunione').html('<option value="">Select Union</option>');
				}
			});
		});

        $('#txtupazilae').on('change', function () {
			var upazillaid = this.value;
			$("#txtunione").html('');
			$.ajax({
				url: "{{url('api/fetch-unions')}}",
				type: "POST",
				data: {
					upazilla_id: upazillaid,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#txtunione').html('<option value="">Select Union</option>');
					$.each(res.Unions, function (key, value) {
						$("#txtunione").append('<option value="' + value
							.id + '">' + value.bn_name + '</option>');
					});


				}
			});
		});
	});

</script>


@endsection



