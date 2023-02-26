<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function __invoke()
    {
       // auth()->user()->followings->pluck('id');
          $id =   auth()->user()->followings->pluck('id')->toArray();
        $posts = Post::WhereIn('user_id',$id)->latest()->paginate(20);
        return view('home', ['posts' => $posts]);
    }
}
