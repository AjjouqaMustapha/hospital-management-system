<div class="modal fade" id="update_password{{$patient->id}}" key="{{$patient->id}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('Patient.Change_Password')}}</h6><button
                    aria-label="Close" class="close btn" data-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('Patient.update_password', $patient->id)}}" method="post">
                <div class="modal-body">
                    {{ method_field('put') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <h4>{{ $patient->name }}</h4>
                        <input type="hidden" value="1" name="page_id">
                        <div>
                            <label for="password">{{ trans('Patient.Patient_password')  }}</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <input type="hidden" name="id" value="{{ $patient->id }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary"
                        type="submit">{{trans('dashboard/sections_trans.update')}}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal"
                        type="button">{{trans('dashboard/sections_trans.close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
