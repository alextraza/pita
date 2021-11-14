<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\OrderSearch as Model;

class OrderController extends Controller
{
    public function index()
    {
        $models = Model::paginate(20);
        return view('admin.dashboard', compact('models'));
    }
}
