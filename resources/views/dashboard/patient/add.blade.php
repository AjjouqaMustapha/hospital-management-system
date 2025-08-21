<div class="modal fade" id="add">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content modal-content-demo ">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('Patient.Add_Patient')}}</h6>
            </div>
            <form action="{{route('Patient.store')}}" method="post" class="form">
                <div class="modal-body">
                    @method('post')
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">{{trans('Patient.Patient_Name')}}</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">{{trans('Patient.Patient_email')}}</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="password">{{trans('Patient.Patient_password')}}</label>
                            <input type="text" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="birth_date">{{trans('Patient.birth_date')}}</label>
                            <input type="date" class="form-control" name="birth_date" id="birth_date" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">{{trans('Patient.Patient_Phone')}}</label>
                            <input type="phone" class="form-control" name="phone" id="phone" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="blood_group">{{trans('Patient.Blood_Type')}}</label>
                            <select class="form-control" name='blood_group' id="blood_group" required>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">{{trans('Patient.Patient_sex')}}</label>
                            <select class="form-control" name='gender'>
                                <option value='male'>{{trans('Patient.Male')}}</option>
                                <option value='female'>{{trans('Patient.Female')}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="address">{{ trans('Patient.Patient_Address') }}</label>
                            <textarea class="form-control" name="address" id="address" rows="3" required></textarea>
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
