<div class="card-header pb-0">
    <div class="d-flex justify-content-between">
        <div class="col-sm-6 col-md-6 col-xl-2">
            <button wire:click.prevent="showFormAdd" class="btn btn-outline-primary btn-block"
                style=" transition: 0.3s;">{{trans('Services.add_services')}}</button>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table text-md-nowrap" id="example1">
            <thead>
                <tr>
                    <th class="wd-15p border-bottom-0">{{ trans('Services.group_name') }}</th>
                    <th class="wd-15p border-bottom-0">{{ trans('Services.total_before_discount') }}</th>
                    <th class="wd-15p border-bottom-0">{{ trans('Services.total_after_discount') }}</th>
                    <th class="wd-10p border-bottom-0">{{ trans('Services.discount') }}</th>
                    <th class="wd-10p border-bottom-0">{{ trans('Services.taxes') }}</th>
                    <th class="wd-15p border-bottom-0">{{ trans('Services.service_group_description') }}</th>
                    <th class="wd-25p border-bottom-0">{{ trans('Services.operations') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $data)
                    <tr>
                        <td>
                            {{ $data->name ?? 'No name available' }}
                        </td>
                        <td>
                            {{ number_format($data->total_befor_discount, 2) }}
                        </td>
                        <td>
                            {{ number_format($data->total_after_discount, 2) }}
                        </td>
                        <td>
                            {{ number_format($data->discount_value, 2) }}
                        </td>
                        <td>
                            {{ number_format($data->tax_rate, 2) }}
                        </td>
                        <td>
                            {{ $data->notes ?? 'لا توجد ملاحظات' }}
                        </td>
                        <td>
                            <button wire:click="edit({{ $data->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>

                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
													data-toggle="modal" href="#delete{{$data->id}}"><i
														class="las la-trash"></i></a>
                            
                        </td>
                    </tr>

                    @include('livewire.GroupServices.delete', ['data' => $data])
                @endforeach

            </tbody>
        </table>
    </div>
</div>