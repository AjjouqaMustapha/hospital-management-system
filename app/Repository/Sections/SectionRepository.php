<?php
namespace App\Repository\Sections;   

use App\Interfaces\Sections\SectionRepositoryInterface; 
use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model; 
use App\Models\Section;  

class SectionRepository implements SectionRepositoryInterface 
{     
    public function index(){
        $sections = Section::all() ;
        return view('dashboard.sections.index', compact('sections'));
    }


    public function store($request){
        Section::create([
            'name' => $request->input('name'),
        ]);
        session()->flash('add');
        return redirect()->route('Sections.index');
    }

    public function update($request){
        $section = Section::findOrFail($request->id);
        $section->update([
            'name'=> $request->name,
            'description'=> $request->description
        ]);

        session()->flash('update');
        return redirect()->route('Sections.index');
    }

    public function show($id){

        $id = decrypt($id);

        $doctors = Section::findOrFail($id)->doctors()->paginate(10);
        return $doctors;
    }

    public function destroy($request){
        Section::findOrFail($request)->deleteOrFail();
        session()->flash('delete');
        return redirect()->route('Sections.index');

    }
}