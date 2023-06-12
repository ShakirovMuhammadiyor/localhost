<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showAll () {
        $data = Product::all();

        return view('all', [
            "data" => $data
        ]);
    }

    public function createPage () {
        return view('create');
    }

    public function createAction (Request $request) {
        $request->validate([
            "name" => "required",
            "image" => "required"
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        Product::create([
            "name" => $request->name,
            "image" => $imageName,
            "category" => $request->category,
            "price" => $request->price,
            "rating" => $request->rating
        ]);

        return redirect('/')->with('success', 'Item added successfully');
    }

    public function updatePage ($id) {
        $item = Product::where("id", $id)->first();

        return view('update', [
            "data" => $item
        ]);
    }

    public function updateAction (Request $request) {
        $request->validate([
            "name" => "required",
            "category" => "required"
        ]);

        if ($request->image) {
            unlink(public_path('images/'.$request->lastimage));

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = $request->lastimage;
        }

        Product::where('id', $request->id)->update([
            "name" => $request->name,
            "image" => $imageName,
            "category" => $request->category,
            "price" => $request->price,
            "rating" => $request->rating
        ]);

        return redirect('/')->with('success', 'Item updated successfully');
    }

    public function deleteAction ($id) {
        Product::destroy($id);

        return redirect('/')->with('success', 'Item deleted successfully');
    }
}
