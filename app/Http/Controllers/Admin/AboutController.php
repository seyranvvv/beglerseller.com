<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objs = About::orderBy('id', 'desc')
            ->whereHas('section', function ($q) {
                $q->whereId(config('section')->id);
            })
            ->paginate(10);

        return view('admin.abouts.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutRequest $request)
    {
        $data = $request->validated();

        $about = config('section')->abouts()->create($data);


        if (isset($data['image'])) {
            $about->addImage($data['image']);
        }
        if (isset($data['image2'])) {
            $about->addImage2($data['image2']);
        }


        $success =  trans('transAdmin.created');
        return redirect()
            ->route('admin.abouts.index')
            ->with([
                'success' => $success
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        $obj = $about;
        return view('admin.abouts.edit', compact('obj'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request, About $about)
    {
        $data = $request->validated();
        $about->update($data);

        if (isset($data['image'])) {
            $about->addImage($data['image']);
        }
        if (isset($data['image2'])) {
            $about->addImage2($data['image2']);
        }

        $success =  trans('transAdmin.updated');
        return redirect()
            ->route('admin.abouts.index')
            ->with([
                'success' => $success
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $about->clearMediaCollection('about');
        $about->clearMediaCollection('about2');
        $about->delete();
        $success = "Deleted successfully";
        return redirect()
            ->route('admin.abouts.index')
            ->with([
                'success' => $success
            ]);
    }
}
