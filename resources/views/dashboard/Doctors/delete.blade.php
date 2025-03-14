<div class="modal fade" id="delete{{$doctor->id}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('dashboard/sections_trans.delete')}} {{$doctor->name}}</h6><button
                    aria-label="Close" class="close btn" data-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('Doctors.destroy', 'test')}}" method="post">
                <div class="modal-body">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <h4>{{trans('dashboard/sections_trans.delete_text', ['section' => $doctor->name])}}</h4>
                        <input type="hidden" value="1" name="page_id">
                        @if($doctor->image)
                            <input type="hidden" name="url" value="{{$doctor->image->url}}">
                        @endif
                        <input type="hidden" name="id" value="{{ $doctor->id }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-danger"
                        type="submit">{{trans('dashboard/sections_trans.delete')}}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal"
                        type="button">{{trans('dashboard/sections_trans.close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>