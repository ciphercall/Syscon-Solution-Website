<div class="col-sm-12">
    <div class="form-group">
        <label class="col-form-label">উপলক্ষ: <span class="text-danger">*</span></label>


        <select id="cmbMemberId" class="form-control" name="txtOccasion" required>
            <option selected>Choose...</option>

            @foreach ($occasions as $occasion)
            <option value="{{ $occasion->id }}"> {{ $occasion->name }} </option>
            @endforeach
        </select>



            {{-- <div class="col-sm-12">
                <!-- checkbox -->

                <div class="form-group clearfix">
                    @foreach ($occasions as $occasion)
                  <div class="icheck-success d-inline">
                    <input type="checkbox" id="{{ $occasion->id }}" value="{{ $occasion->id }}">
                    <label for="{{ $occasion->id }}" style="color: rgb(255, 255, 255); font-size:15px; font-weight: bold;padding-right: 20px">{{ $occasion->name }}
                    </label>
                  </div>
                  @endforeach

                </div>

            </div> --}}
    </div>
</div>
<div class="col-sm-12">
    <div class="form-group">
        <label class="col-form-label">দায়িত্তঃ</label>
        {{-- <input type="text" class="form-control" id="txtNum_speakers" name="txtDuty" placeholder=" Number Of Speakers Name" required> --}}

        {{-- <select id="cmbMemberId" class="form-control" name="txtDuty" required>
            <option selected>Choose...</option>

            @foreach ($dutys as $duty)
            <option value="{{ $duty->id }}"> {{ $duty->name }} </option>
            @endforeach
            </select> --}}

            <div class="col-sm-12">
                <!-- checkbox -->

                <div class="form-group clearfix">
                    @foreach ($dutys as $duty)
                  <div class="icheck-success d-inline" >
                    <input type="checkbox" id="{{ $duty->id }}" value="{{ $duty->id }}" >
                    <label for="{{ $duty->id }}" style="color: rgb(255, 255, 255); font-size:15px; font-weight: bold;padding-right: 20px">{{ $duty->name }}
                    </label>
                  </div>
                  @endforeach

                </div>

            </div>



    </div>
</div>

  {{-- <div class="col-sm-4">
    <div class="form-group">
        <label class="col-form-label">Demo: <span class="text-danger">*</span></label>
        <select class="select2" multiple="multiple" >
            <option>Alabama</option>
            <option>Alaska</option>
            <option>California</option>
            <option>Delaware</option>
            <option>Tennessee</option>
            <option>Texas</option>
            <option>Washington</option>
          </select>
    </div>
</div>
--}}
