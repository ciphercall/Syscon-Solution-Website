
@extends('layout.erp.home')
@section('page')

<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Projet Category List</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Projet Category List</li>
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
                    <h2 class="card-title mb-0">Add Projet Category </h2>
                </div>
                <div class="card-body">
                    <div class="card-body" data-select2-id="select2-data-15-ltse">

                            <form action="{{route('procategories.store')}}" method="post" enctype="multipart/form-data" data-select2-id="select2-data-14-6nfs">
                                @csrf
                            <div class="row" data-select2-id="select2-data-13-jku7">

                                <div class="col-md-12">
                                    <h4 class="card-title">Projet Category </h4>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Projet Name:</label>
                                                <input type="text" class="form-control" name="txtP_name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Projet URL:</label>
                                                <input type="text" class="form-control" name="txtP_url">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Comment:</label>
                                                <input type="text" class="form-control" name="txtComment">
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
