<?php
namespace App\Repository\Services;

use App\Interfaces\Services\SingleServiceRepositoryInterface;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class SingleServiceRepository implements SingleServiceRepositoryInterface
{
    public function index()
    {
        $data = Service::all();
        return $data;
    }


    public function store($request)
    {
        DB::beginTransaction();
        try {
            $service = new Service();
            $service->name = $request->name;
            $service->description = $request->description;
            $service->price = $request->price;
            $service->status = 1;
            $service->save();
            session()->flash('add');
            DB::commit();
            return $service;
        } catch (\Exception $e) {
            session()->flash('error');
            DB::rollBack();
            return $e->getMessage();
        }

    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            $service = Service::find($request->id);
            $service->name = $request->name;
            $service->description = $request->description;
            $service->price = $request->price;
            $service->status = $request->status;
            $service->save();
            session()->flash('update');
            DB::commit();
            return $service;
        } catch (\Exception $e) {
            session()->flash('error');
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function show($id)
    {

    }

    public function destroy($request)
    {
        DB::beginTransaction();
        try {
            $service = Service::find($request->id);
            $service->delete();
            session()->flash('delete');
            DB::commit();
            return $service;
        } catch (\Exception $e) {
            session()->flash('error');
            DB::rollBack();
            return $e->getMessage();
        }
    }
}