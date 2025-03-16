@extends('dashboard.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('Dashboard/plugins/sumoselect/sumoselect-rtl.css') }}">
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet" />

    <!-- Internal Select2 css -->
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{URL::asset('Dashboard/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}"
        rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{URL::asset('Dashboard/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">

    <!--- file upload -->
    <link href="{{URL::asset('dashboard/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="{{URL::asset('dashboard/plugins/sumoselect/sumoselect-rtl.css')}}">
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('doctors.doctors')}}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Edit doctor : {{ $doctor->name }}</span>
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

    <div class="col-lg-12">
        <div class="card">
            <div class="d-flex justify-content-center mt-5">
                @if($doctor->image)
                    <img src="{{Storage::url('Dashboard/img/doctors/' . $doctor->image->url)}}" alt="avatar"
                        class="rounded " style="width: 200px; height: 200px; object-fit: cover;">
                @else
                    <img src="{{Storage::url('Dashboard/img/doctors/doctor.png')}}" alt="avatar" class="rounded"
                        style="width: 200px; height: 200px; object-fit: cover;">
                @endif
            </div>
            <form class="form-horizontal" action="{{ route('Doctors.update', 'test') }}" method="post" enctype="multipart/form-data"
                autocomplete="off">
                <div class="card-body">
                    <div class="mb-4 main-content-label">{{trans('doctors.add_doctors')}}</div>
                    @csrf
                    @method('patch')
                    <input type="hidden" name="id" value="{{ $doctor->id }}">
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">{{trans('doctors.doctors_name')}}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="{{trans('doctors.doctors_name')}}"
                                    name="name" value="{{ $doctor->name }}" autofocus>
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
                                    name="email" value="{{ $doctor->email }}">
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
                                    name="phone" value="{{ $doctor->phone }}">
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
                                    @foreach($sections as $section)
                                        <option value="{{$section->id}}" {{$section->id == $doctor->section_id ? 'selected' : "" }}>
                                            {{$section->name}}</option>
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
                            <div class="col-md-9 mg-t-5 mg-md-t-0">
                                <select multiple="multiple" class="form-control select2" name="appointments[]">
                                    @foreach($doctor->doctorappointments as $appointmentDOC)
                                        <option value="{{$appointmentDOC->id}}" selected>{{$appointmentDOC->name}}</option>
                                    @endforeach

                                    @foreach($appointments as $appointment)
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
                                    <input type="file" accept="image/*" class="dropify" data-height="200" name="image" />
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-footer text-left">
                    <button type="submit"
                        class="btn btn-primary waves-effect waves-light">{{trans('doctors.update_doctors')}}</button>
                </div>
            </form>
        </div>
    </div>




    @include('dashboard.sections.add')
    @include('dashboard.messages_alert')
    <!--/div-->
    </div>



















    </div>
    </div>
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