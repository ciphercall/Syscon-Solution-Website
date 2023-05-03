{{-- @extends('layout.erp.home')
@section('page')

<a class='btn btn-success' href="{{route('sysnews.create')}}">Create</a><table class='table'>
<tr>
	<th>Id</th>
	<th>En News H</th>
	<th>Bn News H</th>
	<th>Jp News H</th>
	<th>En News D</th>
	<th>Bn News D</th>
	<th>Jp News D</th>
	<th>News Date</th>
	<th>N Tag</th>
	<th>News Category</th>
	<th>N B Photo</th>
	<th>N H Photo</th>
	<th>Pho Alt Text</th>
	<th>Created At</th>
	<th>Updated At</th>
	<th>Deleted At</th>

</tr>
@forelse ($sysnews as $sysnew)
<tr>
	<td>{{$sysnew->id}}</td>
	<td>{{$sysnew->en_news_h}}</td>
	<td>{{$sysnew->bn_news_h}}</td>
	<td>{{$sysnew->jp_news_h}}</td>
	<td>{{$sysnew->en_news_d}}</td>
	<td>{{$sysnew->bn_news_d}}</td>
	<td>{{$sysnew->jp_news_d}}</td>
	<td>{{$sysnew->news_date}}</td>
	<td>{{$sysnew->n_tag}}</td>
	<td>{{$sysnew->news_category}}</td>
	<td>{{$sysnew->n_b_photo}}</td>
	<td>{{$sysnew->n_h_photo}}</td>
	<td>{{$sysnew->pho_alt_text}}</td>
	<td>{{$sysnew->created_at}}</td>
	<td>{{$sysnew->updated_at}}</td>
	<td>{{$sysnew->deleted_at}}</td>

	<td>
	<div>
	<form action="{{route('sysnews.destroy',$sysnew->id)}}" method="post" >
	<a class='btn btn-primary' href="{{route('sysnews.edit',$sysnew->id)}}">Edit<a>
	<a class='btn btn-info' href="{{route('sysnews.show',$sysnew->id)}}">Show<a>
		@csrf
		@method("DELETE")
		<input class='btn btn-danger' type="submit" name="btnDelete" class="btnDelete" data-id="{{$sysnew->id}}"  value="Delete" />
	</form>
	</div>
	</td>
</tr>
@empty
<tr><td colspan="16">No records found</td></tr>
@endforelse
</table>
{{$sysnews->links()}}

@endsection --}}
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
                            <th>C Name</th>
                            <th>Deg</th>
                            <th>C Phone</th>
                            <th>C Email</th>
                            <th>C Review</th>

                            <th>Bn C Name</th>
                            <th>Bn C Deg</th>
                            <th>Bn Review</th>
                            <th>Jp C Name</th>
                            <th>Jp C Deg</th>
                            <th>Jp C Review</th>
                            <th>Status</th>

							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>

                        @forelse ($customers as  $key=> $customer)

						<tr>
							<td>{{++$key}}</td>
                            <td>{{$customer->c_name}}</td>
                            <td>{{$customer->deg}}</td>
                            <td>{{$customer->c_phone}}</td>
                            <td>{{$customer->c_email}}</td>
                            <td>{{$customer->c_review}}</td>
                            <td>{{$customer->bn_c_name}}</td>
                            <td>{{$customer->bn_c_deg}}</td>
                            <td>{{$customer->bn_review}}</td>
                            <td>{{$customer->jp_c_name}}</td>
                            <td>{{$customer->jp_c_deg}}</td>
                            <td>{{$customer->jp_c_review}}</td>
                            <td>{{$customer->status}}</td>

							<td class="text-right">
								<div class="dropdown dropdown-action">
									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">




										<button type="button" value="{{$depositcenter->id}}" class="btn btn-info" id="depSHBtn" ><i class="bi bi-eye-fill" ></i> </button>

										<button type="button" value="{{$depositcenter->id}}" class="btn btn-primary" id="depBtn" ><i class="bi bi-pencil-square" ></i> </button>

										<button type="button" value="{{$depositcenter->id}}" class="btn btn-warning" id="depDbtn" ><i class="fa fa-trash-o m-r-5"></i> </button>

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

