@extends('layout.erp.home')
@section('page')

<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Employee List</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Employee List</li>
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
                    <h2 class="card-title mb-0">Add Employee </h2>
                </div>
                <div class="card-body">
                    <div class="card-body" data-select2-id="select2-data-15-ltse">

                            <form action="{{route('employees.store')}}" method="post" enctype="multipart/form-data" data-select2-id="select2-data-14-6nfs">
                                @csrf
                            <div class="row" data-select2-id="select2-data-13-jku7">

                                <div class="col-md-12">
                                    <h3 class="card-title">Add Employee Details</h3>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Employee ID:</label>
                                                <input type="text" class="form-control" name="cmbEmpId" value="EMP-0">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Employee Name:</label>
                                                <input type="text" class="form-control" name="txtE_name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Designation:</label>
                                                <input type="text" class="form-control" name="txtDeg">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Educational Background:</label>
                                                <input type="text" class="form-control" name="txtIt_background">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Facebook Link:</label>
                                                <input type="text" class="form-control" name="txtFb_link" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Instagram Link:</label>
                                                <input type="text" class="form-control" name="txtInstagram_link">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Linkdin Link:</label>
                                                <input type="text" class="form-control" name="txtLinkdin_link">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Twitter Link:</label>
                                                <input type="text" class="form-control" name="txtTwitter_link">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Photo:</label>
                                                <input type="file" class="form-control" name="filePhoto">
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
