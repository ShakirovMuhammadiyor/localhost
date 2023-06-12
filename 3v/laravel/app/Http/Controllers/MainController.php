<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class MainController extends Controller {
    public function main (Request $request) {
        if ($request->search && trim($request->search) != "") {
            $search = $request->search;
            if ($search == "*") {
                $data = Content::all();
            } else {
                $data = Content::where('title', 'LIKE', '%'.$search.'%')->orWhere('desc', 'LIKE', '%'.$search.'%')->get();
            }
            
            return view('welcome', [
                "data" => $data
            ]);
        } else {
            return view ('welcome');
        }
    }
}
