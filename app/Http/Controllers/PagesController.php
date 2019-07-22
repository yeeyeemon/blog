<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;

class PagesController extends Controller
{
    public function getIndex(){
        $popular_posts=Post::where('viewer_count','>',3)->get();
        $posts=Post::all();
        return view('pages.welcome',compact('posts','popular_posts'));
    }
    public function getAbout(){
        return view('pages.about');
    }
    public function getContact(){
        return view('pages.contact');
    }
    public function postContact(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'subject'=>'min:3',
            'message'=>'min:10'
        ]);
        $data=array(
            'email'=>$request->email,
            'subject'=>$request->subject,
            'bodyMessage'=>$request->message
        );
        Mail::send('emails.contact',$data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('yeemon1191996@gmail.com');
            $message->subject($data['subject']);

        });
    }
}
