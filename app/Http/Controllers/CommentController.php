<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment_check(Request $request){
        //dd($request);
        $valid = $request->validate([
            'subject' => 'required|min:5|max:100',
            'body' => 'required|min:10|max:500'            
        ]);

        $comment = new Comment();
        $comment->article_id = $request->input('article_id');
        $comment->subject = $request->input('subject');
        $comment->body = $request->input('body');

        $comment->save();

        return redirect()->route('article', ['slug' => $request->input('article_slug')]);
    }
}
