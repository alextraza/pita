<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function delete(Request $request)
    {
        $this->model::destroy($request->id);
        return back();
    }
}
