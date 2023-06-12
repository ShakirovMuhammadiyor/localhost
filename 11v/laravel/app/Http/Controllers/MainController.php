<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller {
    public function main ($locale = null) {
        if (isset($locale) && in_array($locale, config('app.available_locales'))) {
            app()->setLocale($locale);
        }

        $data = Post::where("lang", $locale)->get();
        
        return view('welcome', [
            "languages" => config('app.available_locales'),
            "data" => $data
        ]);
    }
}
