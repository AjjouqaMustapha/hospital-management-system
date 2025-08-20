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
        $id = decrypt($id);
        $data = $this->doctor->edit($id);
        return view('dashboard.doctors.edit', $data);
    }

    public function update(Request $request)
    {
        try {
            $this->doctor->update($request);
            session()->flash('success', 'Doctor updated successfully.');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update_password(Request $request)
    {
        try {
            $this->doctor->update_password($request);
            session()->flash('success', 'Password updated successfully.');
            return redirect()->back();  

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function update_status(Request $request)
    {
        $request->validate([
            'status' => 'required|in:1,0',
        ]);
        
        try {
            $this->doctor->update_status($request);
            session()->flash('success', 'Status updated successfully.');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    

    public function destroy(Request $request)
    {
        return $this->doctor->destroy($request);
    }
}
