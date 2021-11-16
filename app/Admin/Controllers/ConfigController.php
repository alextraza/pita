<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\BaseController;
use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends BaseController
{
    public function index()
    {
        $model = Config::class;
        return view('admin.config.index', compact('model'));
    }

    public function save(Request $request)
    {
        $data = $request->all();
        unset($data['_method']);
        unset($data['_token']);
        unset($data['save']);
        unset($data['apply']);
        foreach ($data as $key => $content) {
            $model = Config::firstOrCreate(['key' => $key]);
            $model->content = $content;
            $model->key = $key;
            $model->save();

        }
        if ($request->input('apply')) {
            return redirect()
                ->route('config.index')
                ->withSuccess('Конфигурация сохранена');
        }
        return redirect()
            ->route('dashboard')
            ->withSuccess('Конфигурация сохранена');
    }
}
