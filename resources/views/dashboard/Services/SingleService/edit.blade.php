<div class="modal fade" id="edit{{$service->id}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('dashboard/sections_trans.update')}} {{$service->name}}</h6><button
                    aria-label="Close" class="close btn" data-dismiss="modal" type="button"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('Service.update', $service->id)}}" method="post">
                <div class="modal-body">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <input type="text" hidden name="id" value="{{$service->id}}">
                        <div>
                            <label for="exampleInputEmail1">{{trans('services.service_name')}}</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="exemple"
                                autocomplete="off" name="name" value="{{$service->name}}">
                        </div>
                        <div>
                            <label for="exampleInputEmail1">{{trans('services.service_price')}}</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="exemple"
                                autocomplete="off" name="price" value="{{$service->price}}">
                        </div>
                        <div>
                            <label for="description">{{trans('services.service_description')}}</label>
                            <textarea class="form-control" id="description"
                                name="description">{{$service->description}}</textarea>
                        </div>
                        <div>
                            <label for="status">{{trans('services.service_status')}}</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" @if($service->status == 1) selected @endif>{{trans('doctors.active')}}</option>
                                <option value="0" @if($service->status == 0) selected @endif>{{trans('doctors.desacitive')}}</option>
                            </select>
                        </div>
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