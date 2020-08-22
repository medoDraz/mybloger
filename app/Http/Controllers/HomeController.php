<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::all();
        $posts = Post::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('title', '%' . $request->search . '%');

        })->latest()->paginate(10);

        $new_posts=Post::latest()->paginate(3);
        // dd($new_posts);
        return view('welcome',compact('categories','posts','new_posts'));
    }

    // ->when($request->category_id, function ($q) use ($request) {

    //         return $q->where('category_id', $request->category_id);

    //     })
}
