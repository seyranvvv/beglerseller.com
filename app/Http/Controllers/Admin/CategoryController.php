<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\ParentCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objs = Category::orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.categories.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCategories = ParentCategory::all();
        return view('admin.categories.create', compact(['parentCategories']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        $category = Category::create($data);
        if (isset($data['image'])) {
            $category->addImage($data['image']);
        }
        $success =  trans('transAdmin.created');
        return redirect()
            ->route('admin.categories.index')
            ->with([
                'success' => $success,
            ]); 
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $parentCategories = ParentCategory::all();
        $obj = $category;

        return view('admin.categories.edit', compact('obj', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);

        if (isset($data['image'])) {
            $category->addImage($data['image']);
        }
        $success =  trans('transAdmin.updated');
        return redirect()
            ->route('admin.categories.index')
            ->with([
                'success' => $success
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        $category->delete();
        $success = "Deleted successfully";

        return redirect()
            ->route('admin.categories.index')
            ->with([
                'success' => $success
            ]);
    }
}
