<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\BaseController;
use App\Admin\Requests\StoreItem;
use App\Admin\Requests\UpdateItem;
use App\Models\Category;
use App\Models\Item;

class ItemController extends BaseController
{
    protected $model = Item::class;

    public function index()
    {
        $modelName = \App\Admin\Models\ItemSearch::class;
        $models = $modelName::getAll();
        $sort = request()->get('sort');
        $filter = request()->get('filter');
        return view('admin.item.index', compact('models', 'modelName', 'sort', 'filter'));
    }

    public function create()
    {
        $model = new $this->model();
        $categoryList = Category::getList();
        return view('admin.item.create', compact('model', 'categoryList'));
    }

    public function store(StoreItem $request)
    {
        $model = $this->setModel(new $this->model(), $request);
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
        $model = $this->model::findOrFail($id);
        $categoryList = Category::getList();
        return view('admin.item.edit', compact('model', 'categoryList'));
    }

    public function save(UpdateItem $request, $id)
    {
        $model = $this->setModel($this->model::findOrFail($id), $request);
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

    protected function setModel(Item $model, $request)
    {
        // if need upload image
        $model = $this->storeImage($model, $request);

        // set model
        $model->header = $request->input('header');
        $model->pos = $request->input('pos');
        $model->status = $request->input('status');
        $model->category_id = $request->input('category_id');
        $model->content_raw = $request->input('content_raw');
        if ($request->input('content_raw')) {
            $model->content = markdown()->parse($request->input('content_raw'));
        } else {
            $model->content = '';
        }
        $model->price = $request->input('price');
        $model->weight = $request->input('weight');
        $model->capacity = $request->input('capacity');
        $model->proteins = $request->input('proteins');
        $model->fats = $request->input('fats');
        $model->carbo = $request->input('carbo');
        $model->energy = $request->input('energy');
        $model->has_alt = $request->input('has_alt');
        $model->in_cart = $request->input('in_cart');
        $model->price_alt = $request->input('price_alt');
        $model->weight_alt = $request->input('weight_alt');

        return $model;
    }

}
