<?php

namespace App\Repository\Insurances;

use App\Interfaces\Insurances\InsuranceRepositoryInterface;
use App\Models\Insurance;
use Illuminate\Support\Facades\DB;

class InsuranceRepository implements InsuranceRepositoryInterface
{
    // Get all insurances
    public function index()
    {
        return Insurance::orderBy('created_at', 'desc')->paginate(10);
    }

    // Create insurance
    public function create()
    {
        return [];
    }

    // Store insurance
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $insurance = new Insurance();
            $insurance->name = $request->name;
            $insurance->description = $request->description;
            $insurance->status = $request->Status;
            $insurance->insurance_code = $request->company_code;
            $insurance->discount_percentage = $request->discount_percentage;
            $insurance->company_rate = $request->bearing_percentage;
            $insurance->created_at = now();
            $insurance->updated_at = now();
            $insurance->save();
            DB::commit();
            session()->flash('add');
            return $insurance;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e; // or handle the exception as needed
        }
    }

    // Edit insurance
    public function edit($id)
    {
        return Insurance::findOrFail($id);
    }

    // Update insurance
    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            // Validate the request data
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|boolean',
                'company_code' => 'required|string|max:50',
                'discount_percentage' => 'required|numeric|min:0|max:100',
                'bearing_percentage' => 'required|numeric|min:0|max:100',
            ]);
            $id = decrypt($id);
            $insurance = Insurance::findOrFail($id);
            $insurance->name = $request->name;
            $insurance->description = $request->description;
            $insurance->status = $request->status;
            $insurance->insurance_code = $request->company_code;
            $insurance->discount_percentage = $request->discount_percentage;
            $insurance->company_rate = $request->bearing_percentage;
            $insurance->updated_at = now();
            $insurance->save();
            DB::commit();
            session()->flash('update');
            return $insurance;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e; // or handle the exception as needed
        }
    }

    // Delete insurance
    public function destroy($id)
    {
        $insurance = Insurance::findOrFail($id);
        session()->flash('delete');
        return $insurance->delete();
    }
}
