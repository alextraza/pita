<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use Illuminate\Http\Request;
use App\Models\Admin\OrderSearch as Model;

class OrderController extends BaseController
{
    public function index()
    {
        $modelName = \App\Models\Admin\OrderSearch::class;
        $models = $modelName::getAll();
        $sort = request()->get('sort');
        $filter = request()->get('filter');
        return view('admin.dashboard', compact('models', 'modelName', 'sort', 'filter'));
    }
}
