<div class="modal fade" id="add">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('services.add_service')}}</h6><button aria-label="Close"
                    class="close btn" data-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('Service.store')}}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{trans('Services.name')}}</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"
                            autocomplete="off" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{trans('services.price')}}</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"
                            autocomplete="off" name="price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{trans('services.description')}}</label>
                        <textarea type="text" class="form-control" id="exampleInputEmail1"
                            autocomplete="off" name="description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary"
                        type="submit">{{trans('dashboard/sections_trans.add')}}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal"
                        type="button">{{trans('dashboard/sections_trans.close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>