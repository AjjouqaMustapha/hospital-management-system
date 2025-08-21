<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Insurances\InsuranceRepositoryInterface;

class InsuranceController extends Controller
{
    private $insurance;


    public function __construct(InsuranceRepositoryInterface $insurance)
    {
        $this->insurance = $insurance;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $insurances = $this->insurance->index();
        return view('dashboard.insurances.index', compact('insurances'));
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
        $this->insurance->store($request);
        return redirect()->route('Insurances.index')->with('success');
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
        $this->insurance->update($request, $id);
        return redirect()->route('Insurances.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->insurance->destroy($id);
        return redirect()->route('Insurances.index')->with('success');
    }
}
