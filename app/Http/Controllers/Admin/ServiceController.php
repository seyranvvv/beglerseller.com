<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objs = Service::ordered()
            ->whereHas('section', function ($q) {
                $q->whereId(config('section')->id);
            })
            ->paginate(10);

        return view('admin.services.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $data = $request->validated();

        $service = config('section')->services()->create($data);

        if (isset($data['image'])) {
            $service->addImage($data['image']);
        }
        if (isset($data['icon'])) {
            $service->addIcon($data['icon']);
        }

        $success =  trans('transAdmin.created');
        return redirect()
            ->route('admin.services.index')
            ->with([
                'success' => $success
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $obj = $service;
        return view('admin.services.edit', compact('obj'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Service $service)
    {

        $data = $request->validated();
        $service->update($data);

        if (isset($data['image'])) {
            $service->addImage($data['image']);
        }
        if (isset($data['icon'])) {
            $service->addIcon($data['icon']);
        }


        $success =  trans('transAdmin.updated');
        return redirect()
            ->route('admin.services.index')
            ->with([
                'success' => $success
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->clearMediaCollection('image');
        $service->clearMediaCollection('icon');
        $service->delete();
        $success = "Deleted successfully";
        return redirect()
            ->route('admin.services.index')
            ->with([
                'success' => $success
            ]);
    }
}
