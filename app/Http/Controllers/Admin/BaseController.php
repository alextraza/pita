<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected function storeImage($model, $request)
    {
        if ($request->image) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $model->image = $imageName;
        }
        return $model;
    }
}
