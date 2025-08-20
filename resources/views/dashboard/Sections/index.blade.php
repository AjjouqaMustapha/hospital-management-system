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
				{{trans('dashboard/sections_trans.all_sections')}}</span>
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
							style=" transition: 0.3s;">{{trans('dashboard/sections_trans.add_section')}}</a>
					</div>
					<i class="mdi mdi-dots-horizontal text-gray"></i>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table text-md-nowrap" id="example1">
						<thead>
							<tr>
								<th class="wd-15p border-bottom-0" style="width:1%;">#</th>
								<th class="wd-15p border-bottom-0 w-25">{{trans('dashboard/sections_trans.section_name')}}</th>
								<th class="wd-15p border-bottom-0 w-25">{{trans('dashboard/sections_trans.section_description')}}</th>
								<th class="wd-20p border-bottom-0 ">{{trans('dashboard/sections_trans.date_c')}}</th>
								<th class="wd-15p border-bottom-0 text-center">{{trans('dashboard/sections_trans.action')}}</th>
							</tr>
						</thead>
						<tbody>
							@if ($sections->count() < 1)
								<tr class="">
									<td colspan="4" class="text-center">
										No data availabel
									</td>
								</tr>
							@else
								@foreach ($sections as $section)
									<tr>
										<td>{{$section->id}}</td>
										<td>
											<a href="{{ route('Sections.show',encrypt($section->id)) }}">{{$section->name}}</a>
										</td>
										<td>{{\Str::limit($section->description,50)}}</td>
										<td>{{$section->created_at->diffForHumans()}}</td>
										<td class="d-flex justify-content-center ">
											<a data-effect="effect-scale" href="#update{{$section->id}}" data-toggle="modal"
												class="modal-effect btn btn-sm btn-info mx-1 cursor-pointer"><i
													class="las la-pen"></i></a>
											<a data-effect="effect-scale" href="#delete{{$section->id}}" data-toggle="modal"
												class="modal-effect btn btn-sm btn-danger mx-1 cursor-pointer"><i
													class="las la-trash"></i></a>
										</td>
									</tr>

									@include('dashboard.sections.update')
									@include('dashboard.sections.delete')
								@endforeach
							@endif

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@include('dashboard.sections.add')
	@include('dashboard.messages_alert')
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