<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{

    public function index()
    {
        $topview = Post::where('active',1)->orderBy('page_views', 'DESC')->take(4)->get();
        $data = Post::where('active',1)->with('Category','Author')->latest()->get();

        return view('home')->with(['data' => $data, 'topview' => $topview]);;
    }
}
