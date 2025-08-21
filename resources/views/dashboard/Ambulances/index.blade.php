@extends('dashboard.layouts.master')
@section('css')

@endsection
@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto">{{trans('Insurance.Insurance')}}</h4><span
					class="text-muted mt-1 tx-13 mr-2 mb-0">/
					{{trans('Insurance.Insurances')}}</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')
	<!-- row -->
	<!-- errors -->	

	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<!-- end errors -->
	<div class="row row-sm">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header pb-0">
					<div class="d-flex justify-content-between">
						<div class="col-sm-6 col-md-6 col-xl-2">
							<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
								data-toggle="modal" href="#add"
								style=" transition: 0.3s;">{{trans('Ambulance.add_ambulance')}}</a>
						</div>
						<i class="mdi mdi-dots-horizontal text-gray"></i>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table text-md-nowrap text-center" id="example1">
							<thead>
								<tr>
									<th class="wd-10p border-bottom-0 ">{{trans('Ambulance.ambulance_number')}}</th>
									<th class="wd-10p border-bottom-0 ">{{trans('Ambulance.ambulance_model')}}</th>
									<th class="wd-10p border-bottom-0 ">{{trans('Ambulance.yrear_of_manufacture')}}</th>
									<th class="wd-10p border-bottom-0">{{trans('Ambulance.ambulance_type')}}
									</th>
									<th class="wd-10p border-bottom-0 ">{{trans('Ambulance.driver_name')}}</th>
									<th class="wd-10p border-bottom-0">{{trans('Ambulance.license_driving_number')}}</th>
									<th class="wd-10p border-bottom-0">{{trans('Ambulance.phone_number')}}</th>
									<th class="wd-10p border-bottom-0">{{trans('Ambulance.ambulance_status')}}</th>
									<th class="wd-10p border-bottom-0">{{trans('Ambulance.notes')}}</th>
									<th class="wd-15p border-bottom-0 text-center">
										{{trans('dashboard/sections_trans.action')}}
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($ambulances as $ambulance)
									<tr>
										<td>{{ $ambulance->car_number }}</td>
										<td>{{ $ambulance->car_model }}</td>
										<td>{{ $ambulance->car_year_manufactured }}</td>
										<td>{{ trans("Ambulance.$ambulance->ambulance_type") }}</td>
										<td>{{ $ambulance->driver_name }}</td>
										<td>{{ $ambulance->driver_license_number }}</td>
										<td>{{ $ambulance->driver_phone }}</td>
										<td>
											@if ($ambulance->status == 1)
												<span class="text-success">{{trans('Insurance.Active')}}</span>
											@else
												<span class="text-danger">{{trans('Insurance.Inactive')}}</span>
											@endif
										</td>
										<td>{{ $ambulance->description }}</td>
										<td class="text-center">
											<div class="btn-icon-list d-flex justify-content-around text-light">

												<a data-effect="effect-scale" data-toggle="modal" class="btn btn-sm btn-warning" href="#update{{$ambulance->id}}"><i class="fa fa-edit"></i></a>

												<form action="{{ route('Ambulance.destroy', $ambulance->id) }}" method="POST"
													style="display:inline-block;">
													@csrf
													@method('DELETE')
													<button type="submit"
														class="btn btn-sm btn-danger"><i class="las la-trash"></i></button>
												</form>
											</div>
										</td>
									</tr>

									@include('dashboard.Ambulances.update')
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>


			@include('dashboard.Ambulances.add')
			@include('dashboard.messages_alert')
		</div>
	</div>
	<!--/div-->
	</div>
	<!-- row closed -->
	</div>
	<!-- Container closed -->
	</div>
	<!-- main-content closed -->
@endsection
@section('js')

@endsection