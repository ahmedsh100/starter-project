<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
    {

        $blogs = Blog::paginate(1);

        return view('theme.index',compact('blogs'));
    }

    public function category()
    {
        return view('theme.category');
    }

    public function contact()
{
    return view('theme.contact');
}
    public function singleBlog()
    {
        return view('theme.single-blog');
    }
    public function login()
    {
        return view('theme.login');
    }
    public function register()
    {
        return view('theme.register');
    }


}
