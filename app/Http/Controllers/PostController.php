<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Session;
use Image;
use Storage;
use Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $popular_posts=Post::where('viewer_count','>',3);
        
        $posts=Post::paginate(2);
        return view('posts.index',compact('posts','popular_posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tags=Tag::all();
        return view('posts.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
        
    //     $this->validate($request,array(
    //         'title'=>'required|min:3',
    //         'body'=>'required|max:255|min:5'
    //     ));
    //     $post=new Post();
        
    //     $post->title=$request->title;
    //     $post->body=$request->body;
    //     if($request->hasFile('featured_image'))
        
    // {
    //     $image=$request->file('featured_image');
    //         $filename=time().'.'.$image->getClientOriginalExtension();
    //         $location=public_path('images/'.$filename);
    //         Image::make($image)->resize(800,400)->save($location);
    //         $post->images=$filename;
    // }
   
    //     $post->save();
    //     Session::flash('success','This Blog post is successfully created.');

    //     return redirect()->route('posts.show',$post->id);
    // }
    public function store(Request $request){
       
        $post=new Post();
        request()->validate([

            'featured_image' => 'required|image|mimes:mp4,png,jpg,gif,svg',
            'title'=>'required',
            'slug'=>'required|alpha_dash|min:5|max:255',
            'body'=>'required'

        ]);
        $imageName = time().'.'.request()->featured_image->getClientOriginalExtension();
        request()->featured_image->move(public_path('images'), $imageName);
        $post->title=$request->title;
        $post->slug=$request->slug;
        $post->body=$request->body;
        $post->user_id=Auth::user()->id;
         $post->images=$imageName;   
       
        $post->save();
        $post->tags()->sync($request->tags);
        return redirect()->route('posts.index')

            ->with('success','You have successfully upload image.')

            ->with('images',$imageName);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);

        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {  
    //     $this->validate($request,array(
    //         'title'=>'required|max:255',
    //         'body'=>'required'
    //     ));
    //     $post=Post::find($id);
       
    //     $post->title=$request->input('title');
    //     $post->body=$request->input('body');
    //     if($request->hasFile('featured_image')){
    //         $image=$request->file('featured_image');
    //         $filename=time().'.'.$image->getClientOriginalExtension();
    //         $location=public_path('images/'.$filename);
    //         Image::make($image)->resize(800,400)->save($location);
    //         $oldfilename=$post->images;
    //         Storage::delete($oldfilename);
    //         $post->images=$filename;
    //     }
    //     $post->save();
    //     Session::flash('success','This blog is edited successfully');
    //     return redirect()->route('posts.show',$post->id);
    // }

    public function update(Request $request,$id)
{
    $post = Post::find($id);
    $post->title=$request->input('title');

     $post->body=$request->input('body');
    if($request->hasFile('featured_image'))
    {
        $usersImage = public_path("images/{$post->images}"); // get previous image from folder
        if (File::exists($usersImage)) { // unlink or remove previous image from folder
            unlink($usersImage);
        }
        $file = $request->file('featured_image');
        $name = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path().'/images/', $name); 
        $post->images= $name;
    }
    $post->save();
    return response()->json($post);
    // return redirect()->route('posts.show',$post->id);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $post->delete();
        Session::flash('success','This post is deleted successfully!!!');
        return redirect()->route('posts.index');
    }
}
