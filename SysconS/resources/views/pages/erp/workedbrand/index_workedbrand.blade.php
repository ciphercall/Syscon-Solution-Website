
@extends('layout.erp.home')
@section('page')

<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Worked Brand List</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">Worked Brand List</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="{{route('workedbrands.create')}}" class="btn add-btn"><i class="fa fa-plus"></i> Add Worked brand</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- Invitation Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>workedbrand List</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>workedbrand List</h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>workedbrand List</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>workedbrand List</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>


	@if (session('success'))
		<div class="alert alert-success"><b>{{session('success')}}</b> </div>
	@endif
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table display nowrap" id="example">
					<thead>
						<tr>
                            <th>Id</th>
                            <th>EN Brand Name</th>
                            <th>Bn W Brand Name</th>
                            <th>Jp W Brand Name</th>
                            <th>EN Work Details</th>

                            <th>Bn Work Details</th>
                            <th>Jp Work Details</th>
                            <th>B Logo</th>
                            <th>Comment</th>

							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>

                        @forelse ($workedbrands as  $key=> $workedbrand)

						<tr>
							<td>{{++$key}}</td>
                            <td>{{$workedbrand->w_brand_name}}</td>
                            <td>{{$workedbrand->bn_w_brand_name}}</td>
                            <td>{{$workedbrand->jp_w_brand_name}}</td>
                            <td>{{$workedbrand->work_details}}</td>

                            <td>{{$workedbrand->bn_work_details}}</td>
                            <td>{{$workedbrand->jp_work_details}}</td>
                            <td>{{$workedbrand->b_logo}}</td>
                            <td>{{$workedbrand->comment}}</td>

							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">




										<form action="{{route('workedbrands.destroy',$workedbrand->id)}}" method="post" >

                                            <a class='btn btn-success' href="{{route('workedbrands.edit',$workedbrand->id)}}"><i class="bi bi-pencil-square" ></i><a>

                                            <a class='btn btn-info' href="{{route('workedbrands.show',$workedbrand->id)}}"><i class="bi bi-eye-fill" ></i><a>
                                                @csrf
                                                @method("DELETE")


                                                <button type="submit" class="btn btn-danger" id="depDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

                                            </form>

									</div>
								</div>
							</td>

						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$workedbrands->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->
@endsection

