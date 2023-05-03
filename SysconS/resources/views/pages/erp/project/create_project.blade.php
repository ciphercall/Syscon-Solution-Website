

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
                <h3 class="page-title">Project Create </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Project</li>
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
                    <h2 class="card-title mb-0">Add Project </h2>
                </div>
                <div class="card-body">
                    <div class="card-body" data-select2-id="select2-data-15-ltse">

                            <form action="{{route('projects.store')}}" method="post" enctype="multipart/form-data" data-select2-id="select2-data-14-6nfs">
                                @csrf
                            <div class="row" data-select2-id="select2-data-13-jku7">

                                <div class="col-md-12">
                                    <h2 class="card-title" id="heading"> Project Category</h2>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Project Category:</label>
                                                <select class="form-control select select2 " name="txtP_category" id="" >

                                                    <option value="">Select..</option>
                                                    @foreach ($procategories as $dc)
                                                    <option value="{{$dc->id}}">{{$dc->p_name}}</option>

                                                    @endforeach


                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <h3 class="card-title" id="heading"> Project Title</h3>
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>En Project Title:</label>
                                                <input type="text" class="form-control" name="txtEn_p_title" placeholder="En Project Title">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Bn Project Title:</label>
                                                <input type="text" class="form-control" name="txtBn_p_title" placeholder="Bn Project Title">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Jp Project Title:</label>
                                                <input type="text" class="form-control" name="txtJp_p_title" placeholder="Jp Project Title">
                                            </div>
                                        </div>

                                    </div>
                                    <h3 class="card-title"  id="heading"> Project Description</h3>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>EN Description</label>
										<textarea rows="4" class="form-control summernote" placeholder="Enter your English Description here" name="txtEn_p_details"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>BN Description</label>
										<textarea rows="4" class="form-control summernote" placeholder="Enter your Bangla Description here"  name="txtBn_p_details"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>JP Description</label>
										        <textarea rows="4" class="form-control summernote" placeholder="Enter your Japness Description here" name="txtJp_p_details"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><b>Add All types Project Facilities</b> </label>
                                        <textarea rows="4" class="form-control summernote" placeholder="Add All types Project Facilities"  name="txtP_facility"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <h3 class="card-title"  id="heading"> Others</h3>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Project Small Photo (370 x 403):</label>
                                                <input type="file" class="form-control" name="txtP_h_photo" placeholder="En Sevice Faq">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Project Bg Photo (1170 x 533):</label>
                                                <input type="file" class="form-control" name="txtP_b_photo" placeholder="En Sevice Faq">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Project Date</label>
                                                <input type="date" class="form-control" name="txtP_date" placeholder="Jp Sevice Faq">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Client Name:</label>
                                                    <input type="text" class="form-control" name="txtClient" placeholder="Client Name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Project Page URL</label>
                                                    <input type="text" class="form-control" name="txtP_url" placeholder="Enter Project Page URL">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Project Tag</label>
                                                    <input type="text" class="form-control" name="txtP_tag" placeholder="Enter Project Page Tag">
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
