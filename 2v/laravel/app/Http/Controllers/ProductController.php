<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function showAll () {
        $all = Product::all();
        return view("products", [
            "products" => $all
        ]);
    }

    public function createPage () {
        return view("create");
    }

    public function createAction (Request $request) {
        $request->validate([
            'name' => 'required|min:2|max:100',
            'description' => 'required|min:2|max:300',
            'image' => 'required'
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        Product::create([
            "name" => $request->name,
            "image" => $imageName,
            "description" => $request->description,
            "price" => $request->price,
            "rating" => $request->rating
        ]);


        return redirect('/')->with('success', 'Item added successfully');
    }

    public function delete (Request $request) {
        $x = Product::where('id', $request->id)->first();

        if ($x) {
            unlink(public_path('images/'.$x->image));

            Product::destroy($request->id);

            return redirect('/')->with('success', 'Item deleted successfully');
        } else {
            return redirect('/')->with('success', 'Item not found');
        }
    }
}
