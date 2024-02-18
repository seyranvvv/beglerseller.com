<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParentCategoryRequest;
use App\Models\ParentCategory;
use Illuminate\Http\Request;

class ParentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objs = ParentCategory::ordered()
            ->paginate(10);

        return view('admin.parent-categories.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.parent-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ParentCategoryRequest $request)
    {
        $data = $request->validated();

        ParentCategory::create($data);

        $success =  trans('transAdmin.created');
        return redirect()
            ->route('admin.parent-categories.index')
            ->with([
                'success' => $success,
            ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParentCategory $parentCategory)
    {
        $obj = $parentCategory;

        return view('admin.parent-categories.edit', compact('obj'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ParentCategoryRequest $request, ParentCategory $parentCategory)
    {
        $data = $request->validated();
        $parentCategory->update($data);


        $success =  trans('transAdmin.updated');
        return redirect()
            ->route('admin.parent-categories.index')
            ->with([
                'success' => $success
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParentCategory $parentCategory)
    {

        $parentCategory->delete();
        $success = "Deleted successfully";

        return redirect()
            ->route('admin.parent-categories.index')
            ->with([
                'success' => $success
            ]);
    }
}
