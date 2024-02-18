<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objs = Post::orderBy('id', 'desc')
            ->whereHas('section', function ($q) {
                $q->whereId(config('section')->id);
            })
            ->paginate(10);

        return view('admin.posts.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();

        $post = config('section')->posts()->create($data);


        if (isset($data['image'])) {
            $post->addImage($data['image']);
        }



        $success =  trans('transAdmin.created');
        return redirect()
            ->route('admin.posts.index')
            ->with([
                'success' => $success
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $obj = $post;
        return view('admin.posts.edit', compact('obj'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->validated();

        $post->update($data);

        if (isset($data['image'])) {
            $post->addImage($data['image']);
        }

        $success =  trans('transAdmin.updated');
        return redirect()
            ->route('admin.posts.index')
            ->with([
                'success' => $success
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->clearMediaCollection('posts');
        $post->delete();
        $success = "Deleted successfully";
        return redirect()
            ->route('admin.posts.index')
            ->with([
                'success' => $success
            ]);
    }
}
