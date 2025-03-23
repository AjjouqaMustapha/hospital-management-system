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
<!--- file upload -->
<link href="{{URL::asset('dashboard/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css" />
<!--Internal   Notify -->
<link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet" />

<!--- Internal Select2 css-->
<link href="{{URL::asset('dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

<link rel="stylesheet" href="{{URL::asset('dashboard/plugins/sumoselect/sumoselect-rtl.css')}}">
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{trans('doctors.doctors')}}</h4><span
                class="text-muted mt-1 tx-13 mr-2 mb-0">/
                {{trans('doctors.add_doctors')}}</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row row-sm">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-lg-12">
        <div class="card">
            <form class="form-horizontal" action="{{ route('Doctors.store') }}" method="post"
                enctype="multipart/form-data" autocomplete="off">
                <div class="card-body">
                    <div class="mb-4 main-content-label">{{trans('doctors.add_doctors')}}</div>
                    @csrf
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">{{trans('doctors.doctors_name')}}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="{{trans('doctors.doctors_name')}}"
                                    name="name" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">{{trans('doctors.email')}}</i></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="{{trans('doctors.email')}}"
                                    name="email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">{{trans('dashboard/login_trans.your_password')}}</i></label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" class="form-control"
                                    placeholder="{{trans('dashboard/login_trans.your_password')}}" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">{{trans('doctors.phone')}}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="{{trans('doctors.phone')}}"
                                    name="phone">
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">{{trans('dashboard/sections_trans.sections')}}</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control select2" name="section">
                                    @foreach ($sections as $section)
                                        <option value="{{$section->id}}">{{$section->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">{{trans('doctors.appointments')}}</label>
                            </div>
                            <div class="col-md-9">
                                <select multiple="multiple" class="form-control select2" name="appointments[]">
                                    @foreach ($appointments as $appointment)
                                        <option value="{{$appointment->id}}">{{$appointment->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">{{trans('doctors.dimage')}}</label>
                            </div>
                            <div class="col-md-9">
                                <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0 mx-auto">
                                    <input type="file" accept="image/*" class="dropify" data-height="200"
                                        name="image" />
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-footer text-left">
                    <button type="submit"
                        class="btn btn-primary waves-effect waves-light">{{trans('doctors.add_doctors')}}</button>
                </div>
            </form>
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





<!--Internal  Datepicker js -->
<script src="{{URL::asset('dashboard/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('dashboard/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal Fileuploads js-->
<script src="{{URL::asset('dashboard/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal Fancy uploader js-->
<script src="{{URL::asset('dashboard/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/fancyuploder/fancy-uploader.js')}}"></script>
<!--Internal  Form-elements js-->
<script src="{{URL::asset('dashboard/js/advanced-form-elements.js')}}"></script>
<script src="{{URL::asset('dashboard/js/select2.js')}}"></script>
<!--Internal Sumoselect js-->
<script src="{{URL::asset('dashboard/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
<!-- Internal TelephoneInput js-->
<script src="{{URL::asset('dashboard/plugins/telephoneinput/telephoneinput.js')}}"></script>
<script src="{{URL::asset('dashboard/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
@endsection