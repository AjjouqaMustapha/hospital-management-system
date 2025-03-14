<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    private $Section;
  
    public function __construct(SectionRepositoryInterface $Section)
    {
        $this->Section = $Section;
    }

    public function index()
    {
        return $this->Section->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Section->store($request);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->Section->update($request);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($request)
    {
        return $this->Section->destroy($request);
    }
}
