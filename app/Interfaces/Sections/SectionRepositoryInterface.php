<?php
namespace App\Interfaces\Sections;

use Request;

interface SectionRepositoryInterface
{
    //get all sections
    public function index();
    
    //store section
    public function store($request);

    //update section
    public function update($request);

    //show section
    public function show($id);

    //delete section
    public function destroy($request);

}
