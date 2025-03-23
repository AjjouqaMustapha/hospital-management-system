@extends('dashboard.layouts.master')
@section('css')

	<link href="{{URL::asset('dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{URL::asset('dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{URL::asset('dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
	<!---Internal Owl Carousel css-->
	<link href="{{URL::asset('dashboard/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
	<!---Internal  Multislider css-->
	<link href="{{URL::asset('dashboard/plugins/multislider/multislider.css')}}" rel="stylesheet">
	<!--- Select2 css -->
	<link href="{{URL::asset('dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
	<!--Internal   Notify -->
	<link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto">{{trans('dashboard/sections_trans.sections')}}</h4><span
					class="text-muted mt-1 tx-13 mr-2 mb-0">/
					{{trans('dashboard/sections_trans.all_sections')}}</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')

@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

	<div class="row row-sm">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header pb-0">
					<div class="d-flex justify-content-between">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
							{{trans('services.add_service')}}
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table text-md-nowrap" id="example2">
							<thead>
								<tr>
									<th>#</th>
									<th> {{trans('Services.name')}}</th>
									<th> {{trans('Services.price')}}</th>
									<th> {{trans('services.status')}}</th>
									<th> {{trans('services.description')}}</th>
									<th>{{trans('services.created_at')}}</th>
									<th>{{trans('services.proccess')}}</th>
								</tr>
							</thead>
							<tbody>
								@if($services->count() > 0)
									@foreach($services as $service)
										<tr>
											<td>{{$loop->iteration}}</td>
											<td>{{$service->name}}</td>
											<td>{{$service->price}}</td>
											<td class="text-center">
												@if ($service->status == 1)
													<span class="label text-success d-flex">
														<div class="dot-label bg-success mr-1"></div>{{trans('doctors.active')}}
													</span>
												@else
													<span class="label text-danger d-flex">
														<div class="dot-label bg-danger mr-1"></div>{{trans('doctors.desacitive')}}
													</span>
												@endif
											</td>
											<td> {{ Str::limit($service->description, 50) }}</td>
											<td>{{ $service->created_at->diffForHumans() }}</td>
											<td>
												<a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
													data-toggle="modal" href="#edit{{$service->id}}"><i class="las la-pen"></i></a>
												<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
													data-toggle="modal" href="#delete{{$service->id}}"><i
														class="las la-trash"></i></a>
											</td>
										</tr>
										@include('dashboard.Services.SingleService.edit')
										@include('dashboard.Services.SingleService.delete')
									@endforeach
								@else
									<tr>
										<td colspan="7" class="text-center">
											no data available
										</td>
									</tr>
								@endif

							</tbody>
						</table>
					</div>

					@include('dashboard.Services.SingleService.add')
					@include('dashboard.messages_alert')
				</div><!-- bd -->
			</div><!-- bd -->
		</div>
		<!-- row closed -->
	</div>
	</div>
	<!-- Container closed -->
	</div>
	<!-- main-content closed -->
@endsection
@section('js')

	<!-- Internal Data tables -->
	<script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
	<script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
	<script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.js')}}"></script>
	<script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
	<script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{URL::asset('Dashboard/plugins/datatable/js/jszip.min.js')}}"></script>
	<script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
	<!--Internal  Datatable js -->
	<script src="{{URL::asset('Dashboard/js/table-data.js')}}"></script>
	<!--Internal  Notify js -->
	<script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
	<script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection