<?php
namespace App\Interfaces\Doctors;

use Request;

interface DoctorRepositoryInterface
{
    //get all sections
    public function index();
    public function create();

    //store section
    public function store($request);

    //update section
    public function update($request);

    public function destroy($request);


    public function edit($id);

    public function update_password($request);

    public function update_status($request);

}
