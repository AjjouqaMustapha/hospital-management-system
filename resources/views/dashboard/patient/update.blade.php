<div class="modal fade" id="update{{$patient->id}}" key="{{$patient->id}}">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content modal-content-demo ">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('Patient.Add_Patient')}}</h6>
            </div>
            <form action="{{route('Patient.update',$patient->id)}}" method="post" class="form">
                <div class="modal-body">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">{{trans('Patient.Patient_Name')}}</label>
                            <input type="text" class="form-control" name="name" id="name_update" required value="{{ $patient->name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">{{trans('Patient.Patient_email')}}</label>
                            <input type="email" class="form-control" name="email" id="email_update" required accept="email" value="{{ $patient->email }}">
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="birth_date">{{trans('Patient.birth_date')}}</label>
                            <input type="date" class="form-control" name="birth_date" id="birth_date_update" required value="{{ $patient->Date_Birth }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">{{trans('Patient.Patient_Phone')}}</label>
                            <input type="phone" class="form-control" name="phone" id="phone_update" required value="{{ $patient->Phone }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="blood_group">{{trans('Patient.Blood_Type')}}</label>
                            <select class="form-control" name='blood_group' id="blood_group_update" required>
                                <option value="A+" {{$patient->Blood_Group == "A+" ? "Selected" : ""}}>A+</option>
                                <option value="A-" {{$patient->Blood_Group == "A-" ? "Selected" : ""}}>A-</option>
                                <option value="B+" {{$patient->Blood_Group == "B+" ? "Selected" : ""}}>B+</option>
                                <option value="B-" {{$patient->Blood_Group == "B+" ? "Selected" : ""}}>B-</option>
                                <option value="O+" {{$patient->Blood_Group == "O+" ? "Selected" : ""}}>O+</option>
                                <option value="O-" {{$patient->Blood_Group == "O+" ? "Selected" : ""}}>O-</option>
                                <option value="AB+" {{$patient->Blood_Group == "AB+" ? "Selected" : ""}}>AB+</option>
                                <option value="AB-" {{$patient->Blood_Group == "AB+" ? "Selected" : ""}}>AB-</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">{{trans('Patient.Patient_sex')}}</label>
                            <select class="form-control" name='gender'>
                                <option value='male' {{$patient->Gender == "male" ? "Selected" : ""}}>{{trans('Patient.Male')}}</option>
                                <option value='female' {{$patient->Gender == "female" ? "Selected" : ""}}>{{trans('Patient.Female')}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="address">{{ trans('Patient.Patient_Address') }}</label>
                            <textarea class="form-control" name="address" id="address_update" rows="3" required>{{$patient->Address}}</textarea>
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
