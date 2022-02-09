<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Comment;
use App\Models\Tag;

class MainController extends Controller {
    
    public function home() {
        $articles = new Article();
        return view('home', ['articles' => $articles->paginate(6)->reverse()]);
    }
    
    public function articles() {
        $articles = new Article();
        return view('articles', ['articles' => $articles->orderBy('id', 'DESC')->paginate(10)]);
    }
    
    public function article(Article $id) {
        $comments = new Comment();
        return view('article', [
            'article' => $id,
            'comments' => $id->comments
        ]);
    }

    public function comment_check($id, Request $request){
        //dd($request);
        $valid = $request->validate([
            'subject' => 'required|min:5|max:100',
            'body' => 'required|min:10|max:500'            
        ]);

        $comment = new Comment();
        $comment->subject = $request->input('subject');
        $comment->body = $request->input('body');
        $comment->article_id = $id;

        $comment->save();

        return redirect()->route('articles');
    }
}
