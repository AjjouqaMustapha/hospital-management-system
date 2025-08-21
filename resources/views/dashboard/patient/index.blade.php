@extends('dashboard.layouts.master')
@section('css')

@endsection
@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto">{{trans('dashboard/sections_trans.sections')}}</h4><span
					class="text-muted mt-1 tx-13 mr-2 mb-0">/
					{{trans('Patient.Patients')}}</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')
	<!-- row -->

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
						<div class="col-sm-6 col-md-6 col-xl-2">
							<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
								data-toggle="modal" href="#add"
								style=" transition: 0.3s;">{{trans('Patient.Add_Patient')}}</a>
						</div>
						<i class="mdi mdi-dots-horizontal text-gray"></i>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table text-md-nowrap text-center" id="example1">
							<thead>
								<tr>
									<th class="wd-5p border-bottom-0">#</th>
									<th class="wd-10p border-bottom-0 ">{{trans('Patient.Patient_Name')}}</th>
									<th class="wd-10p border-bottom-0 ">{{trans('Patient.Patient_email')}}</th>
									<th class="wd-10p border-bottom-0 ">{{trans('Patient.birth_date')}}</th>
									<th class="wd-10p border-bottom-0">{{trans('Patient.Patient_Phone')}}
									</th>
									<th class="wd-10p border-bottom-0 ">{{trans('Patient.Patient_sex')}}</th>
									<th class="wd-10p border-bottom-0">{{trans('Patient.Blood_Type')}}</th>
									<th class="wd-10p border-bottom-0">{{trans('Patient.Patient_Address')}}</th>
									<th class="wd-10p border-bottom-0 text-center">
										{{trans('dashboard/sections_trans.action')}}
									</th>
								</tr>
							</thead>
							<tbody>
								@if ($patients->count() == 0)
									<tr>
										<td colspan="9" class="text-center">
											no data available
										</td>
									</tr>
								@else
									@foreach ($patients as $patient)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $patient->name }}</td>
											<td>{{ $patient->email }}</td>
											<td>{{ $patient->Date_Birth }}</td>
											<td>{{ $patient->Phone }}</td>
											<td>{{ $patient->Gender }}</td>
											<td>{{ $patient->Blood_Group }}</td>
											<td>{{ $patient->Address }}</td>
											<td class="text-center">
												<div class="btn-icon-list d-flex justify-content-around text-light">

													<a data-effect="effect-scale" data-toggle="modal" class="btn btn-sm btn-warning"
														href="#update{{$patient->id}}"><i class="fa fa-edit"></i></a>

													<a data-effect="effect-scale" data-toggle="modal" class="btn btn-sm btn-info"
														href="#update_password{{$patient->id}}"><i class="fa fa-key"></i></a>
													
													<form action="{{ route('Patient.destroy', $patient->id) }}" method="POST"
														style="display:inline-block;">
														@csrf
														@method('DELETE')
														<button type="submit" class="btn btn-sm btn-danger"><i
																class="las la-trash"></i></button>
													</form>
												</div>
											</td>

											@include('dashboard.patient.update_password')
											@include('dashboard.patient.update')
									@endforeach
								@endif

							</tbody>
						</table>
					</div>
				</div>
			</div>
			@include('dashboard.patient.add')


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