<div class="modal fade" id="update{{$doctor->id}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">{{trans('dashboard/sections_trans.update')}} {{$doctor->name}}</h6><button aria-label="Close" class="close btn"
                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('Sections.update',$doctor->id)}}" method="post">
                <div class="modal-body">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <input type="text" hidden name="id" value="{{$doctor->id}}">
                        <label for="exampleInputEmail1">{{trans('dashboard/doctors.doctors_name')}}</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="exemple" autocomplete="off" name="name" value="{{$doctor->name}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">{{trans('dashboard/sections_trans.update')}}</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">{{trans('dashboard/sections_trans.close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>