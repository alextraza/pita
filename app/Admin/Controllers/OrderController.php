<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Admin\Models\OrderSearch as Model;

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
