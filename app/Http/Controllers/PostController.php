<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Request $request)
    {

        $categories = Category::all();
        $posts = Post::where('id', $request->id)->get();
       // dd($post);
        return view('pages.article',compact('posts','categories'));
    }

    public function viewcat(Request $request){
        $categories = Category::all();
        $posts = Post::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('title', '%' . $request->search . '%');

        })->when($request->id, function ($q) use ($request) {

            return $q->where('id', $request->id);

        })->latest()->paginate(10);
        return view('pages.categories',compact('categories','posts'));
    }

    public function viewpostofcat(Request $request){
        $categories = Category::all();
		$category=Category::find($request->category_id);
        $posts = Post::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('title', '%' . $request->search . '%');

        })->when($request->category_id, function ($q) use ($request) {

            return $q->where('category_id', $request->category_id);

        })->latest()->paginate(10);
        $new_posts=Post::latest()->paginate(4);
        // dd($category->name);

        return view('pages.category_blog',compact('posts','categories','new_posts','category'));
    }

    public function viewposts(Request $request){
        $categories = Category::all();

        $posts = Post::when($request->search, function ($q) use ($request) {
            return $q->whereTranslationLike('title', '%' . $request->search . '%');
        })->latest()->paginate(10);

        $new_posts=Post::latest()->paginate(4);
        // dd($posts);

        return view('pages.archive_blog',compact('posts','categories','new_posts'));
    }

    public function about()
    {
    	$categories = Category::all();
    	return view('about_us',compact('categories'));
    }

    public function contact()
    {
    	$categories = Category::all();
    	return view('contact',compact('categories'));
    }
}
