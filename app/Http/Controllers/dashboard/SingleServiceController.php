<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSingleServiceRequest;
use App\Interfaces\Services\SingleServiceRepositoryInterface;
use DB;
use Illuminate\Http\Request;

class SingleServiceController extends Controller
{
    private $singleService;

    public function __construct(SingleServiceRepositoryInterface $singleService)
    {
        $this->singleService = $singleService;
    }
    
    public function index()
    {
        //
        $services = $this->singleService->index();
        return view('dashboard.services.SingleService.index', compact('services'));
    }

        public function create()
    {
        //
    }

   
    public function store(StoreSingleServiceRequest $request)
    {
        //
        $this->singleService->store($request);
        return redirect()->back();
    }

   
    public function show(string $id)
    {
        //
    }

       public function edit(string $id)
    {
        //
    }

    
    public function update(StoreSingleServiceRequest $request)
    {
        //
        $this->singleService->update($request);
        return redirect()->back();
    }

   
    public function destroy(string $id)
    {
        //
    }
}
