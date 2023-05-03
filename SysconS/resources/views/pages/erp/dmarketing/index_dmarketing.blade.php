



@extends('layout.erp.home')
@section('page')

<div class="content container-fluid">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Digiral Marketing Page List</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">Digiral Marketing Page List</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="{{route('dmarketings.create')}}" class="btn add-btn"><i class="fa fa-plus"></i> Add Digiral Marketing Page</a>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<!-- Invitation Center Statistics -->
	<div class="row">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Digiral Marketing Page List</h6>
				<h4>12 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Digiral Marketing Page List</h6>
				<h4>118 <span>this month</span></h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Digiral Marketing Page List</h6>
				<h4>23</h4>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
			<div class="stats-info">
				<h6>Digiral Marketing Page List</h6>
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
                            <th>Digiral Marketing Tag</th>
                            <th>Page Url</th>
                            <th>En Sevice Fea</th>
                            <th>Dc Id</th>
                            <th>Dsc Id</th>
                            <th>Status</th>



							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>

                        @forelse ($dmarketings as  $key=> $dmarketing)

						<tr>
							<td>{{++$key}}</td>
                            <td>{{$dmarketing->en_page_title}}</td>
                            <td>{{$dmarketing->bn_page_title}}</td>
                            <td>{{$dmarketing->jp_page_title}}</td>
                            <td>{{$dmarketing->page_bg_photo}}</td>
                            <td>{{$dmarketing->dev_tag}}</td>
                            <td>{{$dmarketing->page_url}}</td>
                            <td>{{$dmarketing->en_sevice_fea}}</td>
                            <td>{{$dmarketing->dc_id}}</td>
                            <td>{{$dmarketing->dsc_id}}</td>
                            <td>{{$dmarketing->status}}</td>



							<td class="text-right">
								<div class="dropdown dropdown-action">

									<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
									<div class="dropdown-menu dropdown-menu-right">

                                        <form action="{{route('dmarketings.destroy',$dmarketing->id)}}" method="post" >

                                            <a class='btn btn-success' href="{{route('dmarketings.edit',$dmarketing->id)}}"><i class="bi bi-pencil-square" ></i><a>

                                            <a class='btn btn-info' href="{{route('dmarketings.show',$dmarketing->id)}}"><i class="bi bi-eye-fill" ></i><a>
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
				{{$dmarketings->links()}}

			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->
@endsection

