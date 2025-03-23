<?php
namespace App\Interfaces\Services;

use Request;

interface SingleServiceRepositoryInterface
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
