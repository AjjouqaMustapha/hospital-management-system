<div class="modal fade" id="delete{{$data->id}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('dashboard/sections_trans.delete')}} {{$data->name}}</h6><button
                    aria-label="Close" class="close btn" data-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <h4>{{trans('Services.delete_text_group', ['group' => $data->name])}}</h4>
                </div>
            </div>
            <div class="modal-footer">
                <button wire:click="delete({{ $data->id }})"
                    class="btn ripple btn-danger">{{ trans('Services.delete') }}</button>
                <button class="btn ripple btn-secondary" data-dismiss="modal"
                    type="button">{{trans('dashboard/sections_trans.close')}}</button>
            </div>
        </div>
    </div>
</div>