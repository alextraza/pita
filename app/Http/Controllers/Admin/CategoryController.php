<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateCategory;
use App\Http\Requests\Admin\StoreCategory;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Admin\CategorySearch;

class CategoryController extends Controller
{
    public function index()
    {
        $models = CategorySearch::getAll();
        return view('admin.category.index', compact('models'));
    }

    public function create()
    {
        $model = new Category();
        return view('admin.category.create', compact('model'));
    }

    public function store(StoreCategory $request)
    {
        $model = new Category();

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

    public function save(UpdateCategory $request, $id)
    {
        $model = Category::findOrFail($id);

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
                    ->withSuccess('Категория ' . $model->header . ' успешно coхранена');
            }
            return redirect()
                ->route('category.index')
                ->withSuccess('Категория ' . $model->header . ' успешно coхранена');
        }
        return redirect()->route('category.edit')->withInput();
    }
}
