
@extends('layout.erp.home')
@section('page')

<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Customer List</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">Customer List</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="{{route('customers.create')}}" class="btn add-btn"><i class="fa fa-plus"></i> Add Customer</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- Invitation Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Customer List</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Customer List</h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Customer List</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Customer List</h6>
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
                            <th>Customer Name</th>
                            <th>Deg</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>EN Review</th>

                            <th>Bn Name</th>
                            <th>Bn Deg</th>
                            <th>Bn Review</th>
                            <th>Jp Name</th>
                            <th>Jp Deg</th>
                            <th>Jp Review</th>
                            <th>Status</th>

							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>

                        @forelse ($customers as  $key=> $customer)

						<tr>
							<td>{{++$key}}</td>
                            <td>

                                <h2 class="table-avatar">
                                    <a href="{{route('customers.show',$customer->id)}}" class="avatar"><img src="{{asset('storage/filePhoto/thumbnail')}}/{{$customer->c_photo}}" /></a>

                                    <a href="{{route('customers.show',$customer->id)}}">{{$customer->c_name}} </a>
                                </h2>
                            </td>
                            <td>{{$customer->deg}}</td>
                            <td>{{$customer->c_phone}}</td>
                            <td>{{$customer->c_email}}</td>
                            <td>{!! $customer->c_review !!}</td>
                            <td>{{$customer->bn_c_name}}</td>
                            <td>{{$customer->bn_c_deg}}</td>
                            <td>{!! $customer->bn_review!!}</td>
                            <td>{{$customer->jp_c_name}}</td>
                            <td>{{$customer->jp_c_deg}}</td>
                            <td>{!! $customer->jp_c_review!!}</td>
                            <td>{{$customer->status}}</td>

							<td class="text-right">
								<div class="dropdown dropdown-action">

									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">

                                        <form action="{{route('customers.destroy',$customer->id)}}" method="post" >

                                            <a class='btn btn-success' href="{{route('customers.edit',$customer->id)}}"><i class="bi bi-pencil-square" ></i><a>

                                            <a class='btn btn-info' href="{{route('customers.show',$customer->id)}}"><i class="bi bi-eye-fill" ></i><a>
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
				{{$customers->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->
@endsection

