@extends('layout.erp.home')
@section('page')
{{--
<a class='btn btn-success' href="{{route('employees.create')}}">Create</a><table class='table'>
<tr>
	<th>Id</th>
	<th>E Name</th>
	<th>Deg</th>
	<th>It Background</th>
	<th>E Photo</th>
	<th>Fb Link</th>
	<th>Linkdin Link</th>
	<th>Instagram Link</th>
	<th>Twitter Link</th>
	<th>Status</th>
	<th>Emp Id</th>
	<th>Created At</th>
	<th>Updated At</th>
	<th>Deleted At</th>

</tr>
@forelse ($employees as $employee)
<tr>
	<td>{{$employee->id}}</td>
	<td>{{$employee->e_name}}</td>
	<td>{{$employee->deg}}</td>
	<td>{{$employee->it_background}}</td>
	<td>{{$employee->e_photo}}</td>
	<td>{{$employee->fb_link}}</td>
	<td>{{$employee->linkdin_link}}</td>
	<td>{{$employee->instagram_link}}</td>
	<td>{{$employee->twitter_link}}</td>
	<td>{{$employee->status}}</td>
	<td>{{$employee->emp_id}}</td>
	<td>{{$employee->created_at}}</td>
	<td>{{$employee->updated_at}}</td>
	<td>{{$employee->deleted_at}}</td>

	<td>
	<div>
	<form action="{{route('employees.destroy',$employee->id)}}" method="post" >
	<a class='btn btn-primary' href="{{route('employees.edit',$employee->id)}}">Edit<a>
	<a class='btn btn-info' href="{{route('employees.show',$employee->id)}}">Show<a>
		@csrf
		@method("DELETE")
		<input class='btn btn-danger' type="submit" name="btnDelete" class="btnDelete" data-id="{{$employee->id}}"  value="Delete" />
	</form>
	</div>
	</td>
</tr>
@empty
<tr><td colspan="14">No records found</td></tr>
@endforelse
</table>
{{$employees->links()}} --}}
<!-- Page Content -->
<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Employee List</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">Employee List</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="{{route('employees.create')}}" class="btn add-btn"><i class="fa fa-plus"></i> Add Employee</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- Invitation Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Employee List</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Employee List</h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Employee List</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Employee List</h6>
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
                            <th>Emp Id</th>

                            <th>E Name</th>
                            <th>Deg</th>
                            <th>It Background</th>
                            <th>Education</th>
                            <th>Fb Link</th>
                            <th>Linkdin Link</th>
                            <th>Instagram Link</th>
                            <th>Twitter Link</th>
                            <th>Status</th>

							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>

                        @forelse ($employees as  $key=> $employee)

						<tr>
							<td>{{++$key}}</td>
                            <td>{{$employee->emp_id}}</td>

                            <td>
                                <h2 class="table-avatar">
                                    <a href="{{route('employees.show',$employee->id)}}" class="avatar"><img src="{{asset('storage/filePhoto/thumbnail')}}/{{$employee->e_photo}}" /></a>

                                    <a href="{{route('employees.show',$employee->id)}}">{{$employee->e_name}}</a>
                                </h2>
                            </td>
                            <td>{{$employee->deg}}</td>
                            <td>{{$employee->it_background}}</td>
                            <td>{{$employee->e_photo}}</td>
                            <td>{{$employee->fb_link}}</td>
                            <td>{{$employee->linkdin_link}}</td>
                            <td>{{$employee->instagram_link}}</td>
                            <td>{{$employee->twitter_link}}</td>
                            <td>{{$employee->status}}</td>

							<td class="text-right">


                                <div class="dropdown dropdown-action">

									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">

                                        <form action="{{route('employees.destroy',$employee->id)}}" method="post" >

                                            <a class='btn btn-success' href="{{route('employees.edit',$employee->id)}}"><i class="bi bi-pencil-square" ></i><a>

                                            <a class='btn btn-info' href="{{route('employees.show',$employee->id)}}"><i class="bi bi-eye-fill" ></i><a>
                                                @csrf
                                                @method("DELETE")


                                                <button type="submit" class="btn btn-danger" id="depDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

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
				{{$employees->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->
@endsection
