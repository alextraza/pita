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

    public function changeStatus($id)
    {
        if ($model = $this->getModel($id)) {
            $model->status = !$model->status;
            $model->save();
            echo $model->status;
        }
        return false;
    }

    public function changePos(Request $request)
    {
        $request->validate([
            'id' => 'numeric',
            'pos' => 'numeric',
        ]);

        if ($model = $this->getModel($request->id)) {
            $model->pos = $request->pos;
            $model->save();
            echo $model->pos;
        }
        return false;
    }

    private function getModel($id)
    {
        $model = $this->model::where('id', $id)->first();
        return $model;
    }
}
