

@extends('layout.erp.home')
@section('page')

<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Development Page List</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">Development Page List</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="{{route('developments.create')}}" class="btn add-btn"><i class="fa fa-plus"></i> Add Development Page</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- Invitation Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Development Page List</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Development Page List</h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Development Page List</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Development Page List</h6>
				<h4>5</h4>
			</div>
		</div>
	</div>
	<!-- /Invitation Center Statistics -->
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
                            <th>En Page Title</th>
                            <th>Bn Page Title</th>
                            <th>Jp Page Title</th>
                            <th>Page Bg Photo</th>
                            <th>Dev Tag</th>
                            <th>Page Url</th>
                            <th>En Sevice Fea</th>
                            <th>Dc Id</th>
                            <th>Dsc Id</th>
                            <th>Status</th>



							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>

                        @forelse ($developments as  $key=> $development)

						<tr>
							<td>{{++$key}}</td>
                            <td>{{$development->en_page_title}}</td>
                            <td>{{$development->bn_page_title}}</td>
                            <td>{{$development->jp_page_title}}</td>
                            <td>{{$development->page_bg_photo}}</td>
                            <td>{{$development->dev_tag}}</td>
                            <td>{{$development->page_url}}</td>
                            <td>{{$development->en_sevice_fea}}</td>
                            <td>{{$development->dc_id}}</td>
                            <td>{{$development->dsc_id}}</td>
                            <td>{{$development->status}}</td>



							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">




										<button type="button" value="{{$development->id}}" class="btn btn-info" id="depSHBtn" ><i class="bi bi-eye-fill" ></i> </button>

										<button type="button" value="{{$development->id}}" class="btn btn-primary" id="depBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$development->id}}" class="btn btn-warning" id="depDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

									</div>
								</div>
							</td>

						</tr>
					</tbody>
					@empty
						<tr><td colspan="14">No records found</td></tr>
					@endforelse

				</table>
				{{$developments->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->
@endsection

