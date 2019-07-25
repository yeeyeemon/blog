<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    if(Auth::user()->role =='administrator'){
        $posts=Post::paginate(3);
        return view('admin.home',compact('posts'));
    }elseif(Auth::user()->role =='normal_user'){
        return redirect('posts');
    }
        return redirect('/');
    }
}
