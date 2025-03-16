<div class="modal fade" id="update_status{{$doctor->id}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('doctors.update_status')}}</h6><button
                    aria-label="Close" class="close btn" data-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('Doctors.update_status', 'test')}}" method="post">
                <div class="modal-body">
                    {{ method_field('put') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <h4>{{ $doctor->name }}</h4>
                        <input type="hidden" value="1" name="page_id">
                        <div>
                            <label for="status">{{trans('doctors.status')}}</label>
                            <select class="form-control" name="status">
                                <option value="1" {{ $doctor->status == 1 ? 'selected' : '' }}>{{ trans('doctors.active') }}</option>
                                <option value="0" {{ $doctor->status == 0 ? 'selected' : '' }}>{{ trans('doctors.inactive') }}</option>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="{{ $doctor->id }}">
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
