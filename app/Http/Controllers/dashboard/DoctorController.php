<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    
    private $doctor;
  
    public function __construct(DoctorRepositoryInterface $doctor)
    {
        $this->doctor = $doctor;
    }


    public function index()
    {
        $doctors =  $this->doctor->index();
        return view('dashboard.doctors.index', compact('doctors'));
    }  

    public function create()
    {
        $data = $this->doctor->create();
        return view('dashboard.doctors.add', $data);
    }

    public function store(Request $request)
    {
        try {
            $this->doctor->store($request);
            session()->flash('success', 'Doctor added successfully.');
            return redirect()->route('Doctors.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        return $this->doctor->destroy($request);
    }
}
