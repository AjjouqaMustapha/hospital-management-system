<div class="modal fade" id="delete{{$service->id}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('dashboard/sections_trans.delete')}} {{$service->name}}</h6><button
                    aria-label="Close" class="close btn" data-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('Sections.destroy',$service->id)}}" method="post">
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    <div class="form-group">
                        <h4>{{trans('services.delete_text',['service'=>$service->name])}}</h4>
                        <input type="text" hidden name="id" value="{{$service->id}}">
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