<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller {
    public function showAll () {
        $data = Content::all();

        return view('all', [
            "data" => $data
        ]);
    }

    public function createPage () {
        return view('create');
    }

    public function createAction (Request $request) {
        $request->validate([
            "title" => "required",
            "image" => "required",
            "subject" => "required",
            "text" => "required"
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        Content::create([
            "title" => $request->title,
            "subject" => $request->subject,
            "image" => $imageName,
            "text" => $request->text
        ]);

        return redirect('/')->with('success', 'Item added successfully');
    }

    public function updatePage ($id) {
        $item = Content::where("id", $id)->first();

        return view('update', [
            "data" => $item
        ]);
    }

    public function updateAction (Request $request) {
        $request->validate([
            "title" => "required",
            "subject" => "required",
            "text" => "required"
        ]);

        if ($request->image) {
            unlink(public_path('images/'.$request->lastimage));

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = $request->lastimage;
        }

        Content::where('id', $request->id)->update([
            'title' => $request->title,
            "subject" => $request->subject,
            "image" => $imageName,
            "text" => $request->text
        ]);

        return redirect('/')->with('success', 'Item updated successfully');
    }
}
