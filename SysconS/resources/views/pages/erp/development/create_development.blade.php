
@extends('layout.erp.home')
@section('page')
<style>
    #heading{
color: rgb(0, 0, 0);
background-color: rgba(156, 187, 223, 0.904);
text-align: center;
border-radius: 20px;
font-size: 25px;
padding: 10px;

    }
</style>
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Development Page Create </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Development Page</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-lg-12">

            <!--  ///////////////////////////////////-->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title mb-0">Add Development Page </h2>
                </div>
                <div class="card-body">
                    <div class="card-body" data-select2-id="select2-data-15-ltse">

                            <form action="{{route('developments.store')}}" method="post" enctype="multipart/form-data" data-select2-id="select2-data-14-6nfs">
                                @csrf
                            <div class="row" data-select2-id="select2-data-13-jku7">

                                <div class="col-md-12">
                                    <h2 class="card-title" id="heading"> Page Category</h2>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category:</label>
                                                <select class="form-control select select2 " name="cmbDcId" id="" >

                                                    <option value="">Select..</option>
                                                    @foreach ($dcs as $dc)
                                                    <option value="{{$dc->id}}">{{$dc->dcategory}}</option>

                                                    @endforeach


                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sub-Category:</label>
                                                <select class="form-control select select2 " name="cmbDscId" id="" >


                                                    <option value="">Select..</option>
                                                    @foreach ($dscs as $dc)
                                                    <option value="{{$dc->id}}">{{$dc->category}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="card-title" id="heading"> Page Title</h3>
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>En Page Title:</label>
                                                <input type="text" class="form-control" name="txtEn_page_title" placeholder="En Page Title">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Bn Page Title:</label>
                                                <input type="text" class="form-control" name="txtBn_page_title" placeholder="Bn Page Title">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Jp Page Title:</label>
                                                <input type="text" class="form-control" name="txtJp_page_title" placeholder="Jp Page Title">
                                            </div>
                                        </div>

                                    </div>
                                    <h3 class="card-title"  id="heading"> Page Description</h3>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>EN Description</label>
										<textarea rows="4" class="form-control summernote" placeholder="Enter your English Description here" name="txtEn_page_details"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>BN Description</label>
										<textarea rows="4" class="form-control summernote" placeholder="Enter your Bangla Description here"  name="txtBn_page_details"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>JP Description</label>
										        <textarea rows="4" class="form-control summernote" placeholder="Enter your Japness Description here" name="txtJp_page_details"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <h3 class="card-title"  id="heading"> Service</h3>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>En Sevice Faq:</label>
                                                <input type="text" class="form-control" name="txtEn_sevice_fea" placeholder="En Sevice Faq">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Bn Sevice Faq:</label>
                                                <input type="text" class="form-control" name="txtBn_sevice_fea" placeholder="Bn Sevice Faq">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Jp Sevice Faq:</label>
                                                <input type="text" class="form-control" name="txtJp_sevice_fea" placeholder="Jp Sevice Faq">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>En Sevice Faq Details:</label>
                                                <input type="text" class="form-control" name="txtEn_sevice_f_d" placeholder="En Sevice Faq">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Bn Sevice Faq Details:</label>
                                                <input type="text" class="form-control" name="txtBn_sevice_f_d" placeholder="Bn Sevice Faq">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Jp Sevice Faq Details:</label>
                                                <input type="text" class="form-control" name="txtJp_sevice_f_d" placeholder="Jp Sevice Faq">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Sevice Page Small Photo (380 x 340):</label>
                                                    <input type="file" class="form-control" name="txtSevice_f_photo" placeholder="En Sevice Faq">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Page URL</label>
                                                    <input type="test" class="form-control" name="txtPage_url" placeholder="Enter Page URL">
                                                </div>
                                            </div>


                                        </div>
                                        <h3 class="card-title"  id="heading"> Others</h3>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Page Big Photo (770 x 450):</label>
                                                    <input type="file" class="form-control" name="txtPage_bg_photo" placeholder="En Sevice Faq">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Page Tag:</label>
                                                    <input type="text" class="form-control" name="txtDev_tag" placeholder="Bn Sevice Faq">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Development Benefits(English):</label>
                                                    <input type="text" class="form-control" name="txtBenefits_text" placeholder="Development Benefits English">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Development Benefits (Bangla) :</label>
                                                    <input type="text" class="form-control" name="txtBenefits_text_bn" placeholder="Development Benefits Bangla">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Development Benefits (Japanese):</label>
                                                    <input type="text" class="form-control" name="txtBenefits_text_jp" placeholder="Development Benefits Japanese">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Why you Should Hire? (Part English)</label>
                                            <textarea rows="4" class="form-control summernote" placeholder="Why you Should Hire? (Part English)"  name="txtDev_faq"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Why you Should Hire? (Part Bangla)</label>
                                            <textarea rows="4" class="form-control summernote" placeholder="Why you Should Hire? (Part Bangla)"  name="txtDev_faq_bn"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Why you Should Hire? (Part Japnese)</label>
                                            <textarea rows="4" class="form-control summernote" placeholder="Why you Should Hire? (Part Japnese)"  name="txtDev_faq_jp"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ////////////////////////// -->


        </div>
    </div>

</div>
@endsection
