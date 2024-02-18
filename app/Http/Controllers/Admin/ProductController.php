<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objs = Product::orderBy('id', 'desc')
            ->whereHas('section', function ($q) {
                $q->whereId(config('section')->id);
            })
            ->paginate(10);

        return view('admin.products.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        $product = config('section')->products()->create($data);

        for ($i = 1; $i < 6; $i++) {
            if (isset($data['image_' . $i])) {
                $product->addImage($data['image_' . $i], $i);
            }
        }




        $success =  trans('transAdmin.created');
        return redirect()
            ->route('admin.products.index')
            ->with([
                'success' => $success
            ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $obj = $product;
        return view('admin.products.edit', compact('obj', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);

        for ($i = 1; $i < 6; $i++) {
            if (isset($data['image_' . $i])) {
                $product->addImage($data['image_' . $i], $i);
            }
        }

        $success =  trans('transAdmin.updated');
        return redirect()
            ->route('admin.products.index')
            ->with([
                'success' => $success,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->clearMediaCollection('image');
        $product->delete();
        $success = "Deleted successfully";
        return redirect()
            ->route('admin.products.index')
            ->with([
                'success' => $success
            ]);
    }
}
