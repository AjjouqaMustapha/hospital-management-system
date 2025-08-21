<?php


namespace App\Repository\Patients;

use App\Interfaces\Patients\PatientRepositoryInterface;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientRepository implements PatientRepositoryInterface
{

    public function index()
    {
        return Patient::orderBy('created_at', 'desc')->get();
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:patients,email',
            'phone' => 'required|string|max:15',
            'birth_date' => 'required|date',
            'blood_group' => 'required|string|max:10',
            'address' => 'nullable|string|max:255',
            'gender' => 'required|in:male,female',
            'password' => 'required|string|min:8',
        ]);

        DB::beginTransaction();
        try {

            $patient = new Patient();
            $patient->name = $request->name;
            $patient->email = $request->email;
            $patient->Phone = $request->phone;
            $patient->Date_Birth = $request->birth_date;
            $patient->blood_group = $request->blood_group;
            $patient->Address = $request->address;
            $patient->Gender = $request->gender;
            $patient->password = bcrypt($request->password); // Encrypting the password
            $patient->save();
            session()->flash('add');
            DB::commit();
            return $patient;
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:patients,email,' . $id,
            'phone' => 'required|string|max:15',
            'birth_date' => 'required|date',
            'blood_group' => 'required|string|max:10',
            'address' => 'nullable|string|max:255',
            'gender' => 'required|in:male,female',
            'password' => 'nullable|string|min:8',
        ]);
        DB::beginTransaction();
        try {
            $patient = Patient::findOrFail($id);
            $patient->name = $request->name;
            $patient->email = $request->email;
            $patient->Phone = $request->phone;
            $patient->Date_Birth = $request->birth_date;
            $patient->blood_group = $request->blood_group;
            $patient->Address = $request->address;
            $patient->Gender = $request->gender;
            $patient->save();
            session()->flash('update');
            DB::commit();
            return $patient;
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8',
        ]);

        DB::beginTransaction();
        try {
            $patient = Patient::find($request->id);
            if (!$patient) {
                DB::rollBack();
                return redirect()->back()->withErrors(['error' => 'Patient not found.']);
            }
            $patient->password = bcrypt($request->password); // Encrypting the password
            $patient->save();
            session()->flash('update');
            DB::commit();
            return $patient;
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('dashboard.patients.show', compact('patient'));
    }

    public function destroy($id)
    {
        Patient::findOrFail($id)->delete();
        session()->flash('delete');
        return true;
    }
}
