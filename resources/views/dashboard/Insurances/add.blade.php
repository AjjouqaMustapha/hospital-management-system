<div class="modal fade" id="add">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('Insurance.add_insurance_company')}}</h6>
            </div>
            <form action="{{route('Insurances.store')}}" method="post" class="form">
                <div class="modal-body">
                    @method('post')
                    @csrf
                    <div class="form-group">
                        <label for="company_code">{{trans('Insurance.Company_code')}}</label>
                        <input type="text" class="form-control" id="company_code" name="company_code" required>
                    </div>
                    <div class="form-group">
                        <label for="name">{{trans('Insurance.Insurance_Name')}}</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="discount_percentage">{{trans('Insurance.discount_percentage')}}</label>
                        <input type="number" class="form-control" id="discount_percentage" name="discount_percentage" required>
                    </div>
                    <div class="form-group">
                        <label for="bearing_percentage">{{trans('Insurance.Insurance_bearing_percentage')}}</label>
                        <input type="number" class="form-control" id="bearing_percentage" name="bearing_percentage" required>
                    </div>
                    <div class="form-group">
                        <label for="description">{{ trans('Insurance.description') }}</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Status">{{ trans('Insurance.Status') }}
                        <select class="form-control" id="Status" name="Status">
                            <option value="1">{{trans('Insurance.Active')}}</option>
                            <option value="0">{{trans('Insurance.Inactive')}}</option>
                        </select>
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
