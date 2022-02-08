<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class MainController extends Controller {
    
    public function home() {
        return view('home');
    }
    
    public function articles() {
        $comments = new Comment();
        return view('articles', ['comments' => $comments->all()]);
    }
    
    public function article() {
        return view('article');
    }

    public function comment_check(Request $request){
        //dd($request);
        $valid = $request->validate([
            'subject' => 'required|min:5|max:100',
            'body' => 'required|min:10|max:500'            
        ]);

        $comment = new Comment();
        $comment->subject = $request->input('subject');
        $comment->body = $request->input('body');

        $comment->save();

        return redirect()->route('articles');
    }
}
