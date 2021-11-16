<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\BaseController;
use App\Admin\Requests\StorePage;
use App\Admin\Requests\UpdatePage;
use App\Models\Page;

class PageController extends BaseController
{
    public function index()
    {
        $modelName = \App\Admin\Models\PageSearch::class;
        $models = $modelName::getAll();
        $sort = request()->get('sort');
        $filter = request()->get('filter');
        return view('admin.page.index', compact('models', 'modelName', 'sort', 'filter'));
    }

    public function create()
    {
        $model = new Page();
        return view('admin.page.create', compact('model'));
    }

    public function store(StorePage $request)
    {
        $model = $this->setModel(new Page(), $request);
        if ($model->save()) {
            if ($request->input('apply')) {
                return redirect()
                    ->route('page.edit', ['id' => $model->id])
                    ->withSuccess('Страница ' . $model->header . ' успешно создана');
            }
            return redirect()
                ->route('page.index')
                ->withSuccess('Страница' . $model->header . ' успешно создана');
        }
        return redirect()->route('page.create')->withInput();
    }

    public function edit($id) {
        $model = Page::findOrFail($id);
        return view('admin.page.edit', compact('model'));
    }

    public function save(UpdatePage $request, $id)
    {
        $model = $this->setModel(Page::findOrFail($id), $request);
        if ($model->save()) {
            if ($request->input('apply')) {
                return redirect()
                    ->route('page.edit', ['id' => $model->id])
                    ->withSuccess('Страница' . $model->header . ' успешно coхранена');
            }
            return redirect()
                ->route('page.index')
                ->withSuccess('Страница ' . $model->header . ' успешно coхранена');
        }
        return redirect()->route('page.edit')->withInput();
    }

    protected function setModel(Page $model, $request) {
        // if need upload image
        $model = $this->storeImage($model, $request);

        // set model
        $model->header = $request->input('header');
        $model->title = $request->input('title');
        $model->description = $request->input('description');
        $model->slug = $request->input('slug');
        $model->pos = $request->input('pos');
        $model->status = $request->input('status');
        $model->content_raw = $request->input('content_raw');
        if ($request->input('content_raw')) {
            $model->content = markdown()->parse($request->input('content_raw'));
        } else {
            $model->content = '';
        }

        return $model;
    }
}
