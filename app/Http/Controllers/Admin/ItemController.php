<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\StoreItem;
use App\Http\Requests\Admin\UpdateItem;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends BaseController
{
    public function index()
    {
        $modelName = \App\Models\Admin\ItemSearch::class;
        $models = $modelName::getAll();
        $sort = request()->get('sort');
        $filter = request()->get('filter');
        return view('admin.item.index', compact('models', 'modelName', 'sort', 'filter'));
    }

    public function create()
    {
        $model = new Item();
        $categoryList = Category::getList();
        return view('admin.item.create', compact('model', 'categoryList'));
    }

    public function store(StoreItem $request)
    {
        $model = new Item();

        // if need upload image
        $model = $this->storeImage($model, $request);

        // set model
        $model->header = $request->input('header');
        $model->pos = $request->input('pos');
        $model->status = $request->input('status');

        if ($model->save()) {
            if ($request->input('apply')) {
                return redirect()
                    ->route('item.edit', ['id' => $model->id])
                    ->withSuccess('Товар ' . $model->header . ' успешно создан');
            }
            return redirect()
                ->route('item.index')
                ->withSuccess('Товар' . $model->header . ' успешно создан');
        }
        return redirect()->route('item.create')->withInput();
    }

    public function edit($id) {
        $model = Item::findOrFail($id);
        $categoryList = Category::getList();
        return view('admin.item.edit', compact('model', 'categoryList'));
    }

    public function save(UpdateItem $request, $id)
    {
        $model = Item::findOrFail($id);

        // if need upload image
        $model = $this->storeImage($model, $request);

        $model->header = $request->input('header');
        $model->pos = $request->input('pos');
        $model->status = $request->input('status');

        if ($model->save()) {
            if ($request->input('apply')) {
                return redirect()
                    ->route('item.edit', ['id' => $model->id])
                    ->withSuccess('Товар ' . $model->header . ' успешно coхранен');
            }
            return redirect()
                ->route('item.index')
                ->withSuccess('Товар ' . $model->header . ' успешно coхранен');
        }
        return redirect()->route('item.edit')->withInput();
    }
}
