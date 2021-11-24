<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\BaseController;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected $model = User::class;

    public function index()
    {
        $modelName = \App\Admin\Models\UserSearch::class;
        $models = $modelName::getAll();
        $sort = request()->get('sort');
        $filter = request()->get('filter');
        return view('admin.user.index', compact('models', 'modelName', 'sort', 'filter'));
    }

    public function create()
    {
        $model = new $this->model();
        return view('admin.user.create', compact('model'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'is_admin' => 'boolean',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'min:8',
        ]);

        $model = $this->setModel(new $this->model(), $request);
        if ($model->save()) {
            if ($request->input('apply')) {
                return redirect()
                    ->route('user.edit', ['id' => $model->id])
                    ->withSuccess('Пользователь ' . $model->header . ' успешно создана');
            }
            return redirect()
                ->route('user.index')
                ->withSuccess('Пользователь ' . $model->header . ' успешно создана');
        }
        return redirect()->route('user.create')->withInput();
    }

    public function edit($id) {
        $model = $this->model::findOrFail($id);
        return view('admin.user.edit', compact('model'));
    }

    public function save(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required',
            'is_admin' => 'boolean',
            'email' => 'required|email',
            'phone' => 'min:8',
        ]);

        $model = $this->setModel($this->model::findOrFail($id), $request);
        if ($model->save()) {
            if ($request->input('apply')) {
                return redirect()
                    ->route('user.edit', ['id' => $model->id])
                    ->withSuccess('Пользователь ' . $model->header . ' успешно coхранена');
            }
            return redirect()
                ->route('user.index')
                ->withSuccess('Пользователь ' . $model->header . ' успешно coхранена');
        }
        return redirect()->route('user.edit')->withInput();
    }

    protected function setModel($model, $request) {
        // if need upload image
        $model = $this->storeImage($model, $request);

        // set model
        $model->email = $request->input('email');
        $model->phone = str_replace(['+7', ' ', '(', ')', '-'], '', $request->phone);
        $model->name = $request->input('name');
        $model->is_admin = $request->input('is_admin');
        if ($request->input('password')) {
            $model->password = Hash::make($request->input('password'));
        }

        return $model;
    }
}
