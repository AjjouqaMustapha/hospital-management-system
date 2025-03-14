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
			<h4 class="content-title mb-0 my-auto">{{trans('doctors.doctors')}}</h4><span
				class="text-muted mt-1 tx-13 mr-2 mb-0">/
				{{trans('doctors.all_doctors')}}</span>
		</div>
	</div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row row-sm">








	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
		<div class="card">
			<div class="card-header pb-0">
				<div class="d-flex">
					<div class="col-sm-6 col-md-6 col-xl-2">
						<a class="btn btn-outline-primary btn-block"  href="{{route('Doctors.create')}}"
							style=" transition: 0.2s;">{{trans('doctors.add_doctors')}}</a>
					</div>
					<div class="col-sm-6 col-md-6 col-xl-2">
						<button type="button" class="modal-effect btn btn-outline-danger "
							id="btn_delete_all"><i class="lar la-trash-alt" style="font-size:20px;transition: 0.2s;"></i></button>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive border-top userlist-table">
					<table class="table card-table table-striped table-vcenter text-center mb-0 " id="doctors_table">
						<thead>
							<tr>
								<th><input name="select_all" id="example-select-all" type="checkbox" /></th>
								<th class=" border-bottom-0"></th>
								<th class=" border-bottom-0">{{trans('doctors.name')}}</th>
								<th class=" border-bottom-0">{{trans('doctors.email')}}</th>
								<th class=" border-bottom-0">{{trans('doctors.section')}}</th>
								<th class=" border-bottom-0">{{trans('doctors.phone')}}</th>
								<th class=" border-bottom-0">{{trans('doctors.appointments')}}</th>
								<th class=" border-bottom-0">{{trans('doctors.price')}}</th>
								<th class=" border-bottom-0">{{trans('doctors.status')}}</th>
								<th class=" border-bottom-0">{{trans('doctors.created_at')}}</th>
								<th class=" border-bottom-0">{{trans('doctors.proccess')}}</th>
							</tr>
						</thead>
						<tbody>
							@if ($doctors->count() < 1)
								<tr class="">
									<td colspan="11" class="text-center">
										No data availabel
									</td>
								</tr>
							@else
								@foreach ($doctors as $doctor)
									<tr>
										<td><input type="checkbox" name="delete_select" value="{{$doctor->id}}"
												class="delete_select"></td>
										<td>
											@if($doctor->image)
												<img src="{{Storage::url('Dashboard/img/doctors/' . $doctor->image->url)}}"
													alt="avatar" class="rounded-circle avatar-md mr-2">
											@else
												<img src="{{Storage::url('Dashboard/img/doctors/doctor.png')}}" alt="avatar"
													class="rounded-circle avatar-md mr-2">
											@endif
										</td>
										<td>{{$doctor->DoctorTranslation->name}}</td>
										<td>{{$doctor->email}}</td>
										<td>{{$doctor->section->name}}</td>
										<td>{{$doctor->phone}}</td>
										<td>{{$doctor->DoctorTranslation->appointments}}</td>
										<td>{{$doctor->price}}</td>
										<td class="text-center">
											@if ($doctor->status == 1)
												<span class="label text-success d-flex">
													<div class="dot-label bg-success mr-1"></div>{{trans('doctors.active')}}
												</span>
											@else
												<span class="label text-danger d-flex">
													<div class="dot-label bg-danger mr-1"></div>{{trans('doctors.desacitive')}}
												</span>
											@endif
										</td>
										<td>{{$doctor->created_at->diffForHumans()}}</td>
										<td class="d-flex justify-content-center ">
											<a href="{{route('Doctors.create', $doctor->id)}}"
												class="btn btn-sm btn-info cursor-pointer" ata-effect="effect-scale"
												data-toggle="modal">
												<i class="las la-pen"></i>
											</a>
											<a data-effect="effect-scale" href="#delete{{$doctor->id}}" data-toggle="modal"
												class="modal-effect btn btn-sm btn-danger mx-1 cursor-pointer"><i
													class="las la-trash"></i></a>
										</td>
									</tr>

									@include('dashboard.doctors.delete')
									@include('dashboard.doctors.delete_select')
								@endforeach
							@endif

						</tbody>
					</table>
				</div>
				<div class="card-footer">
					<ul class="pagination ">
						{{-- Previous Page Link --}}
						@if ($doctors->onFirstPage())
							<li class="page-item page-prev disabled"><span class="page-link">السابق</span></li>
						@else
							<li class="page-item page-prev ">
								<a href="{{ $doctors->previousPageUrl() }}" class="page-link">السابق</a>
							</li>
						@endif

						{{-- Pagination Elements --}}
						@for ($page = 1; $page <= $doctors->lastPage(); $page++)
							@if ($page == $doctors->currentPage())
								<li class="page-item active mx-2"><span class="page-link rounded">{{ $page }}</span></li>
							@else
								<li class="page-item">
									<a href="{{ $doctors->url($page) }}" class="page-link rounded">{{ $page }}</a>
								</li>
							@endif
						@endfor

						{{-- Next Page Link --}}
						@if ($doctors->hasMorePages())
							<li class="page-item page-next">
								<a href="{{ $doctors->nextPageUrl() }}" class="page-link">التالي</a>
							</li>
						@else
							<li class="page-item page-next disabled "><span class="page-link">التالي</span></li>
						@endif
					</ul>

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


<script>
	$(function () {
		jQuery("[name=select_all]").click(function (source) {
			checkboxes = jQuery("[name=delete_select]");
			for (var i in checkboxes) {
				checkboxes[i].checked = source.target.checked;
			}
		});
	})
</script>

<script type="text/javascript">
	$(function () {
		$("#btn_delete_all").click(function () {
			var selected = [];
			$("#doctors_table input[name=delete_select]:checked").each(function () {
				selected.push(this.value);
			});

			if (selected.length > 0) {
				$('#delete_select').modal('show')
				$('input[id="delete_select_id"]').val(selected);
			}
		});
	});
</script>
<!-- Internal Data tables -->
<script src="{{URL::asset('dashboard/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datepicker js -->
<script src="{{URL::asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('dashboard/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('dashboard/js/modal.js')}}"></script>

<!--Internal  Notify js -->
<script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection