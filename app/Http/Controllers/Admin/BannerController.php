<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Models\BannerType;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objs = Banner::orderBy('id', 'desc')
            ->whereHas('section', function ($q) {
                $q->whereId(config('section')->id);
            })
            ->paginate(10);

        return view('admin.banners.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bannerTypes = BannerType::all();
        return view('admin.banners.create', compact('bannerTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        $data = $request->validated();


        $banner = config('section')->banners()->create($data);
        if (isset($data['image'])) {
            $banner->addImage($data['image']);
        }


        $success =  trans('transAdmin.created');
        return redirect()
            ->route('admin.banners.index')
            ->with([
                'success' => $success,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        $obj = $banner;
        $bannerTypes = BannerType::all();

        return view('admin.banners.edit', compact('obj', 'bannerTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        $data = $request->validated();
        $banner->update($data);

        if (isset($data['image'])) {
            $banner->addImage($data['image']);
        }


        $success =  trans('transAdmin.updated   ');
        return redirect()
            ->route('admin.banners.index')
            ->with([
                'success' => $success
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->clearMediaCollection('banners');

        $banner->delete();
        $success = "Deleted successfully";

        return redirect()
            ->route('admin.banners.index')
            ->with([
                'success' => $success
            ]);
    }
}
