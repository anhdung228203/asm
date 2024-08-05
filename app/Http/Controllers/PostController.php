<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    const PATH_VIEW  = 'admin.posts.';
    const PATH_UPLOAD = 'posts';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::with(['category', 'author', 'tags'])->latest('id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     


        $dataPost = $request->all();

        if ($request->hasFile('image')) {
            $dataPost['image'] = Storage::put(self::PATH_UPLOAD, $request->file('image'));
        }

        Post::create($dataPost);

     
        return redirect()
            ->route('admin.posts.index')
            ->with('msg', 'Thao tác thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Post::with(['category', 'author', 'tags'])
        ->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $id)
    { 
        $model = Post::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $id)
    {
        $model = Post::query()->findOrFail($id);

        $model->update($request->all());

        return back()->with('msg', 'Thao tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $id)
    {
        $model = Post::query()->findOrFail($id);

        $model->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('msg', 'Thao tác thành công');
    }
}
