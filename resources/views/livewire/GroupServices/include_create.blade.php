@extends('dashboard.layouts.master')
@section('css')
@endsection
@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')
	<!-- row -->
	<div class="row row-sm">
		<div class="col-xl-12">
			<div class="card w-75 m-auto">
				<div class="card-body">
					<livewire:create-group-services />
				</div>
			</div>
		</div>
		<!-- row closed -->
	</div>
	</div>
	<!-- Container closed -->
	</div>
	<!-- main-content closed -->
@endsection
@section('js')
@endsection