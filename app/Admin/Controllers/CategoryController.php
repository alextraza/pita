<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\BaseController;
use App\Admin\Requests\UpdateCategory;
use App\Admin\Requests\StoreCategory;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends BaseController
{
    public function index()
    {
        $modelName = \App\Admin\Models\CategorySearch::class;
        $models = $modelName::getAll();
        $sort = request()->get('sort');
        $filter = request()->get('filter');
        return view('admin.category.index', compact('models', 'modelName', 'sort', 'filter'));
    }

    public function create()
    {
        $model = new Category();
        return view('admin.category.create', compact('model'));
    }

    public function store(StoreCategory $request)
    {
        $model = new Category();

        // if need upload image
        $model = $this->storeImage($model, $request);

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

        // if need upload image
        $model = $this->storeImage($model, $request);

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
