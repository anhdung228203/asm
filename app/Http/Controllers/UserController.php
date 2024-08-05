<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    const PATH_VIEW  = 'admin.users.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::query()->latest('id')->get();
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
        User::query()->create($request->all());

        return redirect()
            ->route('admin.users.index')
            ->with('msg', 'Thao tác thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = User::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = User::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = User::query()->findOrFail($id);

        $model->update($request->all());

        return back()->with('msg', 'Thao tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = User::query()->findOrFail($id);

        $model->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('msg', 'Thao tác thành công');
    }
}
