<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objs = Brand::orderBy('id', 'desc')

            ->paginate(10);

        return view('admin.brands.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $data = $request->validated();

        $brand = Brand::create($data);


        if (isset($data['image'])) {
            $brand->addImage($data['image']);
        }

        $success =  trans('transAdmin.created');
        return redirect()
            ->route('admin.brands.index')
            ->with([
                'success' => $success,
            ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $obj = $brand;

        return view('admin.brands.edit', compact('obj'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $data = $request->validated();
        $brand->update($data);

        if (isset($data['image'])) {
            $brand->addImage($data['image']);
        }

        $success =  trans('transAdmin.updated');
        return redirect()
            ->route('admin.brands.index')
            ->with([
                'success' => $success
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->clearMediaCollection('brands');

        $brand->delete();
        $success = "Deleted successfully";

        return redirect()
            ->route('admin.brands.index')
            ->with([
                'success' => $success
            ]);
    }
}
