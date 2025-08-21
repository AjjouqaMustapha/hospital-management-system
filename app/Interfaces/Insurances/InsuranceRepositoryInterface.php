<?php
namespace App\Interfaces\Insurances;

use Request;    

interface InsuranceRepositoryInterface
{
    //get all sections
    public function index();
    public function create();

    //store section
    public function store($request);

    public function edit($id);

    //update section
    public function update($request, $id);

    public function destroy($request);




}
