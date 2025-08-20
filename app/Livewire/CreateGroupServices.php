<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Service;
use Livewire\Component;

class CreateGroupServices extends Component
{
    public $GroupsItems = [];
    public $allServices = [];
    public $discount_value = 0;
    public $taxes = 17;
    public $name_group;
    public $notes;
    public $ServiceSaved = false;
    public $showTable = true;
    public $updateMode = false;
    public $group_id;

    public function showFormAdd()
    {
        $this->showTable = false;
    }

    public function dimissFormAdd(){
        $this->showTable = true;
    }


    public function mount()
    {
        $this->allServices = Service::all();
    }

    public function render()
    {
        $total = 0;
        foreach ($this->GroupsItems as $groupItem) {
            if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) {
                $total += $groupItem['service_price'] * $groupItem['quantity'];
            }
        }
        $subtotal = $total - (is_numeric($this->discount_value) ? $this->discount_value : 0);
        $totalWithTax = $subtotal * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);
        $groups = Group::all();

        return view('livewire.GroupServices.create-group-services', [
            'groups' => $groups,
            'subtotal' => $subtotal,
            'total' => $totalWithTax
        ]);
    }

    public function addService()
    {
        foreach ($this->GroupsItems as $key => $groupItem) {
            if (!$groupItem['is_saved']) {
                $this->addError('GroupsItems.' . $key, 'يجب حفظ هذا الخدمة قبل إنشاء خدمة جديدة.');
                return;
            }
        }

        $this->GroupsItems[] = [
            'service_id' => '',
            'quantity' => 1,
            'is_saved' => false,
            'service_name' => '',
            'service_price' => 0
        ];

        $this->ServiceSaved = false;
    }

    public function editService($index)
    {
        foreach ($this->GroupsItems as $key => $groupItem) {
            if (!$groupItem['is_saved']) {
                $this->addError('GroupsItems.' . $key, 'This line must be saved before editing another.');
                return;
            }
        }

        $this->GroupsItems[$index]['is_saved'] = false;
    }

    public function saveService($index)
    {
        $this->resetErrorBag();
        $product = Service::find($this->GroupsItems[$index]['service_id']);
        if ($product) {
            $this->GroupsItems[$index]['service_name'] = $product->name;
            $this->GroupsItems[$index]['service_price'] = $product->price;
            $this->GroupsItems[$index]['is_saved'] = true;
        }
    }

    public function removeService($index)
    {
        unset($this->GroupsItems[$index]);
        $this->GroupsItems = array_values($this->GroupsItems);
    }

    public function saveGroup()
    {
        $Groups = new Group();
        $total = 0;

        foreach ($this->GroupsItems as $groupItem) {
            if ($groupItem['is_saved'] && $groupItem['service_price'] && $groupItem['quantity']) {
                $total += $groupItem['service_price'] * $groupItem['quantity'];
            }
        }

        $Groups->total_befor_discount = $total;
        $Groups->discount_value = $this->discount_value;
        $Groups->total_after_discount = $total - (is_numeric($this->discount_value) ? $this->discount_value : 0);
        $Groups->tax_rate = $this->taxes;
        $Groups->total_with_tax = $Groups->total_after_discount * (1 + (is_numeric($this->taxes) ? $this->taxes : 0) / 100);
        $Groups->save();

        $GroupTranslation = new \App\Models\GroupTranslation();
        $GroupTranslation->name = $this->name_group;
        $GroupTranslation->notes = $this->notes;
        $GroupTranslation->group_id = $Groups->id;
        $GroupTranslation->locale = app()->getLocale();
        $GroupTranslation->save();
        foreach ($this->GroupsItems as $GroupsItem) {
            $Groups->service_group()->attach($GroupsItem['service_id'], ['quantity' => $GroupsItem['quantity']]);
        }

        $this->reset('GroupsItems', 'name_group', 'notes');
        $this->discount_value = 0;
        $this->ServiceSaved = true;
    }

    public function edit($id){
        $this->showTable = false;
        $this->updateMode = true;
        $group = Group::where('id', $id)->first();
        $this->group_id = $group->id;

        $this->reset('GroupsItems', 'name_group', 'notes');
        $this->name_group = $group->name;
        $this->notes = $group->notes;
        
        $this->discount_value = intval($group->discount_value);
        $this->ServiceSaved = false;

        $this->GroupsItems = $group->service_group->map(function ($service) {
            return [
                'service_id' => $service->id,
                'quantity' => $service->pivot->quantity,
                'is_saved' => true,
                'service_name' => $service->name,
                'service_price' => $service->price
            ];
        })->toArray();
    }
}
