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
        return $this->doctor->index();

    }  

    public function create()
    {
        return $this->doctor->create();
    }

    public function store(Request $request)
    {
        return $this->doctor->store($request);
        
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
