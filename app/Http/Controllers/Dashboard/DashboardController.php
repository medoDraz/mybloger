<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;

class DashboardController extends Controller
{
    //

    public function index(){
        $categories_count = Category::count();
        $posts_count = Post::count();
        $users_count = User::whereRoleIs('admin')->count();
        
        return view('dashboard.welcome',compact('categories_count', 'posts_count',  'users_count'));
    }//end of index

}//end of controller
