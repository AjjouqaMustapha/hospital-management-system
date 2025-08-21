<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Interfaces\Patients\PatientRepositoryInterface;

class PatientController extends Controller
{
    private $patient;

    public function __construct(PatientRepositoryInterface $patient)
    {
        $this->patient = $patient;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = $this->patient->index();
        return view('dashboard.patient.index', compact('patients'));
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
    public function store(Request $request)
    {
        //
        $this->patient->store($request);
        return redirect()->route('Patient.index')->with('success','Patient added successfully');
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
    public function update(Request $request, string $id)
    {
        //
        $this->patient->update($request, $id);
        return redirect()->route('Patient.index')->with('success','Patient updated successfully');
    }

    public function update_password(Request $request)
    {
        $this->patient->update_password($request);
        return redirect()->route('Patient.index')->with('success','Password updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->patient->destroy($id);
        return redirect()->route('Patient.index')->with('success','Patient deleted successfully');
    }
}
