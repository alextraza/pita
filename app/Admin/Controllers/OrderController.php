<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\BaseController;
use App\Admin\Models\OrderSearch as Model;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    protected $model = Order::class;

    public function index()
    {
        $modelName = \App\Admin\Models\OrderSearch::class;
        $models = $modelName::getAll();
        $sort = request()->get('sort');
        $filter = request()->get('filter');
        return view('admin.dashboard', compact('models', 'modelName', 'sort', 'filter'));
    }

    public function edit($id) {
        $model = $this->model::findOrFail($id);
        return view('admin.order.edit', compact('model'));
    }

    public function save(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'payment' => 'required',
        ]);

        $model = $this->setModel($this->model::findOrFail($id), $request);
        if ($model->save()) {
            if ($request->input('apply')) {
                return redirect()
                    ->route('order.edit', ['id' => $model->id])
                    ->withSuccess('Заказ #' . $model->id . ' успешно coхранен');
            }
            return redirect()
                ->route('dashboard')
                ->withSuccess('Заказ #' . $model->id . ' успешно coхранен');
        }
        return redirect()->route('order.edit')->withInput();
    }

    protected function setModel($model, $request) {
        // set model
        $model->status = $request->input('status');
        $model->payment = $request->input('payment');
        return $model;
    }
}
