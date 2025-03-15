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
        return Doctor::with('doctorappointments')->paginate(10);
    }



    public function create()
    {
        return [
            'sections' => Section::all(),
            'appointments' => Appointment::all()
        ];

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
            $doctors->status = 1;
            $doctors->save();
            
            // store trans
            $doctors->name = $request->name;
            $doctors->doctorappointments()->sync($request->appointments->id);
            $doctors->save();


            //Upload img
            $this->verifyAndStoreImage($request, 'image', 'doctors', 'upload_image', $doctors->id, 'App\Models\Doctor');

            DB::commit();
            session()->flash('add');
            return $doctors;

        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e->getMessage());
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