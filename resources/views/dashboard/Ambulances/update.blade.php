<div class="modal fade" id="update{{ $ambulance->id }}">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content modal-content-demo ">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('Insurance.add_insurance_company')}}</h6>
            </div>
            <form action="{{route('Ambulance.update',$ambulance->id)}}" method="post" class="form">
                <div class="modal-body">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="ambulance_number" class="form-label">{{trans('Ambulance.ambulance_number')}}</label>
                            <input type="text" name="car_number" class="form-control" id="ambulance_number" required value="{{ $ambulance->car_number }}">
                        </div>
                        <div class="col-md-6">
                            <label for="ambulance_model" class="form-label">{{trans('Ambulance.ambulance_model')}}</label>
                            <input type="text" name="car_model" class="form-control" id="ambulance_model" required value="{{ $ambulance->car_model }}">
                        </div>

                        <div class="col-md-6">
                            <label for="car_year_manufactured" class="form-label">{{trans('Ambulance.yrear_of_manufacture')}}</label>
                            <input type="text" name="car_year_manufactured" class="form-control" id="car_year_manufactured" required value="{{ $ambulance->car_year_manufactured }}">
                        </div>
                        <div class="col-md-6">
                            <label for="ambulance_type" class="form-label">{{trans('Ambulance.ambulance_type')}}</label>
                            <select name="ambulance_type" class="form-control" id="ambulance_type" required>
                                <option value="owned" {{ $ambulance->ambulance_type === "owned" ? 'selected' : ''}}>{{trans('Ambulance.owned')}}</option>
                                <option value="rinted" {{ $ambulance->ambulance_type === "rinted" ? 'selected' : ''}}>{{trans('Ambulance.rinted')}}</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="driver_name" class="form-label">{{trans('Ambulance.driver_name')}}</label>
                            <input type="text" name="driver_name" class="form-control" id="driver_name" required value="{{ $ambulance->driver_name }}">
                        </div>
                        <div class="col-md-6">
                            <label for="license_driving_number" class="form-label">{{trans('Ambulance.license_driving_number')}}</label>
                            <input type="text" name="driver_license_number" class="form-control" id="license_driving_number" required value="{{ $ambulance->driver_license_number }}">
                        </div>

                        <div class="col-md-6">
                            <label for="phone_number" class="form-label">{{trans('Ambulance.phone_number')}}</label>
                            <input type="phone" name="driver_phone" class="form-control" id="phone_number" required value="{{ $ambulance->driver_phone }}">
                        </div>
                        <div class="col-md-6">
                            <label for="ambulance_status" class="form-label">{{trans('Ambulance.ambulance_status')}}</label>
                            <select name="ambulance_status" class="form-control" id="ambulance_status" required>
                                <option value="1" {{$ambulance->status === 1 ? "Selected" : ""}}>Active</option>
                                <option value="0" {{$ambulance->status === 0 ? "Selected" : ""}}>Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="notes" class="form-label">{{trans('Ambulance.notes')}}</label>
                            <textarea name="description" class="form-control" id="notes" rows="3">{{$ambulance->description}}</textarea>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary"
                        type="submit">{{trans('Insurance.save')}}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal"
                        type="button">{{trans('dashboard/sections_trans.close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
