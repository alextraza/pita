<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        $model = new Category();
        return view('admin.category.create', compact('model'));
    }

    public function store(Request $request)
    {
        $model = new Category();

        $validator = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg,png,svg|max:2048',
            'slug' => 'required|unique:categories',
            'header' => 'required',
            'pos' => 'integer|nullable',
            'status' => 'boolean',
        ]);

        if ($request->image) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $model->image = $imageName;
        }

        $model->slug = $request->input('slug');
        $model->header = $request->input('header');
        $model->pos = $request->input('pos');
        $model->status = $request->input('status');
        if ($model->save()) {
            if ($request->input('apply')) {
                return redirect()
                    ->route('category.edit', ['id' => $model->id])
                    ->withSuccess('Категория ' . $model->header . ' успешно создана');
            }
            return redirect()
                ->route('category.index')
                ->withSuccess('Категория ' . $model->header . ' успешно создана');
        }
        return redirect()->route('category.create')->withInput();
    }

    public function edit($id) {
        $model = Category::findOrFail($id);
        return view('admin.category.edit', compact('model'));
    }
}
