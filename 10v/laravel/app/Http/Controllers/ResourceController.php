<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller {
    public function getAll () {
        $data = Resource::all();

        return response()->json($data);
    }

    public function getSingle ($id) {
        $data = Resource::where('id', $id)->get();

        return response()->json($data);
    }

    public function getExcept ($id) {
        $data = Resource::whereNotIn('id', [$id])->get();

        return response()->json($data);
    }
}
