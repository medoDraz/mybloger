<?php

namespace App\Http\Controllers\Dashboard;


use App\Category;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:create_posts'])->only('create');
        $this->middleware(['permission:read_posts'])->only('read');
        $this->middleware(['permission:update_posts'])->only('edit');
        $this->middleware(['permission:delete_posts'])->only('destroy');
    }
    public function index(Request $request)
    {
        $categories = Category::all();
        
        $posts = Post::when($request->search, function ($q) use ($request) {

            return $q->whereTranslationLike('title', '%' . $request->search . '%');

        })->when($request->category_id, function ($q) use ($request) {

            return $q->where('category_id', $request->category_id);

        })->latest()->paginate(5);
        return view('dashboard.posts.index',compact('posts','categories'));
    }


    public function create()
    {
        $categories=Category::all();
        return view('dashboard.posts.create',compact('categories'));
    }


    public function store(Request $request)
    {
        $rules=[
            'category_id'=>'required'
        ];
        foreach (config('translatable.locales') as $locale){
            $rules +=[$locale.'.title'=>'required|unique:post_translations,title'];
            $rules +=[$locale.'.body'=>'required'];
        }

        $rules +=[
            'status'=>'required',
            'image'=>'image'
        ];

        $request->validate($rules);

        $request_data=$request->all();


        if ($request->image) {
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/post_images/'.$request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }


       Post::create($request_data);
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.posts.index');
    }



    public function edit(Post $post)
    {
        $categories=Category::all();
        return view('dashboard.posts.edite',compact('post','categories'));
    }


    public function update(Request $request, Post $post)
    {


        $rules=[
            'category_id'=>'required'
        ];
        foreach (config('translatable.locales') as $locale){
            $rules +=[$locale.'.title'=>['required', Rule::unique('post_translations','title')->ignore($post->id,'post_id')]];
            $rules +=[$locale.'.body'=>'required'];
        }

        $rules +=[
            'status'=>'required',
            'image'=>'image'
        ];

        $request->validate($rules);

        $request_data=$request->all();


        if ($request->image) {

            if ($post->image != 'default.png') {
                Storage::disk('public_uploads')->delete('/post_images/' . $post->image);
            }

            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/post_images/'.$request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }

        $post->update($request_data);
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.posts.index');
    }


    public function destroy(Post $post)
    {
        if ($post->image != 'default.png') {
            Storage::disk('public_uploads')->delete('/post_images/' . $post->image);
        }
        $post->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.posts.index');
    }
}
