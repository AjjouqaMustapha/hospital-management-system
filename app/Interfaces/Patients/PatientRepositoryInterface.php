<?php 

namespace App\Interfaces\Patients;
use App\Models\Patient;
use Illuminate\Http\Request;

interface PatientRepositoryInterface
{
    public function index();
    
    public function store(Request $request);
    public function update(Request $request, $id);

    public function update_password(Request $request);

    public function show($id);
    public function destroy($request);

}


