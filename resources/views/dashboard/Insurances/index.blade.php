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
	<div class="row row-sm">
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header pb-0">
					<div class="d-flex justify-content-between">
						<div class="col-sm-6 col-md-6 col-xl-2">
							<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
								data-toggle="modal" href="#add"
								style=" transition: 0.3s;">{{trans('Insurance.Add_Insurance')}}</a>
						</div>
						<i class="mdi mdi-dots-horizontal text-gray"></i>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table text-md-nowrap" id="example1">
							<thead>
								<tr>
									<th class="wd-5p border-bottom-0">#</th>
									<th class="wd-10p border-bottom-0 ">{{trans('Insurance.Company_code')}}</th>
									<th class="wd-10p border-bottom-0 ">{{trans('Insurance.Insurance_Name')}}</th>
									<th class="wd-10p border-bottom-0 ">{{trans('Insurance.discount_percentage')}}</th>
									<th class="wd-10p border-bottom-0">{{trans('Insurance.Insurance_bearing_percentage')}}
									</th>
									<th class="wd-10p border-bottom-0 ">{{trans('Insurance.Insurance_Description')}}</th>
									<th class="wd-10p border-bottom-0">{{trans('Insurance.Status')}}</th>
									<th class="wd-10p border-bottom-0 ">{{trans('dashboard/sections_trans.date_c')}}</th>
									<th class="wd-15p border-bottom-0 text-center">
										{{trans('dashboard/sections_trans.action')}}
									</th>
								</tr>
							</thead>
							<tbody>
								@if ($insurances->count() < 1)
									<tr class="">
										<td colspan="8" class="text-center">
											No data available
										</td>
									</tr>
								@else
									@foreach ($insurances as $insurance)
										<tr>
											<td>{{$insurance->id}}</td>
											<td>{{$insurance->insurance_code}}</td>
											<td>{{$insurance->name}}</td>
											<td>{{$insurance->discount_percentage}}%</td>
											<td>{{$insurance->company_rate}}%</td>
											<td>{{\Str::limit($insurance->description, 50)}}</td>
											<td>
												@if ($insurance->status == 1)
													<span class="text-success">{{trans('Insurance.Active')}}</span>
												@else
													<span class="text-danger">{{trans('Insurance.Inactive')}}</span>
												@endif
											</td>
											<td>{{$insurance->created_at->diffForHumans()}}</td>
											<td class="text-center">
												<a data-effect="effect-scale" data-toggle="modal" href="#update{{$insurance->id}}"
													class="btn btn-sm btn-warning">{{trans('Insurance.Edit')}}</a>
												<form action="{{ route('Insurances.destroy', $insurance->id) }}" method="POST"
													style="display:inline-block;">
													@csrf
													@method('DELETE')
													<button type="submit"
														class="btn btn-sm btn-danger">{{trans('Insurance.Delete')}}</button>
												</form>
											</td>
										</tr>

										@include('dashboard.Insurances.update')

									@endforeach
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
			@include('dashboard.Insurances.add')


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