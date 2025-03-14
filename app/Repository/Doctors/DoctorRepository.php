<?php
namespace App\Repository\Doctors;


use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Traits\UploadTraits;
use DB;
use Hash;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;

class DoctorRepository implements DoctorRepositoryInterface
{

    use UploadTraits;
    public function index()
    {
        $doctors = Doctor::paginate(10);
        return view('dashboard.doctors.index', compact('doctors'));
    }



    public function create()
    {
        $sections = Section::all();
        $appointments = Appointment::all();
        return view('dashboard.doctors.add', compact('sections', 'appointments'));

    }

    public function store($request)
    {

        DB::beginTransaction();

        try {

            $doctors = new Doctor();
            $doctors->email = $request->email;
            $doctors->password = Hash::make($request->password);
            $doctors->section_id = $request->section;
            $doctors->phone = $request->phone;
            $doctors->price = $request->price;
            $doctors->status = 1;
            $doctors->save();
            // store trans
            $doctors->name = $request->name;
            $doctors->appointments = implode(",", $request->appointments);
            $doctors->save();


            //Upload img
            $this->verifyAndStoreImage($request, 'image', 'doctors', 'upload_image', $doctors->id, 'App\Models\Doctor');

            DB::commit();
            session()->flash('add');
            return redirect()->route('Doctors.index');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }

    public function update($request)
    {

    }
    
    public function destroy($request)
    {
        if ($request->page_id == 1) {

            if ($request->url) {

                $this->Delete_attachment('upload_image', 'doctors/' . $request->url, $request->id, $request->url);
            }
            Doctor::destroy($request->id);
            session()->flash('delete');
            return redirect()->route('Doctors.index');
        }
        //---------------------------------------------------------------
        else {
            $delete_select_id = explode(",", $request->delete_select_id);
            foreach ($delete_select_id as $ids_doctors) {
                $doctor = Doctor::findorfail($ids_doctors);
                if ($doctor->image) {
                    $this->Delete_attachment('upload_image', 'doctors/' . $doctor->image->url, $ids_doctors, $doctor->image->url);
                }
            }

            Doctor::destroy($delete_select_id);
            session()->flash('delete');
            return redirect()->route('Doctors.index');

        }




    }
}