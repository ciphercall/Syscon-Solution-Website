{{-- @extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('contactsites.create')}}">Create</a><table class='table'>
<tr>
	<th>Id</th>
	<th>C Name</th>
	<th>C Email</th>
	<th>C Details</th>
	<th>Comment</th>
	<th>Deleted At</th>
	<th>Created At</th>
	<th>Updated At</th>

</tr>
@forelse ($contactsites as $contactsite)
<tr>
	<td>{{$contactsite->id}}</td>
	<td>{{$contactsite->c_name}}</td>
	<td>{{$contactsite->c_email}}</td>
	<td>{{$contactsite->c_details}}</td>
	<td>{{$contactsite->comment}}</td>
	<td>{{$contactsite->deleted_at}}</td>
	<td>{{$contactsite->created_at}}</td>
	<td>{{$contactsite->updated_at}}</td>

	<td>
	<div>
	<form action="{{route('contactsites.destroy',$contactsite->id)}}" method="post" >
	<a class='btn btn-primary' href="{{route('contactsites.edit',$contactsite->id)}}">Edit<a>
	<a class='btn btn-info' href="{{route('contactsites.show',$contactsite->id)}}">Show<a>
		@csrf
		@method("DELETE")
		<input class='btn btn-danger' type="submit" name="btnDelete" class="btnDelete" data-id="{{$contactsite->id}}"  value="Delete" />
	</form>
	</div>
	</td>
</tr>
@empty
<tr><td colspan="8">No records found</td></tr>
@endforelse
</table>
{{$contactsites->links()}}

@endsection --}}
@extends('layout.erp.home')
@section('page')

<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Contact List</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">Contact List</li>
				</ul>
			</div>
			{{-- <div class="col-auto float-right ml-auto">
				<a href="{{route('customers.create')}}" class="btn add-btn"><i class="fa fa-plus"></i> Add Customer</a>
			</div> --}}
		</div>
	</div>
	<!-- /Page Header -->

	<!-- Invitation Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Contact List</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Contact List</h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Contact List</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Contact List</h6>
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
                            <th>#</th>
                            <th>Contact Person</th>
                            <th>Email</th>
                            <th>Full Details</th>
                            <th>Date</th>



							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
                        @forelse ($contactsites as $key=> $contactsite)



						<tr>
							<td>{{++$key}}</td>
                            <td>{{$contactsite->c_name}}</td>
                            <td>{{$contactsite->c_email}}</td>
                            <td >{{$contactsite->c_details}} </td>
                            <td>{{$contactsite->created_at}}</td>

							<td class="text-right">
							    <div class="dropdown dropdown-action">

									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">

                                        <form action="{{route('contactsites.destroy',$contactsite->id)}}" method="post" >

                                            <a class='btn btn-success' href="{{route('contactsites.edit',$contactsite->id)}}"><i class="bi bi-pencil-square" ></i><a>

                                            <a class='btn btn-info' href="{{route('contactsites.show',$contactsite->id)}}"><i class="bi bi-eye-fill" ></i><a>
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
				{{$contactsites->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->
@endsection

