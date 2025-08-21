<?php

namespace App\Repository\Ambulances;

use Request;
use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Models\Ambulance;
use App\Traits\UploadTraits;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AmbulanceRepository implements AmbulanceRepositoryInterface
{
    use UploadTraits;

    // Get all ambulances
    public function index()
    {
        return Ambulance::with('translations')->orderBy('created_at', 'desc')->paginate(10);
    }

    // Create a new ambulance
    public function create()
    {
        return [];
    }

    // Store a new ambulance
    public function store($request)
    {
        DB::beginTransaction();

        try {
            $ambulance = new Ambulance();
            $ambulance->driver_name = $request->driver_name;
            $ambulance->description = $request->description;
            $ambulance->car_number = $request->car_number;
            $ambulance->car_model = $request->car_model;
            $ambulance->car_year_manufactured = $request->car_year_manufactured;
            $ambulance->driver_license_number = $request->driver_license_number;
            $ambulance->driver_phone = $request->driver_phone;
            $ambulance->status = 1;
            $ambulance->ambulance_type = $request->ambulance_type ?? 'owned';
            $ambulance->save();
            DB::commit();
            session()->flash('add');
            return response()->json(['message' => 'Ambulance created successfully'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to create ambulance: ' . $e->getMessage()], 500);
        }
    }

    public function edit($id)
    {
        $ambulance = Ambulance::with('translations')->findOrFail($id);
        return $ambulance;
    }

    // Update an existing ambulance
    public function update($request, $id)
    {
        DB::beginTransaction();

        try {
            $ambulance = Ambulance::findOrFail($id);
            $ambulance->driver_name = $request->driver_name;
            $ambulance->description = $request->description;
            $ambulance->car_number = $request->car_number;
            $ambulance->car_model = $request->car_model;
            $ambulance->car_year_manufactured = $request->car_year_manufactured;
            $ambulance->driver_license_number = $request->driver_license_number;
            $ambulance->driver_phone = $request->driver_phone;
            $ambulance->status = 1;
            $ambulance->ambulance_type = $request->ambulance_type ?? 'owned';
            $ambulance->save();
            DB::commit();
            session()->flash('update');
            return $ambulance;
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to update ambulance: ' . $e->getMessage()], 500);
        }
    }
    // Delete an ambulance
    public function destroy($id)
    {

        $ambulance = Ambulance::findOrFail($id);
        session()->flash('delete');
        return $ambulance->delete();
    }
}
