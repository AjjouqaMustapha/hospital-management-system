<?php
namespace App\Interfaces\Ambulances;

use Request;

interface AmbulanceRepositoryInterface
{
    // Get all ambulances
    public function index();

    // Create a new ambulance
    public function create();

    // Store a new ambulance
    public function store($request);

    // Update an existing ambulance
    public function update($request, $id);

    // Delete an ambulance
    public function destroy($id);

    // Edit an ambulance by ID
    public function edit($id);

}
