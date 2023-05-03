
@extends('layout.erp.home')
@section('page')

<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Project List</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">Project List</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="{{route('projects.create')}}" class="btn add-btn"><i class="fa fa-plus"></i> Add Project</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- Invitation Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Project List</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Project List</h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Project List</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Project List</h6>
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
                            <th>Project Title</th>
                            <th>Project Category</th>
                            <th>Project Photo</th>
                            <th>Project Tag</th>
                            <th>Client</th>
                            <th>P Date</th>
                            <th>P Url</th>


							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>

                        @forelse ($projects as  $key=> $project)

						<tr>
							<td>{{++$key}}</td>
                            <td>{{$project->en_p_title}}</td>
                            <td>{{$project->p_category}}</td>
                            <td>
                                <h2 class="table-avatar">
                                    <a href="#" class="avatar"><img alt="" src="{{ url('storage/filePhoto/thumbnail/'.$project->p_b_photo) }}"></a>

                                </h2>
                            </td>

                            <td>{{$project->p_tag}}</td>
                            <td>{{$project->client}}</td>
                            <td>{{$project->p_date}}</td>
                            <td>{{$project->p_url}}</td>


							<td class="text-right">
								<div class="dropdown dropdown-action">

									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">

                                        <form action="{{route('projects.destroy',$project->id)}}" method="post" >

                                            <a class='btn btn-success' href="{{route('projects.edit',$project->id)}}"><i class="bi bi-pencil-square" ></i><a>

                                            <a class='btn btn-info' href="{{route('projects.show',$project->id)}}"><i class="bi bi-eye-fill" ></i><a>
                                                @csrf
                                                @method("DELETE")


                                                <button type="submit" class="btn btn-danger"  ><i class="fa fa-trash-o m-r-5"></i> </button>

                                            </form>

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
				{{$projects->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->
@endsection

