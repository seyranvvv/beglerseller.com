<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objs = Slider::orderBy('id', 'desc')
            ->whereHas('section', function ($q) {
                $q->whereId(config('section')->id);
            })
            ->paginate(10);

        return view('admin.slider.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $data = $request->validated();
        $slider = config('section')->sliders()->create($data);

        if (isset($data['image']['tm'])) {
            $slider->addImageTm($data['image']['tm']);
        }

        if (isset($data['image']['ru'])) {
            $slider->addImageRu($data['image']['ru']);
        }
        if (isset($data['image']['en'])) {
            $slider->addImageEn($data['image']['en']);
        }



        $success =  trans('transAdmin.created');
        return redirect()
            ->route('admin.sliders.index')
            ->with([
                'success' => $success
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        $obj = $slider;
        return view('admin.slider.edit', compact('obj'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request,  Slider $slider)
    {
        $data = $request->validated();
        $slider->update($data);

        if (isset($data['image']['tm'])) {
            $slider->addImageTm($data['image']['tm']);
        }

        if (isset($data['image']['ru'])) {
            $slider->addImageRu($data['image']['ru']);
        }
        if (isset($data['image']['en'])) {
            $slider->addImageEn($data['image']['en']);
        }
        $success =  trans('transAdmin.updated   ');
        return redirect()
            ->route('admin.sliders.index')
            ->with([
                'success' => $success
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->clearMediaCollection('slider_tm');
        $slider->clearMediaCollection('slider_en');
        $slider->clearMediaCollection('slider_ru');
        $slider->delete();
        $success = "Deleted successfully";

        return redirect()
            ->route('admin.sliders.index')
            ->with([
                'success' => $success
            ]);
    }
}
