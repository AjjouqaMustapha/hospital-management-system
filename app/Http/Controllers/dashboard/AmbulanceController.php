<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AmbulanceRequest;
use Illuminate\Http\Request;
use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;

class AmbulanceController extends Controller
{
    private $ambulance;
    public function __construct(AmbulanceRepositoryInterface $ambulance)
    {
        $this->ambulance = $ambulance;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ambulances = $this->ambulance->index();
        return view('dashboard.Ambulances.index', compact('ambulances'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AmbulanceRequest $request)
    {
        $this->ambulance->store($request);
        return redirect()->route('Ambulance.index')->with('success', 'Ambulance created successfully');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AmbulanceRequest $request, string $id)
    {
        //
        $this->ambulance->update($request, $id);
        return redirect()->route('Ambulance.index')->with('success', 'Ambulance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->ambulance->destroy($id);
        return redirect()->route('Ambulance.index')->with('success', 'Ambulance deleted successfully');
    }
}
